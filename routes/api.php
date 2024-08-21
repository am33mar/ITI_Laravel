<?php

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

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TrackController;
use App\Http\Controllers\Api\CourseController;
// API routes
//students
Route::apiResource('students', StudentController::class);
Route::post('students/generate', [StudentController::class, 'generate']); // For fake students generation
//tracks
Route::apiResource('tracks', TrackController::class);
Route::post('tracks/generate', [TrackController::class, 'generate']); // For fake tracks generation
//courses
Route::apiResource('courses', CourseController::class);
Route::post('courses/generate', [CourseController::class, 'generate']); // For fake courses generation
