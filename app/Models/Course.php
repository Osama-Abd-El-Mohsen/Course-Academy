<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = ["Name","Description","Price","Level"];

    public function registration()
    {
        return $this->hasMany(CourseRegister::class,'Course_id','id');
    }
}
