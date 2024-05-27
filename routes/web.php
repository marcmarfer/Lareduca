<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::patch('/api/update-user', [UserController::class, 'update'])->name('update-user');

Route::post('/api/enroll-user', [CourseController::class, 'enrollUser'])->name('enroll-user');

Route::post('/api/unenroll-user', [CourseController::class, 'unenrollUser'])->name('unenroll-user');

Route::delete('/api/delete-assignment/{id}', [TaskController::class, 'deleteAssignment'])->name('delete-assignment');

Route::post('/api/add-assignment', [TaskController::class, 'addAssignment'])->name('add-assignment');

Route::get('/api/user-logged-in', [UserController::class, 'getUserLoggedIn'])->name('user-logged-in');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::prefix('/dashboard')->group(function () {

        Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');

        Route::get('/statistics', function () {
            return Inertia::render('Statistics');
        })->name('statistics');

        Route::get('/courses', [CourseController::class, 'index'])->name('courses');

        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');

        Route::get('/courses/{id}', [TaskController::class, 'showCourseDetails'])->name('courses.show');
        Route::get('/games/{id}', [TaskController::class, 'showGameDetails'])->name('games.show');

        Route::get('/courses/{id}/add-assignment', [TaskController::class, 'showAddAssignment'])->name('add-assignment.show');

        Route::get('/grades', function () {
            return Inertia::render('Grades');
        })->name('grades');

        Route::get('/contacts', function () {
            return Inertia::render('Contacts');
        })->name('contacts');
    });
});

