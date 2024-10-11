<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});

Route::get('Home', [HomeController::class, 'viewHome'])->name('home');
Route::get('About-Us', [HomeController::class, 'viewAboutUs'])->name('AboutUs');
Route::get('Exercises', [HomeController::class, 'viewExercises'])->name('Exercises');
Route::get('Profile', [HomeController::class, 'viewSample'])->name('Sample');
Route::get('Camera', [HomeController::class, 'viewCamera'])->name('TryCamera');
Route::get('FitCheck', [HomeController::class, 'viewFitCheck'])->name('FitCheck');
//Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/Setup', function () {
    return view('Setup');
})->middleware(['auth', 'verified'])->name('Setup');
Route::post('/Setup', function () {
    return view('Setup');
})->middleware(['auth', 'verified'])->name('Setup');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';