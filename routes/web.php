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
Route::get('/courses/{course}/students', [CourseController::class, 'students'])->name('courses.students');
Route::get('/courses/{course}/edit', [CourseController::class,'edit'])->name('courses.edit');
Route::put('/courses/{course}', [CourseController::class,'update'])->name('courses.update');
Route::delete('/courses/{course}', [CourseController::class,'destroy'])->name('courses.destroy');

// Students
Route::get('/students', [StudentController::class,'index'])->name('students.index');
Route::get('students/{student}/courses', [StudentController::class, 'courses'])->name('students.courses');
Route::get('students/{student}/assign', [StudentController::class, 'assignForm'])->name('students.assignForm');
Route::post('students/{student}/assign', [StudentController::class, 'assignCourse'])->name('students.assignCourse');
Route::get('/students/create', [StudentController::class,'create'])->name('students.create');
Route::get('/students/{student}/edit', [StudentController::class,'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class,'update'])->name('students.update');
Route::post('/students', [StudentController::class,'store'])->name('students.store');
Route::delete('/students/unrollCourse/{course}', [StudentController::class, 'unrollCourse'])->name('students.unrollCourse');
Route::delete('/students/unrollStudent/{student}', [StudentController::class, 'unrollStudent'])->name('students.unrollStudent');
Route::delete('/students/{student}', [StudentController::class,'destroy'])->name('students.destroy');
