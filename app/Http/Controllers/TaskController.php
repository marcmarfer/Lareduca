<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\EducationalGame;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index() {
        $userCourses = auth()->user()->courses;
        $educationalGames = EducationalGame::all();

        return Inertia::render('Tasks', [
            'userCourses' => $userCourses,
            'educationalGames' => $educationalGames,
        ]);
    }
}
