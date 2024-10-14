<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatsController;

Route::get('/', function () {
    return view('home');
});

Route::get('Home', [HomeController::class, 'viewHome'])->name('home');
Route::get('About-Us', [HomeController::class, 'viewAboutUs'])->name('AboutUs');
Route::get('Exercises', [HomeController::class, 'viewExercises'])->name('Exercises');
Route::get('Profile', [HomeController::class, 'viewSample'])->name('Sample');
Route::get('Camera', [HomeController::class, 'viewCamera'])->name('TryCamera');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/dashboard', [StatsController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/Setup', function () {
    return view('Setup');
})->middleware(['auth', 'verified'])->name('Setup');

Route::get('/Workout', function () {
    return view('Workout');
})->middleware(['auth', 'verified'])->name('Workout');

Route::get('/FitCheck', function () {
    return view('FitCheck');
})->middleware(['auth', 'verified'])->name('FitCheck');

Route::post('/Setup', function () {
    return view('Setup');
})->middleware(['auth', 'verified'])->name('Setup');
Route::patch('/profile/update', [ProfileController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('profile.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
