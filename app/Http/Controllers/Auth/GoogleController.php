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
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Find or create user
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
