<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PARQInfo;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate user registration data
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 
                Password::min(8)
                    ->mixedCase()
                    ->numbers(),
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);

        // Validate PAR-Q data
        $request->validate([
            'heart_condition' => 'required|in:Yes,No',
            'chest_pain_phys' => 'required|in:Yes,No',
            'chest_pain_non_phys' => 'required|in:Yes,No',
            'balance_loss' => 'required|in:Yes,No',
            'bone_joint_problem' => 'required|in:Yes,No',
            'drug_prescrip' => 'required|in:Yes,No',
            'other_reason' => 'required|in:Yes,No',
        ]);

        // Create user
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Check if any PAR-Q answer is 'Yes'
        $hasHealthCondition = in_array('Yes', [
            $request->heart_condition,
            $request->chest_pain_phys,
            $request->chest_pain_non_phys,
            $request->balance_loss,
            $request->bone_joint_problem,
            $request->drug_prescrip,
            $request->other_reason,
        ]);

        // Create user details with health condition
        $user_info = UserDetails::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'health_condition' => $hasHealthCondition ? 'Yes' : 'No'
        ]);

        // Create PAR-Q record
        PARQInfo::create([
            'fk_userparq_id' => $user->id,
            'heart_condition' => $request->heart_condition,
            'chest_pain_phys' => $request->chest_pain_phys,
            'chest_pain_non_phys' => $request->chest_pain_non_phys,
            'balance_loss' => $request->balance_loss,
            'bone_joint_problem' => $request->bone_joint_problem,
            'drug_prescrip' => $request->drug_prescrip,
            'other_reason' => $request->other_reason,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}