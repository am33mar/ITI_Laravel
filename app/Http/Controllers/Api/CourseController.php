<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    // Get all courses => GET /api/courses
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(5);
        return response()->json($courses);
    }

    // Get a single course => GET /api/courses/{id}
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return response()->json($course);
    }

    // Create a new course => POST /api/courses
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses|min:2',
            'total_grade' => 'required|integer|min:1'
        ], [
            'name.unique' => "This course name already exists.",
            'name.required' => "You must provide a course name.",
            'name.min' => "Course name must be at least 2 characters long.",
            'total_grade.min' => 'Course grade must be higher than 0.',
            'total_grade.required' => "You must specify the course grade."
        ]);

        $course = Course::create([
            'name' => $request->input('name'),
            'total_grade' => $request->input('total_grade'),
            'description' => $request->input('description'),
        ]);

        return response()->json($course, 201);
    }

    // Update an existing course => PUT/PATCH /api/courses/{id}
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name' => 'required|min:2',
            'total_grade' => 'required|integer|min:1'
        ], [
            'name.required' => "You must provide a course name.",
            'name.min' => "Course name must be at least 2 characters long.",
            'total_grade.min' => 'Course grade must be higher than 0.',
            'total_grade.required' => "You must specify the course grade."
        ]);

        $course->update($request->only(['name', 'total_grade', 'description']));

        return response()->json($course);
    }

    // Delete a course => DELETE /api/courses/{id}
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json(null, 204);
    }

    // Generate fake courses => POST /api/courses/generate
    public function generate(Request $request)
    {
        $count = $request->input('count', 10); // Default to 10 if count is not provided
        $courses = Course::factory()->count($count)->create();
        return response()->json($courses, 201);
    }
}
