<?php

use Illuminate\Foundation\Console\RouteListCommand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\CourseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

//lab1
Route::get(
    '/users',
    function () {
        $users = [
            ["id" => 1, "name" => "ammar", "age" => "99", "email" => "Ammar@gmail.com"],
            ["id" => 2, "name" => "mero", "age" => "22", "email" => "Mero@gmail.com"],
            ["id" => 3, "name" => "ahmed", "age" => "111", "email" => "Ahmed@gmail.com"],
        ];
        return view("usersData", ["users" => $users]);
    }
)->name('users.view');
Route::get(
    '/users/{id}',
    function ($id) {
        $users = [
            ["id" => 1, "name" => "ammar", "age" => "99", "email" => "Ammar@gmail.com"],
            ["id" => 2, "name" => "mero", "age" => "22", "email" => "Mero@gmail.com"],
            ["id" => 3, "name" => "ahmed", "age" => "111", "email" => "Ahmed@gmail.com"],
        ];
        return view("userData", ["user" => $users[$id - 1]]);
    }
)->name('user.view');

//lab 3
//student routes
Route::get('/students/create', [StudentController::class, 'createStudent'])->name('students.create');
Route::post('/students/store', [StudentController::class, 'storeStudent'])->name('students.store');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{id}', [StudentController::class, 'viewStudent'])->name('students.view');
Route::delete('/students/{id}', [StudentController::class, 'deleteStudent'])->name('students.destroy');
Route::get('/students/{id}/edit', [StudentController::class, 'editStudent'])->name('students.edit');
Route::put('/students/{id}/update', [StudentController::class, 'updateStudent'])->name('students.update');
Route::post('/generate-students', [StudentController::class, 'generate'])->name('students.generate');
//track routes
Route::get('/tracks/create', [TrackController::class, 'createTrack'])->name('tracks.create');
Route::post('/tracks/store', [TrackController::class, 'storeTrack'])->name('tracks.store');
Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/tracks/{id}', [TrackController::class, 'viewTrack'])->name('tracks.view');
Route::delete('/tracks/{id}', [TrackController::class, 'deleteTrack'])->name('tracks.destroy');
Route::get('/tracks/{id}/edit', [TrackController::class, 'editTrack'])->name('tracks.edit');
Route::put('/tracks/{id}/update', [TrackController::class, 'updateTrack'])->name('tracks.update');
Route::post('/generate-tracks', [TrackController::class, 'generate'])->name('tracks.generate');


//lab4
/** Route resource */
Route::resource('courses', CourseController::class);
// routes/web.php
Route::post('/generate-courses', [CourseController::class, 'generate'])->name('courses.generate');

/*
// method         // url            // route name
 GET|HEAD        tracks ........... tracks.index ›
 function in controller
 TrackController@index
  POST            tracks ........... tracks.store › TrackController@store
  GET|HEAD        tracks/create .. tracks.create › TrackController@create
  GET|HEAD        tracks/{track} ..... tracks.show › TrackController@show
  PUT|PATCH       tracks/{track} . tracks.update › TrackController@update
  DELETE          tracks/{track} tracks.destroy › TrackController@destroy
  GET|HEAD        tracks/{track}/edit tracks.edit › TrackController@edit
  GET|HEAD

*/
