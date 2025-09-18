<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsValidationRequest;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        return view("students/index", ["students" => $data]);
    }
    // Assign Student To Course Form
    public function assignForm($course)
    {
        $data = Student::all();
        return view("students/assignForm", ["course" => $course, "students" => $data]);
    }
    // Assign Student To Course
    public function assignCourse($courseId)
    {
        $student = Student::findOrFail(request()->studentId);
        if ($student->courses()->where('course_id', $courseId)->exists()) {
            return back()->with('error', 'Student Already Rolled In This Course');
        }
        $student->courses()->attach($courseId);
        return redirect()->route("courses.students", $courseId);
    }
    // Unroll Student => Course
    public function unrollCourse($courseId)
    {
        $studentId = request()->studentId;
        $student = Student::findOrFail($studentId);
        $student->courses()->detach($courseId);
        return back()->with("success", "Student : [$student->Name] Unrolled Successfully");
    }
    // Unroll Student => Course
    public function unrollStudent($studentId)
    {
        $courseId = request()->courseId;
        $course = Course::findOrFail($courseId);
        $student = Student::findOrFail($studentId);
        $student->courses()->detach($courseId);
        return back()->with("success", "Student : [$student->Name] Unrolled From Course [$course->Name,$course->Level] Successfully");
    }

    // Add New Student Form
    public function create()
    {
        return view("students/create");
    }
    // Add New Student
    public function store(StudentsValidationRequest $request)
    {
        if (Student::where("Email", $request->Email)->count() > 0) {
            return  redirect()->back()->withErrors(["Email" => "Email Already Exists"])->withInput();
        }
        Student::Create(
            [
                "Name" => strtolower($request->Name),
                "Phone" => strtolower($request->Phone),
                "Email" => strtolower($request->Email),
            ]
        );
        return redirect()->route("students.index")->with("success", "Student Updated Successfully");
    }
    // Edit Student Form
    public function edit(Student $student)
    {
        return view("students/edit", ['student' => $student]);
    }
    // Update Student Info
    public function update(Student $student, StudentsValidationRequest $request)
    {
        if (Student::where("Email", $request->Email)->count() > 0 & $student->id != Student::where("Email", $request->Email)->value('id')) {
            return  redirect()->back()->withErrors(["Email" => "Email Already Exists"])->withInput();
        }
        $student->update(
            [
                "Name" => strtolower($request->Name),
                "Phone" => strtolower($request->Phone),
                "Email" => strtolower($request->Email),
            ]
        );
        return redirect()->route("students.index")->with("success", "Student Added Successfully");
    }
    // Delete Student
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route("students.index")->with("success", "Student Deleted Successfully");
    }
    // Show Students Rolled Courses
    public function courses(Student $student)
    {
        return view('students.courses', compact('student'));
    }
}
