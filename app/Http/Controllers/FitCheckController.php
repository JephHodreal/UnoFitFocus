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
    public function index(Request $request)
    {
        // Retrieve data from the request
        $workout = $request->input('workout');
        $difficulty = $request->input('difficulty');
        $task = $request->input('task');

        // Pass the workout, difficulty, and task data to the FitCheck view
        return view('Fitcheck', compact('workout', 'difficulty', 'task'));
    }
}
