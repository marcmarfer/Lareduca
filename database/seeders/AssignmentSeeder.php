<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;
use App\Models\Assignment;
use Carbon\Carbon;


class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id');

        // Create sample assignments for each user in the first course
        foreach ($userIds as $userId) {
            Assignment::create([
                'title' => 'Sample Assignment 1',
                'description' => 'This is a sample assignment description.',
                'due_date' => Carbon::now()->addDays(7),
                'course_id' => 1,
                'total_points' => 10,
                'status' => 'pending',
                'assigned_by' => $userId,
                'file_attachment' => 'assignment_file1.pdf',
                'assignment_type' => 'homework',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
            Assignment::create([
                'title' => 'Sample Assignment 2',
                'description' => 'This is another sample assignment description.',
                'due_date' => Carbon::now()->addDays(10),
                'course_id' => 1,
                'total_points' => 8,
                'status' => 'completed',
                'assigned_by' => $userId,
                'file_attachment' => 'assignment_file2.pdf',
                'assignment_type' => 'quiz',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
            Assignment::create([
                'title' => 'Sample Assignment 3',
                'description' => 'This is yet another sample assignment description.',
                'due_date' => Carbon::now()->addDays(14),
                'course_id' => 1,
                'total_points' => 9,
                'status' => 'graded',
                'assigned_by' => $userId,
                'file_attachment' => 'assignment_file3.pdf',
                'assignment_type' => 'project',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
