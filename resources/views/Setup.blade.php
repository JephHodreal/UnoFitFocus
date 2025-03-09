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
                    
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Age -->
                                <div class="mb-6 pt-3 rounded bg-gray-200">
                                    <x-input-label for="age" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Age')" required="true" />
                                    <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" required autocomplete="age" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
                                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                                </div>

                                <!-- Height -->
                                <div class="mb-6 pt-3 rounded bg-gray-200">
                                    <x-input-label for="height" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Height (in cm)')" required="true" />
                                    <x-text-input id="height" class="block mt-1 w-full" type="text" name="height" :value="old('height')" required autocomplete="height" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
                                    <x-input-error :messages="$errors->get('height')" class="mt-2" />
                                </div>

                                <!-- Weight -->
                                <div class="mb-6 pt-3 rounded bg-gray-200">
                                    <x-input-label for="weight" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Weight (in kg)')" required="true" />
                                    <x-text-input id="weight" class="block mt-1 w-full" type="text" name="weight" :value="old('weight')" required autocomplete="weight" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
                                    <x-input-error :messages="$errors->get('weight')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('I identify my gender as ...')" required="true" />
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
                                <x-input-label for="fitness_goal" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('My current fitness goal is to ...')" required="true" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="goal_weight_change" type="radio" value="" name="fitness_goal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label id="goal_weight_change_label" for="goal_weight_change" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Weight Goal') }}</label>
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

                            <!-- Expected Weight Range -->
                            <div id="expectedWeightContainer" class="mb-6 pt-3 rounded bg-gray-200 hidden">
                                <x-input-label class="block text-gray-700 text-sm font-bold mb-2 ml-3">
                                    {{ __('Your recommended weight range is:') }}
                                </x-input-label>
                                <p id="expectedWeightText" class="text-gray-900 dark:text-white font-medium px-3"></p>
                                <div class="relative group">
                                    <p id="weightStatusText" class="text-gray-900 dark:text-white font-medium px-3 cursor-help"></p>
                                    <div class="absolute invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300 bottom-full left-3 mb-2 w-80 bg-gray-900 text-white text-sm rounded-lg p-4 shadow-lg">
                                        <div class="relative">
                                            <!-- Tooltip content -->
                                            <p class="leading-tight">
                                                {{ __("These values are based off on the combination of Hamwi, G. J. (1964), Devine, B. J. (1974), Robinson, J. D., & Miller, D. R.'s formulas for finding a person's ideal weight.") }}
                                            </p>
                                            <!-- Arrow -->
                                            <div class="absolute w-3 h-3 bg-gray-900 transform rotate-45 left-4 -bottom-1.5"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const fitnessGoalInput = document.getElementById("goal_weight_change");
                                const fitnessGoalLabel = document.getElementById("goal_weight_change_label");
                                const heightInput = document.getElementById("height");
                                const weightInput = document.getElementById("weight");
                                const genderInputs = document.querySelectorAll('input[name="gender"]');
                                const expectedWeightContainer = document.getElementById("expectedWeightContainer");
                                const expectedWeightText = document.getElementById("expectedWeightText");
                                const weightStatusText = document.getElementById("weightStatusText");
                                const fitnessGoalInputs = document.querySelectorAll('input[name="fitness_goal"]');

                                function cmToInchesOver5Feet(heightCm) {
                                    const totalInches = heightCm / 2.54;
                                    return Math.max(0, totalInches - 60); // 60 inches = 5 feet
                                }

                                function calculateIdealWeight(height, gender) {
                                    const inchesOver5Feet = cmToInchesOver5Feet(height);
                                    let weights = [];

                                    // Hamwi Formula
                                    if (gender === "Man") {
                                        weights.push(48.0 + (2.7 * inchesOver5Feet));
                                    } else {
                                        weights.push(45.5 + (2.2 * inchesOver5Feet));
                                    }

                                    // Devine Formula
                                    if (gender === "Man") {
                                        weights.push(50.0 + (2.3 * inchesOver5Feet));
                                    } else {
                                        weights.push(45.5 + (2.3 * inchesOver5Feet));
                                    }

                                    // Robinson Formula
                                    if (gender === "Man") {
                                        weights.push(52.0 + (1.9 * inchesOver5Feet));
                                    } else {
                                        weights.push(49.0 + (1.7 * inchesOver5Feet));
                                    }

                                    // Miller Formula
                                    if (gender === "Man") {
                                        weights.push(56.2 + (1.41 * inchesOver5Feet));
                                    } else {
                                        weights.push(53.1 + (1.36 * inchesOver5Feet));
                                    }

                                    // Get min and max from all formulas
                                    const minWeight = Math.min(...weights);
                                    const maxWeight = Math.max(...weights);

                                    // Return range with some flexibility (±2.5%)
                                    return {
                                        min: Math.round(minWeight * 0.975),
                                        max: Math.round(maxWeight * 1.025)
                                    };
                                }

                                function updateWeightGoal() {
                                    const selectedGender = document.querySelector('input[name="gender"]:checked');
                                    const height = parseInt(heightInput.value);
                                    const weight = parseFloat(weightInput.value);

                                    if (selectedGender && height && weight) {
                                        const gender = selectedGender.value;
                                        const range = calculateIdealWeight(height, gender);

                                        // Update weight goal option and value
                                        if (weight < range.min) {
                                            fitnessGoalLabel.textContent = "Gain Weight";
                                            fitnessGoalInput.value = "Gain Weight";
                                        } else if (weight > range.max) {
                                            fitnessGoalLabel.textContent = "Lose Weight";
                                            fitnessGoalInput.value = "Lose Weight";
                                        } else {
                                            fitnessGoalLabel.textContent = "Maintain Weight";
                                            fitnessGoalInput.value = "Maintain Weight";
                                        }

                                        // Show weight range information
                                        if (fitnessGoalInput.checked) {
                                            expectedWeightContainer.classList.remove("hidden");
                                            expectedWeightText.textContent = `${range.min} - ${range.max} kg`;

                                            if (weight < range.min) {
                                                weightStatusText.textContent = "You are below the recommended weight range.";
                                                weightStatusText.classList.add("text-red-500");
                                                weightStatusText.classList.remove("text-orange-500", "text-green-500");
                                            } else if (weight > range.max) {
                                                weightStatusText.textContent = "You are above the recommended weight range.";
                                                weightStatusText.classList.add("text-orange-500");
                                                weightStatusText.classList.remove("text-red-500", "text-green-500");
                                            } else {
                                                weightStatusText.textContent = "You are within the recommended weight range.";
                                                weightStatusText.classList.add("text-green-500");
                                                weightStatusText.classList.remove("text-orange-500", "text-red-500");
                                            }
                                        } //else {
                                           // expectedWeightContainer.classList.add("hidden");
                                        //}
                                    }
                                }

                                // Event listeners
                                //fitnessGoalInput.addEventListener("change", updateWeightGoal);
                                fitnessGoalInputs.forEach(input => input.addEventListener("change", function() {
                                    // Hide weight container for all other fitness goals
                                    if (!fitnessGoalInput.checked) {
                                        expectedWeightContainer.classList.add("hidden");
                                    }
                                    updateWeightGoal();
                                }));
                                heightInput.addEventListener("input", updateWeightGoal);
                                weightInput.addEventListener("input", updateWeightGoal);
                                genderInputs.forEach(input => input.addEventListener("change", updateWeightGoal));
                            });
                            </script>

                            <!-- Fitness Level -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="fitness_level" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('What is your current fitness level?')" required="true" />

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