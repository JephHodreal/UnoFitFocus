<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-guest-layout>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full lg:max-w-2xl sm:max-w-md px-6 py-6 mt-8 mb-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <!-- Step Indicator -->
                <div class="mb-8">
                    <div class="flex justify-center items-center space-x-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center" id="step1-indicator">1</div>
                        <div class="w-16 h-1 bg-gray-200"></div>
                        <div class="w-8 h-8 rounded-full flex items-center justify-center" id="step2-indicator">2</div>
                    </div>
                    <div class="flex justify-center mt-2">
                        <div class="w-full max-w-[11rem] flex justify-between">
                            <span class="text-sm -ml-1">Registration</span>
                            <span class="text-sm -mr-2">PAR-Q Form</span>
                        </div>
                    </div>
                </div>
        
                <form method="POST" action="{{ route('register') }}" id="registration-form">
                    @csrf
        
                    <!-- Step 1: Registration -->
                    <div id="step1">
                        <h2 class="font-bold text-3xl text-center text-gray-800 mb-2">{{ __('Register') }}</h2>
                        <p class="text-center text-gray-600 mb-6">{{ __('Create an account by filling out the details below') }}</p>
                        
                        <!-- Name Fields -->
                        <div class="flex space-x-4 mb-6">
                            <div class="w-1/3">
                                <x-input-label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" required="true">
                                    {{ __('First Name') }}
                                </x-input-label>
                                <x-text-input id="first_name" class="block mt-1 w-full" type="text" placeholder="First Name" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                            <div class="w-1/3">
                                <x-input-label for="middle_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Middle Name')" />
                                <x-text-input id="middle_name" class="block mt-1 w-full" type="text" placeholder="Middle Name" name="middle_name" :value="old('middle_name')" autocomplete="additional-name" />
                                <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                            </div>
                            <div class="w-1/3">
                                <x-input-label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3" required="true">
                                    {{ __('Last Name') }}
                                </x-input-label>
                                <x-text-input id="last_name" class="block mt-1 w-full" type="text" placeholder="Last Name" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                        </div>
        
                        <!-- Email -->
                        <div class="mb-6">
                            <x-input-label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3" required="true">
                                {{ __('Email') }}
                            </x-input-label>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="Email Address" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <p id="email-error" class="text-red-500 text-sm mt-2 hidden">{{ __('Please enter a valid email address.') }}</p>
                        </div>
        
                        <!-- Password -->
                        <div class="mb-6">
                            <x-input-label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3" required="true">
                                {{ __('Password') }}
                            </x-input-label>
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" 
                                placeholder="At least 8 characters, one uppercase letter, one lowercase letter, and one number" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <p id="password-error" class="text-red-500 text-sm mt-2 hidden">{{ __('Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.') }}</p>
                        </div>
        
                        <!-- Confirm Password -->
                        <div class="mb-6">
                            <x-input-label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 ml-3" required="true">
                                {{ __('Confirm Password') }}
                            </x-input-label>
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            <p id="confirm-password-error" class="text-red-500 text-sm mt-2 hidden">Passwords do not match.</p>
                        </div>
        
                        <!-- Navigation Buttons -->
                        <div class="flex justify-end mt-4">
                            <x-primary-button type="button" id="next-step" class="ms-4">
                                {{ __('Next') }}
                            </x-primary-button>
                        </div>
        
                        <!-- Google Sign Up -->
                        <div class="relative mt-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">OR</span>
                            </div>
                        </div>
        
                        <div class="flex justify-center mt-4">
                            <a href="{{ route('google.login') }}" class="w-1/2 max-w-sm mx-auto px-4 py-2 border flex gap-2 items-center justify-center bg-white border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow transition duration-150">
                                <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy" alt="google logo">
                                <span>{{ __('Sign Up with Google') }}</span>
                            </a>
                        </div>
        
                        <!-- Terms and Privacy -->
                        <div class="text-center mt-4 italic w-3/4 mx-auto text-sm text-gray-600">
                            <p>
                                {{ __('By creating an account, you agree to our') }}
                                <a href="{{ route('TermsAndConditions') }}" class="text-blue-600 hover:underline">
                                    {{ __('Terms and Conditions') }}
                                </a>
                                {{ __('and have read and acknowledged our') }}
                                <a href="{{ route('PrivacyPolicy') }}" class="text-blue-600 hover:underline">
                                    {{ __('Privacy Policy.') }}
                                </a>
                            </p>
                        </div>

                        <!-- Already Registered Link -->
                        <div class="text-center italic mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already have an account? Login here') }}
                            </a>
                        </div>
                    </div>
        
                    <!-- Step 2: PARQ Form -->
                    <div id="step2" class="hidden">
                        <h2 class="font-bold text-3xl text-center text-gray-800 mb-2">{{ __('PAR-Q Form') }}</h2>
                        <p class="text-center text-gray-600 mb-6">
                            {{ __('The PAR-Q is a simple self-screening tool used by fitness trainers and coaches to determine the safety or possible risks 
                            of exercising based on your health history, current symptoms, and risk factors. It also can help a personal trainer create an 
                            ideal exercise prescription for a client. All PAR-Q questions are designed to help uncover any potential health risks associated 
                            with exercise.') }}
                        </p>
        
                        @php
                        $questions = [
                            'heart_condition' => 'Has your doctor ever said that you have a heart condition and that you should only do physical activity recommended by a doctor?',
                            'chest_pain_phys' => 'Do you feel pain in your chest when you do physical activity?',
                            'chest_pain_non_phys' => 'In the past month, have you had chest pain when you were not doing physical activity?',
                            'balance_loss' => 'Do you lose your balance because of dizziness or do you ever lose consciousness?',
                            'bone_joint_problem' => 'Do you have a bone or joint problem that could be worsened by a change in your physical activity?',
                            'drug_prescrip' => 'Is your doctor currently prescribing drugs for your blood pressure or heart condition?',
                            'other_reason' => 'Do you know of any other reason why you should not do physical activity?'
                        ];
                        @endphp
        
                        @foreach($questions as $name => $question)
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <x-input-label for="{{ $name }}" class="block text-gray-700 text-sm font-bold mb-2 ml-3" required="true">
                                {{ __($question) }}
                            </x-input-label>
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center ps-3">
                                        <input id="{{ $name }}_yes" type="radio" value="Yes" name="{{ $name }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" required>
                                        <label for="{{ $name }}_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ __('Yes') }}</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                    <div class="flex items-center ps-3">
                                        <input id="{{ $name }}_no" type="radio" value="No" name="{{ $name }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" required>
                                        <label for="{{ $name }}_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ __('No') }}</label>
                                    </div>
                                </li>
                            </ul>
                            <x-input-error :messages="$errors->get($name)" class="mt-2" />
                        </div>
                        @endforeach
        
                        <!-- Warning Message and Checkbox -->
                        <div id="parq-warning" class="hidden mt-6 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700">
                            <p class="font-medium">
                                {{ __('You answered "Yes" to at least one of the questions in the PAR-Q form. FitFocus will involve your participation in undergoing physical activity. Do you wish to proceed?') }}
                            </p>
                            <p class="font-light">
                                {{ __('Don\'t worry! You can still try out the workouts even if you answered Yes to the above questions.') }}
                            </p>
                            <div class="mt-4 flex items-center">
                                <input type="checkbox" id="parq-agreement" name="parq_agreement" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <x-input-label for="parq-agreement" class="ml-2 text-sm text-gray-700" required="true">{{ __('I understand and agree to continue using FitFocus.') }}</x-input-label>
                                <x-input-error :messages="$errors->get('parq_agreement')" class="mt-2" />
                            </div>
                        </div>
        
                        <!-- Navigation Buttons -->
                        <div class="flex justify-between mt-4">
                            <x-secondary-button type="button" id="prev-step">
                                {{ __('Previous') }}
                            </x-secondary-button>
                            <x-primary-button type="submit">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-guest-layout>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const step1Indicator = document.getElementById('step1-indicator');
            const step2Indicator = document.getElementById('step2-indicator');
            const nextButton = document.getElementById('next-step');
            const prevButton = document.getElementById('prev-step');
            const parqWarning = document.getElementById('parq-warning');
            const parqAgreement = document.getElementById('parq-agreement');
            const parqQuestions = document.querySelectorAll('input[type="radio"]');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');
            const confirmPasswordError = document.getElementById('confirm-password-error');

            // Initialize indicators
            step1Indicator.classList.add('bg-blue-600', 'text-white');
            step2Indicator.classList.add('bg-gray-200');

            // Email validation regex
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Password validation regex
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\S]{8,}$/;

            // Function to validate email
            function validateEmail() {
                if (!emailRegex.test(emailInput.value)) {
                    emailError.classList.remove('hidden');
                    return false;
                } else {
                    emailError.classList.add('hidden');
                    return true;
                }
            }

            // Function to validate password
            function validatePassword() {
                if (!passwordRegex.test(passwordInput.value)) {
                    passwordError.classList.remove('hidden');
                    return false;
                } else {
                    passwordError.classList.add('hidden');
                    return true;
                }
            }

            // Function to validate confirm password
            function validateConfirmPassword() {
                if (passwordInput.value !== confirmPasswordInput.value) {
                    confirmPasswordError.classList.remove('hidden');
                    return false;
                } else {
                    confirmPasswordError.classList.add('hidden');
                    return true;
                }
            }

            nextButton.addEventListener('click', function() {
                const isEmailValid = validateEmail();
                const isPasswordValid = validatePassword();
                const isConfirmPasswordValid = validateConfirmPassword();
                const requiredFields = step1.querySelectorAll('input[required]');
                let isFormValid = true;

                requiredFields.forEach(field => {
                    if (!field.value) {
                        isFormValid = false;
                        field.classList.add('border-red-500');
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });

                // Proceed to the next step only if all validations pass
                if (isFormValid && isEmailValid && isPasswordValid && isConfirmPasswordValid) {
                    step1.classList.add('hidden');
                    step2.classList.remove('hidden');
                    step1Indicator.classList.remove('bg-blue-600');
                    step1Indicator.classList.add('bg-gray-200');
                    step2Indicator.classList.remove('bg-gray-200');
                    step2Indicator.classList.add('bg-blue-600', 'text-white');
                }
            });

            prevButton.addEventListener('click', function() {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');
                step2Indicator.classList.remove('bg-blue-600', 'text-white');
                step2Indicator.classList.add('bg-gray-200');
                step1Indicator.classList.remove('bg-gray-200');
                step1Indicator.classList.add('bg-blue-600', 'text-white');
            });

            // Real-time validation for email
            emailInput.addEventListener('input', validateEmail);

            // Real-time validation for password
            passwordInput.addEventListener('input', function() {
                validatePassword();
                validateConfirmPassword(); // Also validate confirm password when password changes
            });

            // Real-time validation for confirm password
            confirmPasswordInput.addEventListener('input', validateConfirmPassword);

            // Function to check if any question has a "Yes" answer
            function checkForYesAnswers() {
                // Get all checked radio inputs
                const checkedAnswers = document.querySelectorAll('input[type="radio"]:checked');
                
                // Check if any of the checked answers is "Yes"
                const hasYesAnswer = Array.from(checkedAnswers).some(answer => answer.value === "Yes");
                
                // Show/hide warning and set checkbox requirement based on answers
                if (hasYesAnswer) {
                    parqWarning.classList.remove('hidden');
                    parqAgreement.required = true;
                } else {
                    parqWarning.classList.add('hidden');
                    parqAgreement.required = false;
                }
            }

            // Add change event listener to all radio buttons
            parqQuestions.forEach(question => {
                question.addEventListener('change', checkForYesAnswers);
            });
        });
    </script>
</body>
</html>