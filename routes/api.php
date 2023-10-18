<?php

use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\CourseRegistrationController;
use App\Http\Controllers\API\StudentAssistanceController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('teachers', TeacherController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('course-registrations', CourseRegistrationController::class);

Route::controller(StudentAssistanceController::class)->group(function(){
    Route::get("/student-assistances/filter", "getAssitenceWithFilters");
    Route::get("/student-assistances", "index");
    Route::post("/student-assistances", "store");
    Route::delete("/student-assistances/{id}", "destroy");
});
