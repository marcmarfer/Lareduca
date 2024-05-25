<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        $availableCourses = Course::whereNotIn('id', auth()->user()->courses->pluck('id'))->get();
        $userCourses = auth()->user()->courses;

        return Inertia::render('Courses', [
            'availableCourses' => $availableCourses,
            'userCourses' => $userCourses,
        ]);
    }

    public function tasks() {
        $userCourses = auth()->user()->courses;

        return Inertia::render('Tasks', [
            'userCourses' => $userCourses,
        ]);
    }

    public function enrollUser(Request $request)
    {
        $courseId = $request->input('courseId');

        auth()->user()->courses()->attach($courseId);

        return response()->json(['message' => 'Usuario inscrito correctamente en el curso']);
    }
}
