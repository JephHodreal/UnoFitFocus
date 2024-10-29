<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | FitFocus</title>
</head>
<body>
    <x-guest-layout>
        <div class="min-h-screen flex flex-col sm:justify-center items-center bg-slate-100">
            <!-- Session Status -->
            <x-auth-session-status :status="session('status')"/>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Login') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Enter your account details to access the full features of FitFocus.') }}
                </h2>
            </x-slot>
            <div class="w-full lg:max-w-4xl sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <main>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    
                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                    
                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                    
                            <x-primary-button class="ms-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </main>
            </div>
        </div>

        <div class="flex items-center justify-center mt-4">
            <a href="{{ route('google.login') }}" class="px-4 py-2 border flex gap-2 bg-white border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow transition duration-150">
                <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy" alt="google logo">
                <span>{{ __('Login with Google') }}</span>
            </a>
        </div>
    </x-guest-layout>
</body>
</html>