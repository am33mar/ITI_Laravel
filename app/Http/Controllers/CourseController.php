<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Database\Seeders\CourseSeeder;

class CourseController extends Controller
{
    function index()
    {
        $courses = Course::orderBy('created_at', "desc")->paginate(5);
        //using model
        return view("courses.index", ["courses" => $courses]);
    }
    function show($id)
    {
        $course = Course::findOrFail($id);
        return view("courses.view", ["course" => $course]);
    }
    function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return to_route('courses.index');
    }
    function create()
    {
        return view('courses.create',compact('courses'));
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses|min:2',
            'total_grade' => 'required|integer|min:1'
        ], [
            'name.unique' => "This course name already exist",
            'name.required' => "You must type course name",
            'name.min' => "Course name must be at least 2 words long",
            'total_grade.min' => 'Course grade must be higher than 0',
            'total_grade.required' => "You must specify the course grade"
        ]);

        $requestData = request()->all();
        $course = new Course();
        $course->name = $requestData['name'];
        $course->total_grade = $requestData['total_grade'];
        $course->description = $requestData['description'];
        $course->save();
        return to_route('courses.index');
    }
    function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact("course"));
    }
    function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $newData = $request->except(['_token', '_method']);
        $request->validate([
            'name' => 'required|min:2',
            'total_grade' => 'required|integer|min:1'
        ], [
            'name.unique' => "This course name already exist",
            'name.required' => "You must type course name",
            'name.min' => "Course name must be at least 2 words long",
            'total_grade.min' => 'Course grade must be higher than 0',
            'total_grade.required' => "You must specify the course grade"
        ]);
        $course->update($newData);
        return to_route('courses.index');
    }
    function generate(Request $request)
    {
        Course::factory()->count($request->count)->create();
        return to_route('courses.index');
    }
}
