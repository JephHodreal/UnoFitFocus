<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Physical Activity Readiness Questionnaire | FitFocus</title>
</head>
<body>
    <main>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Physical Activity Readiness Questionnaire') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __("Make sure you're ready to work out!") }}
                </h2>
            </x-slot>
            <div class="py-12 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-100">
                <div class="w-full lg:max-w-2xl sm:max-w-md px-6 py-6 mt-8 mb-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <p class="text-center text-gray-600 mb-6">
                            {{ __("The PAR-Q is a simple self-screening tool used by fitness trainers and coaches to determine the safety or possible risks 
                            of exercising based on your health history, current symptoms, and risk factors. It also can help a personal trainer create an 
                            ideal exercise prescription for a client. All PAR-Q questions are designed to help uncover any potential health risks associated 
                            with exercise. The most serious potential risk of intense exercise is a heart attack or other sudden cardiac event in someone with 
                            undiagnosed heart conditions.") }}
                        </p>
                        <form method="POST" action="{{ route('parq.update') }}" enctype="multipart/form-data">
                            @csrf
                    
                            <!-- PARQ Question 1 -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="heart_condition" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Has your doctor ever said that you have a heart condition and that you should only do physical activity recommended by a doctor?')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ1_yes" type="radio" value="Yes" name="heart_condition" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ1_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Yes') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ1_no" type="radio" value="No" name="heart_condition" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ1_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('No') }}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('heart_condition')" class="mt-2" />
                            </div>

                            <!-- PARQ Question 2 -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="chest_pain_phys" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Do you feel pain in your chest when you do physical activity?')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ2_yes" type="radio" value="Yes" name="chest_pain_phys" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ2_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Yes') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ2_no" type="radio" value="No" name="chest_pain_phys" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ2_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('No') }}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('chest_pain_phys')" class="mt-2" />
                            </div>

                            <!-- PARQ Question 3 -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="chest_pain_non_phys" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('In the past month, have you had chest pain when you were not doing physical activity?')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ3_yes" type="radio" value="Yes" name="chest_pain_non_phys" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ3_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Yes') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ3_no" type="radio" value="No" name="chest_pain_non_phys" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ3_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('No') }}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('chest_pain_non_phys')" class="mt-2" />
                            </div>

                            <!-- PARQ Question 4 -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="balance_loss" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Do you lose your balance because of dizziness or do you ever lose consciousness?')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ4_yes" type="radio" value="Yes" name="balance_loss" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ4_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Yes') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ4_no" type="radio" value="No" name="balance_loss" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ4_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('No') }}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('balance_loss')" class="mt-2" />
                            </div>

                            <!-- PARQ Question 5 -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="bone_joint_problem" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Do you have a bone or joint problem that could be worsened by a change in your physical activity?')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ5_yes" type="radio" value="Yes" name="bone_joint_problem" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ5_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Yes') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ5_no" type="radio" value="No" name="bone_joint_problem" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ5_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('No') }}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('bone_joint_problem')" class="mt-2" />
                            </div>

                            <!-- PARQ Question 6 -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="drug_prescrip" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Is your doctor currently prescribing drugs (for example, water pills) for your blood pressure or heart condition?')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ6_yes" type="radio" value="Yes" name="drug_prescrip" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ6_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Yes') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ6_no" type="radio" value="No" name="drug_prescrip" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ6_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('No') }}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('drug_prescrip')" class="mt-2" />
                            </div>

                            <!-- PARQ Question 7 -->
                            <div class="mb-6 pt-3 rounded bg-gray-200">
                                <x-input-label for="other_reason" class="block text-gray-700 text-sm font-bold mb-2 ml-3" :value="__('Do you know of any other reason why you should not do physical activity?')" />
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ7_yes" type="radio" value="Yes" name="other_reason" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ7_yes" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Yes') }}</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="PARQ7_no" type="radio" value="No" name="other_reason" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                                            <label for="PARQ7_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('No') }}</label>
                                        </div>
                                    </li>
                                </ul>
                                <x-input-error :messages="$errors->get('other_reason')" class="mt-2" />
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