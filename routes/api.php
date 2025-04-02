<?php
use Illuminate\Support\Facades\Http;

Route::post('/check-posture', function (Request $request) {
    $landmarks = $request->input('landmarks');

    // Call the Python Flask API
    $response = Http::post('http://localhost:5000/predict', [
        'landmarks' => $landmarks
    ]);

    return $response->json();
});

Route::get('/workout-norms', function (Request $request) {
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
    $userNorm = null;
    foreach ($norms as $norm) {
        if (isAgeInRange($age, $norm->age_range) && isInWeightRange($weight, $norm->weight_range)) {
            $userNorm = $norm;
            break;
        }
    }
    
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
});

// Helper functions if using the closure approach
function isAgeInRange($userAge, $ageRange) {
    $userAge = is_numeric($userAge) ? (int)$userAge : 0;
    [$min, $max] = array_map('intval', explode('-', $ageRange));
    return $userAge >= $min && $userAge <= $max;
}

function isInWeightRange($userWeight, $weightRange) {
    $userWeight = is_numeric($userWeight) ? (float)$userWeight : 0;
    $bounds = parseWeightRange($weightRange);
    return $userWeight >= $bounds['min'] && $userWeight <= $bounds['max'];
}

function parseWeightRange($range) {
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
?>