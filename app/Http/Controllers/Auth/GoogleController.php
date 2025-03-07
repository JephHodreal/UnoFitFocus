<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        // Always force account selection to avoid automatic login with the previously selected account
        return Socialite::driver('google')
            ->with([
                'prompt' => 'select_account',
                'login_hint' => session('google_login_email')
            ])
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $googleId = $googleUser->getId();
            $email = $googleUser->getEmail();

            $expectedGoogleId = session('expected_google_id');
        
            if ($expectedGoogleId && $googleId !== $expectedGoogleId) {
                return redirect('login')
                    ->withErrors(['email' => 'You selected a different Google account than the one you tried to log in with.']);
            }

            $user = User::where('email', $email)->first();
        
            if (!$user) {
                // Create new user if not found
                $user = User::updateOrCreate(
                    ['email' => $googleUser->getEmail()],
                    [
                        'name' => $googleUser->getName(),
                        'google_id' => $googleUser->getId(),
                        'password' => bcrypt(uniqid()) // or any password generation strategy
                    ]
                );
    
                $fullName = $googleUser->getName();
                $nameParts = explode(' ', trim($fullName));
                $firstName = array_shift($nameParts);
                $lastName = implode(' ', $nameParts);
    
                // Check and create user details
                UserDetails::firstOrCreate(
                    ['user_id' => $user->id],
                    [
                        'first_name' => $firstName,
                        'middle_name' => null,
                        'last_name' => $lastName,
                    ]
                );
            } else {
                // Update Google ID if needed
                if (empty($user->google_id)) {
                    $user->google_id = $googleId;
                    $user->save();
                }
            }
            
            // Clear the session variables we set
            session()->forget('google_login_email');
            session()->forget('expected_google_id');

            // Log the user in
            Auth::login($user);

            return redirect()->intended('dashboard');
        } catch (Exception $e) {
            // Log the error details
            Log::info('logging in with Google'); 
            \Log::error('Google Login Error: ' . $e->getMessage());

            // Optionally, you can also display the error message temporarily for testing purposes
            return redirect('login')->withErrors(['login' => 'Google login failed: ' . $e->getMessage()]);
        }
    }

}
