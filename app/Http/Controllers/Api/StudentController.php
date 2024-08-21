<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;

class StudentController extends Controller
{
    function saveImage($request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // file path in 'images/tracks_images'
            $filePath = $image->store('students_images', 'student_uploads');
            return $filePath;
        }
        return null;
    }

    // get all students => GET /api/students
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->paginate(5);
        return response()->json($students);
    }

    // get one student => GET /api/students/{id}
    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json($student);
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }

    // create student => POST /api/students
    public function store(Request $request)
    {
        $logoPath = $this->saveImage($request);
        $requestData = $request->all();
        $requestData['image'] = $logoPath;

        $student = Student::create($requestData);

        if ($student->tracks) {
            $track = $student->tracks;
            $courses = $track->courses;
            $courseIds = $courses->pluck('id');
            $student->courses()->attach($courseIds);
        }

        return response()->json($student, 201);
    }

    // update student => PUT/PATCH /api/students/{id}
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $newData = $request->except(['_token', '_method']);
        if ($request->hasFile('image')) {
            if ($student->image) {
                Storage::disk('student_uploads')->delete($student->image);
            }
            $newImagePath = $this->saveImage($request);
            $newData['image'] = $newImagePath;
        }

        if ($student->tracks) {
            $track = $student->tracks;
            $courses = $track->courses;
            $courseIds = $courses->pluck('id');
            $student->courses()->sync($courseIds);
        }
        
        $student->update($newData);

        return response()->json($request);
    }

    // dete student => DELETE /api/students/{id}
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }

    // create fake student => POST /api/students/generate
    public function generate(Request $request)
    {
        $count = $request->count ?? 10; // Default to 10 if no count is provided
        Student::factory()->count($count)->create();
        return response()->json(['message' => 'Students generated successfully']);
    }
}
