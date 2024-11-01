<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewAboutUs()
    {
        return view('AboutUs');
    }
    public function viewFAQs()
    {
        return view('FAQs');
    }
    public function viewExercises()
    {
        return view('Exercises');
    }
    public function viewHome()
    {
        return view('home');
    }
    public function viewWorkoutHistory()
    {
        return view('WorkoutHistory');
    }
    public function viewPrivacyPolicy()
    {
        return view('PrivacyPolicy');
    }
    public function viewToC()
    {
        return view('TermsAndConditions');
    }
}
