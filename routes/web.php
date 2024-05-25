<?php

use App\Http\Controllers\CourseController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/home', function () {
            return Inertia::render('Home');
        })->name('home');

        Route::get('/user-management', [UserController::class, 'index'])->name('user-management');

        Route::get('/statistics', function () {
            return Inertia::render('Statistics');
        })->name('statistics');

        Route::get('/courses', [CourseController::class, 'index'])->name('courses');

        Route::get('/tasks', [CourseController::class, 'tasks'])->name('tasks');

        Route::get('/grades', function () {
            return Inertia::render('Grades');
        })->name('grades');

        Route::get('/contacts', function () {
            return Inertia::render('Contacts');
        })->name('contacts');
    });
});

