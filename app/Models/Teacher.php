<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',


    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function subjectTeachers()
    {
        return $this->hasMany(SubjectTeacher::class);
        //, 'course_id', 'course_teacher_id'
    }


    // hasmany su
}
