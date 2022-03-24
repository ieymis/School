<?php

namespace App\Models;

use App\Models\User;
use App\Models\SubjectTeacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',


    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'subject_teacher', 'subject_id', 'teacher_id', 'id', 'id');
    }

    public function SubjectTeachers()
    {
        return $this->hasMany(SubjectTeacher::class);
    }
}
