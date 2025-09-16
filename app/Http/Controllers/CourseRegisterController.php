<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseRegister;

class CourseRegisterController extends Controller
{
    public function index()
    {
        $courses_registers = CourseRegister::all();
        $uniqueCoursesId = CourseRegister::distinct()->pluck('course_id');
        return view("courses_register/index",compact("courses_registers","uniqueCoursesId"));
    }

}
