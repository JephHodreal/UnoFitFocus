<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutNorm;

class WorkoutNormController extends Controller
{
    /**
     * Get workout norms based on specified criteria
     */
    public function getNorms(Request $request)
    {
        $exerciseType = $request->input('workout');
        $difficultyLevel = $request->input('difficulty');
        
        $norm = WorkoutNorm::where('exercise_type', $exerciseType)
            ->where('difficulty_level', $difficultyLevel)
            ->first();

        if (!$norm) {
            return response()->json([
                'message' => 'Workout norm not found',
                'sets' => null,
                'reps' => null,
                'duration' => null
            ], 404);
        }

        return response()->json([
            'sets' => $norm->sets,
            'reps' => $norm->reps,
            'duration' => $norm->duration
        ]);
    }

    /**
     * Display a listing of workout norms
     */
    public function index()
    {
        $norms = WorkoutNorm::all();
        return response()->json($norms);
    }

    /**
     * Store a new workout norm
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified workout norm
     */
    public function show($id)
    {
        $norm = WorkoutNorm::findOrFail($id);
        return response()->json($norm);
    }

    /**
     * Update the specified workout norm
     */
    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified workout norm
     */
    public function destroy($id)
    {
        $norm = WorkoutNorm::findOrFail($id);
        $norm->delete();
        return response()->json(null, 204);
    }
}
