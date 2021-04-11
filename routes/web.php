<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
Route::get('/student/show/{student}', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
Route::get('/student/edit/{student}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/update/{student}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
Route::delete('/student/delete/{student}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.delete');
