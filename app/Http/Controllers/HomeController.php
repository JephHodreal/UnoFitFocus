<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewAboutUs()
    {
        return view('AboutUs');
    }
    public function viewExercises()
    {
        return view('Exercises');
    }
    public function viewHome()
    {
        return view('home');
    }
    public function viewSample()
    {
        return view('Sample');
    }
    public function viewCamera()
    {
        return view('TryCamera');
    }
    public function viewWorkoutHistory()
    {
        return view('WorkoutHistory');
    }
}
