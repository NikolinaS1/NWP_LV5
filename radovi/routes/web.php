<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teacher', function () {
    return view('teacher');
})->name('teacher');

Route::get('/addPaper', function() {
    return view('addPaper');
});

Route::put('/addPaper', [TeacherController::class, 'addPaper'])->name('addPaper');
Route::get('/teacher', [TeacherController::class, 'show'])->name('teacher');

Route::get('/student', function () {
    return view('student');
})->name('student'); 

Route::get('/student', [StudentController::class, 'show'])->name('student');

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/admin', [AdminController::class, 'show'])->name('admin');

Route::post('/assignTask', [StudentController::class, 'assignTask'])->name('assignTask');

Route::get('/editUserRole/{id}', [AdminController::class, 'edit'])->name('editUserRole');
Route::put('/editUserRole/{id}', [AdminController::class, 'update'])->name('updateUserRole');

Route::get('/editTypeOfStudy/{id}', [AdminController::class, 'edit_study_type'])->name('editTypeOfStudy');
Route::put('/editTypeOfStudy/{id}', [AdminController::class, 'update_study_type'])->name('updateTypeOfStudy');

Route::get('/prijave/{paper_id}', [TeacherController::class, 'showAppliedStudents'])->name('prijave');
Route::post('/prijave/{paper_id}', [TeacherController::class, 'assignStudent'])->name('assignStudent');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('locale/{lang}', [LanguageController::class, 'setLocale']);


