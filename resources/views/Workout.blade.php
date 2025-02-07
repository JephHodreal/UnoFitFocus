<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workout | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body>
    <main>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('FitCheck') }}
                </h2>
                <h2 class="text-xl text-gray-800 leading-tight">
                    {{ __('Select a workout, choose a difficulty level, and start working out!') }}
                </h2>
            </x-slot>

            <!-- Check if the user has not answered the PARQ form -->
            @if (!$hasParqAnswers)
                <div x-data="{ showModal: true }">
                    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center relative z-50 bg-gray-800 bg-opacity-50 transition-opacity">
                        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto relative z-50" 
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

                            <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ __('Action Required!') }}</h3>
                            <p class="text-gray-600 mb-6">{{ __('You must complete the PARQ form before starting your workout.') }}</p>
                            
                            <div class="flex justify-center w-full">
                                <a href="{{ route('parq.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Go to PARQ Form') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="py-12">
                <div class="container mx-auto text-center">
                    <h1 class="text-4xl font-bold mb-6 text-gray-800">Select Your Workout</h1>
                    
                    <form id="workoutForm" action="{{ route('FitCheck') }}" method="POST">
                        @csrf
                        <input type="hidden" name="workout" id="workoutInput">
                        <input type="hidden" name="difficulty" id="difficultyInput">
                        <input type="hidden" name="sets" id="setsInput">
                        <input type="hidden" name="reps" id="repsInput">
                        <input type="hidden" name="duration" id="durationInput">
                        <input type="hidden" name="task" id="taskInput">
            
                        @foreach ($workouts as $workout)
                            <div class="flex items-center border rounded-lg p-6 mb-6 bg-white shadow-md workout-item" data-workout="{{ $workout['name'] }}">
                                <img src="{{ asset('assets/images/' . $workout['image']) }}" alt="{{ $workout['name'] }}" class="w-48 h-48 object-cover rounded-lg">
                                <div class="ml-6 text-left">
                                    <h2 class="text-2xl font-bold text-gray-800">{{ $workout['name'] }}</h2>
                                    <p class="text-gray-600 mt-2 workout-description" data-default-description="{{ $workout['default_description'] }}">
                                        {{ $workout['default_description'] }}
                                    </p>
                                    
                                    <div class="mt-4 flex space-x-4">
                                        @foreach (['Beginner', 'Intermediate', 'Advanced'] as $difficulty)
                                            @php
                                                $prevDifficulty = $difficulty === 'Intermediate' ? 'Beginner' : ($difficulty === 'Advanced' ? 'Intermediate' : null);
                                                $isUnlocked = $prevDifficulty ? ($scores[$workout['name']][$prevDifficulty] ?? false) : true;
                                            @endphp
                                            <button type="button" 
                                                    class="difficulty-btn border-2 py-2 px-4 rounded-lg transition-transform transform hover:scale-105 
                                                    {{ $difficulty === 'Beginner' ? 'border-green-500 text-green-500' : '' }} 
                                                    {{ $difficulty === 'Intermediate' ? 'border-yellow-500 text-yellow-500' : '' }} 
                                                    {{ $difficulty === 'Advanced' ? 'border-red-500 text-red-500' : '' }} 
                                                    {{ $isUnlocked ? '' : 'opacity-50 cursor-not-allowed' }}"
                                                    data-workout="{{ $workout['name'] }}"
                                                    data-difficulty="{{ $difficulty }}"
                                                    @if (!$isUnlocked) title="Score a 100 in {{ $prevDifficulty }} at least 3 times to unlock {{ $difficulty }}." @endif
                                                    {{ $isUnlocked ? '' : 'disabled' }}>
                                                {{ $difficulty }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
            
                        <button type="submit" class="bg-gray-400 text-gray-700 py-3 px-6 rounded-lg cursor-not-allowed mt-8 mx-auto block" 
                                id="continueBtn" disabled>Continue</button>
                    </form>
                </div>
            </div>

            <!-- Norms Explanation Section -->
            <div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-md mt-12">
                <h2 class="text-2xl font-bold text-gray-800">How Are Your Norms Calculated?</h2>
                <p class="text-gray-700 mt-2">
                    Your norms are based on your <strong>age, weight, and your subjective view of your fitness level</strong>.
                    These norms help determine the ideal number of sets, repetitions, and durations for your selected workout.
                </p>
            </div>

            <div class="container mx-auto mt-8">
                <div class="flex justify-center space-x-8 mb-6">
                    <!-- Workout Tabs -->
                    <div class="flex space-x-2">
                        <button class="tab workout-tab px-6 py-2 rounded-lg shadow-md font-medium
                            {{ $selectedWorkout == 'Push-Up' ? 'bg-blue-600 text-white' : 'bg-gray-300 hover:bg-gray-400' }}" 
                            data-workout="Push-Up">Push-Up</button>
                        <button class="tab workout-tab px-6 py-2 rounded-lg shadow-md font-medium
                            {{ $selectedWorkout == 'Squat' ? 'bg-blue-600 text-white' : 'bg-gray-300 hover:bg-gray-400' }}" 
                            data-workout="Squat">Squat</button>
                        <button class="tab workout-tab px-6 py-2 rounded-lg shadow-md font-medium
                            {{ $selectedWorkout == 'Plank' ? 'bg-blue-600 text-white' : 'bg-gray-300 hover:bg-gray-400' }}" 
                            data-workout="Plank">Plank</button>
                    </div>
            
                    <!-- Difficulty Tabs -->
                    <div class="flex space-x-2">
                        <button class="tab difficulty-tab px-6 py-2 rounded-lg shadow-md font-medium
                            {{ $selectedDifficulty == 'Beginner' ? 'bg-green-600 text-white' : 'bg-gray-300 hover:bg-gray-400' }}" 
                            data-difficulty="Beginner">Beginner</button>
                        <button class="tab difficulty-tab px-6 py-2 rounded-lg shadow-md font-medium
                            {{ $selectedDifficulty == 'Intermediate' ? 'bg-green-600 text-white' : 'bg-gray-300 hover:bg-gray-400' }}" 
                            data-difficulty="Intermediate">Intermediate</button>
                        <button class="tab difficulty-tab px-6 py-2 rounded-lg shadow-md font-medium
                            {{ $selectedDifficulty == 'Advanced' ? 'bg-green-600 text-white' : 'bg-gray-300 hover:bg-gray-400' }}" 
                            data-difficulty="Advanced">Advanced</button>
                    </div>
                </div>
            </div>

            @include('components.norms-table', [
                'normTable' => $normTable,
                'ages' => $ages,
                'weightRanges' => $weightRanges,
                'highlightedNorms' => $highlightedNorms,
                'userDetails' => $userDetails,
                'selectedFitnessLevel' => $selectedFitnessLevel,
                'selectedWorkout' => $selectedWorkout,
                'selectedDifficulty' => $selectedDifficulty
            ])

            <!-- Fitness Level Experiment Section -->
            <div class="container mx-auto text-center mt-8 p-6 bg-blue-100 rounded-lg">
                <h2 class="text-xl font-bold text-gray-800">Want to see how your norms change based on your fitness level?</h2>
                <p class="text-gray-700 mt-2">Change your fitness level below:</p>

                <form method="GET" action="{{ route('Workout') }}" class="mt-4">
                    <select name="fitness_level" class="border px-3 py-2 rounded-lg" onchange="this.form.submit()">
                        <option value="">Select Fitness Level</option>
                        @foreach ($fitnessLevels as $level)
                            <option value="{{ $level }}" {{ request('fitness_level') == $level ? 'selected' : '' }}>
                                {{ $level }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </x-app-layout>    
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let selectedWorkout = "{{ $selectedWorkout }}";
            let selectedDifficulty = "{{ $selectedDifficulty }}";

            // Update the workout tab selection
            document.querySelectorAll(".workout-tab").forEach(tab => {
                // Set initial active state based on server-side selected workout
                if (tab.getAttribute("data-workout") === selectedWorkout) {
                    tab.classList.add("bg-blue-600", "text-white");
                    tab.classList.remove("bg-gray-300", "hover:bg-gray-400");
                }

                tab.addEventListener("click", function () {
                    // Remove active state from all workout tabs
                    document.querySelectorAll(".workout-tab").forEach(t => {
                        t.classList.remove("bg-blue-600", "text-white");
                        t.classList.add("bg-gray-300", "hover:bg-gray-400");
                    });

                    // Add active state to clicked tab
                    this.classList.add("bg-blue-600", "text-white");
                    this.classList.remove("bg-gray-300", "hover:bg-gray-400");

                    selectedWorkout = this.getAttribute("data-workout");
                    updateTable();
                });
            });

            // Update the difficulty tab selection
            document.querySelectorAll(".difficulty-tab").forEach(tab => {
                // Set initial active state based on server-side selected difficulty
                if (tab.getAttribute("data-difficulty") === selectedDifficulty) {
                    tab.classList.add("bg-green-600", "text-white");
                    tab.classList.remove("bg-gray-300", "hover:bg-gray-400");
                }

                tab.addEventListener("click", function () {
                    // Remove active state from all difficulty tabs
                    document.querySelectorAll(".difficulty-tab").forEach(t => {
                        t.classList.remove("bg-green-600", "text-white");
                        t.classList.add("bg-gray-300", "hover:bg-gray-400");
                    });

                    // Add active state to clicked tab
                    this.classList.add("bg-green-600", "text-white");
                    this.classList.remove("bg-gray-300", "hover:bg-gray-400");

                    selectedDifficulty = this.getAttribute("data-difficulty");
                    updateTable();
                });
            });

            // Update the table URL with the selected workout and difficulty
            function updateTable() {
                window.location.href = `{{ route('Workout') }}?workout=${selectedWorkout}&difficulty=${selectedDifficulty}`;
            }
        });

        const workouts = @json($workouts);
        let selectedWorkout = null;
        let selectedDifficulty = null;

        const workoutInput = document.getElementById('workoutInput');
        const difficultyInput = document.getElementById('difficultyInput');
        const setsInput = document.getElementById('setsInput');
        const repsInput = document.getElementById('repsInput');
        const durationInput = document.getElementById('durationInput');
        const taskInput = document.getElementById('taskInput');
        const continueBtn = document.getElementById('continueBtn');

        // Reset all workout descriptions to default
        function resetDescriptions() {
            document.querySelectorAll('.workout-description').forEach(desc => {
                const workout = workouts.find(w => w.name === desc.closest('.workout-item').dataset.workout);
                if (workout) {
                    desc.innerText = workout.default_description;
                }
            });
        }

        // Reset all button styles
        function resetButtonStyles() {
            document.querySelectorAll('.difficulty-btn').forEach(btn => {
                btn.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-red-500', 'text-white');
            });
        }

        document.querySelectorAll('.difficulty-btn').forEach(button => {
            button.addEventListener('click', function() {
                if (this.classList.contains('cursor-not-allowed')) return;

                // Reset all styles and descriptions
                resetButtonStyles();
                resetDescriptions();

                // Add styles to clicked button
                this.classList.add('text-white');
                if (this.classList.contains('border-green-500')) {
                    this.classList.add('bg-green-500');
                } else if (this.classList.contains('border-yellow-500')) {
                    this.classList.add('bg-yellow-500');
                } else if (this.classList.contains('border-red-500')) {
                    this.classList.add('bg-red-500'); // Changed from bg-red-700 to bg-red-500
                }

                selectedWorkout = this.dataset.workout;
                selectedDifficulty = this.dataset.difficulty;

                // Find the workout and update its description
                const workout = workouts.find(w => w.name === selectedWorkout);
                if (workout && workout.norm_descriptions && workout.norm_descriptions[selectedDifficulty]) {
                    const descriptionElement = document.querySelector(
                        `.workout-item[data-workout="${selectedWorkout}"] .workout-description`
                    );
                    if (descriptionElement) {
                        descriptionElement.innerText = workout.norm_descriptions[selectedDifficulty];
                    }
                }

                // Update form inputs
                workoutInput.value = selectedWorkout;
                difficultyInput.value = selectedDifficulty;
                
                // Enable continue button
                continueBtn.classList.remove('bg-gray-400', 'text-gray-700', 'cursor-not-allowed');
                continueBtn.classList.add('bg-green-600', 'text-white');
                continueBtn.disabled = false;
            });
        });
    </script>
</body>
</html>
