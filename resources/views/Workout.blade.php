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

            <div class="py-12">
                <div class="container mx-auto text-center">
                    <h1 class="text-4xl font-bold mb-4 text-gray-800">Select Your Workout</h1>
                    
                    <form id="workoutForm" action="{{ route('FitCheck') }}" method="POST">
                        @csrf
                        <input type="hidden" name="workout" id="workoutInput">
                        <input type="hidden" name="difficulty" id="difficultyInput">

                        <div class="flex justify-around mt-8">
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
                                <h2 class="text-xl font-bold mb-6" id="workout-title">Select Difficulty</h2>
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
        let selectedWorkout = null;
        let selectedDifficulty = null;

        const workoutOptions = document.querySelectorAll('.workout-item');
        const difficultyBtns = document.querySelectorAll('.difficulty-btn');
        const modal = document.getElementById('modal');
        const workoutInput = document.getElementById('workoutInput');
        const difficultyInput = document.getElementById('difficultyInput');
        const taskDescription = document.getElementById('taskDescription');
        const goBtn = document.getElementById('goBtn');

        const tasks = {
            "Push-Up": {
                "Beginner": "Knees on floor push-up, 15 reps",
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

        workoutOptions.forEach(option => {
            option.addEventListener('click', function () {
                selectedWorkout = option.querySelector('p').innerText;
                document.getElementById('workout-title').innerText = `${selectedWorkout}: Select Difficulty`;
                workoutInput.value = selectedWorkout;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        difficultyBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                difficultyBtns.forEach(b => b.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-red-500', 'text-white'));
                btn.classList.add('text-white');

                if (btn.classList.contains('text-green-500')) {
                    btn.classList.add('bg-green-500');
                } else if (btn.classList.contains('text-yellow-500')) {
                    btn.classList.add('bg-yellow-500');
                } else if (btn.classList.contains('text-red-500')) {
                    btn.classList.add('bg-red-500');
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

        document.getElementById('closeBtn').addEventListener('click', function () {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            selectedWorkout = null;
            selectedDifficulty = null;
            workoutInput.value = '';
            difficultyInput.value = '';
            taskDescription.innerText = '';
            goBtn.disabled = true;
            goBtn.classList.add('bg-gray-400', 'text-gray-700', 'cursor-not-allowed');
            goBtn.classList.remove('bg-green-600', 'text-white');
            difficultyBtns.forEach(btn => btn.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-red-500', 'text-white'));
        });
    </script>
</body>
</html>
