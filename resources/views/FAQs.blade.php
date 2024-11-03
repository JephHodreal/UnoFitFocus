<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAQs | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <style>
        /* Custom transition for accordion */
        [x-cloak] {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100">
    <main>
        <x-guest-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Frequently Asked Questions') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Find the answers to commonly asked questions here!') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <!-- Accordion FAQ Section -->
                <div class="w-full max-w-2xl mx-auto bg-white rounded-lg shadow-lg">
                    <div x-data="{ selected: null }">
                        <!-- FAQ Item 1 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 1 ? selected = 1 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __('What workouts are available on FitFocus?') }}</span>
                                <svg :class="selected == 1 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 1" x-transition x-cloak class="p-4 text-gray-600">
                                {{ __('FitFocus offers pose estimation for three bodyweight exercises: Push-Up, Squat, and Plank. Each exercise comprises of three difficulty levels (Beginner, Intermediate, Advanced) to enable progress and improvement over time.') }}
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 2 ? selected = 2 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __('How does FitFocus track my workout progress?') }}</span>
                                <svg :class="selected == 2 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 2" x-transition x-cloak class="p-4 text-gray-600">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 3 ? selected = 3 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">Question 3</span>
                                <svg :class="selected == 3 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 3" x-transition x-cloak class="p-4 text-gray-600">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 4 ? selected = 4 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">Question 4</span>
                                <svg :class="selected == 4 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 4" x-transition x-cloak class="p-4 text-gray-600">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 5 ? selected = 5 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">Question 5</span>
                                <svg :class="selected == 5 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 5" x-transition x-cloak class="p-4 text-gray-600">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 6 ? selected = 6 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">Question 6</span>
                                <svg :class="selected == 6 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 6" x-transition x-cloak class="p-4 text-gray-600">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('partials.footer')
        </x-guest-layout>
    </main>
</body>
</html>