<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ArrayController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ClassController;
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

//Student
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/show/{student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/update/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/delete/{student}', [StudentController::class, 'destroy'])->name('student.delete');
//StudentFaculty&CourseDropdown
Route::get('/getcourse', [StudentController::class, 'createFaculty'])->name('student.course');
//AddFaculty
Route::get('/student/createfaculty', [StudentController::class, 'addFaculty'])->name('store.faculty');
Route::post('/student/addfaculty', [StudentController::class, 'storeFaculty'])->name('add.faculty');
//AddCourse
Route::get('/student/createcoures', [StudentController::class, 'addCourse'])->name('store.course');
Route::post('/student/addcourse', [StudentController::class, 'storeCourse'])->name('add.course');

//Array
Route::get('/array', [ArrayController::class, 'index'])->name('array');

//Blog
Route::get('/blog', [ShowController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [ShowController::class, 'create'])->name('blog.create');
Route::post('/blog/store', [ShowController::class, 'store'])->name('blog.store');
Route::get('/blog/view/{blog}', [ShowController::class, 'show'])->name('blog.show');
Route::get('/blog/edit/{blog}', [ShowController::class, 'edit'])->name('blog.edit');
Route::put('/blog/update/{blog}', [ShowController::class, 'update'])->name('blog.update');
Route::delete('/blog/delete/{blog}', [ShowController::class, 'destroy'])->name('blog.delete');

//Testing Dropdown
Route::get('/prodview',[TestController::class, 'prodfunct'])->name('prod.view');
Route::get('/findProductName',[TestController::class,'findProductName'])->name('prod.name');
Route::get('/findPrice',[TestController::class,'findPrice'])->name('prod.price');

//Student has class
Route::get('/classes', [ClassController::class, 'index'])->name('class.index');
Route::get('/classes/create', [ClassController::class, 'createClass'])->name('class.create');
Route::post('/classes/store', [Classcontroller::class, 'storeClass'])->name('class.store');
Route::get('/classes/assign/student', [ClassController::class, 'create'])->name('class.assign');
Route::get('/classes/assign/student-class/{student}', [ClassController::class, 'assignClass'])->name('class.student.class');
Route::get('/classes/student/list', [ClassController::class, 'studentList'])->name('class.student.list');
