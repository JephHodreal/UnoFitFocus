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
?>