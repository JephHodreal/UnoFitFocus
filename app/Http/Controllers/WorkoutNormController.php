<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkoutNorm;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\UserDetails;

class WorkoutNormController extends Controller {
    public function getNorms(Request $request) {
        $user = Auth::user();
        $userDetails = DB::table('user_info')->where('user_id', $user->id)->first();
        $exerciseType = $request->input('workout');
        $difficultyLevel = $request->input('difficulty');
        
        // Get user-specific details
        $gender = $userDetails->gender ?? 'Man';
        $age = $userDetails->age ?? 25;
        $weight = $userDetails->weight ?? 70;
        $fitnessLevel = $userDetails->fitness_level ?? 'Beginner';
        
        // Query for personalized norms based on user profile
        $norms = DB::table('workout_norms')
            ->where('gender', $gender)
            ->where('fitness_level', $fitnessLevel)
            ->where('exercise_type', $exerciseType)
            ->where('difficulty_level', $difficultyLevel)
            ->get();
        
        // Find the specific norm matching the user's age and weight
        $userNorm = $norms->first(function($norm) use ($age, $weight) {
            return $this->isAgeInRange($age, $norm->age_range) && 
                   $this->isInWeightRange($weight, $norm->weight_range);
        });
        
        if (!$userNorm) {
            return response()->json([
                'message' => 'Workout norm not found for your profile',
                'sets' => null,
                'reps' => null,
                'duration' => null
            ], 404);
        }
        
        return response()->json([
            'sets' => $userNorm->sets,
            'reps' => $userNorm->reps,
            'duration' => $userNorm->duration
        ]);
    }

    private function isAgeInRange($userAge, $ageRange) {
        $userAge = is_numeric($userAge) ? (int)$userAge : 0;
        [$min, $max] = array_map('intval', explode('-', $ageRange));
        return $userAge >= $min && $userAge <= $max;
    }

    private function isInWeightRange($userWeight, $weightRange) {
        $userWeight = is_numeric($userWeight) ? (float)$userWeight : 0;
        $bounds = $this->parseWeightRange($weightRange);
        return $userWeight >= $bounds['min'] && $userWeight <= $bounds['max'];
    }

    private function parseWeightRange($range) {
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

    public function index() {
        $norms = WorkoutNorm::all();
        return response()->json($norms);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'gender' => 'required',
            'age_range' => 'required',
            'weight_range' => 'required',
            'fitness_level' => 'required',
            'exercise_type' => 'required',
            'difficulty_level' => 'required',
            'sets' => 'nullable|integer',
            'reps' => 'nullable|integer',
            'duration' => 'nullable|integer'
        ]);
        $norm = WorkoutNorm::create($validated);
        return response()->json($norm, 201);
    }

    public function show($id) {
        $norm = WorkoutNorm::findOrFail($id);
        return response()->json($norm);
    }

    public function update(Request $request, $id) {
        $norm = WorkoutNorm::findOrFail($id);
        $validated = $request->validate([
            'gender' => 'sometimes|required',
            'age_range' => 'sometimes|required',
            'weight_range' => 'sometimes|required',
            'fitness_level' => 'sometimes|required',
            'exercise_type' => 'sometimes|required',
            'difficulty_level' => 'sometimes|required',
            'sets' => 'nullable|integer',
            'reps' => 'nullable|integer',
            'duration' => 'nullable|integer'
        ]);
        $norm->update($validated);
        return response()->json($norm);
    }

    public function destroy($id) {
        $norm = WorkoutNorm::findOrFail($id);
        $norm->delete();
        return response()->json(null, 204);
    }
}