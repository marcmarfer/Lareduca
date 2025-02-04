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

    public function enrollUser(Request $request)
    {
        $courseId = $request->input('courseId');

        auth()->user()->courses()->attach($courseId);

        return response()->json(['message' => 'Usuario inscrito correctamente en el curso']);
    }

    public function unenrollUser(Request $request)
    {
        $courseId = $request->input('courseId');

        auth()->user()->courses()->detach($courseId);

        return response()->json(['message' => 'Usuario desinscrito correctamente del curso']);
    }
}
