<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AddTeacherCourseController extends Controller
{

    public function addClass(Request $request,Subject $subject)
    {
        $this->validate($request, [
            'teacher_id' => ['required', 'exists:users,id']
        ]);
        $subject->users()->attach($request->teacher_id);


        return response()->json([
            'status' => 'teacher was added successfully'
        ]);
    }
}
