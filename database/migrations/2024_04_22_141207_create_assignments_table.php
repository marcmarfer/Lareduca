<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->decimal('total_points', 4, 2)->nullable();
            $table->enum('status', ['pending', 'completed', 'graded'])->default('pending');
            $table->foreignId('assigned_by')->constrained('users')->onDelete('cascade');
            $table->string('file_attachment')->nullable();
            $table->enum('assignment_type', ['homework', 'project', 'quiz', 'exam']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
