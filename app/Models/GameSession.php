<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
    use HasFactory;

    public function educationalGame()
    {
        return $this->belongsTo(EducationalGame::class);
    }

    public function gameScores()
    {
        return $this->hasOne(GameScore::class);
    }
}
