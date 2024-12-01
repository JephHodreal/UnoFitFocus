<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\StatsDashboard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WorkoutController extends Controller
{
    public function showWorkout()
    {
        $user = Auth::user();

        $scores = StatsDashboard::where('fk_user_id', $user->id)
            ->select('exercise', 'difficulty', DB::raw('MAX(score) as max_score'))
            ->groupBy('exercise', 'difficulty')
            ->get()
            ->groupBy('exercise');

        return view('Workout', compact('scores'));
    }   
}