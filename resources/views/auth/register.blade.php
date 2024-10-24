<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-3 sm:pt-0 bg-gray-100"> <!-- Changed pt-6 to pt-3 -->
        <div class="w-full lg:max-w-4xl sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Register') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Create an account by filling out the details below.') }}
                </h2>
            </x-slot>
            
            <main class="bg-green-200 py-6">
                <form method="POST" action="{{ route('register') }}" class="bg-red-200 py-4">
                    @csrf

                    <!-- First Name -->
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <x-input-label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('First Name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <!-- Middle Name (Optional) -->
                    <div class="mb-6 pt-3 rounded  bg-gray-200">
                        <x-input-label for="middle_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Middle Name')" />
                        <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" type="text" name="middle_name" :value="old('middle_name')" autocomplete="additional-name" />
                        <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                    </div>

                    <!-- Last Name -->
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <x-input-label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Last Name')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <x-input-label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <x-input-label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6 pt-3 rounded bg-gray-200">
                        <x-input-label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-guest-layout>
