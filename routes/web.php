<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MinistryCotroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\CheckLogged;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;

Route::middleware([CheckLogged::class])->group(function () {
    // Authenticate
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/login-process', [AuthenticateController::class, 'loginProcess'])->name('login-process');
});

Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');

Route::middleware([CheckLogin::class])->group(function () {
    Route::get("/", function () {
        return view('login');
    });
    Route::resource('ministry', MinistryCotroller::class);
    //ngành
    Route::resource('major', MajorController::class);
    //Khóa
    Route::resource('course', CourseController::class);
    //Môn học
    Route::resource('subject', SubjectController::class);
    //Lớp
    Route::resource('grade', GradeController::class);
    //profile
    Route::resource('profile', ProfileController::class);
    //Sinh viên
    Route::resource('student', StudentController::class);
    Route::name('student.')->group(function () {
        Route::get('/add-by-excel', [StudentController::class, 'addByExcel'])->name('add-by-excel');
        Route::post('/add-by-excel-process', [StudentController::class, 'import'])->name('add-by-excel-process');
    });
});
//
Route::get('/mark', [Mark::class, 'mark'])->name('mark');
//
