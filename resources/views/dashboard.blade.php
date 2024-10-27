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

            <!-- Conditionally Render Modal -->
            @if($profileIncomplete)
                <!-- Pop-up Modal -->
                <div x-data="{ showModal: true }">
                    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 transition-opacity">
                        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto relative" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90">

                            <!-- Close Button -->
                            <button @click="showModal = false" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>

                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Almost there!</h3>
                            <p class="text-gray-600 mb-6">Complete your profile by adding some additional information.</p>
                            
                            <div class="flex justify-center w-full">
                                <a href="{{ route('Setup') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'">
                                    {{ __('Go to Setup') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- End Modal -->

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
</body>
</html>
