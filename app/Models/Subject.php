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


    public function students()
    {
        return $this->belongsToMany(student::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(teacher::class);
    }

    public function SubjectsTeacher()
    {
        return $this->hasmany(SubjectsTeacher::class);
    }
}
