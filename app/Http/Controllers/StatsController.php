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
use App\Models\UserDetails;
use App\Models\StatsDashboard;
use Carbon\Carbon;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Check if the profile is complete
        $profileIncomplete = UserDetails::where('user_id', $user->id)
        ->where(function ($query) {
            $query->whereNull('height')
                  ->orWhereNull('weight')
                  ->orWhereNull('birthdate')
                  ->orWhereNull('gender');
        })
        ->exists();

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

        // Pass profile completion status to the view
        return view('dashboard', [
            'profileIncomplete' => $profileIncomplete,
            'stats' => $stats,
            'pushUpGraph' => $pushUpGraph,
            'squatGraph' => $squatGraph,
            'plankGraph' => $plankGraph,
        ]);
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

