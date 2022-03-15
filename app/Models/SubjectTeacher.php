<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

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



    public function students()
    {
        return $this->belongsToMany(student::class);
    }


    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }
}
