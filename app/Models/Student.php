<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ["Name","Phone"];

    public function registrations()
    {
        return $this->hasMany(CourseRegister::class,'Student_id','id');
    }
}
