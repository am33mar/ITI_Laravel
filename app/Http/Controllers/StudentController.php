<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

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
    function index()
    {
        $students=Student::orderBy('created_at',"desc")->paginate(5);
        return view("students.index", ["students" => $students]);
    }

    function viewStudent($id)
    {
        $student = Student::find($id);
        return view("students.view", ["student" => $student]);
    }
    function deleteStudent($id)
    {
        Student::findOrFail($id)->delete();
        $students=Student::orderBy('created_at',"desc")->paginate(5);
        return view("students.index", ["students" => $students]);
    }
    function createStudent()
    {
        return view('students.create');
    }
    function storeStudent(Request $request)
    {
        $logoPath = $this->saveImage($request);
        $requestData = request()->all();
        $requestData['image'] = $logoPath;

        $student = new Student();
        $student->name = $requestData['name'];
        $student->email = $requestData['email'];
        $student->grade = $requestData['grade'];
        $student->gender = $requestData['gender'];
        $student->image = $requestData['image'];
        $student->save();
        return to_route('students.index');
    }
    function editStudent($id)
    {
        $student = Student::findOrFail($id);
        return view('students.update', compact("student"));
    }
    function updateStudent(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $newData = $request->except(['_token', '_method']);
        // handling image update
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($student->image) 
                Storage::disk('student_uploads')->delete($student->image);
            // Save the new image
            $newImagePath = $this->saveImage($request);
            $newData['image'] = $newImagePath;
        }
        $student->update($newData);
        return to_route('students.index');
    }
    function generate(Request $request)
    {
        Student::factory()->count($request->count)->create();
        return to_route('students.index');
    }
}
