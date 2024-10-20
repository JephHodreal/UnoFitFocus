<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setup | FitFocus</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <main>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Profile Information') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Set up your profile information to start your journey with FitFocus!') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <form method="POST" action="{{ route('Setup') }}" enctype="multipart/form-data">
                            @csrf
                    
                            <!-- Datepicker -->
                            {{-- <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="birthdate" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Birthdate')" />
                                <div class="relative">
                                    <input datepicker id="birthdate" type="date" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                        placeholder="Select date" required name="birthdate" >
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                            </div> --}}

                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="birthdate" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Birthdate')" />
                                <input id="birthdate" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="date" name="birthdate" :value="old('birthdate')" min="1900-01-01" max="{{ date('Y-m-d') }}" required autocomplete="Birthdate" />
                                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                            </div> 

                            <!-- Height -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="height" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Height (in cm)')" />
                                <x-text-input id="height" class="block mt-1 w-full" type="text" name="height" :value="old('height')" required autocomplete="Height" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
                                <x-input-error :messages="$errors->get('height')" class="mt-2" />
                            </div>

                            <!-- Weight -->
                            <div class="mb-6 mt-10 pt-3 rounded bg-gray-200">
                                <x-input-label for="weight" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Weight (in kg)')" />
                                <x-text-input id="weight" class="block mt-1 w-full" type="text" name="weight" :value="old('weight')" required autocomplete="Weight" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
                                <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                            </div>
                    
                            <!-- Gender -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('I identify my gender as ...')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="gender_man" type="radio" value="Man" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="gender_man" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Man </label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="gender_woman" type="radio" value="Woman" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="gender_woman" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Woman</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="gender_gqnb" type="radio" value="Genderqueer/Non-binary" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="gender_gqnb" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Genderqueer/Non-binary</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </div>

                            <!-- Profile Picture-->
                            <div class="mb-6 mt-10 pt-3 rounded bg-gray-200">
                                <x-input-label for="profile_pic" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Upload profile picture')" />
                                <input class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="profile_pic" type="file" name="profile_pic" required>
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
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>