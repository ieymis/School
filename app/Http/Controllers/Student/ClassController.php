<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\SubjectTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClassController extends Controller
{
    public function registerClass(Request $request, SubjectTeacher $subjectTeacher)
    {
        // $student = User::where('id', $request->student_id)->first();
        // $student->subjectTeachers()->attach(
        //     $request->subject_teacher_id
        // );
        // return $student->load('SubjectTeachers');
        $subjectTeacher->users()->attach([Auth::user()->id]);
        return response()->json([
            'message' => 'student added in class',
        ]);
    }
}
