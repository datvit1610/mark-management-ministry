<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EditProfile;
use App\Http\Controllers\Grade;
use App\Http\Controllers\Mark;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MyProfile;
use App\Http\Controllers\Student;
use App\Http\Middleware\Authenticate;
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
    //ngành
    Route::resource('major', MajorController::class);
});
//Route::get('/', MajorController::class);

Route::get('/mark', [Mark::class, 'mark'])->name('mark');


//Khóa
Route::resource('course', CourseController::class);
//
Route::get('/grade/create', [Grade::class, 'create']);
Route::post('grade/store', [Grade::class, 'store']);
//
Route::get('/student', [Student::class, 'student']);
route::get('/myProfile', [MyProfile::class, 'myProfile']);
Route::get('/editProfile', [EditProfile::class, 'editProfile']);
