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

class StatsController extends Controller
{
    /**
     * Get the user's stats from the database and display it
     */
    public function index(Request $request): View
    {
        $user = $request->user(); // Get the authenticated user
        //$userStats = $user->userStats; // get the stats associated to the authenticated user
        
        // Push-Up Stats
        $puHighScore = StatsDashboard::where('fk_user_id', $user->id)
                                      ->where('exercise', 'Push-Up')
                                      ->max('score');
        $puExerCount = StatsDashboard::where('fk_user_id', $user->id)
                                       ->where('exercise', 'Push-Up')
                                       ->count();
        $puLastPerf = StatsDashboard::where('fk_user_id', $user->id)
                                       ->where('exercise', 'Push-Up')
                                       ->orderBy('date_performed', 'desc')
                                       ->first();
        $puLastDate = $puLastPerf ? $puLastPerf->date_performed : 'N/A';

        // Squat Stats
        $sqHighScore = StatsDashboard::where('fk_user_id', $user->id)
                                      ->where('exercise', 'Squat')
                                      ->max('score');
        $sqExerCount = StatsDashboard::where('fk_user_id', $user->id)
                                       ->where('exercise', 'Squat')
                                       ->count();
        $sqLastPerf = StatsDashboard::where('fk_user_id', $user->id)
                                       ->where('exercise', 'Squat')
                                       ->orderBy('date_performed', 'desc')
                                       ->first();
        $sqLastDate = $sqLastPerf ? $sqLastPerf->date_performed : 'N/A';

        // Plank Stats
        $plHighScore = StatsDashboard::where('fk_user_id', $user->id)
                                      ->where('exercise', 'Plank')
                                      ->max('score');
        $plExerCount = StatsDashboard::where('fk_user_id', $user->id)
                                       ->where('exercise', 'Plank')
                                       ->count();
        $plLastPerf = StatsDashboard::where('fk_user_id', $user->id)
                                       ->where('exercise', 'Plank')
                                       ->orderBy('date_performed', 'desc')
                                       ->first();
        $plLastDate = $plLastPerf ? $plLastPerf->date_performed : 'N/A';

        // Pass the items to the view
        return view('dashboard', [
            'puHighScore' => $puHighScore,
            'puExerCount' => $puExerCount,
            'puLastDate' => $puLastDate,
            'sqHighScore' => $sqHighScore,
            'sqExerCount' => $sqExerCount,
            'sqLastDate' => $sqLastDate,
            'plHighScore' => $plHighScore,
            'plExerCount' => $plExerCount,
            'plLastDate' => $plLastDate,
        ]);
    }
}
