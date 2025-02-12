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
                                            <input id="gender_man" type="radio" value="Man" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="gender_man" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Man') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="gender_woman" type="radio" value="Woman" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="gender_woman" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Woman')}}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </div>

                            <!-- Fitness Goal -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="fitness_goal" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('My current fitness goal is to ...')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="goal_lose_weight" type="radio" value="Lose Weight" name="fitness_goal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="goal_lose_weight" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Lose Weight') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="goal_consistent_schedule" type="radio" value="Have a Consistent Workout Schedule" name="fitness_goal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="goal_consistent_schedule" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Have a Consistent Workout Schedule') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="goal_bodyweight_training" type="radio" value="Improve in Bodyweight Training" name="fitness_goal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="goal_bodyweight_training" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Improve in Bodyweight Training') }}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('fitness_goal')" class="mt-2" />
                            </div>

                            <!-- Expected Weight Range (Appears only if user selects Lose Weight as the fitness goal) -->
                            <div id="expectedWeightContainer" class="mb-6 pt-3 rounded bg-gray-200 hidden">
                                <x-input-label class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                                    {{ __('Your expected weight range is:') }}
                                </x-input-label>
                                <p id="expectedWeightText" class="text-gray-900 dark:text-white font-medium px-3"></p>
                                <p id="weightStatusText" class="text-gray-900 dark:text-white font-medium px-3"></p>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const fitnessGoalInputs = document.querySelectorAll('input[name="fitness_goal"]');
                                    const heightInput = document.getElementById("height");
                                    const weightInput = document.getElementById("weight");
                                    const genderInputs = document.querySelectorAll('input[name="gender"]');
                                    const expectedWeightContainer = document.getElementById("expectedWeightContainer");
                                    const expectedWeightText = document.getElementById("expectedWeightText");
                                    const weightStatusText = document.getElementById("weightStatusText");

                                    // Expected weight ranges based on height and gender
                                    const expectedWeightRanges = [
                                        { min: 0, max: 138, Woman: [28.5, 34.9], Man: [28.5, 34.9] },
                                        { min: 139, max: 140, Woman: [30.8, 37.6], Man: [30.8, 38.1] },
                                        { min: 141, max: 143, Woman: [32.6, 39.9], Man: [33.5, 40.8] },
                                        { min: 144, max: 146, Woman: [34.9, 42.6], Man: [35.8, 43.9] },
                                        { min: 147, max: 148, Woman: [36.4, 44.9], Man: [38.5, 46.7] },
                                        { min: 149, max: 150, Woman: [39.0, 47.6], Man: [40.8, 49.9] },
                                        { min: 151, max: 153, Woman: [40.8, 49.9], Man: [43.1, 53.0] },
                                        { min: 154, max: 155, Woman: [43.1, 52.6], Man: [45.8, 55.8] },
                                        { min: 156, max: 158, Woman: [44.9, 54.9], Man: [48.1, 58.9] },
                                        { min: 159, max: 161, Woman: [47.2, 57.6], Man: [50.8, 61.6] },
                                        { min: 162, max: 163, Woman: [49.0, 59.9], Man: [53.0, 64.8] },
                                        { min: 164, max: 166, Woman: [51.2, 62.6], Man: [55.3, 68.0] },
                                        { min: 167, max: 169, Woman: [53.0, 64.8], Man: [58.0, 70.7] },
                                        { min: 170, max: 171, Woman: [55.3, 67.6], Man: [60.3, 73.9] },
                                        { min: 172, max: 173, Woman: [57.1, 69.8], Man: [63.0, 76.6] },
                                        { min: 174, max: 176, Woman: [59.4, 72.6], Man: [65.3, 79.8] },
                                        { min: 177, max: 179, Woman: [61.2, 74.8], Man: [67.6, 83.0] },
                                        { min: 180, max: 181, Woman: [63.5, 77.5], Man: [70.3, 85.7] },
                                        { min: 182, max: 183, Woman: [65.3, 79.8], Man: [72.6, 88.9] },
                                        { min: 184, max: 186, Woman: [67.6, 82.5], Man: [75.3, 91.6] },
                                        { min: 187, max: 189, Woman: [69.4, 84.8], Man: [77.5, 94.8] },
                                        { min: 190, max: 192, Woman: [71.6, 87.5], Man: [79.8, 98.0] },
                                        { min: 193, max: 194, Woman: [73.5, 89.8], Man: [82.5, 100.6] },
                                        { min: 195, max: Infinity, Woman: [75.7, 92.5], Man: [84.8, 103.8] }
                                    ];

                                    function getExpectedWeightRange(height, gender) {
                                        for (const range of expectedWeightRanges) {
                                            if (height >= range.min && height <= range.max) {
                                                return range[gender] || null;
                                            }
                                        }
                                        return null;
                                    }

                                    function updateExpectedWeight() {
                                        const selectedGoal = document.querySelector('input[name="fitness_goal"]:checked');
                                        const selectedGender = document.querySelector('input[name="gender"]:checked');
                                        const height = parseInt(heightInput.value);
                                        const weight = parseFloat(weightInput.value);

                                        if (selectedGoal && selectedGoal.value === "Lose Weight" && selectedGender && height && weight) {
                                            const gender = selectedGender.value;
                                            const range = getExpectedWeightRange(height, gender);

                                            if (range) {
                                                expectedWeightContainer.classList.remove("hidden");
                                                expectedWeightText.textContent = `${range[0]} - ${range[1]} kg`;

                                                if (weight < range[0]) {
                                                    weightStatusText.textContent = "You are below the expected weight range.";
                                                    weightStatusText.classList.add("text-red-500");
                                                    weightStatusText.classList.remove("text-orange-500", "text-green-500");
                                                } else if (weight > range[1]) {
                                                    weightStatusText.textContent = "You are above the expected weight range.";
                                                    weightStatusText.classList.add("text-orange-500");
                                                    weightStatusText.classList.remove("text-red-500", "text-green-500");
                                                } else {
                                                    weightStatusText.textContent = "You are within the expected weight range.";
                                                    weightStatusText.classList.add("text-green-500");
                                                    weightStatusText.classList.remove("text-orange-500", "text-red-500");
                                                }
                                            } else {
                                                expectedWeightContainer.classList.add("hidden");
                                            }
                                        } else {
                                            expectedWeightContainer.classList.add("hidden");
                                        }
                                    }

                                    // Event listeners
                                    fitnessGoalInputs.forEach(input => input.addEventListener("change", updateExpectedWeight));
                                    heightInput.addEventListener("input", updateExpectedWeight);
                                    weightInput.addEventListener("input", updateExpectedWeight);
                                    genderInputs.forEach(input => input.addEventListener("change", updateExpectedWeight));
                                });
                            </script>

                            <!-- Fitness Level -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="fitness_level" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('What is your current fitness level?')" />

                                <div class="grid grid-cols-3 gap-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <!-- Beginner -->
                                    <label for="level_beginner" class="flex flex-col items-center text-center py-4 px-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="level_beginner" type="radio" value="Beginner" name="fitness_level" class="w-5 h-5 mb-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <span class="block text-base font-medium text-gray-900 dark:text-gray-300">{{ __('Beginner') }}</span>
                                        <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                                            <span class="font-bold">Criteria:</span> No or little prior experience, learning the basics of exercise, and just starting out.
                                        </p>
                                    </label>

                                    <!-- Intermediate -->
                                    <label for="level_intermediate" class="flex flex-col items-center text-center py-4 px-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="level_intermediate" type="radio" value="Intermediate" name="fitness_level" class="w-5 h-5 mb-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <span class="block text-base font-medium text-gray-900 dark:text-gray-300">{{ __('Intermediate') }}</span>
                                        <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                                            <span class="font-bold">Criteria:</span> Comfortable with basic exercises, able to maintain a consistent routine, and looking for improvement.
                                        </p>
                                    </label>

                                    <!-- Advanced -->
                                    <label for="level_advanced" class="flex flex-col items-center text-center py-4 px-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="level_advanced" type="radio" value="Advanced" name="fitness_level" class="w-5 h-5 mb-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <span class="block text-base font-medium text-gray-900 dark:text-gray-300">{{ __('Advanced') }}</span>
                                        <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                                            <span class="font-bold">Criteria:</span> Proficient in various exercises, well-versed in fitness routines, and aiming for peak performance.
                                        </p>
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('fitness_level')" class="mt-2" />
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