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
                    <h1 class="text-4xl font-bold mb-4 text-gray-800">Select Your Workout</h1>
                    
                    <form id="workoutForm" action="{{ route('FitCheck') }}" method="POST">
                        @csrf
                        <input type="hidden" name="workout" id="workoutInput">
                        <input type="hidden" name="difficulty" id="difficultyInput">
                        <input type="hidden" name="task" id="taskInput">

                        <div class="flex justify-around mt-8 z-10 relative">
                            <div class="workout-item w-72 cursor-pointer transform transition-transform duration-300 hover:scale-105" id="pushup">
                                <img src="../assets/images/pu_standard.jpg" alt="Push-Up" class="w-full rounded-lg transition-shadow duration-300 hover:shadow-lg">
                                <p class="mt-2">Push-Up</p>
                            </div>
                            <div class="workout-item w-72 cursor-pointer transform transition-transform duration-300 hover:scale-105" id="squat">
                                <img src="../assets/images/sq_standard.jpg" alt="Squat" class="w-full rounded-lg transition-shadow duration-300 hover:shadow-lg">
                                <p class="mt-2">Squat</p>
                            </div>
                            <div class="workout-item w-72 cursor-pointer transform transition-transform duration-300 hover:scale-105" id="plank">
                                <img src="../assets/images/pl_standard.jpg" alt="Plank" class="w-full rounded-lg transition-shadow duration-300 hover:shadow-lg">
                                <p class="mt-2">Plank</p>
                            </div>
                        </div>
                        
                        <div class="modal fixed inset-0 hidden bg-black bg-opacity-60 justify-center items-center" id="modal">
                            <div class="bg-white p-8 rounded-lg text-center max-w-md w-full">
                                <h2 class="text-xl font-bold mb-6" id="workout-title">{{ __('Select Difficulty') }}</h2>
                                <div class="flex justify-around my-4">
                                    <button type="button" class="difficulty-btn border-green-500 border-2 text-green-500 py-2 px-4 rounded-lg hover:scale-105 transform transition-transform duration-200" data-difficulty="Beginner">Beginner</button>
                                    <button type="button" class="difficulty-btn border-yellow-500 border-2 text-yellow-500 py-2 px-4 rounded-lg hover:scale-105 transform transition-transform duration-200" data-difficulty="Intermediate">Intermediate</button>
                                    <button type="button" class="difficulty-btn border-red-500 border-2 text-red-500 py-2 px-4 rounded-lg hover:scale-105 transform transition-transform duration-200" data-difficulty="Advanced">Advanced</button>
                                </div>

                                <!-- Task Description Section -->
                                <div id="taskDescription" class="my-4 text-gray-700"></div>

                                <div class="modal-buttons flex justify-around mt-4">
                                    <button type="button" class="close-btn border-red-600 border-2 text-red-600 py-2 px-4 rounded-lg hover:scale-105 transform transition-transform duration-200" id="closeBtn">Cancel</button>
                                    <button type="submit" class="go-btn bg-gray-400 text-gray-700 py-2 px-4 rounded-lg cursor-not-allowed" id="goBtn" disabled>Continue</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-app-layout>    
    </main>

    <script>
        const scores = @json($scores);
        let selectedWorkout = null;
        let selectedDifficulty = null;

        const workoutOptions = document.querySelectorAll('.workout-item');
        const difficultyBtns = document.querySelectorAll('.difficulty-btn');
        const modal = document.getElementById('modal');
        const workoutInput = document.getElementById('workoutInput');
        const difficultyInput = document.getElementById('difficultyInput');
        const taskInput = document.getElementById('taskInput');
        const taskDescription = document.getElementById('taskDescription');
        const goBtn = document.getElementById('goBtn');

        const tasks = {
            "Push-Up": {
                "Beginner": "Knees on floor push-up, 12 reps",
                "Intermediate": "Standard push-up, 20 reps",
                "Advanced": "Standard push-up, 30 reps"
            },
            "Squat": {
                "Beginner": "Partial squat reaching 45 degrees from standing position, 15 reps",
                "Intermediate": "Standard squat reaching 90 degrees from standing position, 20 reps",
                "Advanced": "Standard squat reaching 90 degrees from standing position, 30 reps"
            },
            "Plank": {
                "Beginner": "Hold plank position for 15 seconds",
                "Intermediate": "Hold plank position for 30 seconds",
                "Advanced": "Hold plank position for 60 seconds"
            }
        };

        // Check if a difficulty is selectable
        function isDifficultySelectable(workout, difficulty) {
            const levels = ["Beginner", "Intermediate", "Advanced"];
            const levelIndex = levels.indexOf(difficulty);

            if (levelIndex === 0) return true;

            const prevLevel = levels[levelIndex - 1];
            const prevScore = scores[workout]?.find(s => s.difficulty === prevLevel)?.max_score || 0;

            return prevScore >= 100;
        }

        // Enable/Disable buttons based on scores
        function updateButtonStates() {
            difficultyBtns.forEach(btn => {
                const difficulty = btn.dataset.difficulty;
                if (!isDifficultySelectable(selectedWorkout, difficulty)) {
                    btn.disabled = true;
                    btn.classList.add('opacity-50', 'cursor-not-allowed');
                } else {
                    btn.disabled = false;
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            });
        }

        // Handle workout selection
        workoutOptions.forEach(option => {
            option.addEventListener('click', function () {
                selectedWorkout = option.querySelector('p').innerText;
                document.getElementById('workout-title').innerText = `${selectedWorkout}: Select Difficulty`;
                workoutInput.value = selectedWorkout;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                updateButtonStates(); // Update button states based on the selected workout
            });
        });

        // Handle difficulty selection
        difficultyBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                difficultyBtns.forEach(b => {
                    b.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-red-500', 'text-white');
                    if (b.classList.contains('border-green-500')) {
                        b.classList.add('text-green-500');
                    } else if (b.classList.contains('border-yellow-500')) {
                        b.classList.add('text-yellow-500');
                    } else if (b.classList.contains('border-red-500')) {
                        b.classList.add('text-red-500');
                    }
                });

                if (btn.classList.contains('border-green-500')) {
                    btn.classList.remove('text-green-500');
                    btn.classList.add('bg-green-500', 'text-white');
                } else if (btn.classList.contains('border-yellow-500')) {
                    btn.classList.remove('text-yellow-500');
                    btn.classList.add('bg-yellow-500', 'text-white');
                } else if (btn.classList.contains('border-red-500')) {
                    btn.classList.remove('text-red-500');
                    btn.classList.add('bg-red-500', 'text-white');
                }

                selectedDifficulty = btn.dataset.difficulty;
                difficultyInput.value = selectedDifficulty;

                // Update the task description based on the selected workout and difficulty
                if (selectedWorkout && selectedDifficulty) {
                    taskDescription.innerText = `Task: ${tasks[selectedWorkout][selectedDifficulty]}`;
                }

                // Enable and style the Continue button
                goBtn.classList.remove('bg-gray-400', 'text-gray-700', 'cursor-not-allowed');
                goBtn.classList.add('bg-green-600', 'text-white');
                goBtn.disabled = false;
            });
        });

        goBtn.addEventListener('click', function () {
            if (selectedWorkout && selectedDifficulty) {
                document.getElementById('workoutInput').value = selectedWorkout;
                document.getElementById('difficultyInput').value = selectedDifficulty;
                document.getElementById('taskInput').value = tasks[selectedWorkout][selectedDifficulty];

                document.getElementById('workoutForm').submit();
            } else {
                alert("Please select a valid workout and difficulty.");
            }
        });

        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        // Close modal on Cancel button click
        document.getElementById('closeBtn').addEventListener('click', closeModal);

        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            selectedWorkout = null;
            selectedDifficulty = null;
            workoutInput.value = '';
            difficultyInput.value = '';
            taskInput.value = '';
            taskDescription.innerText = '';
            goBtn.disabled = true;
            goBtn.classList.add('bg-gray-400', 'text-gray-700', 'cursor-not-allowed');
            goBtn.classList.remove('bg-green-600', 'text-white');
            difficultyBtns.forEach(btn => btn.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-red-500', 'text-white'));
        }
    </script>
</body>
</html>
