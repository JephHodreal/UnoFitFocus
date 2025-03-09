<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reset Password | FitFocus</title>
    </head>
    <body>
        <x-guest-layout>
            <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Create a new password') }}
                    </h2>
                    <h2 class="text-x2 text-gray-800 leading-tight">
                        {{ __('Enter the new password for your account here!') }}
                    </h2>
                </x-slot>
            <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
                <div class="w-full lg:max-w-4xl sm:max-w-md px-6 py-4 -mt-48 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
        
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full bg-gray-100" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" readonly />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
        
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('New Password')" required="true" />
                            <div class="relative">
                                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" autocomplete="new-password" placeholder="At least 8 characters, one uppercase letter, one lowercase letter, and one number" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <p id="password-error" class="text-red-500 text-sm mt-2 hidden">{{ __('Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.') }}</p>
                        </div>
        
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" required="true" />
                            <div class="relative">
                                <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" />
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            <p id="confirm-password-error" class="text-red-500 text-sm mt-2 hidden">{{ __('Passwords do not match.') }}</p>
                        </div>
        
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Reset Password') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const passwordInput = document.getElementById('password');
                    const confirmPasswordInput = document.getElementById('password_confirmation');
                    const passwordError = document.getElementById('password-error');
                    const confirmPasswordError = document.getElementById('confirm-password-error');
                    const togglePassword = document.getElementById('toggle-password');
                    const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
                    const eyeIcon = document.getElementById('eye-icon');
                    const eyeOffIcon = document.getElementById('eye-off-icon');
                    const confirmEyeIcon = document.getElementById('confirm-eye-icon');
                    const confirmEyeOffIcon = document.getElementById('confirm-eye-off-icon');
        
                    // Password validation regex
                    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\S]{8,}$/;
        
                    // Toggle password visibility
                    togglePassword.addEventListener('click', function() {
                        if (passwordInput.type === 'password') {
                            passwordInput.type = 'text';
                            eyeIcon.classList.add('hidden');
                            eyeOffIcon.classList.remove('hidden');
                        } else {
                            passwordInput.type = 'password';
                            eyeIcon.classList.remove('hidden');
                            eyeOffIcon.classList.add('hidden');
                        }
                    });
        
                    // Toggle confirm password visibility
                    toggleConfirmPassword.addEventListener('click', function() {
                        if (confirmPasswordInput.type === 'password') {
                            confirmPasswordInput.type = 'text';
                            confirmEyeIcon.classList.add('hidden');
                            confirmEyeOffIcon.classList.remove('hidden');
                        } else {
                            confirmPasswordInput.type = 'password';
                            confirmEyeIcon.classList.remove('hidden');
                            confirmEyeOffIcon.classList.add('hidden');
                        }
                    });
        
                    // Function to validate password
                    function validatePassword() {
                        if (!passwordRegex.test(passwordInput.value)) {
                            passwordError.classList.remove('hidden');
                            return false;
                        } else {
                            passwordError.classList.add('hidden');
                            return true;
                        }
                    }
        
                    // Function to validate confirm password
                    function validateConfirmPassword() {
                        if (passwordInput.value !== confirmPasswordInput.value) {
                            confirmPasswordError.classList.remove('hidden');
                            return false;
                        } else {
                            confirmPasswordError.classList.add('hidden');
                            return true;
                        }
                    }
        
                    // Real-time validation for password
                    passwordInput.addEventListener('input', function() {
                        validatePassword();
                        validateConfirmPassword(); // Also validate confirm password when password changes
                    });
        
                    // Real-time validation for confirm password
                    confirmPasswordInput.addEventListener('input', validateConfirmPassword);
        
                    // Form validation before submission
                    document.querySelector('form').addEventListener('submit', function(event) {
                        const isPasswordValid = validatePassword();
                        const isConfirmPasswordValid = validateConfirmPassword();
                        
                        if (!isPasswordValid || !isConfirmPasswordValid) {
                            event.preventDefault();
                        }
                    });
                });
            </script>
        </x-guest-layout>
    </body>
</html>