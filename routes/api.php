Munira
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\student\ClassController;
use App\Http\Controllers\Student\RigesterController;
use App\Http\Controllers\Admin\AddCourseController;
use App\Http\Controllers\Admin\AddTeacherCourseController;
use App\Http\Controllers\Admin\RigesterController as AdminRigesterController;
use App\Http\Controllers\Teacher\RigesterController as TeacherRigesterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
////////////////////////////////Student///////////////////////////////////////////////////////
// Route::get('students', [StudentController::class, 'index']);
// Route::post('students', [StudentController::class, 'store']);
// Route::get('students/{student}', [StudentController::class, 'show']);
// Route::put('students/{student}', [StudentController::class, 'update']);
// Route::delete('students/{student}', [StudentController::class, 'destroy']);

/////////////////////////////// teacher//////////////////////////////////////////////////////
// Route::get('teachers', [TeacherController::class, 'index']);
// Route::post('teachers', [TeacherController::class, 'store']);
// Route::get('teachers/{teacher}', [TeacherController::class, 'show']);
// Route::put('teachers/{teacher}', [TeacherController::class, 'update']);
// Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy']);

//////////////////////////////subject//////////////////////////////////////////////////////
Route::get('subjects', [SubjectController::class, 'index']);
Route::post('subjects', [SubjectController::class, 'store']);
Route::get('subjects/{subject}', [SubjectController::class, 'show']);
Route::put('subjects/{subject}', [SubjectController::class, 'update']);
Route::delete('subjects/{subject}', [SubjectController::class, 'destroy']);

// Route::get('subjects/show-subjects/{subject}', [SubjectController::class, 'showSubject']);



///////////////////////////////////////Auth//////////////////////////////////////////////////
Route::post('login', [AuthController::class, 'login']);


///////////////////////////////////////// teacher//////////////////////////////////////////

Route::prefix('teachers')->group(function () {
    Route::post('rigester', [TeacherRigesterController::class, 'rigester']);
});

//////////////////////////////////////////  student/////////////////////////////////////////
Route::prefix('students')->group(function () {
    Route::post('rigester', [RigesterController::class, 'rigester']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('classes/{subjectTeacher}/registerClass', [ClassController::class, 'registerClass']);
    });
});
///////////////////////////////////////////Admin///////////////////////////////////////////////

Route::prefix('admins')->group(function () {
    Route::post('rigester', [AdminRigesterController::class, 'rigester']);


    Route::middleware('auth:sanctum')->group(function () {
        Route::post('addCourse', [AddCourseController::class, 'addCourse']);
        Route::post('subjects/{subject}/teacher', [AddTeacherCourseController::class, 'addClass']);
    });
});
