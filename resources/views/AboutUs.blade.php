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
                    {{ __('FitFocus') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Revolutionizing bodyweight workouts through posture correction powered by human pose estimation.') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <!-- About Section -->
                <section class="py-16 bg-gray-100">
                    <div class="container mx-auto flex flex-col lg:flex-row items-center">
                        <div class="lg:w-1/2 mb-8 lg:mb-0">
                            <h2 class="text-3xl font-bold mb-4">What We Do</h2>
                            <p class="text-lg mb-6">FitFocus uses advanced technology to analyze your posture in real time during key bodyweight exercises like squats, push-ups, and crunches. Our goal is to help you perfect your form, reduce injury risks, and maximize workout efficiency.</p>
                            <div class="bg-white shadow-lg p-6 rounded-lg">
                                <h3 class="text-2xl font-semibold mb-4">Key Features</h3>
                                <ul class="list-disc list-inside text-left">
                                    <li>Real-time posture correction</li>
                                    <li>Pose estimation for accuracy</li>
                                    <li>Personalized workout feedback</li>
                                </ul>
                            </div>
                        </div>
                        <div class="lg:w-1/2">
                            <img src="../assets/images/workout.jpg" alt="FitFocus in Action" class="w-full rounded-lg shadow-lg">
                        </div>
                    </div>
                </section>

                <!-- Developers Section -->
                <section class="py-16 bg-white">
                    <div class="container mx-auto text-center">
                        <h2 class="text-3xl font-bold mb-12">Meet the Developers</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                <img src="../assets/images/placeholder.png" alt="Developer 1" class="w-32 h-32 rounded-full mx-auto mb-4">
                                <h3 class="text-xl font-semibold">Jeph Hodreal</h3>
                                <p class="text-gray-600">Lead Developer & Project Manager</p>
                            </div>
                            <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                <img src="../assets/images/placeholder.png" alt="Developer 2" class="w-32 h-32 rounded-full mx-auto mb-4">
                                <h3 class="text-xl font-semibold">Magallanes Jr. Butuhan</h3>
                                <p class="text-gray-600">Machine Learning Engineer & Backend Developer</p>
                            </div>
                            <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                <img src="../assets/images/placeholder.png" alt="Developer 3" class="w-32 h-32 rounded-full mx-auto mb-4">
                                <h3 class="text-xl font-semibold">Princess Martinez</h3>
                                <p class="text-gray-600">Frontend Developer & Machine Learning Researcher</p>
                            </div>
                            <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                <img src="../assets/images/placeholder.png" alt="Developer 4" class="w-32 h-32 rounded-full mx-auto mb-4">
                                <h3 class="text-xl font-semibold">Monique Burilla</h3>
                                <p class="text-gray-600">Researcher & Documentation Specialist</p>
                            </div>
                        </div>
                    </div>
                </section>

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
            </div>
        </x-guest-layout>    
    </main>
</body>
</html>