<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $courses = [
            ['name' => 'Curso de Laravel', 'description' => 'Aprende Laravel desde cero'],
            ['name' => 'Curso de Vue.js', 'description' => 'Introducción a Vue.js'],
            ['name' => 'Curso de React', 'description' => 'Aprende React avanzado']
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
