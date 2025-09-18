<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursesValidationRequest;
use App\Models\Course;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('Name')->orderBy('Level')->get();
        return view("courses/index", compact('courses'));
    }
    // Create New Course View
    public function create()
    {
        return view("courses/create");
    }
    // Create New Course
    public function store(CoursesValidationRequest $request)
    {
        if (Course::Where('Name', "=", $request->title)->Where('Level', "=", $request->level)->count() == 0) {
            Course::Create(
                [
                    "Name" => strtolower($request->title),
                    "Description" => strtolower($request->description),
                    "Price" => strtolower($request->price),
                    "Level" => strtolower($request->level),
                    ]
                );
            } else return back()->withErrors(['title' => 'This course with the same level already exists.',])->withInput();
            return redirect()->route("courses.index")->with("success","Course Added Successfully");
        }

    // Edit Course Form
    public function edit(Course $course)
    {
        return view("courses/edit", ['course' => $course]);
    }
    // Edit Course
    public function update(CoursesValidationRequest $request , Course $course)
    {
        if (Course::Where('Name', "=", $request->title)->Where('Level', "=", $request->level)->count() >=0) {
            if ((Course::Where('Name', "=", $request->title)->Where('Level', "=", $request->level)->value("id") == $course->id) || empty(Course::Where('Name', "=", $request->title)->Where('Level', "=", $request->level)->value("id")) ) {
                $course->update(
                    [
                        "Name" => strtolower($request->title),
                        "Description" => strtolower($request->description),
                        "Price" => strtolower($request->price),
                        "Level" => strtolower($request->level),
                    ]
                );
            }

            else return back()->withErrors(['title' => 'This course with the same level already exists.',])->withInput();
        } else return back()->withErrors(['title' => 'This course with the same level already exists.',])->withInput();
        return redirect()->route("courses.index", ['course' => $course])->with("success", "Course Updated Successfully");
    }
    // Delete Course
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route("courses.index")->with("success","Course Deleted Successfully");
    }

    // Show Rolled Students in Course
    public function students(Course $course)
    {
        return view('courses.students', compact('course'));
    }
}
