<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body>
    <main>
        <x-guest-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('FitFocus') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Revolutionizing bodyweight workouts through posture correction powered by human pose estimation.') }}
                </h2>
            </x-slot>

            <div class="py-6">
                <div class="hero-section bg-cover bg-fixed bg-center text-white text-center flex justify-center items-center" style="background-image: url({{ asset('../assets/images/homehero.PNG') }}); height: 75vh;">
                    <div class="hero-content max-w-3xl mx-auto text-center animate-fadeIn">
                        <h2 class="text-4xl font-semibold mb-5 tracking-wider font-poppins">Welcome to FitFocus!</h2>
                        <p class="text-xl font-light mb-7 leading-relaxed font-roboto">Your journey towards a healthier, fitter you starts here.</p>
                        @guest
                            <a href="{{ route('register') }}" class="text-white bg-gradient-to-r from-pink-500 to-yellow-400 px-8 py-3 rounded-full uppercase font-semibold shadow-lg transition duration-300 ease-in-out hover:bg-gradient-to-l hover:shadow-xl transform hover:-translate-y-1">Get Started</a>
                        @endguest
                        @auth
                            <a href="{{ route('Workout') }}" class="text-white bg-gradient-to-r from-pink-500 to-yellow-400 px-8 py-3 rounded-full uppercase font-semibold shadow-lg transition duration-300 ease-in-out hover:bg-gradient-to-l hover:shadow-xl transform hover:-translate-y-1">Get Started</a>
                        @endauth
                    </div>
                </div>
                
                <!--Features section -->
                <div class="overall-feats py-6">
                    <div class="section-title text-center mb-8">
                        <h2 class="text-4xl">{{ __('Features') }}</h2>
                    </div>
                    <div class="feats grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                        <div class="per-feat relative bg-gray-800 p-6 text-center h-64 overflow-hidden group">
                            <div class="off absolute inset-0 overflow-hidden">
                                <img src="../assets/images/feature1.PNG" alt="FitFocus offers workout variety" class="object-cover w-full h-full transition-transform duration-300 ease-in-out group-hover:scale-125">
                            </div>
                            <div class="feat-type absolute inset-0 flex flex-col justify-center items-center text-2xl">
                                <span class="font-bold">{{ __('Workout Variety') }}</span>
                                <div class="test-row text-base font-normal text-center">{{ __('Different bodyweight exercises to choose from.') }}</div>
                            </div>
                        </div>
                
                        <div class="per-feat relative bg-gray-800 p-6 text-center h-64 overflow-hidden group">
                            <div class="off absolute inset-0 overflow-hidden">
                                <img src="../assets/images/feature2.PNG" alt="FitFocus provides live feedback." class="object-cover w-full h-full transition-transform duration-300 ease-in-out group-hover:scale-125">
                            </div>
                            <div class="feat-type absolute inset-0 flex flex-col justify-center items-center text-2xl">
                                <span class="font-bold">{{ __('Live Feedback') }}</span>
                                <div class="test-row text-base font-normal text-center">{{ __('Realtime form assessment during workouts.') }}</div>
                            </div>
                        </div>
                
                        <div class="per-feat relative bg-gray-800 p-6 text-center h-64 overflow-hidden group">
                            <div class="off absolute inset-0 overflow-hidden">
                                <img src="../assets/images/feature3.PNG" alt="FitFocus allows for convenient workouts." class="object-cover w-full h-full transition-transform duration-300 ease-in-out group-hover:scale-125">
                            </div>
                            <div class="feat-type absolute inset-0 flex flex-col justify-center items-center text-2xl">
                                <span class="font-bold">{{ __('Convenient Use') }}</span>
                                <div class="test-row text-base font-normal text-center">{{ __('Use anytime, anywhere.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                @include('partials.footer')
            </div>
        </x-guest-layout>    
    </main>
</body>
</html>