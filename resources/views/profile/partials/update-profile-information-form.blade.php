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
            
        <div>
            <x-input-label for="name" :value="__('First Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $userInfo->first_name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="middle_name" :value="__('Middle Name')" />
            <x-text-input id="middle_name" name="middle_name" type="text" class="mt-1 block w-full" :value="old('middle_name', $userInfo->middle_name)" required autocomplete="middle_name" />
            <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $userInfo->last_name)" required autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

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
                        <label for="gender_man" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Man </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="gender_woman" type="radio" value="Woman" name="gender" {{ $userInfo->gender === 'Woman' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="gender_woman" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Woman</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="gender_gqnb" type="radio" value="Genderqueer/Non-binary" name="gender" {{ $userInfo->gender === 'Genderqueer/Non-binary' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="gender_gqnb" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Genderqueer/Non-binary</label>
                    </div>
                </li>
            </ul>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
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

{{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script> --}}
<script>
    document.getElementById('cancel-edit-btn').addEventListener('click', function() {
        // Hide the password edit form and show the view-only mode (if applicable)
        document.getElementById('profile-edit').style.display = 'none';
        document.getElementById('profile-view').style.display = 'block';
    });
</script>
</body>