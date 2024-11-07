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
    public function viewWorkoutLibrary()
    {
        return view('WorkoutLibrary');
    }
    public function viewHome()
    {
        return view('home');
    }
    public function viewSetup()
    {
        return view('Setup');
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
