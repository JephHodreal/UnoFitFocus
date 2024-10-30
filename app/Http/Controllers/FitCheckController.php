<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FitCheckController extends Controller
{
    public function show(Request $request)
    {
        $workout = $request->input('workout');
        $difficulty = $request->input('difficulty');
    
        // Pass the data to the view
        return view('FitCheck', compact('workout', 'difficulty'));
    }
}
