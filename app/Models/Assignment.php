<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'course_id',
        'total_points',
        'status',
        'assigned_by',
        'file_attachment',
        'assignment_type',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }
}