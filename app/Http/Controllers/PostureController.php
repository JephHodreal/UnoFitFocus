<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PostureController extends Controller
{
    public function checkPosture(Request $request)
    {
        $pythonPath = 'C:\Users\Jeph Hodreal\AppData\Local\Programs\Python\Python313\python.exe';  // Path to Python
        $scriptPath = base_path('storage/posture_analysis/app.py');  // Correct path to app.py

        $process = new Process([$pythonPath, $scriptPath]);
        $process->start();

        if (!$process->isRunning()) {
            throw new ProcessFailedException($process);
        }

        return view('fitcheck');
    }
}