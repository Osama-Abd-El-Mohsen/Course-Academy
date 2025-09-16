<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseRegisterController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("home");

// Courses
Route::get('/courses', [CourseController::class,'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class,'create'])->name('courses.create');
Route::post('/courses', [CourseController::class,'store'])->name('courses.store');

// Students
Route::get('/students', [StudentController::class,'index'])->name('students.index');

// Course Register
Route::get('/courses_register', [CourseRegisterController::class,'index'])->name('courses_register.index');
