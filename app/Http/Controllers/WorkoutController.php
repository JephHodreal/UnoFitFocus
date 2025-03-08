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

        // Check if the profile is complete
        $profileIncomplete = UserDetails::where('user_id', $user->id)
        ->where(function ($query) {
            $query->whereNull('height')
                  ->orWhereNull('weight')
                  ->orWhereNull('age')
                  ->orWhereNull('gender')
                  ->orWhereNull('fitness_goal')
                  ->orWhereNull('fitness_level');
        })
        ->exists();

        // Retrieve user's last selected difficulty from a session or user preferences
        $lastSelectedDifficulty = $request->session()->get('last_selected_difficulty', 'Beginner');
        
        // Prefer the current request's difficulty, otherwise use the last selected, or default to Beginner
        $selectedDifficulty = $request->input('difficulty', $lastSelectedDifficulty);
        
        // Save the current selection for future visits
        $request->session()->put('last_selected_difficulty', $selectedDifficulty);

        // Get filters with safe defaults
        $selectedWorkout = $request->input('workout', 'Push-Up');
        //$selectedDifficulty = $request->input('difficulty_level', 'Beginner');
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

        $userFitnessLevel = $userDetails->fitness_level;

        // Build norms table
        $normTable = [];
        $highlightedNorms = null;

        // Find the user's specific norm
        $userNorm = $norms->first(fn($norm) => $this->isAgeInRange($userDetails->age, $norm->age_range) &&
                                            $this->isInWeightRange($userDetails->weight, $norm->weight_range));

        if ($userNorm) {
            $highlightedNorms = [
                'age' => $userDetails->age,
                'weight' => $userDetails->weight,
                'norm' => $userNorm
            ];
        }

        foreach ($ages as $age) {
            $normTable[$age] = [];
            
            foreach ($weightRanges as $weightRange) {
                $matchingNorm = $norms->first(fn($norm) =>
                    $this->isAgeInRange($age, $norm->age_range) &&
                    $this->isWeightRangeOverlapping($weightRange, $norm->weight_range)
                );

                if ($matchingNorm) {
                    $normTable[$age][$weightRange] = $selectedWorkout === 'Plank'
                        ? "{$matchingNorm->duration} sec"
                        : ($matchingNorm->sets * $matchingNorm->reps) . " reps";
                } else {
                    $normTable[$age][$weightRange] = 'N/A';
                }
            }
        }

        /// Retrieve norms filtered by user's actual characteristics
        $workoutNorms = DB::table('workout_norms')
            ->where('gender', $userDetails->gender)
            ->where('fitness_level', $userFitnessLevel)  // Use user's actual fitness level
            ->whereIn('exercise_type', ['Push-Up', 'Squat', 'Plank'])
            ->get()
            ->groupBy('exercise_type');

        // Get perfect scores count for each exercise-difficulty combination
        $perfectScores = DB::table('workout_sessions')
            ->where('fk_user_id', $user->id)
            ->where('score', 100)
            ->select('exercise', 'difficulty', DB::raw('COUNT(*) as perfect_count'))
            ->groupBy('exercise', 'difficulty')
            ->get();

        // Initialize scores array with all difficulties locked
        $scores = [];
        foreach (['Push-Up', 'Squat', 'Plank'] as $exercise) {
            $scores[$exercise] = [
                'Beginner' => [
                    'unlocked' => true,
                    'perfect_count' => 0
                ],
                'Intermediate' => [
                    'unlocked' => false,
                    'perfect_count' => 0
                ],
                'Advanced' => [
                    'unlocked' => false,
                    'perfect_count' => 0
                ]
            ];
        }

        // Update perfect scores counts
        foreach ($perfectScores as $score) {
            if (isset($scores[$score->exercise][$score->difficulty])) {
                $scores[$score->exercise][$score->difficulty]['perfect_count'] = $score->perfect_count;
                
                // Update unlocked status based on previous difficulty's perfect scores
                if ($score->difficulty === 'Beginner' && $score->perfect_count >= 3) {
                    $scores[$score->exercise]['Intermediate']['unlocked'] = true;
                }
                if ($score->difficulty === 'Intermediate' && $score->perfect_count >= 3) {
                    $scores[$score->exercise]['Advanced']['unlocked'] = true;
                }
            }
        }

        // Define available workouts with descriptions
        $workouts = [
            [
                'name' => 'Push-Up',
                'image' => 'prev-pushup.PNG',
                'default_description' => 'Perform a standard push-up with proper form.',
                'norm_descriptions' => $this->generateNormDescriptions($workoutNorms['Push-Up'] ?? collect(), $userDetails)
            ],
            [
                'name' => 'Squat',
                'image' => 'prev-squat.PNG',
                'default_description' => 'Perform a full-depth squat, ensuring your thighs are parallel to the floor.',
                'norm_descriptions' => $this->generateNormDescriptions($workoutNorms['Squat'] ?? collect(), $userDetails)
            ],
            [
                'name' => 'Plank',
                'image' => 'prev-plank.PNG',
                'default_description' => 'Hold a plank position with a straight back and engaged core.',
                'norm_descriptions' => $this->generateNormDescriptions($workoutNorms['Plank'] ?? collect(), $userDetails)
            ]
        ];

        // Check if user has answered the PARQ form
        $hasParqAnswers = DB::table('parq_answers')->where('fk_userparq_id', $user->id)->exists();

        return view('Workout', compact(
            'workouts', 'norms', 'scores', 'ages', 'weightRanges', 'userNorm', 
            'selectedWorkout', 'selectedDifficulty', 'selectedFitnessLevel', 
            'hasParqAnswers', 'fitnessLevels', 'userDetails', 'normTable', 'highlightedNorms', 'profileIncomplete',
        ));
    }

    private function generateNormDescriptions($workoutNorms, $userDetails)
    {
        $descriptions = [];
        foreach (['Beginner', 'Intermediate', 'Advanced'] as $difficulty) {
            $norm = $workoutNorms->first(function ($norm) use ($difficulty, $userDetails) {
                return $norm->difficulty_level === $difficulty &&
                       $this->isAgeInRange($userDetails->age, $norm->age_range) &&
                       $this->isInWeightRange($userDetails->weight, $norm->weight_range);
            });

            if ($norm) {
                $descriptions[$difficulty] = $norm->exercise_type === 'Plank'
                    ? "Hold the plank position for {$norm->duration} seconds."
                    : "Complete {$norm->sets} sets of {$norm->reps} repetitions for a total of " . 
                      ($norm->sets * $norm->reps) . " {$norm->exercise_type}s.";
            } else {
                $descriptions[$difficulty] = "No specific requirements found for your profile.";
            }
        }
        return $descriptions;
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