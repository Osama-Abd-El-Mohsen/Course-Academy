<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
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
        Course::Create(
            [
                "Name" => request()->title,
                "Description" => request()->description,
                "Price" => request()->price,
                "Level" => request()->level,
            ]
            );
        return redirect()->route("courses.index");

    }
}
