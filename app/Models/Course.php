<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_enrollments');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public static function getAllCourses()
    {
        return self::all();
    }
}