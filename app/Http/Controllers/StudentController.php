<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        return view("students/index", ["students" => $data]);
    }
    public function assignForm($course)
    {
        $data = Student::all();
        return view("students/assignForm", ["course" => $course, "students" => $data]);
    }
    public function assignCourse($courseId)
    {
        $student = Student::findOrFail(request()->studentId);
        if ($student->courses()->where('course_id', $courseId)->exists()) {
            return back()->with('error', 'Student Already Rolled In This Course');
        }
        $student->courses()->attach($courseId);
        return redirect()->route("courses.students",$courseId);
    }
    public function unrollCourse($courseId)
    {
        $student = Student::findOrFail(request()->studentId);
        $student->courses()->detach($courseId);
        return back();
    }
}
