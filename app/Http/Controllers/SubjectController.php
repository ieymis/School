<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::with('teachers.subjectTeachers.students')->get();
        $data = $subjects->map(function ($subject) {
            return [
                "id" => $subject->id,
                "name" => $subject->name,
                'Teachers' => $subject->teachers->map(function ($teacher) {
                    return [
                        'id' => $teacher->id,
                        'name' => $teacher->name,
                        'students' => $teacher->subjectTeachers->flatMap(function ($subjectTeacher) {
                            return $subjectTeacher->students->map(function ($student) {
                                return [
                                    'id' => $student->id,
                                    'name' => $student->name,
                                ];
                            });
                        })

                    ];
                }),



            ];
        });


        //   return Subject::all();


        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required']
        ]);
        $subject = Subject::create([
            'name' => $request->name,

        ]);
        $subject->teachers()->attach($request->teacher);

        return $subject;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return $subject->load('teachers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $subject->update([
            'name' => $request->name,
        ]);
        $subject->teachers()->sync($request->teachers);
        return $subject;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
    }
}
