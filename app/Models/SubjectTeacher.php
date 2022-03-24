<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectTeacher extends Pivot
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'subject_id',


    ];

    /**
     * The name of the foreign key column.
     *
     * @var string
     */
    protected $foreignKey = 'subject_teacher_id';

    public $incrementing = true;






    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'student_subject_teacher', 'subject_teacher_id', 'student_id', 'id', 'id');
    }
}
