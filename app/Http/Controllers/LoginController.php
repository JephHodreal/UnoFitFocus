<?php

namespace App\Http\Controllers;
use App\Models\LoginUser;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    protected function create(array $data)
    {
        // create a record in the users table
        $loginUser = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // create a record in the user_info table
        UserDetails::create([
            'user_id' => $loginUser->id,
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
        ]);

        //return $loginUser; // Or return a user object if needed
        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:li_user,email'],
            'password' => [
                'required',
                'string',
                Password::min(8) // Minimum length
                    ->mixedCase() // At least one uppercase and one lowercase letter
                    ->numbers(), // At least one number
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // Add other fields as necessary
        ]);
    }
}
