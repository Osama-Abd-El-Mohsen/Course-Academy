<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsValidationRequest;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()->isAdmin){
            $data = User::all();
            return view("students/index", ["students" => $data]);
        }
        else return redirect()->route("welcome");
    }
    // Assign Student To Course Form
    public function assignForm($course)
    {
        if(Auth::user()->isAdmin){
            $data = User::all();
            return view("students/assignForm", ["course" => $course, "students" => $data]);
        }
        else return redirect()->route("welcome");
    }
    // Assign Student To Course
    public function assignCourse($courseId)
    {
        if(Auth::user()->isAdmin){
            $student = User::findOrFail(request()->studentId);
            if ($student->courses()->where('course_id', $courseId)->exists()) {
                return back()->with('error', 'Student Already Rolled In This Course');
            }
            $student->courses()->attach($courseId);
            return redirect()->route("courses.students", $courseId);
        }
        else return redirect()->route("welcome");
    }
    // Unroll Student => Course
    public function unrollCourse($courseId)
    {
        if(Auth::user()->isAdmin){
            $studentId = request()->studentId;
            $student = User::findOrFail($studentId);
            $student->courses()->detach($courseId);
            return back()->with("success", "Student : [$student->name] Unrolled Successfully");
        }
        else return redirect()->route("welcome");
    }
    // Unroll Student => Course
    public function unrollStudent($studentId)
    {
        if(Auth::user()->isAdmin){
            $courseId = request()->courseId;
            $course = Course::findOrFail($courseId);
            $student = User::findOrFail($studentId);
            $student->courses()->detach($courseId);
            return back()->with("success", "Student : [$student->name] Unrolled From Course [$course->Name,$course->Level] Successfully");
        }
        else return redirect()->route("welcome");
    }

    // Add New Student Form
    public function create()
    {
        if(Auth::user()->isAdmin){
            return view("students/create");
        }
        else return redirect()->route("welcome");
    }
    // Add New Student
    public function store(StudentsValidationRequest $request)
    {
        if(Auth::user()->isAdmin){
            if (User::where("email", $request->email)->count() > 0) {
                return  redirect()->back()->withErrors(["email" => "email Already Exists"])->withInput();
            }
            User::Create(
                [
                    "name" => strtolower($request->name),
                    "phone" => strtolower($request->phone),
                    "email" => strtolower($request->email),
                ]
            );
            return redirect()->route("students.index")->with("success", "Student Updated Successfully");
        }
        else return redirect()->route("welcome");
    }
    // Edit Student Form
    public function edit(User $student)
    {
        if(Auth::user()->isAdmin){
            return view("students/edit", ['student' => $student]);
        }
        else return redirect()->route("welcome");
    }
    // Update Student Info
    public function update(User $student, StudentsValidationRequest $request)
    {
        if(Auth::user()->isAdmin){
            if (User::where("email", $request->email)->count() > 0 & $student->id != User::where("email", $request->email)->value('id')) {
                return  redirect()->back()->withErrors(["email" => "email Already Exists"])->withInput();
            }
            $student->update(
                [
                    "name" => strtolower($request->name),
                    "phone" => strtolower($request->phone),
                    "email" => strtolower($request->email),
                ]
            );
            return redirect()->route("students.index")->with("success", "Student Added Successfully");
        }
        else return redirect()->route("welcome");
    }
    // Delete Student
    public function destroy(User $student)
    {
        if(Auth::user()->isAdmin){
            $student->delete();
            return redirect()->route("students.index")->with("success", "Student Deleted Successfully");
        }
        else return redirect()->route("welcome");
    }
    // Show Students Rolled Courses
    public function courses(User $student)
    {
        if(Auth::user()->isAdmin){
            return view('students.courses', compact('student'));
        }
        else return redirect()->route("welcome");
    }
}
