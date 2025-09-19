<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Home Page
Route::get('/', [CourseController::class,'welcome'])->name('welcome');

// Welcome Page
Route::get('/welcome', [CourseController::class,'welcome'])->middleware(['auth', 'verified'])->name('dashboard');

// Auth Group
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Courses
    Route::get('/courses', [CourseController::class,'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class,'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class,'store'])->name('courses.store');
    Route::get('/courses/{course}/students', [CourseController::class, 'students'])->name('courses.students');
    Route::get('/courses/{course}/edit', [CourseController::class,'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class,'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class,'destroy'])->name('courses.destroy');

    // Students
    Route::get('/students', [UserController::class,'index'])->name('students.index');
    Route::get('students/{student}/courses', [UserController::class, 'courses'])->name('students.courses');
    Route::get('students/{student}/assign', [UserController::class, 'assignForm'])->name('students.assignForm');
    Route::post('students/{student}/assign', [UserController::class, 'assignCourse'])->name('students.assignCourse');
    Route::get('/students/create', [UserController::class,'create'])->name('students.create');
    Route::get('/students/{student}/edit', [UserController::class,'edit'])->name('students.edit');
    Route::put('/students/{student}', [UserController::class,'update'])->name('students.update');
    Route::post('/students', [UserController::class,'store'])->name('students.store');
    Route::delete('/students/unrollCourse/{course}', [UserController::class, 'unrollCourse'])->name('students.unrollCourse');
    Route::delete('/students/unrollStudent/{student}', [UserController::class, 'unrollStudent'])->name('students.unrollStudent');
    Route::delete('/students/{student}', [UserController::class,'destroy'])->name('students.destroy');
});


require __DIR__.'/auth.php';
