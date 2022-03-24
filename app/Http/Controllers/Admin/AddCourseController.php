<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AddCourseController extends Controller
{
    public function addCourse(Request $request)
    {

        $request->validate([
            'name' => ['required']
        ]);
        $subject = Subject::create([
            'name' => $request->name,

        ]);

        return $subject;
       


    }
}
