<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::resource('subjects', App\Http\Controllers\SubjectController::class);
    Route::resource('enrollments', App\Http\Controllers\EnrollmentController::class);
});
