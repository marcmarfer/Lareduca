<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Assignment;
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

    public function showCourseDetails($id) {
        $user = auth()->user();
        $course = Course::findOrFail($id);
        $assignments = $course->assignments()->where('assigned_by', $user->id)->get();
    
        return Inertia::render('CourseDetails', [
            'course' => $course,
            'assignments' => $assignments,
        ]);
    }


    public function showGameDetails($id) {
        $educationalGame = EducationalGame::findOrFail($id);

        return Inertia::render('GameDetails', [
            'educationalGame' => $educationalGame,
        ]);
    }
    
    public function showAddAssignment() {
        $courses = Course::all();
        
        return Inertia::render('AddAssignment', [
            'courses' => $courses,
        ]);
    }

    public function deleteAssignment($id) {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();
    
        return response()->json(['message' => 'Assignment deleted successfully']);
    }

    public function addAssignment(Request $request) {
        $courseId = $request->input('courseId');
        $title = $request->input('title');
        $description = $request->input('description');
        $dueDate = $request->input('dueDate');
        $totalPoints = $request->input('totalPoints');
        $status = $request->input('status');
        $assignedBy = $request->input('assignedBy');
        $fileAttachment = $request->input('fileAttachment');
        $assignmentType = $request->input('assignmentType');
    
        Assignment::create([
            'title' => $title,
            'description' => $description,
            'due_date' => $dueDate,
            'course_id' => $courseId,
            'total_points' => $totalPoints,
            'status' => $status,
            'assigned_by' => $assignedBy,
            'file_attachment' => $fileAttachment,
            'assignment_type' => $assignmentType,
        ]);
    
        return response()->json(['message' => 'Assignment added successfully']);
    }
}
