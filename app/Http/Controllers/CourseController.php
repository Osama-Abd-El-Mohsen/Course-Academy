<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursesValidationRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class CourseController extends Controller
{
    public function index()
    {
        if(Auth::user()->isAdmin){
            $courses = Course::orderBy('Name')->orderBy('Level')->get();
            return view("courses/index", compact('courses'));
        }
        else return redirect()->route('welcome');
    }
    public function welcome()
    {
        $courses = Course::orderBy('Level')->get();
        return view("welcome", compact('courses'));
    }
    // Create New Course View
    public function create()
    {
        if(Auth::user()->isAdmin){
            return view("courses/create");
        }
        else return redirect()->route('welcome');
    }
    // Create New Course
    public function store(CoursesValidationRequest $request)
    {
        if(Auth::user()->isAdmin){
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
        else return redirect()->route('welcome');
        }
    // Edit Course Form
    public function edit(Course $course)
    {
        if(Auth::user()->isAdmin){
            return view("courses/edit", ['course' => $course]);
        }
        else return redirect()->route('welcome');
    }
    // Edit Course
    public function update(CoursesValidationRequest $request , Course $course)
    {
        if(Auth::user()->isAdmin){
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
        else return redirect()->route('welcome');
    }
    // Delete Course
    public function destroy(Course $course)
    {
        if(Auth::user()->isAdmin){
            $course->delete();
            return redirect()->route("courses.index")->with("success","Course Deleted Successfully");
        }
        else return redirect()->route('welcome');
    }

    // Show Rolled Students in Course
    public function students(Course $course)
    {
        if(Auth::user()->isAdmin){
            return view('courses.students', compact('course'));
        }
        else return redirect()->route('welcome');
    }
}
