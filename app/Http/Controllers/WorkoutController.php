<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\StatsDashboard;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\PARQInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class WorkoutController extends Controller
{
    public function showWorkout(Request $request)
    {
        $user = Auth::user();

        // Retrieve user details from UserDetails model
        $userDetails = DB::table('user_info')->where('user_id', $user->id)->first();

        if (!$userDetails) {
            abort(404, 'User details not found.');
        }

        // Get filters with safe defaults
        $selectedWorkout = $request->input('workout', 'Push-Up');
        $selectedDifficulty = $request->input('difficulty_level', 'Beginner');
        $selectedFitnessLevel = $request->input('fitness_level', $userDetails->fitness_level ?? 'Beginner');

        // Retrieve norms filtered by gender, fitness level, workout, and difficulty
        $norms = DB::table('workout_norms')
            ->where('gender', $userDetails->gender)
            ->where('fitness_level', $selectedFitnessLevel)
            ->where('exercise_type', $selectedWorkout)
            ->where('difficulty_level', $selectedDifficulty)
            ->get();

        // Define weight and age ranges
        $ages = range(18, 34);
        $weightRanges = $this->generateWeightRanges($userDetails->gender);
        $fitnessLevels = DB::table('workout_norms')->select('fitness_level')->distinct()->pluck('fitness_level');

        // Initialize the norm table and highlighted norms
        $normTable = [];
        $highlightedNorms = null;

        // Find the user's specific norm first
        $userNorm = $norms->first(function ($norm) use ($userDetails) {
            return $this->isAgeInRange($userDetails->age, $norm->age_range) &&
                   $this->isInWeightRange($userDetails->weight, $norm->weight_range);
        });

        if ($userNorm) {
            $highlightedNorms = [
                'age' => $userDetails->age,
                'weight' => $userDetails->weight,
                'norm' => $userNorm
            ];
        }

        // Build the norm table
        foreach ($ages as $age) {
            $normTable[$age] = [];
            
            foreach ($weightRanges as $weightRange) {
                // Find matching norm for this age and weight combination
                $matchingNorm = $norms->first(function ($norm) use ($age, $weightRange) {
                    // Convert ranges for comparison
                    $ageInRange = $this->isAgeInRange($age, $norm->age_range);
                    $weightInRange = $this->isWeightRangeOverlapping($weightRange, $norm->weight_range);
                    
                    return $ageInRange && $weightInRange;
                });

                if ($matchingNorm) {
                    if ($selectedWorkout === 'Plank') {
                        $normTable[$age][$weightRange] = "{$matchingNorm->duration} sec";
                    } else {
                        $totalReps = $matchingNorm->sets * $matchingNorm->reps;
                        $normTable[$age][$weightRange] = "{$totalReps} reps";
                    }
                } else {
                    $normTable[$age][$weightRange] = 'N/A';
                }
            }
        }

        // Retrieve scores from StatsDashboard
        $scores = StatsDashboard::where('fk_user_id', $user->id)
            ->select('exercise', 'difficulty', DB::raw('SUM(CASE WHEN score = 100 THEN 1 ELSE 0 END) as perfect_score_count'))
            ->groupBy('exercise', 'difficulty')
            ->get()
            ->groupBy('exercise');

        // Check if user has answered the PARQ form
        $hasParqAnswers = DB::table('parq_answers')->where('fk_userparq_id', $user->id)->exists();

        return view('workout', compact('normTable', 'ages', 'weightRanges', 'highlightedNorms', 'selectedWorkout', 'selectedDifficulty', 'selectedFitnessLevel', 'hasParqAnswers', 'fitnessLevels', 'scores', 'userDetails'));
    }

    private function isWeightRangeOverlapping($rangeA, $rangeB)
    {
        // Convert ranges to min-max format
        $rangeABounds = $this->parseWeightRange($rangeA);
        $rangeBBounds = $this->parseWeightRange($rangeB);

        // Check for overlap
        return !($rangeABounds['max'] < $rangeBBounds['min'] || $rangeABounds['min'] > $rangeBBounds['max']);
    }

    private function parseWeightRange($range)
    {
        if (str_starts_with($range, '<=')) {
            return ['min' => 0, 'max' => (float)substr($range, 2)];
        } elseif (str_starts_with($range, '>=')) {
            return ['min' => (float)substr($range, 2), 'max' => PHP_FLOAT_MAX];
        } elseif (str_contains($range, '-')) {
            [$min, $max] = array_map('floatval', explode('-', $range));
            return ['min' => $min, 'max' => $max];
        }
        return ['min' => 0, 'max' => PHP_FLOAT_MAX]; // Default case
    }

    private function isInWeightRange($userWeight, $weightRange)
    {
        $userWeight = is_numeric($userWeight) ? (float)$userWeight : 0;
        $bounds = $this->parseWeightRange($weightRange);
        return $userWeight >= $bounds['min'] && $userWeight <= $bounds['max'];
    }

    private function isAgeInRange($userAge, $ageRange)
    {
        $userAge = is_numeric($userAge) ? (int)$userAge : 0;
        [$min, $max] = array_map('intval', explode('-', $ageRange));
        return $userAge >= $min && $userAge <= $max;
    }

    private function generateWeightRanges($gender)
    {
        return $gender == 'Man'
            ? ['<=50', '51-55', '56-60', '61-65', '66-70', '71-75', '76-80', '81-85', '86-90', '91-95', '96-100', '101-105', '>=106']
            : ['<=40', '41-45', '46-50', '51-55', '56-60', '61-65', '66-70', '71-75', '76-80', '81-85', '86-90', '>=91'];
    }
}