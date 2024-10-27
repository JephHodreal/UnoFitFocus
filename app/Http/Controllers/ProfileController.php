<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user(); // Get the authenticated user
        $userDetails = $user->userDetails;

        // Check if the profile is complete
        $profileIncomplete = UserDetails::where('user_id', $user->id)
        ->where(function ($query) {
            $query->whereNull('height')
                  ->orWhereNull('weight')
                  ->orWhereNull('birthdate')
                  ->orWhereNull('gender');
        })
        ->exists();

        return view('profile.edit', [
            'user' => $user,
            'userInfo' => $userDetails,
            'profileIncomplete' => $profileIncomplete,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        Log::info('Trying to update user profile.'); 
    
        // Retrieve user info based on authenticated user's ID
        $user_info = UserDetails::where('user_id', Auth::id())->first();
    
        // Check if user_info exists
        if (!$user_info) {
            Log::error('UserDetails not found for user ID: ' . Auth::id());
            return Redirect::route('profile.edit')->with('error', 'User details not found.');
        }
        $userDetails = $user_info; // You already have the user_info
    
        // Check if userDetails exists
        if (!$userDetails) {
            Log::error('User relationship not found for user ID: ' . Auth::id());
            return Redirect::route('profile.edit')->with('error', 'User relationship not found.');
        }
    
        // Update user details
        $userDetails->first_name = $request->name;
        $userDetails->middle_name = $request->middle_name;
        $userDetails->last_name = $request->last_name;
        $userDetails->birthdate = $request->birthdate;
        $userDetails->height = $request->height;
        $userDetails->weight = $request->weight;
        $userDetails->gender = $request->gender;
    
        // Save the updated user info
        $userDetails->save();
    
        return Redirect::route('profile.edit')->with('status', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updatePicture(Request $request): RedirectResponse
    {
        Log::info('Attempting to update profile picture for user ID: ' . Auth::id());

        // Validate the file input to ensure it's an image
        $request->validate([
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Limit size to 2MB
        ]);

        // Get the authenticated user's details
        $userDetails = UserDetails::where('user_id', Auth::id())->first();

        // Check if userDetails exists
        if (!$userDetails) {
            Log::error('UserDetails not found for user ID: ' . Auth::id());
            return Redirect::route('profile.edit')->with('error', 'User details not found.');
        }

        // Handle the file upload
        $image = $request->file('profile_pic');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/profile_pics'), $imageName);

        // Delete old profile picture if exists
        if ($userDetails->profile_pic && file_exists(public_path('uploads/profile_pics/' . $userDetails->profile_pic))) {
            unlink(public_path('uploads/profile_pics/' . $userDetails->profile_pic));
        }

        // Update the profile picture path in the database
        $userDetails->profile_pic = $imageName;
        $userDetails->save();

        Log::info('Profile picture updated successfully for user ID: ' . Auth::id());

        return Redirect::route('profile.edit')->with('status', 'Profile picture updated successfully.');
    }
}
