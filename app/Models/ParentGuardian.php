<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentGuardian extends Model
{
    use HasFactory;
    public function parentStudents()
    {
        return $this->hasMany(ParentStudent::class);
    }
}
