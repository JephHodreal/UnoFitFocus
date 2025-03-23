<body>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
            
        <!-- First Name -->
        <div>
            <x-input-label for="name" :value="__('First Name')" required="true" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $userInfo->first_name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Middle Name -->
        <div>
            <x-input-label for="middle_name" :value="__('Middle Name')" />
            <x-text-input id="middle_name" name="middle_name" type="text" class="mt-1 block w-full" :value="old('middle_name', $userInfo->middle_name)" autocomplete="middle_name" />
            <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="last_name" :value="__('Last Name')" required="true" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $userInfo->last_name)" required autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" required="true" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Age -->
        <div>
            <x-input-label for="age" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Age')" required="true" />
            <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age', $userInfo->age)" required autocomplete="age" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <!-- Height -->
        <div>
            <x-input-label for="height" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Height (in cm)')" required="true" />
            <x-text-input id="height" class="block mt-1 w-full" type="text" name="height" :value="old('height', $userInfo->height)" required autocomplete="Height" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" />
            <x-input-error :messages="$errors->get('height')" class="mt-2" />
        </div>

        <!-- Weight -->
        <div>
            <x-input-label for="weight" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Weight (in kg)')" required="true" />
            <x-text-input id="weight" class="block mt-1 w-full" type="text" name="weight" :value="old('weight', $userInfo->weight)" required autocomplete="Weight" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" />
            <x-input-error :messages="$errors->get('weight')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('I identify my gender as ...')" required="true" />
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="gender_man" type="radio" value="Man" name="gender" {{ $userInfo->gender === 'Man' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                        <label for="gender_man" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('Man') }} </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="gender_woman" type="radio" value="Woman" name="gender" {{ $userInfo->gender === 'Woman' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                        <label for="gender_woman" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('Woman') }} </label>
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
                        <input id="goal_weight_change" type="radio" value="" name="fitness_goal" {{ $userInfo->fitness_goal === 'Lose Weight' || $userInfo->fitness_goal === 'Gain Weight' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                        <label id="goal_weight_change_label" for="goal_weight_change" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Weight Goal') }}</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="goal_consistent_schedule" type="radio" value="Have a Consistent Workout Schedule" name="fitness_goal" {{ $userInfo->fitness_goal === 'Have a Consistent Workout Schedule' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                        <label for="goal_consistent_schedule" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Have a Consistent Workout Schedule') }}</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="goal_bodyweight_training" type="radio" value="Improve in Bodyweight Training" name="fitness_goal" {{ $userInfo->fitness_goal === 'Improve in Bodyweight Training' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
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
                <div class="absolute invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300 bottom-full left-3 mb-2 w-5/6 bg-gray-900 text-white text-sm rounded-lg p-4 shadow-lg">
                    <div class="relative z-20">
                        <p class="leading-tight">
                            These values are based off on the combination of Hamwi, G. J. (1964), Devine, B. J. (1974), Robinson, J. D., & Miller, D. R.'s formulas for finding a person's ideal weight.
                        </p>
                        <div class="absolute w-3 h-3 bg-gray-900 transform rotate-45 left-4 -bottom-1.5 z-10"></div>
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

            function cmToInchesOver5Feet(heightCm) {
                const totalInches = heightCm / 2.54;
                return Math.max(0, totalInches - 60);
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

                const minWeight = Math.min(...weights);
                const maxWeight = Math.max(...weights);

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
                    } else {
                        expectedWeightContainer.classList.add("hidden");
                    }
                }
            }

            // Event listeners
            const fitnessGoalInputs = document.querySelectorAll('input[name="fitness_goal"]');

            // Add event listeners to all fitness goal inputs
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

            // Initial calculation on page load
            updateWeightGoal();
        });
        </script>

        <!-- Fitness Level -->
        <div>
            <x-input-label for="fitness_level" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('What is your current fitness level?')" required="true" />
            <div class="grid grid-cols-3 gap-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <!-- Beginner -->
                <label for="level_beginner" class="flex flex-col items-center text-center py-4 px-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="level_beginner" type="radio" value="Beginner" name="fitness_level" {{ $userInfo->fitness_level === 'Beginner' ? 'checked' : '' }} class="w-5 h-5 mb-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                    <span class="block text-base font-medium text-gray-900 dark:text-gray-300">{{ __('Beginner') }}</span>
                    <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                        <span class="font-bold">Criteria:</span> No or little prior experience, learning the basics of exercise, and just starting out.
                    </p>
                </label>

                <!-- Intermediate -->
                <label for="level_intermediate" class="flex flex-col items-center text-center py-4 px-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="level_intermediate" type="radio" value="Intermediate" name="fitness_level" {{ $userInfo->fitness_level === 'Intermediate' ? 'checked' : '' }} class="w-5 h-5 mb-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                    <span class="block text-base font-medium text-gray-900 dark:text-gray-300">{{ __('Intermediate') }}</span>
                    <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                        <span class="font-bold">Criteria:</span> Comfortable with basic exercises, able to maintain a consistent routine, and looking for improvement.
                    </p>
                </label>

                <!-- Advanced -->
                <label for="level_advanced" class="flex flex-col items-center text-center py-4 px-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="level_advanced" type="radio" value="Advanced" name="fitness_level" {{ $userInfo->fitness_level === 'Advanced' ? 'checked' : '' }} class="w-5 h-5 mb-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                    <span class="block text-base font-medium text-gray-900 dark:text-gray-300">{{ __('Advanced') }}</span>
                    <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                        <span class="font-bold">Criteria:</span> Proficient in various exercises, well-versed in fitness routines, and aiming for peak performance.
                    </p>
                </label>
            </div>
            <x-input-error :messages="$errors->get('fitness_level')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-secondary-button id="cancel-edit-btn" class="px-4 py-2 rounded-md hover:bg-gray-600 hover:text-white">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    document.getElementById('cancel-edit-btn').addEventListener('click', function() {
        // Hide the password edit form and show the view-only mode (if applicable)
        document.getElementById('profile-edit').style.display = 'none';
        document.getElementById('profile-view').style.display = 'block';
    });
</script>
</body>