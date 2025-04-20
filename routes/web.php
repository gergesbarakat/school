<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\School;
use \App\Http\Controllers\SchoolController;
use \App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\GradeController;
 use App\Http\Controllers\ClassroomController;
 use App\Http\Controllers\Auth\SchoolLoginController;



Route::get('/dashboard', function () {
    return view('dashboard', [
        'schools' => School::all(),
    ]);})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', function () {
    return view('dashboard', [
        'schools' => School::all(),
    ]);})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('schools',SchoolController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('teachers', TeacherController::class);
     Route::resource('grades', GradeController::class);
    Route::resource('classrooms', ClassroomController::class);

    Route::resource('schedules', ScheduleController::class);

    Route::get('/gradess', [ScheduleController::class, 'getGrades']);
    Route::get('/classroomss', [ScheduleController::class, 'getClassrooms']);

    Route::get('/get-schedule', [ScheduleController::class, 'getSchedule']);
    Route::get('/schedules/fetch', [ScheduleController::class, 'fetch'])->name('schedules.fetch');

});

Route::prefix('school')->group(function () {
    Route::get('/login', [SchoolLoginController::class, 'showLoginForm'])->name('school.login');
    Route::post('/login', [SchoolLoginController::class, 'login'])->name('school.login.submit');
    Route::post('/logout', [SchoolLoginController::class, 'logout'])->name('school.logout');

    Route::middleware('auth:school')->group(function () {
        Route::get('/dashboard', function () {
            return view('school.dashboard');
        })->name('school.dashboard');
    });
});
require __DIR__.'/auth.php';
