<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-guest-layout>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <!-- Form Container -->
            <div class="w-full lg:max-w-2xl sm:max-w-md px-6 py-6 mt-8 mb-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <!-- Form Header -->
                <h2 class="font-bold text-3xl text-center text-gray-800 mb-2">{{ __('Register') }}</h2>
                <p class="text-center text-gray-600 mb-6">{{ __('Create an account by filling out the details below') }}</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- First, Middle, and Last Name Fields in One Row -->
                    <div class="flex space-x-4 mb-6">
                        <div class="w-1/3">
                            <x-input-label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('First Name')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" placeholder="First Name" required autofocus autocomplete="given-name" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                        <div class="w-1/3">
                            <x-input-label for="middle_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Middle Name')" />
                            <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" placeholder="Middle Name (Optional)" autocomplete="additional-name" />
                            <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                        </div>
                        <div class="w-1/3">
                            <x-input-label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Last Name')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" placeholder="Last Name" required autocomplete="family-name" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-6">
                        <x-input-label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email Address" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <x-input-label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="At least 8 characters, one uppercase letter, one lowercase letter, and one number" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <x-input-label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Register Button -->
                    <div class="flex justify-center mt-4">
                        <x-primary-button class="w-1/2 max-w-sm mx-auto py-3 text-center items-center justify-center">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>

                    <!-- Already Registered Link -->
                    <div class="text-center mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already have an account? Login here') }}
                        </a>
                    </div>

                    <!-- Divider Line with 'OR' -->
                    <div class="relative mt-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">OR</span>
                        </div>
                    </div>

                    <!-- Sign Up with Google Button -->
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('google.login') }}" class="w-1/2 max-w-sm mx-auto px-4 py-2 border flex gap-2 items-center justify-center bg-white border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow transition duration-150 text-center">
                            <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy" alt="google logo">
                            <span>{{ __('Sign Up with Google') }}</span>
                        </a>
                    </div>

                    <!-- Terms and Conditions and Privacy Policy -->
                    <div class="text-center mt-4 italic w-3/4 mx-auto text-sm text-gray-600">
                        <p>
                            {{ __('By creating an account, you agree to our') }}
                            <a href="{{ route('TermsAndConditions') }}" class="text-blue-600 hover:underline">
                                {{ __('Terms and Conditions') }}
                            </a>
                            {{ __('and have read and acknowledged our') }}
                            <a href="{{ route('PrivacyPolicy') }}" class="text-blue-600 hover:underline">
                                {{ __('Privacy Policy.') }}
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </x-guest-layout>
</body>
</html>
