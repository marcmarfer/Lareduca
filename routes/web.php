<?php

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
        })->name('dashboard.home');

        Route::get('/user-management', function () {
            return Inertia::render('UserManagement');
        })->name('dashboard.user-management');

        Route::get('/statistics', function () {
            return Inertia::render('Statistics');
        })->name('dashboard.statistics');

        Route::get('/courses', function () {
            return Inertia::render('Courses');
        })->name('dashboard.courses');

        Route::get('/tasks', function () {
            return Inertia::render('Tasks');
        })->name('dashboard.tasks');

        Route::get('/grades', function () {
            return Inertia::render('Grades');
        })->name('dashboard.grades');

        Route::get('/contacts', function () {
            return Inertia::render('Contacts');
        })->name('dashboard.contacts');
    });
});

