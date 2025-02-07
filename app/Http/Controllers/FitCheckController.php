<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\StatsDashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class FitCheckController extends Controller
{
    public function index(Request $request)
    {
        // // Retrieve data from the request
        // $workout = $request->input('workout');
        // $difficulty = $request->input('difficulty');
        // $task = $request->input('task');

        // // Pass the workout, difficulty, and task data to the FitCheck view
        // return view('FitCheck', compact('workout', 'difficulty', 'task'));

        // Validate the incoming request
        $validatedData = $request->validate([
            'workout' => 'required|string',
            'difficulty' => 'required|string'
        ]);

        // Get the authenticated user's profile
        $user = Auth::user();
        $userProfile = $user->profile;

        // Get the workout norm based on user's profile and selected workout
        $norm = WorkoutNorm::where([
            'gender' => $userProfile->gender,
            'exercise_type' => $validatedData['workout'],
            'difficulty_level' => $validatedData['difficulty'],
            'fitness_level' => $userProfile->fitness_level
        ])
        ->whereRaw("? BETWEEN SUBSTRING_INDEX(age_range, '-', 1) AND SUBSTRING_INDEX(age_range, '-', -1)", [$userProfile->age])
        ->whereRaw("? BETWEEN SUBSTRING_INDEX(weight_range, '-', 1) AND SUBSTRING_INDEX(weight_range, '-', -1)", [$userProfile->weight])
        ->first();

        if (!$norm) {
            return redirect()->back()->with('error', 'Workout norms not found');
        }

        // Create the task description
        $task = $norm->exercise_type === 'Plank' 
            ? "Hold the plank position for {$norm->duration} seconds"
            : "Complete {$norm->sets} sets of {$norm->reps} repetitions";

        // Pass all necessary data to the view
        return view('FitCheck', [
            'workout' => $validatedData['workout'],
            'difficulty' => $validatedData['difficulty'],
            'task' => $task,
            'sets' => $norm->sets,
            'reps' => $norm->reps,
            'duration' => $norm->duration
        ]);
    }

    public function saveWorkoutSession(Request $request)
    {
        Log::info('Request Method:', [$request->method()]);
        Log::info('Request Data:', $request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'exercise' => 'required|string|max:255',
            'difficulty' => 'required|string|max:255',
            'score' => 'required|integer|min:0|max:100', // Score must be an integer between 0 and 100
        ]);

        // Save data into the workout_sessions table
        StatsDashboard::create([
            'fk_user_id' => Auth::id(), // Get authenticated user's ID
            'exercise' => $validatedData['exercise'],
            'difficulty' => $validatedData['difficulty'],
            'score' => $validatedData['score'], // Score rounded up
            'date_performed' => Carbon::now()->toDateString(), // Current date
        ]);

        return response()->json(['message' => 'Workout session saved successfully!'], 200);
    }
}
