<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\StatsDashboard;
use App\Models\User;
use App\Models\PARQInfo;
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
            ->select('exercise', 'difficulty', DB::raw('SUM(CASE WHEN score = 100 THEN 1 ELSE 0 END) as perfect_score_count'))
            ->groupBy('exercise', 'difficulty')
            ->get()
            ->groupBy('exercise');

        $hasParqAnswers = DB::table('parq_answers')->where('fk_userparq_id', $user->id)->exists();

        return view('Workout', compact('scores', 'hasParqAnswers'));
    }   
}