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
        .accordion-content {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 200ms;
        }
        .accordion-content.expanding {
            overflow: hidden;
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

            <div class="py-12 bg-cover bg-fixed bg-center" style="background-image: url({{ asset('../assets/images/homehero.PNG') }});">
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
                            <div x-show="selected == 1" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600 text-pretty text-justify">
                                {{ __("FitFocus offers pose estimation for three bodyweight exercises: Push-Up, Squat, and Plank. Each exercise 
                                comprises of three difficulty levels (Beginner, Intermediate, Advanced) to enable progress and improvement over 
                                time. Bodyweight exercises were selected due to their minimal use of equipment, making them accessible to anyone. 
                                ") }}
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
                            <div x-show="selected == 2" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600 text-pretty text-justify">
                                {{ __("FitFocus uses human pose estimation to check your posture and record a score based on your accuracy. Each 
                                workout session is saved in your workout history and your statistics are displayed on the dashboard to show your 
                                progress.") }}
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 3 ? selected = 3 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900"> {{ __('What do I gain from using FitFocus?') }} </span>
                                <svg :class="selected == 3 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 3" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600 text-pretty text-justify">
                                {{ __("FitFocus ensures you can exercise anytime, anywhere without compromising safety by allowing you to maintain 
                                proper posture during your workouts. This reduces the risk of muscle strain, fatigue, or injury caused by improper 
                                form. Furthermore, FitFocus enables you to work out without another person's supervision, thus providing you the 
                                luxury of privacy and comfort.") }}
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 4 ? selected = 4 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __('Will a recording of my workout session be saved?') }}</span>
                                <svg :class="selected == 4 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 4" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600 text-pretty text-justify">
                                {{ __("No, the video of your workout session will not be recorded. FitFocus only records the context and outcomes 
                                of your workout such as your score, workout performed, difficulty level, and date and time of workout.") }}
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 5 ? selected = 5 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __('How far away do I need to be from the camera?') }}</span>
                                <svg :class="selected == 5 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 5" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600 text-pretty text-justify">
                                {{ __("Please make sure your full body is captured by being at least four feet away from the camera. Move closer/
                                further if needed.") }}
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 6 ? selected = 6 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __('How accurate is FitFocus?') }}</span>
                                <svg :class="selected == 6 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 6" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600 text-pretty text-justify">
                                {{ __("FitFocus's human pose estimation has been trained to detect and analyze your posture up to 85% accuracy.") }}
                            </div>
                        </div>

                        <!-- FAQ Item 7 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 7 ? selected = 7 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __('Do I need to pay to use FitFocus?') }}</span>
                                <svg :class="selected == 7 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 7" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600 text-pretty text-justify">
                                {{ __("No, FitFocus is completely free. All you need to do is register for an account, establish your details, 
                                and you're all set!") }}
                            </div>
                        </div>
 
                        <!-- FAQ Item 8 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 8 ? selected = 8 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __("Wouldn't hybrid training cause the interference effect?") }}</span>
                                <svg :class="selected == 8 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 8" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600 text-pretty text-justify">
                                {{ __("Hybrid training refers to training that combines muscle strength and muscle endurance workouts 
                                to improve one's performance in both health-related components. The interference effect is a phenomenon 
                                in which different types of exercise training can interfere with each other, leading to a reduction in 
                                performance or progress in one or both forms of exercise. Although the interference effect exists, more 
                                recent studies show that moderate amounts of combined muscle strength and endurance workouts can make 
                                this effect negligible. This means that you can become well-rounded if you include both types of training 
                                in your workouts.") }}
                            </div>
                        </div>

                        {{-- <!-- FAQ Item 9 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 9 ? selected = 9 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __("") }}</span>
                                <svg :class="selected == 9 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 9" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600">
                                {{ __("") }}
                            </div>
                        </div> --}}

                        {{-- <!-- FAQ Item 10 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 10 ? selected = 10 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __("") }}</span>
                                <svg :class="selected == 10 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 10" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600">
                                {{ __("") }}
                            </div>
                        </div> --}}

                        {{-- <!-- FAQ Item 11 -->
                        <div class="border-b border-gray-200">
                            <h2 @click="selected !== 11 ? selected = 11 : selected = null" class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-100">
                                <span class="text-lg font-semibold text-gray-900">{{ __("") }}</span>
                                <svg :class="selected == 11 ? 'rotate-180' : ''" class="h-5 w-5 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </h2>
                            <div x-show="selected == 11" x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="transform opacity-0 -translate-y-4"
                                 x-transition:enter-end="transform opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="transform opacity-100 translate-y-0"
                                 x-transition:leave-end="transform opacity-0 -translate-y-4" x-cloak class="p-4 text-gray-600">
                                {{ __("") }}
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('partials.footer')
        </x-guest-layout>
    </main>
</body>
</html>