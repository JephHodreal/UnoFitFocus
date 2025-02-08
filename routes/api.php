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
    $norm = WorkoutNorm::where('exercise_type', $request->workout)
        ->where('difficulty_level', $request->difficulty)
        ->where('gender', $request->input('gender', 'any'))
        ->where('fitness_level', $request->input('fitness_level', 'beginner'))
        // You could also add age_range and weight_range if needed
        ->first();
    
    return response()->json($norm);
});
?>