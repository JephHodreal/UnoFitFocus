<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\FitCheckController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', function () {
    return view('home');
});

Route::get('Home', [HomeController::class, 'viewHome'])->name('home');
Route::get('About-Us', [HomeController::class, 'viewAboutUs'])->name('AboutUs');
Route::get('Frequently-Asked-Questions', [HomeController::class, 'viewFAQs'])->name('FAQs');
Route::get('Workout-Library', [HomeController::class, 'viewWorkoutLibrary'])->name('WorkoutLibrary');
Route::get('Privacy-Policy', [HomeController::class, 'viewPrivacyPolicy'])->name('PrivacyPolicy');
Route::get('Terms-and-Conditions', [HomeController::class, 'viewToC'])->name('TermsAndConditions');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/dashboard', [StatsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/Workout-History', [HomeController::class, 'viewWorkoutHistory'])
    ->middleware(['auth', 'verified'])
    ->name('WorkoutHistory');

Route::get('/Workout-History', [HistoryController::class, 'index'])->name('WorkoutHistory');

Route::get('/Setup', function () {
    return view('Setup');
})->middleware(['auth', 'verified'])->name('Setup');

Route::get('/Workout', [WorkoutController::class, 'showWorkout'])
    ->middleware(['auth', 'verified'])
    ->name('Workout');

Route::post('/Fitcheck', [FitCheckController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('FitCheck');

// Route::get('/FitCheck-retry', [FitCheckController::class, 'showFitCheck'])
//     ->middleware(['auth', 'verified'])
//     ->name('FitCheck');

Route::post('/save-workout-session', [FitCheckController::class, 'saveWorkoutSession'])
    ->middleware(['auth', 'verified']);
    
Route::post('/Setup', function () {
    return view('Setup');
})->middleware(['auth', 'verified'])->name('Setup');

Route::patch('/profile/update', [ProfileController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('profile.update');

Route::get('/profile/update', [ProfileController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('profile.update');

Route::post('/profile/update', [ProfileController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('profile.update');

Route::patch('/profile/updatePicture', [ProfileController::class, 'updatePicture'])
    ->middleware(['auth', 'verified'])
    ->name('profile.updatePicture');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';
