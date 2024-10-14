<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <style>
        html {
            overflow-y: scroll; /* Forces a vertical scrollbar to always be visible */
        }
    </style>
</head>
<body>
    <main>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-xl font-bold mb-6">Select to see your stats on each exercise</h3>

                            <!-- Exercise Images -->
                            <div class="flex justify-center space-x-6 mb-6">
                                <div class="exercise-container mx-2" data-exercise="push-up">
                                    <img src="{{ asset('assets/images/pu_standard.jpg') }}" alt="Push Up" class="cursor-pointer hover:scale-105 transition-transform w-100 h-60 object-cover">
                                    <p class="text-center mt-2 font-semibold">Push Up</p>
                                </div>
                                <div class="exercise-container mx-2" data-exercise="squat">
                                    <img src="{{ asset('assets/images/sq_standard.jpg') }}" alt="Squat" class="cursor-pointer hover:scale-105 transition-transform w-100 h-60 object-cover">
                                    <p class="text-center mt-2 font-semibold">Squat</p>
                                </div>
                                <div class="exercise-container mx-2" data-exercise="plank">
                                    <img src="{{ asset('assets/images/pl_standard.jpg') }}" alt="Plank" class="cursor-pointer hover:scale-105 transition-transform w-100 h-60 object-cover">
                                    <p class="text-center mt-2 font-semibold">Plank</p>
                                </div>
                            </div>

                            <!-- Statistics Section -->
                            <div id="exercise-stats" class="hidden max-h-0 overflow-hidden transition-all duration-900 ease-in-out">
                                <h3 id="exercise-name" class="text-lg font-semibold mb-4"></h3>
                                <div class="grid grid-cols-3 gap-4 mb-6">
                                    <div class="bg-white shadow-md p-4 rounded-lg">
                                        <p class="text-gray-600">High Score</p>
                                        <p class="font-bold text-lg" id="high-score"></p>
                                    </div>
                                    <div class="bg-white shadow-md p-4 rounded-lg">
                                        <p class="text-gray-600">Number of Tries</p>
                                        <p class="font-bold text-lg" id="num-tries"></p>
                                    </div>
                                    <div class="bg-white shadow-md p-4 rounded-lg">
                                        <p class="text-gray-600">Last Exercise</p>
                                        <p class="font-bold text-lg" id="last-exercise"></p>
                                    </div>
                                </div>

                                <!-- How to Perform Section -->
                                <div class="bg-white shadow-md p-4 rounded-lg mb-6 max-h-0 overflow-hidden transition-all duration-900 ease-in-out" id="how-to-section">
                                    <h4 class="font-semibold text-lg mb-3">How to Perform</h4>
                                    <p id="how-to-perform"></p>
                                </div>

                                <!-- Recommendations Section -->
                                <div class="bg-white shadow-md p-4 rounded-lg max-h-0 overflow-hidden transition-all duration-900 ease-in-out" id="recommendation-section">
                                    <h4 class="font-semibold text-lg mb-3">Recommendations</h4>
                                    <p id="recommendations"></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </x-app-layout>
    </main>

    <script>
        // Sample data for each exercise
        const exerciseData = {
            'push-up': {
                name: 'Push Up',
                highScore: '{{ $puHighScore ?? "N/A" }}',
                numTries: '{{ $puExerCount ?? 0 }}', 
                lastExercise: '{{ $puLastDate }}',
                howToPerform: 'Start in a plank position with your hands shoulder-width apart...',
                recommendations: 'Focus on keeping your core tight and back straight.'
            },
            'squat': {
                name: 'Squat',
                highScore: '{{ $sqHighScore ?? "N/A" }}',
                numTries: '{{ $sqExerCount ?? 0 }}',
                lastExercise: '{{ $sqLastDate }}',
                howToPerform: 'Stand with your feet shoulder-width apart...',
                recommendations: 'Make sure your knees do not go past your toes during the squat.'
            },
            'plank': {
                name: 'Plank',
                highScore: '{{ $plHighScore ?? "N/A" }}',
                numTries: '{{ $plExerCount ?? 0 }}',
                lastExercise: '{{ $plLastDate }}',
                howToPerform: 'Start in a push-up position with your forearms on the ground...',
                recommendations: 'Hold the plank position for as long as you can without compromising form.'
            }
        };

        // Handle accordion click events
        document.querySelectorAll('.exercise-container').forEach(container => {
            container.addEventListener('click', function () {
                const exercise = this.getAttribute('data-exercise');
                const statsSection = document.getElementById('exercise-stats');
                const exerciseName = document.getElementById('exercise-name');
                const highScore = document.getElementById('high-score');
                const numTries = document.getElementById('num-tries');
                const lastExercise = document.getElementById('last-exercise');
                const howToPerform = document.getElementById('how-to-perform');
                const recommendations = document.getElementById('recommendations');
                const howToSection = document.getElementById('how-to-section');
                const recommendationSection = document.getElementById('recommendation-section');

                // Toggle the stats section
                if (statsSection.classList.contains('hidden') || exerciseName.textContent !== exerciseData[exercise].name) {
                    exerciseName.textContent = exerciseData[exercise].name;
                    highScore.textContent = exerciseData[exercise].highScore;
                    numTries.textContent = exerciseData[exercise].numTries;
                    lastExercise.textContent = exerciseData[exercise].lastExercise;
                    howToPerform.textContent = exerciseData[exercise].howToPerform;
                    recommendations.textContent = exerciseData[exercise].recommendations;

                    // Show statistics section
                    statsSection.classList.remove('hidden');
                    statsSection.style.maxHeight = '500px'; // Adjust max-height as needed to fit content
                    howToSection.style.maxHeight = '200px'; // Adjust as needed
                    recommendationSection.style.maxHeight = '200px'; // Adjust as needed

                    // Set the height to 'auto' to transition smoothly
                    setTimeout(() => {
                        howToSection.style.maxHeight = '200px';
                        recommendationSection.style.maxHeight = '200px';
                    }, 10); // Small timeout to trigger the CSS transition
                } else {
                    // Hide the stats section
                    statsSection.style.maxHeight = '0'; // Animate height to 0
                    howToSection.style.maxHeight = '0'; // Animate height to 0
                    recommendationSection.style.maxHeight = '0'; // Animate height to 0

                    // Wait for the transition to finish before adding the hidden class
                    setTimeout(() => {
                        statsSection.classList.add('hidden');
                    }, 500); // Match the duration of the CSS transition
                }
            });
        });
    </script>
</body>
</html>
