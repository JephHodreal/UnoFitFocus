<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\StatsDashboard;
use Carbon\Carbon;

class StatsController extends Controller
{
    /**
     * Get the user's stats from the database and display it
     */
    // public function index(Request $request): View
    // {
    //     $user = $request->user(); // Get the authenticated user
    //     //$userStats = $user->userStats; // get the stats associated to the authenticated user
        
    //     // Push-Up Stats
    //     $puHighScore = StatsDashboard::where('fk_user_id', $user->id)
    //                                   ->where('exercise', 'Push-Up')
    //                                   ->max('score');
    //     $puExerCount = StatsDashboard::where('fk_user_id', $user->id)
    //                                    ->where('exercise', 'Push-Up')
    //                                    ->count();
    //     $puLastPerf = StatsDashboard::where('fk_user_id', $user->id)
    //                                    ->where('exercise', 'Push-Up')
    //                                    ->orderBy('date_performed', 'desc')
    //                                    ->first();
    //     $puLastDate = $puLastPerf ? $puLastPerf->date_performed : 'N/A';

    //     // Squat Stats
    //     $sqHighScore = StatsDashboard::where('fk_user_id', $user->id)
    //                                   ->where('exercise', 'Squat')
    //                                   ->max('score');
    //     $sqExerCount = StatsDashboard::where('fk_user_id', $user->id)
    //                                    ->where('exercise', 'Squat')
    //                                    ->count();
    //     $sqLastPerf = StatsDashboard::where('fk_user_id', $user->id)
    //                                    ->where('exercise', 'Squat')
    //                                    ->orderBy('date_performed', 'desc')
    //                                    ->first();
    //     $sqLastDate = $sqLastPerf ? $sqLastPerf->date_performed : 'N/A';

    //     // Plank Stats
    //     $plHighScore = StatsDashboard::where('fk_user_id', $user->id)
    //                                   ->where('exercise', 'Plank')
    //                                   ->max('score');
    //     $plExerCount = StatsDashboard::where('fk_user_id', $user->id)
    //                                    ->where('exercise', 'Plank')
    //                                    ->count();
    //     $plLastPerf = StatsDashboard::where('fk_user_id', $user->id)
    //                                    ->where('exercise', 'Plank')
    //                                    ->orderBy('date_performed', 'desc')
    //                                    ->first();
    //     $plLastDate = $plLastPerf ? $plLastPerf->date_performed : 'N/A';

    //     // Pass the items to the view
    //     return view('dashboard', [
    //         'puHighScore' => $puHighScore,
    //         'puExerCount' => $puExerCount,
    //         'puLastDate' => $puLastDate,
    //         'sqHighScore' => $sqHighScore,
    //         'sqExerCount' => $sqExerCount,
    //         'sqLastDate' => $sqLastDate,
    //         'plHighScore' => $plHighScore,
    //         'plExerCount' => $plExerCount,
    //         'plLastDate' => $plLastDate,
    //     ]);
    // }

    public function index(Request $request)
    {
        $user = $request->user();

        // Fetch stats for each difficulty level for Push-Up, Squat, and Plank
        $exercises = ['Push-Up', 'Squat', 'Plank'];
        $difficulties = ['Beginner', 'Intermediate', 'Advanced'];

        $stats = [];
        foreach ($exercises as $exercise) {
            foreach ($difficulties as $difficulty) {
                $highScore = StatsDashboard::where('fk_user_id', $user->id)
                                    ->where('exercise', $exercise)
                                    ->where('difficulty', $difficulty)
                                    ->max('score') ?? 'N/A';

                $lastAttempt = StatsDashboard::where('fk_user_id', $user->id)
                                    ->where('exercise', $exercise)
                                    ->where('difficulty', $difficulty)
                                    ->latest()
                                    ->first();

                $status = $this->getStatus($lastAttempt);
                
                $stats[$exercise][$difficulty] = [
                    'highScore' => $highScore,
                    'numTries' => StatsDashboard::where('fk_user_id', $user->id)
                                    ->where('exercise', $exercise)
                                    ->where('difficulty', $difficulty)
                                    ->count(),
                    'lastAttempt' => $lastAttempt ? $lastAttempt->created_at->format('Y-m-d') : 'N/A',
                    'status' => $status
                ];
            }
        }

        // Improvement data for graphs
        $pushUpGraph = $this->getImprovementData($user->id, 'Push-Up');
        $squatGraph = $this->getImprovementData($user->id, 'Squat');
        $plankGraph = $this->getImprovementData($user->id, 'Plank');

        return view('dashboard', compact('stats', 'pushUpGraph', 'squatGraph', 'plankGraph'));
    }

    private function getStatus($lastAttempt)
    {
        if (!$lastAttempt) {
            return 'Not Started';
        }

        $now = Carbon::now();
        $lastAttemptDate = Carbon::parse($lastAttempt->created_at);
        $daysSinceLastAttempt = $now->diffInDays($lastAttemptDate);

        if ($daysSinceLastAttempt <= 7) {
            return 'Completed';
        } elseif ($daysSinceLastAttempt <= 30) {
            return 'In Progress';
        } else {
            return 'Overdue';
        }
    }

    private function getImprovementData($userId, $exercise)
    {
        $data = StatsDashboard::where('fk_user_id', $userId)
                    ->where('exercise', $exercise)
                    ->orderBy('created_at', 'asc')
                    ->get(['score', 'created_at']);

        $dates = $data->pluck('created_at')->map(function ($date) {
            return $date->format('m/d/y');
        });

        $scores = $data->pluck('score');

        return [
            'dates' => $dates,
            'scores' => $scores
        ];
    }
}
