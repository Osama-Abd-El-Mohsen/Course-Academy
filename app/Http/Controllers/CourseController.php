<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        return view("courses/create");
    }
    public function store()
    {
        request()->validate(
            [
                'title' => 'required|string',
                'description' => 'required|string|max:200',
                'price' => 'required|integer|max:10000',
                'level' => 'required',
            ]
        );
        if (Course::Where('Name', "=", request()->title)->Where('Level', "=", request()->level)->count() == 0) {
            Course::Create(
                [
                    "Name" => strtolower(request()->title),
                    "Description" => strtolower(request()->description),
                    "Price" => strtolower(request()->price),
                    "Level" => strtolower(request()->level),
                ]
            );
        } else return back()->withErrors(['title' => 'This course with the same level already exists.',])->withInput();
        return redirect()->route("courses.index");
    }

    public function edit(Course $course)
    {
        return view("courses/edit", ['course' => $course]);
    }
    public function update(Course $course)
    {
        request()->validate(
            [
                'title' => 'required|string',
                'description' => 'required|string|max:200',
                'price' => 'required|integer|max:10000',
                'level' => 'required',
            ]
        );
        if (Course::Where('Name', "=", request()->title)->Where('Level', "=", request()->level)->count() == 1) {
            if (Course::Where('Name', "=", request()->title)->Where('Level', "=", request()->level)->value("id") == $course->id) {
                $course->update(
                    [
                        "Name" => strtolower(request()->title),
                        "Description" => strtolower(request()->description),
                        "Price" => strtolower(request()->price),
                        "Level" => strtolower(request()->level),
                    ]

                );
            } else return back()->withErrors(['title' => 'This course with the same level already exists.',])->withInput();
        } else return back()->withErrors(['title' => 'This course with the same level already exists.',])->withInput();
        return redirect()->route("courses.index", ['course' => $course])->with("success", "Course added successfully");
    }
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route("courses.index");
    }

    public function students(Course $course)
    {
        return view('courses.students', compact('course'));
    }
}
