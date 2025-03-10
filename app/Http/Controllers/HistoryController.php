<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\StatsDashboard;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        // Get the filter values from the request
        $exerciseFilter = $request->input('exercise', 'all'); // 'all' is the default value
        $difficultyFilter = $request->input('difficulty', 'all'); // 'all' is the default value

        $query = StatsDashboard::where('fk_user_id', Auth::id());

        // Apply exercise filter if it is not 'all'
        if ($exerciseFilter !== 'all') {
            $query->where('exercise', $exerciseFilter);
        }

        // Apply difficulty filter if it is not 'all'
        if ($difficultyFilter !== 'all') {
            $query->where('difficulty', $difficultyFilter);
        }

        // Paginate the filtered results (25 per page)
        $workouts = $query->orderBy('created_at', 'desc')->paginate(25);

        // Pass the data to the view along with the current filters
        return view('WorkoutHistory', compact('workouts', 'exerciseFilter', 'difficultyFilter'));
    }
}
