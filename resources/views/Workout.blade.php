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
                        <!-- Hidden inputs to store workout and difficulty -->
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
                        
                        <!-- Difficulty modal -->
                        <div class="modal fixed inset-0 hidden bg-black bg-opacity-60 justify-center items-center" id="modal">
                            <div class="bg-white p-8 rounded-lg text-center max-w-md w-full">
                                <h2 class="text-xl font-bold mb-6" id="workout-title">Select Difficulty</h2>
                                <div class="flex justify-around my-4">
                                    <button type="button" class="difficulty-btn bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg" data-difficulty="Beginner">Beginner</button>
                                    <button type="button" class="difficulty-btn bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg" data-difficulty="Intermediate">Intermediate</button>
                                    <button type="button" class="difficulty-btn bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg" data-difficulty="Expert">Expert</button>
                                </div>
                                <div class="modal-buttons flex justify-around mt-4">
                                    <button type="button" class="close-btn bg-red-600 text-white py-2 px-4 rounded-lg" id="closeBtn">Close</button>
                                    <button type="submit" class="go-btn bg-green-600 text-white py-2 px-4 rounded-lg" id="goBtn" disabled>Go</button>
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
        const goBtn = document.getElementById('goBtn');

        // Handle workout selection click
        workoutOptions.forEach(option => {
            option.addEventListener('click', function () {
                selectedWorkout = option.querySelector('p').innerText;
                document.getElementById('workout-title').innerText = `${selectedWorkout}: Select Difficulty`;
                workoutInput.value = selectedWorkout;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        // Handle difficulty selection
        difficultyBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                selectedDifficulty = btn.dataset.difficulty;
                difficultyInput.value = selectedDifficulty;
                goBtn.disabled = false; // Enable "Go" button
            });
        });

        // Close modal
        document.getElementById('closeBtn').addEventListener('click', function () {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            selectedWorkout = null;
            selectedDifficulty = null;
            workoutInput.value = '';
            difficultyInput.value = '';
            goBtn.disabled = true;
        });
    </script>
</body>
</html>
