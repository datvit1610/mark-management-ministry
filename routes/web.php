<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DoshboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MarkController;
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
    //doshboard
    Route::resource('doshboard', DoshboardController::class);
    //Điểm
    // Route::resource('mark', MarkController::class);
    Route::name('mark.')->group(function () {
        Route::get('/index', [MarkController::class, 'index'])->name('index');
        Route::get('mark/create', [MarkController::class, 'create'])->name('create');
        Route::post('mark/store', [MarkController::class, 'store'])->name('store');

        Route::get('mark/{idStudent}/{idSubject}', [MarkController::class, 'editMark'])->name('edit');
        Route::post('mark/{idStudent}/{idSubject}', [MarkController::class, 'updateMark'])->name('update');

        Route::get('mark/add-by-excel', [MarkController::class, 'addByExcel'])->name('add-by-excel');
        Route::post('mark/add-by-excel-process', [MarkController::class, 'import'])->name('add-by-excel-process');

        Route::get('/statisSubject', [MarkController::class, 'statisSubject'])->name('statisSubject');
        Route::get('/statisGrade', [MarkController::class, 'statisGrade'])->name('statisGrade');
        Route::get('/statisMark', [MarkController::class, 'statisMark'])->name('statisMark');
    });

    // Route::get('mark/edit ', [MarkController::class, 'edit']);
    // Route::post('mark', [MarkController::class, 'update']);
    //Sinh viên
    Route::resource('student', StudentController::class);
    Route::name('student.')->group(function () {
        Route::get('/add-by-excel', [StudentController::class, 'addByExcel'])->name('add-by-excel');
        Route::post('/add-by-excel-process', [StudentController::class, 'import'])->name('add-by-excel-process');
    });

    // Route::get('doshboard/index', [DoshboardController::class, 'doshboard'])->name('index');

});
//

//
