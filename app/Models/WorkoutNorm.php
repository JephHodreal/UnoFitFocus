<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutNorm extends Model
{
    protected $table = 'workout_norms';
    
    protected $fillable = [
        'gender', 'age_range', 'weight_range', 'fitness_level',
        'exercise_type', 'difficulty_level', 'sets', 'reps', 'duration'
    ];
}
