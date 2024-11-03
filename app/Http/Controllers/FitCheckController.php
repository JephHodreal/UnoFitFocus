<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FitCheckController extends Controller
{
    public function show(Request $request)
    {
        $workout = $request->input('workout');
        $difficulty = $request->input('difficulty');
    
        // Define tasks for each workout and difficulty level
        $tasks = [
            "Push-Up" => [
                "Beginner" => "Knees on floor push-up, 15 reps",
                "Intermediate" => "Standard push-up, 20 reps",
                "Advanced" => "Standard push-up, 30 reps"
            ],
            "Squat" => [
                "Beginner" => "Partial squat reaching 45 degrees from standing position, 15 reps",
                "Intermediate" => "Standard squat reaching 90 degrees from standing position, 20 reps",
                "Advanced" => "Standard squat reaching 90 degrees from standing position, 30 reps"
            ],
            "Plank" => [
                "Beginner" => "Hold plank position for 15 seconds",
                "Intermediate" => "Hold plank position for 30 seconds",
                "Advanced" => "Hold plank position for 60 seconds"
            ]
        ];

        // Get the specific task for the selected workout and difficulty
        $task = $tasks[$workout][$difficulty] ?? 'Task not found';

        // Pass the workout, difficulty, and task data to the view
        return view('FitCheck', compact('workout', 'difficulty', 'task'));
    }
}
