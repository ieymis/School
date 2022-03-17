<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',


    ];


    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function subjectTeachers()
    {
        return $this->hasMany(SubjectTeacher::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
