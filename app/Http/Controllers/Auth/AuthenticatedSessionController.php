<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    // Display the login view.
    public function create(): View
    {
        return view('auth.login');
    }

    // Handle an incoming authentication request.
    public function store(LoginRequest $request): RedirectResponse
    {
        // First, find the user by email
        $user = User::where('email', $request->email)->first();
        
        // If no user exists with this email, proceed with normal authentication flow
        // which will fail and show appropriate error
        if (!$user) {
            try {
                $request->authenticate();
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard', absolute: false));
            } catch (\Illuminate\Validation\ValidationException $e) {
                throw $e;
            }
        }
        
        // At this point, we have a user with the provided email
        
        // If user has a password set and it matches the provided password,
        // log them in directly regardless of whether they have a Google account or not
        if ($user->password && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard', absolute: false));
        }
        
        // If password is incorrect and they have a Google account, suggest Google login
        // if ($user->google_id) {
        //     // Store the exact email and google_id in the session
        //     $request->session()->put('google_login_email', $request->email);
        //     $request->session()->put('expected_google_id', $user->google_id);
            
        //     return redirect()->route('google.login')
        //         ->with('message', 'This account uses Google authentication. Please sign in with Google.');
        // }
        
        // If we get here, the user exists but provided an incorrect password
        // and they don't have a Google account
        return back()->withErrors([
            'email' => 'The provided details are incorrect. Please double-check your email and password.',
        ]);
    }

    // Destroy an authenticated session.
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}