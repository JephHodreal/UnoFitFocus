<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Setup | FitFocus</title>
</head>
<body>
    <main>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Profile Setup') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Complete your profile information here!') }}
                </h2>
            </x-slot>
            <div class="py-12 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-100">
                <div class="w-full lg:max-w-2xl sm:max-w-md px-6 py-6 mt-8 mb-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <form method="POST" action="{{ route('Setup') }}" enctype="multipart/form-data">
                            @csrf
                    
                            <!-- Age -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="age" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Age')" />
                                <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" required autocomplete="age" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
                                <x-input-error :messages="$errors->get('age')" class="mt-2" />
                            </div>
                            <!-- Height -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="height" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Height (in cm)')" />
                                <x-text-input id="height" class="block mt-1 w-full" type="text" name="height" :value="old('height')" required autocomplete="height" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
                                <x-input-error :messages="$errors->get('height')" class="mt-2" />
                            </div>
                            <!-- Weight -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="weight" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Weight (in kg)')" />
                                <x-text-input id="weight" class="block mt-1 w-full" type="text" name="weight" :value="old('weight')" required autocomplete="weight" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
                                <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                            </div>
                            <!-- Gender -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('I identify my gender as ...')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="gender_man" type="radio" value="Man" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="gender_man" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Man') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="gender_woman" type="radio" value="Woman" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="gender_woman" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Woman')}}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="gender_gqnb" type="radio" value="Genderqueer/Non-binary" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="gender_gqnb" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Genderqueer/Non-binary')}}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </div>
                            <!-- Profile Picture-->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="profile_pic" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Upload profile picture')" />
                                <input class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="profile_pic" type="file" name="profile_pic">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                <x-input-error :messages="$errors->get('profile_pic')" class="mt-2" />
                            </div>
                    
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ms-4">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-app-layout>    
    </main>
</body>
</html>