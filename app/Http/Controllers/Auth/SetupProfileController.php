<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SetupProfileController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('Setup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        $user_info = UserDetails::where('user_id', Auth::id())->first();

        $user_info->age = $request->age;
        $user_info->height = $request->height;
        $user_info->weight = $request->weight;
        $user_info->gender = $request->gender;
        $user_info->fitness_goal = $request->fitness_goal;
        $user_info->fitness_level = $request->fitness_level;

        // Calculate BMI
        $heightInMeters = $request->height / 100;
        $bmi = $request->weight / ($heightInMeters * $heightInMeters);
        $user_info->bmi = round($bmi, 2);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile_pics'), $filename);
            
            $user_info->profile_pic = $filename;
        }

        $user_info->save();

        return redirect(route('dashboard', absolute: false))->with('status', 'profile-updated');
    }
}
