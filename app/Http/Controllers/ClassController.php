<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function addClass(Request $request)
    {
        $teacher = Teacher::where('id', $request->teacher_id)->first();
        $teacher->subjects()->attach([
            $request->subject_id
        ]);


        return $teacher->load('Subjects');
    }


    public function registerClass(Request $request)
    {
        $student = Student::where('id', $request->student_id)->first();


        $student->SubjectTeachers()->attach(
            $request->SubjectTeachers_id
        );
        return $student->load('SubjectTeachers');
    }
}
