<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $userCourses = auth()->user()->courses;

        return Inertia::render('Dashboard', [
            'userCourses' => $userCourses,
        ]);
    }
}
