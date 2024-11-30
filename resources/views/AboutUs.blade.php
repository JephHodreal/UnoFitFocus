<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body>
    <main>
        <x-guest-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('About Us') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Learn more about FitFocus here!') }}
                </h2>
            </x-slot>

            <!-- About Section -->
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-10">{{ __('What We Do') }}</h2>
                        <div class="container mx-auto gap-4 flex flex-col lg:flex-row items-center pb-4">
                            <div class="lg:w-1/2 mb-8 lg:mb-0">
                                <p class="text-lg text-justify mb-6">FitFocus uses advanced technology to analyze your posture in real time during key bodyweight exercises like push-ups, squats, and planks. Our goal is to help you perfect your form, reduce injury risks, and maximize workout efficiency.</p>
                                <div class="p-6 rounded-lg">
                                    <h3 class="text-2xl font-semibold mb-4">Key Features</h3>
                                    <ul class="list-disc list-inside text-left">
                                        <li>Real-time posture estimation</li>
                                        <li>Personalized workout experience</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lg:w-1/2">
                                <img src="../assets/images/workout.jpg" alt="FitFocus in Action" class="w-full rounded-lg shadow-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- How to use FitFocus section -->
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-10">{{ __('How to use FitFocus') }}</h2>
                        <div class="container mx-auto gap-4 flex flex-col lg:flex-row items-center pb-4">
                            <div class="lg:w-1/2">
                                <img src="../assets/images/workout.jpg" alt="FitFocus in Action" class="w-full rounded-lg shadow-lg">
                            </div>
                            <div class="lg:w-1/2 mb-8 lg:mb-0">
                                <p class="text-lg text-justify mb-6">{{ __('FitFocus allows you to create your own account to save your workout data, wherein you can view your workout history and see your progress. Through our FitCheck, you would be able to perform bodyweight exercises with the proper posture.') }}</p>
                                <div class="p-6 rounded-lg">
                                    <h3 class="text-2xl font-semibold mb-4">{{ __('Experience FitFocus by following these steps:') }}</h3>
                                    <ul class="list-disc list-inside text-left">
                                        <li>Register for an account and log in</li>
                                        <li>Visit the FitCheck tab and select your desired workout and difficulty</li>
                                        <li>Perform the workout in front of your camera and meet the listed objective</li>
                                        <li>Complete the objective to receive your score</li>
                                        <li>View your stats and sessions through the Dashboard and Workout History</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Developers Section -->
            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white px-6 py-10 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="container mx-auto text-center">
                            <h2 class="text-3xl font-bold mb-12">Meet the Developers</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                    <img src="../assets/images/ResearcherJeph.png" alt="Developer 1" class="w-32 h-32 rounded-full mx-auto mb-4">
                                    <h3 class="text-xl font-semibold">Jeph Hodreal</h3>
                                    <p class="text-gray-600">Lead Developer & Project Manager</p>
                                </div>
                                <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                    <img src="../assets/images/ResearcherMags.png" alt="Developer 2" class="w-32 h-32 rounded-full mx-auto mb-4">
                                    <h3 class="text-xl font-semibold">Magallanes Jr. Butuhan</h3>
                                    <p class="text-gray-600">Machine Learning Engineer & Backend Developer</p>
                                </div>
                                <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                    <img src="../assets/images/ResearcherPrincess.jpg" alt="Developer 3" class="w-32 h-32 rounded-full mx-auto mb-4">
                                    <h3 class="text-xl font-semibold">Princess Martinez</h3>
                                    <p class="text-gray-600">Dataset Collector & Researcher</p>
                                </div>
                                <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                    <img src="../assets/images/ResearcherMonique.png" alt="Developer 4" class="w-32 h-32 rounded-full mx-auto mb-4">
                                    <h3 class="text-xl font-semibold">Monique Burilla</h3>
                                    <p class="text-gray-600">Researcher & Documentation Specialist</p>
                                </div>
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