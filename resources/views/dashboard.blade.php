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
        .hidden {
            display: none;
        }
        .graph-container {
            margin-bottom: 24px;
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

            <!-- Modal if profile is incomplete -->
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

                            <button @click="showModal = false" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>

                            <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ __('Almost there!') }}</h3>
                            <p class="text-gray-600 mb-6">{{ __('Complete your profile by adding some additional information.') }}</p>
                            
                            <div class="flex justify-center w-full">
                                <a href="{{ route('Setup') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'">
                                    {{ __('Go to Setup') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Notification Section --}}
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-bold">{{ __('Exercise Notifications') }}
                                    @if($notifications && count($notifications) > 0)
                                        <span class="ml-2 bg-red-500 text-white text-sm font-bold py-1 px-2 rounded-full">
                                            {{ count($notifications) }}
                                        </span>
                                    @endif
                                </h3>
                                <div>
                                    <button class="text-blue-500 hover:underline" onclick="toggleNotificationList()">
                                        <span id="toggleText">{{ __('Show') }}</span>
                                    </button>
                                </div>
                            </div>
                            <ul id="notificationList" class="space-y-4 mt-4" style="display: none;">
                                @if($notifications && count($notifications) > 0)
                                    @foreach($notifications as $notification)
                                        <li class="bg-yellow-100 p-4 rounded-lg">
                                            @if($notification['daysAgo'] === 'No record')
                                                <p class="text-gray-800">
                                                    {{ __('You haven\'t started') }} <span class="font-bold">{{ $notification["exercise"] }}</span> {{ __('yet. Give it a try to get started on your fitness journey!') }}
                                                </p>
                                            @else
                                                <p class="text-gray-800">
                                                    {{ __('It\'s been') }} <span class="font-bold">{{ $notification["daysAgo"] }}</span> {{ __('days since you last performed') }}
                                                    <span class="font-bold">{{ $notification["exercise"] }}</span>{{ __('. Time to get back on track!') }}
                                                </p>
                                            @endif
                                        </li>
                                    @endforeach
                                @else
                                    <li class="bg-green-100 p-4 rounded-lg">
                                        <p class="text-gray-800">{{ __('Great job! You\'ve been consistent with your workouts.') }}</p>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function toggleNotificationList() {
                    const list = document.getElementById('notificationList');
                    const toggleText = document.getElementById('toggleText');
            
                    if (list.style.display === 'none') {
                        list.style.display = 'block';
                        toggleText.innerText = 'Hide';
                    } else {
                        list.style.display = 'none';
                        toggleText.innerText = 'Show';
                    }
                }
            </script>

            <!-- Table for Workouts with Status -->
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-xl font-bold mb-6">{{ __('Workout Summary') }}</h3>
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
                                                <td class="px-4 py-2">
                                                    {{ $stat['highScore'] !== 'N/A' ? $stat['highScore'] . '%' : $stat['highScore'] }}
                                                </td>
                                                <td class="px-4 py-2">
                                                    <span class="flex justify-center items-center px-2 text-xs leading-5 font-semibold rounded-full 
                                                        bg-{{ $stat['highScore'] === 'N/A' ? 'red' : ($stat['highScore'] == 100 ? 'green' : ($stat['highScore'] > 0 ? 'yellow' : 'red')) }}-100 
                                                        text-{{ $stat['highScore'] === 'N/A' ? 'red' : ($stat['highScore'] == 100 ? 'green' : ($stat['highScore'] > 0 ? 'yellow' : 'red')) }}-800 
                                                        w-1/2 h-5">
                                                        {{ $stat['highScore'] === 'N/A' ? 'Pending' : ($stat['highScore'] == 100 ? 'Completed' : ($stat['highScore'] > 0 ? 'In Progress' : 'Pending')) }}
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

            {{-- Workout Distribution Section --}}
            {{-- <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <!-- Graphs -->
                            <h3 class="text-xl font-bold mb-6">{{ __('Workout Distribution') }}</h3>
            
                            <div class="mb-6">
                                @if(empty(array_sum(array_column($stats['Push-Up'], 'numTries'))) && 
                                    empty(array_sum(array_column($stats['Squat'], 'numTries'))) && 
                                    empty(array_sum(array_column($stats['Plank'], 'numTries'))))
                                    <p class="text-center text-gray-600">{{ __('No data found for workout distributio') }}</p>
                                @else
                                    <canvas id="nestedPieChart" width="300" height="150"></canvas>
                                    <p class="text-center text-gray-600 mt-2">{{ __('Distribution of workouts and tries per difficulty') }}</p>
                                @endif
                            </div>
            
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const ctx = document.getElementById('nestedPieChart')?.getContext('2d');
                                    if (ctx) {
                                        new Chart(ctx, {
                                            type: 'doughnut',
                                            data: {
                                                // No global labels here
                                                datasets: [
                                                    // Outer Pie Chart (Workouts)
                                                    {
                                                        label: 'Workouts',
                                                        data: [
                                                            {{ array_sum(array_column($stats['Push-Up'], 'numTries')) }},
                                                            {{ array_sum(array_column($stats['Squat'], 'numTries')) }},
                                                            {{ array_sum(array_column($stats['Plank'], 'numTries')) }}
                                                        ],
                                                        backgroundColor: ['#ff2929', '#6b8e23', '#4682b4'],
                                                        hoverOffset: 4,
                                                        labels: ['Push-Up', 'Squat', 'Plank'] // Labels for outer pie
                                                    },
                                                    // Inner Pie Chart (Tries Per Difficulty)
                                                    {
                                                        label: 'Difficulty Breakdown',
                                                        data: [
                                                            {{ $stats['Push-Up']['Beginner']['numTries'] ?? 0 }},
                                                            {{ $stats['Push-Up']['Intermediate']['numTries'] ?? 0 }},
                                                            {{ $stats['Push-Up']['Advanced']['numTries'] ?? 0 }},
                                                            {{ $stats['Squat']['Beginner']['numTries'] ?? 0 }},
                                                            {{ $stats['Squat']['Intermediate']['numTries'] ?? 0 }},
                                                            {{ $stats['Squat']['Advanced']['numTries'] ?? 0 }},
                                                            {{ $stats['Plank']['Beginner']['numTries'] ?? 0 }},
                                                            {{ $stats['Plank']['Intermediate']['numTries'] ?? 0 }},
                                                            {{ $stats['Plank']['Advanced']['numTries'] ?? 0 }}
                                                        ], 
                                                        backgroundColor: [
                                                            '#ffafaf', '#ff4b4b', '#de0000', // Push-Up Difficulty Colors
                                                            '#98fb98', '#32cd32', '#228b22', // Squat Difficulty Colors
                                                            '#87cefa', '#4682b4', '#000080'  // Plank Difficulty Colors
                                                        ],
                                                        hoverOffset: 4,
                                                        labels: [
                                                            'Push-Up (Beginner)', 'Push-Up (Intermediate)', 'Push-Up (Advanced)',
                                                            'Squat (Beginner)', 'Squat (Intermediate)', 'Squat (Advanced)',
                                                            'Plank (Beginner)', 'Plank (Intermediate)', 'Plank (Advanced)'
                                                        ] // Labels for inner pie
                                                    }
                                                ]
                                            },
                                            options: {
                                                aspectRatio: 2.5,
                                                plugins: {
                                                    legend: {
                                                        position: 'right',
                                                        labels: {
                                                            color: '#4b5563', // Gray text color for readability
                                                            generateLabels: function (chart) {
                                                                // Generate custom labels based on the dataset-specific labels
                                                                return chart.data.datasets.flatMap((dataset, datasetIndex) => {
                                                                    return dataset.labels.map((label, index) => ({
                                                                        text: label,
                                                                        fillStyle: dataset.backgroundColor[index],
                                                                        hidden: !chart.isDatasetVisible(datasetIndex),
                                                                        datasetIndex,
                                                                        index
                                                                    }));
                                                                });
                                                            },
                                                            onClick: function (e, legendItem) {
                                                                const datasetIndex = legendItem.datasetIndex;
                                                                const index = legendItem.index;
                                                                const chartDataset = chart.data.datasets[datasetIndex];
                                                                
                                                                // Toggle visibility for the specific segment in the relevant dataset
                                                                chartDataset._meta[Object.keys(chartDataset._meta)[0]].data[index].hidden =
                                                                    !chartDataset._meta[Object.keys(chartDataset._meta)[0]].data[index].hidden;

                                                                // Update chart to reflect changes
                                                                chart.update();
                                                            }
                                                        }
                                                    },
                                                    tooltip: {
                                                        callbacks: {
                                                            label: function (context) {
                                                                const dataset = context.dataset;
                                                                const index = context.dataIndex;
                                                                const label = dataset.labels[index];
                                                                const value = dataset.data[index];
                                                                return `${label}: ${value}`;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- Improvement Graphs --}}
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-xl font-bold mb-6">{{ __('Improvement Over Time (Last 30 days)')}} </h3>

                            <div class="mb-4 text-pretty md:text-balance text-justify">
                                <p>{{ __("This graph shows your performance over the past 30 days for each workout and its 
                                respective difficulty level. Each point on the line represents the score you achieved during 
                                a workout session. The rows shows your score (in increments of 10), and the columns shows the 
                                dates. A rising line indicates improvement, while a plateau or dip may show a need for additional 
                                focus on specific areas. The lines for each difficulty level represent how you're doing at each 
                                intensity. The red lines represent the Beginner difficulty level, blue lines represent the 
                                Intermediate difficulty level, and yellow lines represent the Advanced difficulty level.") }}</p>
                                <br>
                                <p>{{ __("Use the drop-down selection below to view your performance for each workout and difficulty 
                                level.") }}</p>
                            </div>
            
                            <div class="mb-4">
                                <label for="graphSelect" class="block text-gray-700 font-medium mb-2">Select Exercise:</label>
                                <select id="graphSelect" class="form-select border-gray-300 rounded-md shadow-sm">
                                    <option value="pushUp">Push-Up Improvement</option>
                                    <option value="squat">Squat Improvement</option>
                                    <option value="plank">Plank Improvement</option>
                                </select>
                            </div>
            
                            <div id="pushUpContainer" class="graph-container">
                                @if(count($pushUpGraph['Beginner']['dates']) === 0 && count($pushUpGraph['Intermediate']['dates']) === 0 && count($pushUpGraph['Advanced']['dates']) === 0)
                                    <p class="text-center text-gray-600">No data found for Push-Up. Improvement graph cannot be displayed.</p>
                                @else
                                    <canvas id="pushUpChart" width="400" height="200"></canvas>
                                    <p class="text-center text-gray-600 mt-2">Push-Up Improvement</p>
                                @endif
                            </div>

                            <div id="squatContainer" class="graph-container">
                                @if(count($squatGraph['Beginner']['dates']) === 0 && count($squatGraph['Intermediate']['dates']) === 0 && count($squatGraph['Advanced']['dates']) === 0)
                                    <p class="text-center text-gray-600">No data found for Squat. Improvement graph cannot be displayed.</p>
                                @else
                                    <canvas id="squatChart" width="400" height="200"></canvas>
                                    <p class="text-center text-gray-600 mt-2">Squat Improvement</p>
                                @endif
                            </div>

                            <div id="plankContainer" class="graph-container">
                                @if(count($plankGraph['Beginner']['dates']) === 0 && count($plankGraph['Intermediate']['dates']) === 0 && count($plankGraph['Advanced']['dates']) === 0)
                                    <p class="text-center text-gray-600">No data found for Plank. Improvement graph cannot be displayed.</p>
                                @else
                                    <canvas id="plankChart" width="400" height="200"></canvas>
                                    <p class="text-center text-gray-600 mt-2">Plank Improvement</p>
                                @endif
                            </div>

                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-bold">{{ __('Interpretation:') }}
                                </h3>
                            </div>
                            <div id="graphInterpretation" class="space-y-4 mt-4 bg-green-100 p-4 rounded-lg">
                            </div>
            
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const graphSelect = document.getElementById('graphSelect');
                                    const containers = {
                                        pushUp: document.getElementById('pushUpContainer'),
                                        squat: document.getElementById('squatContainer'),
                                        plank: document.getElementById('plankContainer')
                                    };

                                    function toggleGraph() {
                                        const selectedGraph = graphSelect.value;
                                        Object.keys(containers).forEach(key => {
                                            containers[key].classList.toggle('hidden', key !== selectedGraph);
                                        });
                                    }

                                    toggleGraph();
                                    //graphSelect.addEventListener('change', toggleGraph);
                                    graphSelect.addEventListener('change', () => {
                                        const selectedGraph = graphSelect.value;
                                        const data = selectedGraph === 'pushUp' ? pushUpData :
                                                    selectedGraph === 'squat' ? squatData :
                                                    plankData;
                                        const exercise = selectedGraph === 'pushUp' ? 'Push-Up' :
                                                        selectedGraph === 'squat' ? 'Squat' :
                                                        'Plank';
                                        toggleGraph(); // Toggle graph visibility
                                        updateInterpretation(data, exercise); // Update interpretation
                                    });

                                    const chartConfig = (ctx, data, labelColors) => {
                                        if (ctx) {
                                            new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                    labels: data.Beginner.dates, // Use the dates array directly from the data
                                                    datasets: [
                                                        {
                                                            label: 'Beginner',
                                                            data: data.Beginner.scores,
                                                            borderColor: labelColors.Beginner,
                                                            borderWidth: 2,
                                                            fill: false,
                                                            spanGaps: true // Connect points, leaving gaps for missing data
                                                        },
                                                        {
                                                            label: 'Intermediate',
                                                            data: data.Intermediate.scores,
                                                            borderColor: labelColors.Intermediate,
                                                            borderWidth: 2,
                                                            fill: false,
                                                            spanGaps: true
                                                        },
                                                        {
                                                            label: 'Advanced',
                                                            data: data.Advanced.scores,
                                                            borderColor: labelColors.Advanced,
                                                            borderWidth: 2,
                                                            fill: false,
                                                            spanGaps: true
                                                        }
                                                    ]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true,
                                                            min: 0,
                                                            max: 100,
                                                            ticks: {
                                                                stepSize: 10
                                                            }
                                                        },
                                                        x: {
                                                            type: 'category',
                                                            title: {
                                                                display: true
                                                            },
                                                        }
                                                    }
                                                }
                                            });
                                        }
                                    };
                            
                                    const pushUpData = {!! json_encode($pushUpGraph) !!};
                                    const squatData = {!! json_encode($squatGraph) !!};
                                    const plankData = {!! json_encode($plankGraph) !!};
                            
                                    chartConfig(
                                        document.getElementById('pushUpChart')?.getContext('2d'),
                                        pushUpData,
                                        { Beginner: '#ff6384', Intermediate: '#36a2eb', Advanced: '#ffce56' }
                                    );
                                    chartConfig(
                                        document.getElementById('squatChart')?.getContext('2d'),
                                        squatData,
                                        { Beginner: '#ff6384', Intermediate: '#36a2eb', Advanced: '#ffce56' }
                                    );
                                    chartConfig(
                                        document.getElementById('plankChart')?.getContext('2d'),
                                        plankData,
                                        { Beginner: '#ff6384', Intermediate: '#36a2eb', Advanced: '#ffce56' }
                                    );
                                    // Function to generate interpretation
                                    // function getInterpretation(data, exercise) {
                                    //     const beginnerScores = data.Beginner.scores;
                                    //     const intermediateScores = data.Intermediate.scores;
                                    //     const advancedScores = data.Advanced.scores;

                                    //     // Check if the user has not tried the workout at all
                                    //     const hasNoData = beginnerScores.every(score => score === null) &&
                                    //                     intermediateScores.every(score => score === null) &&
                                    //                     advancedScores.every(score => score === null);

                                    //     if (hasNoData) {
                                    //         return `You haven't started ${exercise}s yet. Try it out now!`;
                                    //     }

                                    //     // Check if the user hasn't attempted the workout in the last 7 days
                                    //     const lastAttemptDate = new Date(Math.max(
                                    //         ...beginnerScores.map((score, index) => score !== null ? new Date(data.Beginner.dates[index]) : 0),
                                    //         ...intermediateScores.map((score, index) => score !== null ? new Date(data.Intermediate.dates[index]) : 0),
                                    //         ...advancedScores.map((score, index) => score !== null ? new Date(data.Advanced.dates[index]) : 0)
                                    //     ));
                                    //     const daysSinceLastAttempt = Math.floor((new Date() - lastAttemptDate) / (1000 * 60 * 60 * 24));

                                    //     if (daysSinceLastAttempt > 7) {
                                    //         return `Uh oh! You haven't attempted ${exercise}s in a while. Try it out now!`;
                                    //     }

                                    //     // Check for perfect scores
                                    //     const perfectScores = {
                                    //         Beginner: beginnerScores.filter(score => score === 100).length,
                                    //         Intermediate: intermediateScores.filter(score => score === 100).length,
                                    //         Advanced: advancedScores.filter(score => score === 100).length
                                    //     };

                                    //     if (perfectScores.Advanced >= 3) {
                                    //         return `You've mastered ${exercise}s! Keep on working out to maintain your progress. Excellent work.`;
                                    //     }

                                    //     // Check if the graph is increasing, decreasing, or stagnant
                                    //     const beginnerTrend = beginnerScores.filter(score => score !== null);
                                    //     const intermediateTrend = intermediateScores.filter(score => score !== null);
                                    //     const advancedTrend = advancedScores.filter(score => score !== null);

                                    //     const isIncreasing = (trend) => {
                                    //         if (trend.length < 2) return false;
                                    //         return trend.every((score, index) => index === 0 || score >= trend[index - 1]);
                                    //     };

                                    //     const isDecreasing = (trend) => {
                                    //         if (trend.length < 2) return false;
                                    //         return trend.every((score, index) => index === 0 || score <= trend[index - 1]);
                                    //     };

                                    //     if (isIncreasing(beginnerTrend) || isIncreasing(intermediateTrend) || isIncreasing(advancedTrend)) {
                                    //         return `You're currently improving on your ${exercise}s. Keep up the good work!`;
                                    //     } else if (isDecreasing(beginnerTrend) || isDecreasing(intermediateTrend) || isDecreasing(advancedTrend)) {
                                    //         return `You're doing a good job! With just a little extra practice on your ${exercise}s, you'll be unstoppable!`;
                                    //     } else {
                                    //         return `Your performance on ${exercise}s is steady. Keep pushing yourself to improve!`;
                                    //     }
                                    // }

                                    function getInterpretation(data, exercise) {
                                    const beginnerScores = data.Beginner.scores.filter(score => score !== null);
                                    const intermediateScores = data.Intermediate.scores.filter(score => score !== null);
                                    const advancedScores = data.Advanced.scores.filter(score => score !== null);

                                    // Check if the user has not tried the workout at all
                                    const hasNoData = beginnerScores.length === 0 && 
                                                    intermediateScores.length === 0 && 
                                                    advancedScores.length === 0;

                                    if (hasNoData) {
                                        return `You haven't started ${exercise}s yet. Try it out now!`;
                                    }

                                    // Get unique dates for each difficulty level
                                    const getUniqueDates = (scores, dates) => {
                                        return scores.map((score, idx) => dates[idx])
                                                    .filter((date, idx, arr) => arr.indexOf(date) === idx);
                                    };

                                    const beginnerDates = getUniqueDates(data.Beginner.scores, data.Beginner.dates);
                                    const intermediateDates = getUniqueDates(data.Intermediate.scores, data.Intermediate.dates);
                                    const advancedDates = getUniqueDates(data.Advanced.scores, data.Advanced.dates);

                                    // Check if the user hasn't attempted the workout in the last 7 days
                                    const lastAttemptDate = new Date(Math.max(
                                        ...beginnerDates.map(date => new Date(date)),
                                        ...intermediateDates.map(date => new Date(date)),
                                        ...advancedDates.map(date => new Date(date))
                                    ));
                                    const daysSinceLastAttempt = Math.floor((new Date() - lastAttemptDate) / (1000 * 60 * 60 * 24));

                                    if (daysSinceLastAttempt > 7) {
                                        return `Uh oh! You haven't attempted ${exercise}s in a while. Try it out now!`;
                                    }

                                    // Check for perfect scores and mastery
                                    const isPerfectScore = score => score === 100;
                                    const hasMastered = scores => scores.filter(isPerfectScore).length >= 3;

                                    if (hasMastered(advancedScores)) {
                                        return `You've mastered ${exercise}s! Keep on working out to maintain your progress. Excellent work.`;
                                    }

                                    // Check for level progression recommendations
                                    if (hasMastered(beginnerScores) && intermediateScores.length === 0) {
                                        return `You've mastered the Beginner level! Attempt the Intermediate level to see how you'd fare.`;
                                    }

                                    if (hasMastered(intermediateScores) && advancedScores.length === 0) {
                                        return `You've mastered the Intermediate level! Attempt the Advanced level to see how you'd fare.`;
                                    }

                                    // Function to analyze trend for a specific difficulty level
                                    const analyzeTrend = (scores, dates) => {
                                        const uniqueDates = getUniqueDates(scores, dates);
                                        
                                        // Return early if less than 3 workout days
                                        if (uniqueDates.length < 3) {
                                            return 'insufficient';
                                        }

                                        // Get the last 5 scores (or all if less than 5)
                                        const recentScores = scores.slice(-5);
                                        
                                        // Calculate average difference between consecutive scores
                                        const differences = recentScores.map((score, idx) => 
                                            idx === 0 ? 0 : Math.abs(score - recentScores[idx - 1])
                                        ).slice(1);
                                        
                                        const avgDifference = differences.reduce((sum, diff) => sum + diff, 0) / differences.length;

                                        // Define thresholds for trend analysis
                                        const STEADY_THRESHOLD = 5; // Maximum average difference to be considered steady
                                        const IMPROVEMENT_THRESHOLD = 4; // Minimum improvement to be considered increasing

                                        if (avgDifference <= STEADY_THRESHOLD) {
                                            return 'steady';
                                        }

                                        const isImproving = recentScores.every((score, idx) => 
                                            idx === 0 || (score - recentScores[idx - 1]) >= -IMPROVEMENT_THRESHOLD
                                        );

                                        return isImproving ? 'improving' : 'fluctuating';
                                    };

                                    // Analyze trends for each difficulty level
                                    const trends = {
                                        beginner: analyzeTrend(beginnerScores, data.Beginner.dates),
                                        intermediate: analyzeTrend(intermediateScores, data.Intermediate.dates),
                                        advanced: analyzeTrend(advancedScores, data.Advanced.dates)
                                    };

                                    // If user has worked out less than 3 times in all difficulty levels
                                    if (Object.values(trends).every(trend => trend === 'insufficient')) {
                                        return "Keep working out to have a more detailed interpretation of your progress!";
                                    }

                                    // Generate interpretation based on trends
                                    const hasImprovingTrend = Object.values(trends).some(trend => trend === 'improving');
                                    const hasSteadyTrend = Object.values(trends).some(trend => trend === 'steady');

                                    if (hasImprovingTrend) {
                                        return `You're currently improving on your ${exercise}s. Keep up the good work!`;
                                    } else if (hasSteadyTrend) {
                                        return `Your performance on ${exercise}s is steady. Keep pushing yourself to improve!`;
                                    } else {
                                        return `Uh oh! Your scores are dipping. No worries, with just a little extra practice on your ${exercise}s, you'll get the hang of it!`;
                                    }
                                }

                                    // Function to update the interpretation
                                    function updateInterpretation(data, exercise) {
                                        const interpretationElement = document.getElementById('graphInterpretation');
                                        if (interpretationElement) {
                                            interpretationElement.textContent = getInterpretation(data, exercise);
                                        }
                                    }

                                    updateInterpretation(pushUpData, 'Push-Up');
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </main>
</body>
</html>