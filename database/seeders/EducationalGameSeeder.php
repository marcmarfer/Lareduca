<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EducationalGame;

class EducationalGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'name' => 'Math Puzzle',
                'description' => 'A fun math puzzle game to improve arithmetic skills.',
                'subject' => 'Mathematics',
                'grade_level' => 'Elementary',
                'file_attachment' => 'math_puzzle.zip',
                'created_by' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Word Explorer',
                'description' => 'An interactive word game to enhance vocabulary.',
                'subject' => 'Language Arts',
                'grade_level' => 'Middle School',
                'file_attachment' => 'word_explorer.zip',
                'created_by' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Science Quest',
                'description' => 'A thrilling science adventure game to learn scientific concepts.',
                'subject' => 'Science',
                'grade_level' => 'High School',
                'file_attachment' => 'science_quest.zip',
                'created_by' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($games as $game) {
            EducationalGame::create($game);
        }
    }
}
