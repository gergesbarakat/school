<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolProfileEdit;
use Illuminate\Support\Facades\Route;
use App\Models\School;
use \App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SchoolClasssontroller;
use App\Http\Controllers\SchoolController;


Route::middleware('auth:web')->group(function () {
    Route::get('/dashbaord', function () {
        return view('dashboard', [
            'schools' => School::all(),
        ]);
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('schools', SchoolController::class);
    Route::resource('classrooms', ClassroomController::class);

});

Route::prefix('school')->name('school.')->group(function () {






    Route::middleware('auth:school')->group(function () {


        Route::get('dashboard', function () {
            return view('school-dashboard', ['schools' => School::all()]);
        })->name('school-dashboard');

        Route::get('/', function () {
            return view('school-dashboard', ['schools' => School::all()]);
        })->name('school-dashboard');


        Route::get('/profile', [SchoolProfileEdit::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [SchoolProfileEdit::class, 'update'])->name('profile.update');
        Route::delete('/profile', [SchoolProfileEdit::class, 'destroy'])->name('profile.destroy');
    });
});

Route::middleware('multiauth')->group(function () {
    Route::get('/', function () {
        if(Auth::guard('school')->check()){
            return view('school-dashboard', [
                'schools' => School::all(),
            ]);
        }else{
            return view('dashboard', [
                'schools' => School::all(),
            ]);
        }

    })->name('dashboard');

    Route::resource('subjects', SubjectController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('grades', GradeController::class);
     Route::resource('school-classes', SchoolClasssontroller::class);

    Route::resource('schedules', ScheduleController::class);


     Route::get('/get-schedule', [ScheduleController::class, 'getSchedule']);
    Route::get('/schedules/fetch', [ScheduleController::class, 'fetch'])->name('schedules.fetch');
    Route::get('/classes/{gradeId}', [ScheduleController::class, 'getClassesByGrade'])->name('getClassesByGrade');

    Route::get('/get-schedule', [ScheduleController::class, 'getSchedule']);
    Route::get('/schedules/fetch', [ScheduleController::class, 'fetch'])->name('schedules.fetch');


});






require __DIR__ . '/auth.php';