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
                                <span class="text-lg font-semibold text-gray-900">How do I create a profile on FitFocus?</span>
                                <svg :class="selected == 1 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 1" x-transition x-cloak class="p-4 text-gray-600">
                                To create a profile, click on the ‘Profile’ section in your dashboard and fill in the required information like weight, height, and gender. You can update this information at any time.
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 2 ? selected = 2 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">What workouts are available on FitFocus?</span>
                                <svg :class="selected == 2 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 2" x-transition x-cloak class="p-4 text-gray-600">
                                FitFocus offers three primary workouts: Push-Ups, Squats, and Planks, each with beginner, intermediate, and advanced difficulty levels. You can track your progress and improve over time.
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 3 ? selected = 3 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">How does FitFocus track my workout progress?</span>
                                <svg :class="selected == 3 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 3" x-transition x-cloak class="p-4 text-gray-600">
                                FitFocus uses human pose estimation to evaluate your workout posture in real-time and records your scores based on performance accuracy. Your scores are stored and displayed on the dashboard so you can monitor improvements.
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 4 ? selected = 4 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">Can I reset my workout progress?</span>
                                <svg :class="selected == 4 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 4" x-transition x-cloak class="p-4 text-gray-600">
                                Yes, you can reset your workout progress by visiting your profile settings and choosing the ‘Reset Progress’ option. This will clear your current scores, but your workout history will remain intact.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-gray-800 text-white py-6">
                <div class="container mx-auto text-center">
                    <p>&copy; 2024 FitFocus. All Rights Reserved.</p>
                    <ul class="flex justify-center space-x-6 mt-4">
                        <li><a href="#terms" class="hover:underline">Terms of Service</a></li>
                        <li><a href="#privacy" class="hover:underline">Privacy Policy</a></li>
                    </ul>
                </div>
            </footer>
        </x-guest-layout>
    </main>
</body>
</html>