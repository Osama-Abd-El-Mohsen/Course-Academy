<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ["Name","Phone","Email","Active"];

    public function courses()
    {
        // return $this->hasMany(CourseRegister::class,'Student_id','id');
        return $this->belongsToMany(Course::class, 'course_registers');
    }
}
