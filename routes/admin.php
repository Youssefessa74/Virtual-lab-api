<?php

use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>'role:admin'],function(){
});

// Routes For Questions
Route::get('/dashboard',[HomeController::class,'index'])->name('admin.home');
Route::get('/questions',[HomeController::class,'all_questions'])->name('questions.index');
Route::get('/questions/create',[HomeController::class,'question_create'])->name('question.create');
Route::post('/questions/store',[HomeController::class,'store'])->name('question.store');
Route::delete('/questions/delete/{id}',[HomeController::class,'destroyQuestion'])->name('question.delete');
Route::get('/questions/edit/{id}',[HomeController::class,'question_edit'])->name('question.edit');
Route::post('/questions/update/{id}',[HomeController::class,'update'])->name('question.update');

//Routes For Grades
Route::get('/subject',[HomeController::class,'all_subject'])->name('all.subject');
Route::get('/subject/create',[HomeController::class,'subject_create'])->name('subject.create');
Route::post('/subject/store',[HomeController::class,'subject_store'])->name('subject.store');
Route::get('/subject/edit/{id}',[HomeController::class,'subject_edit'])->name('subject.edit');
Route::post('/subject/update/{id}',[HomeController::class,'subject_update'])->name('subject.update');
Route::get('/subject/delete/{id}',[HomeController::class,'subject_destroy'])->name('subject.delete');


//Routes For Elements
Route::get('/element',[ElementController::class,'all_elements'])->name('all.element');
Route::get('/element-edit/{id}',[ElementController::class,'edit'])->name('element.edit');
Route::get('/element-delete/{id}',[ElementController::class,'destroy'])->name('element.delete');
Route::post('/element-update/{id}',[ElementController::class,'update'])->name('element.update');

