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

class FitCheckController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve data from the request
        $workout = $request->input('workout');
        $difficulty = $request->input('difficulty');
        $task = $request->input('task');

        // Pass the workout, difficulty, and task data to the FitCheck view
        return view('FitCheck', compact('workout', 'difficulty', 'task'));
    }

    // public function showFitCheck(Request $request)
    // {
    //     $workout = $request->query('workout');
    //     $difficulty = $request->query('difficulty');
    //     $task = $request->query('task');

    //     return view('FitCheck', compact('workout', 'difficulty', 'task'));
    // }

    public function saveWorkoutSession(Request $request)
    {
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
