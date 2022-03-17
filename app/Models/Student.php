<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',


    ];

    public function subjectTeachers()
    {
        return $this->belongsToMany(SubjectTeacher::class);
    }


    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
