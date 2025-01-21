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
            <x-input-label for="name" :value="__('First Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $userInfo->first_name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Middle Name -->
        <div>
            <x-input-label for="middle_name" :value="__('Middle Name')" />
            <x-text-input id="middle_name" name="middle_name" type="text" class="mt-1 block w-full" :value="old('middle_name', $userInfo->middle_name)" required autocomplete="middle_name" />
            <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $userInfo->last_name)" required autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
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
            <x-input-label for="age" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age', $userInfo->age)" required autocomplete="age" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <!-- Height -->
        <div>
            <x-input-label for="height" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Height (in cm)')" />
            <x-text-input id="height" class="block mt-1 w-full" type="text" name="height" :value="old('height', $userInfo->height)" required autocomplete="Height" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
            <x-input-error :messages="$errors->get('height')" class="mt-2" />
        </div>

        <!-- Weight -->
        <div>
            <x-input-label for="weight" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Weight (in kg)')" />
            <x-text-input id="weight" class="block mt-1 w-full" type="text" name="weight" :value="old('weight', $userInfo->weight)" required autocomplete="Weight" oninput="this.value = this.value.replace(/[^0-9/]/g, '')" />
            <x-input-error :messages="$errors->get('weight')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('I identify my gender as ...')" />
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="gender_man" type="radio" value="Man" name="gender" {{ $userInfo->gender === 'Man' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="gender_man" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('Man') }} </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="gender_woman" type="radio" value="Woman" name="gender" {{ $userInfo->gender === 'Woman' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="gender_woman" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('Woman') }} </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="gender_gqnb" type="radio" value="Genderqueer/Non-binary" name="gender" {{ $userInfo->gender === 'Genderqueer/Non-binary' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="gender_gqnb" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('Genderqueer/Non-binary')}} </label>
                    </div>
                </li>
            </ul>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Fitness Goal -->
        <div>
            <x-input-label for="fitness_goal" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('My current fitness goal is to ...')" />
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="goal_lose_weight" type="radio" value="Lose Weight" name="fitness_goal" {{ $userInfo->fitness_goal === 'Lose Weight' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="goal_lose_weight" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Lose Weight') }} </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="goal_consistent_schedule" type="radio" value="Have a Consistent Workout Schedule" name="fitness_goal" {{ $userInfo->fitness_goal === 'Have a Consistent Workout Schedule' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="goal_consistent_schedule" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('Have a Consistent Workout Schedule') }} </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="goal_bodyweight_training" type="radio" value="Improve in Bodyweight Training" name="fitness_goal" {{ $userInfo->fitness_goal === 'Improve in Bodyweight Training' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="goal_bodyweight_training" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('Improve in Bodyweight Training') }} </label>
                    </div>
                </li>
            </ul>
            <x-input-error :messages="$errors->get('fitness_goal')" class="mt-2" />
        </div>

        <!-- Fitness Level -->
        <div>
            <x-input-label for="fitness_level" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('What is your current fitness level?')" />
            <div class="grid grid-cols-3 gap-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <!-- Beginner -->
                <label for="level_beginner" class="flex flex-col items-center text-center py-4 px-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="level_beginner" type="radio" value="Beginner" name="fitness_level" {{ $userInfo->fitness_level === 'Beginner' ? 'checked' : '' }} class="w-5 h-5 mb-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <span class="block text-base font-medium text-gray-900 dark:text-gray-300">{{ __('Beginner') }}</span>
                    <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                        <span class="font-bold">Criteria:</span> No or little prior experience, learning the basics of exercise, and just starting out.
                    </p>
                </label>

                <!-- Intermediate -->
                <label for="level_intermediate" class="flex flex-col items-center text-center py-4 px-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="level_intermediate" type="radio" value="Intermediate" name="fitness_level" {{ $userInfo->fitness_level === 'Intermediate' ? 'checked' : '' }} class="w-5 h-5 mb-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <span class="block text-base font-medium text-gray-900 dark:text-gray-300">{{ __('Intermediate') }}</span>
                    <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                        <span class="font-bold">Criteria:</span> Comfortable with basic exercises, able to maintain a consistent routine, and looking for improvement.
                    </p>
                </label>

                <!-- Advanced -->
                <label for="level_advanced" class="flex flex-col items-center text-center py-4 px-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="level_advanced" type="radio" value="Advanced" name="fitness_level" {{ $userInfo->fitness_level === 'Advanced' ? 'checked' : '' }} class="w-5 h-5 mb-2 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <span class="block text-base font-medium text-gray-900 dark:text-gray-300">{{ __('Advanced') }}</span>
                    <p class="mt-2 text-xs text-gray-600 dark:text-gray-400">
                        <span class="font-bold">Criteria:</span> Proficient in various exercises, well-versed in fitness routines, and aiming for peak performance.
                    </p>
                </label>
            </div>
            <x-input-error :messages="$errors->get('fitness_level')" class="mt-2" />
        </div>

        <!-- Health Condition -->
        <div>
            <x-input-label for="health_condition" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('My current fitness goal is to ...')" />
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="health_yes" type="radio" value="Yes" name="health_condition" {{ $userInfo->health_condition === 'Yes' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="health_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Yes') }} </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="health_no" type="radio" value="No" name="health_condition" {{ $userInfo->health_condition === 'No' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="health_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('No') }} </label>
                    </div>
                </li>
            </ul>
            <x-input-error :messages="$errors->get('health_condition')" class="mt-2" />
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