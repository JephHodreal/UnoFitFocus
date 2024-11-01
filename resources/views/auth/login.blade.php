<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-guest-layout>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-100">
            <!-- Form Container -->
            <div class="w-full lg:max-w-2xl sm:max-w-md px-6 py-6 mt-8 mb-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <!-- Form Header -->
                <h2 class="font-bold text-3xl text-center text-gray-800 mb-2">{{ __('Login') }}</h2>
                <p class="text-center text-gray-600 mb-6">{{ __('Enter your account details to access the full features of FitFocus.') }}</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-6">
                        <x-input-label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <x-input-label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <!-- Login Button -->
                    <div class="flex justify-center mt-4">
                        <x-primary-button class="w-1/2 max-w-sm mx-auto py-3 text-center items-center justify-center">
                            {{ __('Log In') }}
                        </x-primary-button>
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="text-center mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
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

                    <!-- Login with Google Button -->
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('google.login') }}" target="_blank" rel="noopener noreferrer" class="w-1/2 max-w-sm mx-auto px-4 py-2 border flex gap-2 items-center justify-center bg-white border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow transition duration-150 text-center">
                            <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy" alt="google logo">
                            <span>{{ __('Login with Google') }}</span>
                        </a>
                    </div>

                    <!-- Sign Up -->
                    <div class="text-center mt-4 italic w-3/4 mx-auto text-sm text-gray-600">
                        <p>
                            {{ __('Don\'t have an account? ') }}
                            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                                {{ __('Register now') }}
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </x-guest-layout>
</body>
</html>
