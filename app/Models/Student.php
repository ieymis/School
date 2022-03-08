<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'age',
        'grade',

    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }



    public function Schools()
    {
        return $this->belongsTo(school::class);
    }
}
