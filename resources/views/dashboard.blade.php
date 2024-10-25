<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .hover-highlight tbody tr:hover {
            background-color: #f3f4f6;
            transition: background-color 0.3s ease;
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

            {{-- <div class="py-12">
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
            </div> --}}

            <!-- Table for Workouts with Status -->
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-xl font-bold mb-6">{{ __('Workouts') }}</h3>
                            <table class="table-auto w-full mb-6 hover-highlight">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left">Workout</th>
                                        <th class="px-4 py-2 text-left">Difficulty</th>
                                        <th class="px-4 py-2 text-left">Last Attempt</th>
                                        <th class="px-4 py-2 text-left">High Score</th>
                                        <th class="px-4 py-2 text-left">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stats as $exercise => $difficulties)
                                        @foreach ($difficulties as $difficulty => $stat)
                                            <tr class="border-t">
                                                <td class="px-4 py-2">{{ $exercise }}</td>
                                                <td class="px-4 py-2">{{ $difficulty }}</td>
                                                <td class="px-4 py-2">{{ $stat['lastAttempt'] }}</td>
                                                <td class="px-4 py-2">{{ $stat['highScore'] }}%</td>
                                                <td class="px-4 py-2">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                        bg-{{ $stat['highScore'] == 100 ? 'green' : ($stat['highScore'] > 0 ? 'yellow' : 'gray') }}-100 
                                                        text-{{ $stat['highScore'] == 100 ? 'green' : ($stat['highScore'] > 0 ? 'yellow' : 'gray') }}-800">
                                                        {{ $stat['highScore'] == 100 ? 'Completed' : ($stat['highScore'] > 0 ? 'In Progress' : 'Pending') }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <!-- Graphs -->
                            <h3 class="text-xl font-bold mb-6">Performance Graphs</h3>
                            <div class="mb-6">
                                <canvas id="exerciseChart" width="300" height="150"></canvas> <!-- Reduced size -->
                                <p class="text-center text-gray-600 mt-2">Workouts Completed</p>
                            </div>
                            <div class="mb-6">
                                <canvas id="difficultyChart" width="300" height="150"></canvas> <!-- Reduced size -->
                                <p class="text-center text-gray-600 mt-2">Tries Per Difficulty</p>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    // Data for exercise performance over time
                                    const ctx1 = document.getElementById('exerciseChart').getContext('2d');
                                    new Chart(ctx1, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Push-Up', 'Squat', 'Plank'],
                                            datasets: [{
                                                label: 'Total Workouts',
                                                data: [
                                                    {{ array_sum(array_column($stats['Push-Up'], 'numTries')) }},
                                                    {{ array_sum(array_column($stats['Squat'], 'numTries')) }},
                                                    {{ array_sum(array_column($stats['Plank'], 'numTries')) }}
                                                ],
                                                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56']
                                            }]
                                        },
                                        options: {
                                            aspectRatio: 2.5,
                                            scales: {
                                                y: { beginAtZero: true }
                                            }
                                        }
                                    });

                                    // Data for tries per difficulty level
                                    const ctx2 = document.getElementById('difficultyChart').getContext('2d');
                                    new Chart(ctx2, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Beginner', 'Intermediate', 'Advanced'],
                                            datasets: [{
                                                label: 'Tries Per Difficulty',
                                                data: [
                                                    {{ array_sum(array_column($stats['Push-Up'], 'numTries')) }},
                                                    {{ array_sum(array_column($stats['Squat'], 'numTries')) }},
                                                    {{ array_sum(array_column($stats['Plank'], 'numTries')) }}
                                                ],
                                                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56']
                                            }]
                                        },
                                        options: {
                                            aspectRatio: 2.5,
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <!-- Improvement Graphs -->
                            <h3 class="text-xl font-bold mb-6">Improvement Over Time</h3>
                            <div>
                                <div>
                                    <canvas id="pushUpChart" width="400" height="200"></canvas>
                                    <p class="text-center text-gray-600 mt-2">Push-Up Improvement</p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <canvas id="squatChart" width="400" height="200"></canvas>
                                    <p class="text-center text-gray-600 mt-2">Squat Improvement</p>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <canvas id="plankChart" width="400" height="200"></canvas>
                                    <p class="text-center text-gray-600 mt-2">Plank Improvement</p>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    // Improvement graphs for Push-Up, Squat, and Plank
                                    const pushUpCtx = document.getElementById('pushUpChart').getContext('2d');
                                    const squatCtx = document.getElementById('squatChart').getContext('2d');
                                    const plankCtx = document.getElementById('plankChart').getContext('2d');

                                    const chartConfig = (ctx, dates, scores, label) => {
                                        return new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: dates,
                                                datasets: [{
                                                    label: label,
                                                    data: scores,
                                                    borderColor: 'rgba(75, 192, 192, 1)',
                                                    borderWidth: 2,
                                                    fill: false
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: { beginAtZero: true },
                                                    x: { display: true }
                                                }
                                            }
                                        });
                                    };

                                    chartConfig(pushUpCtx, {!! json_encode($pushUpGraph['dates']) !!}, {!! json_encode($pushUpGraph['scores']) !!}, 'Push-Up Scores');
                                    chartConfig(squatCtx, {!! json_encode($squatGraph['dates']) !!}, {!! json_encode($squatGraph['scores']) !!}, 'Squat Scores');
                                    chartConfig(plankCtx, {!! json_encode($plankGraph['dates']) !!}, {!! json_encode($plankGraph['scores']) !!}, 'Plank Scores');
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </x-app-layout>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Data for improvement over time (Push-Up)
            const pushUpCtx = document.getElementById('pushUpImprovementChart').getContext('2d');
            new Chart(pushUpCtx, {
                type: 'line',
                data: {
                    labels: @json($pushUpGraph['dates']),
                    datasets: [{
                        label: 'Push-Up Improvement',
                        data: @json($pushUpGraph['scores']),
                        backgroundColor: '#ff6384',
                        borderColor: '#ff6384',
                        fill: false,
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    },
                    responsive: true
                }
            });
        
            // Data for improvement over time (Squat)
            const squatCtx = document.getElementById('squatImprovementChart').getContext('2d');
            new Chart(squatCtx, {
                type: 'line',
                data: {
                    labels: @json($squatGraph['dates']),
                    datasets: [{
                        label: 'Squat Improvement',
                        data: @json($squatGraph['scores']),
                        backgroundColor: '#36a2eb',
                        borderColor: '#36a2eb',
                        fill: false,
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    },
                    responsive: true
                }
            });
        
            // Data for improvement over time (Plank)
            const plankCtx = document.getElementById('plankImprovementChart').getContext('2d');
            new Chart(plankCtx, {
                type: 'line',
                data: {
                    labels: @json($plankGraph['dates']),
                    datasets: [{
                        label: 'Plank Improvement',
                        data: @json($plankGraph['scores']),
                        backgroundColor: '#ffce56',
                        borderColor: '#ffce56',
                        fill: false,
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    },
                    responsive: true
                }
            });
        });
        </script>

    {{-- <script>
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
    </script> --}}
</body>
</html>
