<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Forgot Password | FitFocus</title>
    </head>
    <body>
        <x-guest-layout>
            <div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
                <!-- Session Status -->
                <x-auth-session-status :status="session('status')"/>
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Forgot your password?') }}
                    </h2>
                    <h2 class="text-x2 text-gray-800 leading-tight">
                        {{ __('Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </h2>
                </x-slot>
                <div class="w-full lg:max-w-4xl sm:max-w-md px-6 py-4 -mt-48 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <main>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                        
                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>
                                    {{ __('Email Password Reset Link') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </x-guest-layout>
    </body>
</html>