<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseRegister extends Model
{
    protected $table = 'course_registers';
    protected $fillable = ['student_id', 'course_id'];

    // public function course()
    // {
    //     return $this->BelongsTo(Course::class,'Course_id','id');
    // }

    // public function student()
    // {
    //     return $this->BelongsTo(Student::class,'Student_id','id');
    // }
}
