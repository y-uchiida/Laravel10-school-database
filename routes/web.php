<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\HomeroomController;

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

Route::get('/', function (){ return (redirect('/student')); });

/* students に関するルーティング */
Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/student/add', [StudentController::class, 'add']);
Route::post('/student/add', [StudentController::class, 'create']);
Route::post('/student/{id}', [StudentController::class, 'update']);
Route::delete('/student/{id}', [StudentController::class, 'delete']);
Route::get('/student/{id}', [StudentController::class, 'edit']);

/* teachers に関するルーティング */
Route::get('/teacher', [TeacherController::class, 'index'])->name('teachers');
Route::get('/teacher/add',[TeacherController::class, 'add']);
Route::post('/teacher/add',[TeacherController::class, 'create']);
Route::get('/teacher/{id}' ,[TeacherController::class, 'edit']);
Route::post('/teacher/{id}' ,[TeacherController::class, 'update']);
Route::delete('/teacher/{id}' ,[TeacherController::class, 'delete']);

/* subjects に関するルーティング */
Route::get('/subject', [SubjectController::class, 'index'])->name('subjects');
Route::get('/subject/add' ,[SubjectController::class, 'add']);
Route::post('/subject/add' ,[SubjectController::class, 'create']);
Route::get('/subject/{id}' ,[SubjectController::class, 'edit']);
Route::post('/subject/{id}' ,[SubjectController::class, 'update']);
Route::delete('/subject/{id}' ,[SubjectController::class, 'delete']);

/* homeromes に関するルーティング */
Route::get('/homeroom', [HomeroomController::class, 'index'])->name('homerooms');
Route::get('/homeroom/add' ,[HomeroomController::class, 'add']);
Route::post('/homeroom/add' ,[HomeroomController::class, 'create']);
Route::get('/homeroom/{id}' ,[HomeroomController::class, 'edit']);
Route::post('/homeroom/{id}' ,[HomeroomController::class, 'update']);
Route::delete('/homeroom/{id}' ,[HomeroomController::class, 'delete']);