<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FitCheck | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        #camera-container {
            display: flex;
            justify-content: center;
            align-items: center; /* Center vertically */
            margin-top: 20px;
            background-color: black; /* Black background */
            height: 70%; /* Set a height for the camera container */
            width: 70%;
            position: relative; /* For absolute positioning of the button */
        }
        #video-stream {
            width: 100%;
            height: 100%;
            border: 2px solid black;
            display: none; /* Hide video initially */
        }
        #start-camera {
            position: absolute; /* Center the button within the container */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Center it */
            background-color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 10; /* Above the camera feed */
        }
    </style>
</head>
<body>
    <main>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('FitCheck') }}
                </h2>
                <h2 class="text-xl text-gray-800 leading-tight">
                    {{ __('Enjoy your workout!') }}
                </h2>
            </x-slot>

            <div class="container mx-auto mb-4 pt-4">
                <div class="text-left flex justify-between items-center">
                    <a id="back-to-workout-link" href="#" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-200">
                        {{ __('← Back to Workout Selection') }}
                    </a>
                    <button id="help-button" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-200">
                        <img src="https://img.icons8.com/material-outlined/24/000000/help.png" alt="help icon" class="mr-2"/>
                        {{ __('Help') }}
                    </button>
                </div>
            </div>

            <!-- Confirmation Modal for Back to Workout Selection-->
            <div id="leave-session-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">{{ __('Leave Workout Session?') }}</h3>
                    <p class="text-gray-600 mb-6">{{ __('Are you sure you want to leave this session? Unsaved progress will be lost.') }}</p>
                    <div class="flex justify-between">
                        <button id="cancel-leave-session" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                            {{ __('No') }}
                        </button>
                        <a id="confirm-leave-session" href="{{ route('Workout') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            {{ __('Yes') }}
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="container mx-auto text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                    Selected Workout: {{ $workout }}
                </h2>
                <h2 class="text-xl text-gray-600">
                    Difficulty Level: {{ $difficulty }}
                </h2>
                <h2 id="workout-task" class="text-xl text-gray-600">
                    Objective: {{ $task }}
                </h2>
                <h2 id="timer" class="text-xl text-red-600 font-bold mt-2">
                    Timer: 10:00
                </h2>
            </div>
            
            <div class="py-12 flex justify-center">
                <!-- Camera Container -->
                <div id="camera-container" class="flex flex-col items-center">
                    <button id="start-camera" class="px-6 py-2 bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none">
                        {{ __('Start Camera') }}
                    </button>
                    <img id="video" alt="Live Posture Check" class="mt-4 w-70 h-auto rounded-lg shadow-lg">
                </div>
            
                <!-- Workout Status Table -->
                <div class="ml-8 text-xl text-gray-600 space-y-4 w-64 flex flex-col justify-center">
                    <!-- Waiting for Camera -->
                    <div id="script-output" class="font-mono text-2xl text-center">
                        {{ __('Waiting for Camera:') }}
                    </div>
            
                    {{-- <!-- Reps -->
                    <div id="script-output1" class="text-left text-2xl font-semibold">
                        {{ __('Reps:') }}
                    </div>

                    <!-- Sets -->
                    <div id="script-output2" class="text-left text-2xl font-semibold">
                        {{ __('Sets:') }}
                    </div>
            
                    <!-- Stage -->
                    <div id="script-output3" class="text-left text-2xl font-semibold">
                        {{ __('Stage:') }}
                    </div>
            
                    <!-- Score -->
                    <div id="script-output4" class="text-left text-2xl font-semibold">
                        {{ __('Score:') }}
                    </div>
            
                    <!-- Posture Feedback -->
                    <div id="script-output5" class="text-left text-2xl font-semibold bg-gray-200 p-2 rounded-md shadow-sm h-16 whitespace-normal overflow-y-auto">
                        {{ __('Posture Feedback') }}
                    </div> --}}

                    @if($workout !== 'Plank')
                        <div id="script-output1" class="text-left text-2xl font-semibold">
                            {{ __('Reps:') }} 0/{{ $reps }}
                        </div>
                        <div id="script-output2" class="text-left text-2xl font-semibold">
                            {{ __('Sets:') }} 0/{{ $sets }}
                        </div>
                    @endif
                    <div id="script-output3" class="text-left text-2xl font-semibold">
                        {{ $workout === 'Plank' ? __('Time: 0/'.$duration.' sec') : __('Stage:') }}
                    </div>
                    <div id="script-output4" class="text-left text-2xl font-semibold">
                        {{ __('Score:') }}
                    </div>
                    <div id="script-output5" class="text-left text-2xl font-semibold bg-gray-200 p-2 rounded-md shadow-sm h-16 whitespace-normal overflow-y-auto">
                        {{ __('Posture Feedback') }}
                    </div>
                </div>
            </div>

            <!-- New button to stop workout -->
            <div class="text-center mt-6">
                <button id="end-workout-button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    {{ __('End Workout') }}
                </button>
            </div>

            <!-- Confirmation Modal -->
            <div id="confirmation-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">{{ __('End Workout Early?') }}</h3>
                    <p class="text-gray-600 mb-6">{{ __('Are you sure you want to stop the workout early? Your workout session will still be saved in your workout history.') }}</p>
                    <div class="flex justify-between">
                        <button id="cancel-end-workout" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                            {{ __('No') }}
                        </button>
                        <button id="confirm-end-workout" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            {{ __('Yes') }}
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Workout Results Modal -->
            <div id="results-modal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                <div class="modal-content bg-white rounded-lg p-6 relative max-w-md mx-auto text-center">
                    <h2 class="text-2xl font-bold mb-4">Workout Results</h2>
                    <p><strong>Workout:</strong> {{ $workout }}</p>
                    <p><strong>Difficulty:</strong> {{ $difficulty }}</p>
                    <p><strong>Objective:</strong> {{ $task }}</p>
                    <p><strong>Score:</strong><pre id="modalResult"></pre></p>
                    
                    <!-- Score Progress Bar -->
                    <div class="w-full bg-gray-200 rounded-full h-4 mt-2 mb-4">
                        <div id="progress-bar" class="bg-green-500 h-4 rounded-full" style="width: 0;"></div>
                    </div>

                    <!-- Buttons for Retry and Back to Workout Selection -->
                    <div class="flex justify-between mt-6">
                        <button id="retry-button" class="border border-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-100">
                            {{ __('Retry') }}
                        </button>
                        <a href="{{ route('Workout') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            {{ __('Back to Workout Selection') }}
                        </a>
                    </div>

                    <!-- Close Button for Results Modal -->
                    <button id="close-results-modal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
                </div>
            </div>
        </x-app-layout>
    </main>

    <!-- Add this new modal for enlarged images -->
    <div id="image-modal" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black bg-opacity-75">
        <div class="relative max-w-4xl mx-auto p-4">
            <button id="close-image-modal" class="absolute top-4 right-4 text-slate hover:text-slate-300 text-3xl">&times;</button>
            <img id="enlarged-image" src="" alt="Enlarged view" class="max-h-[90vh] max-w-full object-contain">
        </div>
    </div>

    <!-- Help Modal -->
    <div id="modal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="modal-content bg-white rounded-lg p-6 relative max-w-md mx-auto">
            <button id="close-modal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
            <div class="modal-slide">
                <h2 class="text-xl font-bold">{{ __("Let's get started on your FitCheck!") }}</h2>
                <p>{{ __('This page uses human pose estimation to verify the correctness of your posture during bodyweight workouts.') }}</p>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold">{{ __('FitCheck Guide') }}</h2>
                <img src="../assets/images/help1.PNG" alt="FitCheck Guide: Upper Section" class="w-full rounded transform scale-90"/>
                <ul class="list-disc pl-5 text-sm">
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Back to Workout Selection:') }}</span>
                      {{ __('Returns you to the Workout Selection. This will not save your workout session.') }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Help:') }}</span>
                      {{ __('A help guide to walk you through the FitCheck.') }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Selected Workout and Difficulty Level:')}}</span>
                      {{ __('Your selected workout and difficulty level.') }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Objective:') }}</span>
                      {{ __('The number of sets and reps (for push-ups and squats) or seconds (for planks) you must do to complete the workout.') }}
                    </li>
                    <li>
                      <span class="font-semibold">{{ __('Timer:') }}</span>
                      {{ __('You are given ten (10) minutes to fulfill the objective.') }}
                    </li>
                </ul>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold">{{ __('FitCheck Guide') }}</h2>
                <img src="../assets/images/help2.PNG" alt="FitCheck Guide: Middle Section" class="w-full rounded transform scale-90"/>
                <ul class="list-disc pl-5 text-sm">
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Prediction:') }}</span>
                      {{ __("FitFocus's prediction on whether your current posture is correct or incorrect.") }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Reps and Sets:')}}</span>
                      {{ __('The number of repetitions and sets you have completed regardless of its correctness. This is replaced with time for plank workouts.') }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Stage:') }}</span>
                      {{ __('An indicator on the status of your rep during a push-up or squat, describing whether you are up or down.') }}
                    </li>
                    <li>
                      <span class="font-semibold">{{ __('Score:') }}</span>
                      {{ __('Your current score based on how many correct reps you have done (for push-ups & squats) or how long you hold the correct posture (planks).') }}
                    </li>
                </ul>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold">{{ __('FitCheck Guide') }}</h2>
                <img src="../assets/images/help3.PNG" alt="FitCheck Guide: Lower Section" class="w-full rounded transform scale-90"/>
                <ul class="list-disc pl-5 text-sm">
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Live Camera Feed:') }}</span>
                      {{ __('A mirrored view of the camera feed with your calculated body angles to assist you in reaching the correct posture.') }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Posture Indicator:') }}</span>
                      {{ __("A visual indicator on whether your current posture is correct or incorrect.") }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('End Workout Button:')}}</span>
                      {{ __('A button on the bottom of the page to manually end your workout. This will save your session to your workout history.') }}
                    </li>
                </ul>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold mb-4">{{ __('Results') }}</h2>
                <img src="../assets/images/help-score1.PNG" alt="FitCheck Guide: Scoring for Push-Ups and Squats" class="w-full rounded transform scale-90"/>
                <ul class="list-disc pl-5 text-sm">
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Workout and Difficulty:') }}</span>
                      {{ __('Your selected exercise and difficulty level.') }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Objective:') }}</span>
                      {{ __("The goal that you must achieve in your workout.") }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Score:')}}</span>
                      {{ __('The first half signifies the raw score, showing how many reps were completed in the proper form over the total number of reps needed to be accomplished. The second half demonstrates the score percentage out of 100, displaying your rate of completion for the objective.') }}
                    </li>
                </ul>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold mb-4">{{ __('How Scoring Works in FitFocus') }}</h2>
                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('Your FitFocus score tells you how well you completed your workout in proper form—not just whether you finished, but how correctly you did it.')}}
                </p>
                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('Push-ups and squats are scored based on your accuracy and consistency. We count how many reps you did with good posture then we divide that by the total reps you were supposed to do.') }}
                </p>
                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('Each workout has a target number of repetitions and sets—for example, 2 sets of 6 squats means your goal is 12 perfect squats in total. If you did 1 reps in the proper form, your score will be:') }}
                </p>
                <p class="mb-4 text-pretty md:text-balance text-center">
                    {{ __('Score = (11 ÷ 12) × 100 = 92%') }}
                </p>
                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('That means you hit 92% of your goal with proper form. Good job!') }}
                </p>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold mb-4">{{ __('How Scoring Works in FitFocus') }}</h2>
                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('For planks, it\'s all about holding steady in the right position for the right amount of time.') }}
                </p>
                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('Your score is calculated by measure the number of seconds you held the correct posture then dividing that by the total time goal.') }}
                </p>
                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('For example, if the objective is to hold the plank for 60 seconds and you manage to hold the correct posture for 45 seconds, then your score will be:') }}
                </p>
                <p class="mb-4 text-pretty md:text-balance text-center">
                    {{ __('Score = (45 ÷ 60) × 100 = 75%') }}
                </p>
                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('That means you maintained good posture for 75% of the time. Great work!') }}
                </p>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold mb-4">{{ __('Visual and Auditory Indicators') }}</h2>
                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('The visual indicator is located to the right of the camera feed and below the score. This indicator will flash') }} 
                    <span class="text-green-500 font-semibold">{{ __('green') }}</span> {{ __('if your posture is correct,') }} 
                    <span class="text-red-500 font-semibold">{{ __('red') }}</span> {{ __('if it is incorrect, and ') }}
                    <span class="text-gray-500 font-semibold">{{ __('gray') }}</span> {{ __('if there is no posture detected.') }}
                </p>

                <div class="flex space-x-4 mb-4">
                    <div class="flex items-center text-center justify-center w-32 h-12 bg-green-500 text-white font-bold rounded-lg">
                        {{ __('Correct Posture') }}
                    </div>
                    <div class="flex items-center text-center justify-center w-32 h-12 bg-red-500 text-white font-bold rounded-lg">
                        {{ __('Incorrect Posture') }}
                    </div>
                    <div class="flex items-center text-center justify-center w-32 h-12 bg-gray-500 text-white font-bold rounded-lg">
                        {{ __('No Posture') }}
                    </div>
                </div>

                <p class="mb-4 text-pretty md:text-balance text-justify">
                    {{ __('There are also auditory indicators present. A ding will indicate correct posture while a buzzer sound will indicate incorrect posture. 
                    Press the buttons below to preview the sounds.') }}
                </p>
                <div class="flex space-x-4 justify-center">
                    <div onclick="playHelpSound('correct')" class="cursor-pointer flex items-center justify-center w-32 h-12 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600">
                        {{ __('Correct Sound') }}
                    </div>
                    <div onclick="playHelpSound('incorrect')" class="cursor-pointer flex items-center justify-center w-32 h-12 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600">
                        {{ __('Incorrect Sound') }}
                    </div>
                </div>

                <audio id="correct-sound" preload="auto">
                    <source src="{{ asset('sounds/correct_sound.mp3') }}" type="audio/mpeg">
                </audio>
                <audio id="incorrect-sound" preload="auto">
                    <source src="{{ asset('sounds/error_sound.mp3') }}" type="audio/mpeg">
                </audio>

                <script>
                    function playHelpSound(type) {
                        let sound = document.getElementById(type + "-sound");
                        if (sound) {
                            try {
                                sound.pause(); // Stop any previous play
                                sound.currentTime = 0; // Reset to start
                                sound.play(); // Play the sound
                            } catch (error) {
                                console.error("Error playing sound:", error);
                            }
                        }
                    }
                </script>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold mb-4">{{ __('How to Correct Your Posture?') }}</h2>
                <p class="mb-4 text-pretty text-justify">
                    {{ __('Here are a few things you can do to correct your posture:') }}
                </p>
                <ul class="list-disc pl-5 text-sm">
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Push-Ups: ') }}</span>
                      {{ __('Keep your body in a straight line from head to heels. Engage your core and don\'t let your hips sag or stick up. Lower yourself until your elbows are at a 90° angle, then push back up. Keep your elbows close to your body, not flared out wide.') }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Squats: ') }}</span>
                      {{ __("Keep your feet shoulder-width apart. Push your hips back and down as if sitting in a chair. Keep your knees behind your toes and don’t let them go too far forward. Keep your back straight and chest lifted throughout.") }}
                    </li>
                    <li class="mb-1">
                      <span class="font-semibold">{{ __('Planks: ')}}</span>
                      {{ __('Your body should form a straight line. Engage your abs, glutes, and legs to stay stable. Elbows should be directly under your shoulders.') }}
                    </li>
                </ul>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold">{{ __('Reminder:') }}</h2>
                <p>{{ __("Don't forget to do warm-up and cooldown exercises before and after your workout! You can 
                see some sample warm-ups and cooldowns you can do at the Workout Library.") }}</p>
            </div>

            <!-- Navigation buttons for slides -->
            <div class="flex justify-between mt-4">
                <button id="prev-slide" class="hidden text-gray-700 hover:text-gray-900">❮ Previous</button>
                <button id="next-slide" class="text-gray-700 hover:text-gray-900 ml-auto">Next ❯</button> <!-- Moved to the right side -->
            </div>
            
            <!-- Centered Get Started button on the last slide -->
            <button id="get-started" class="hidden mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mx-auto block">Get started!</button>

            <!-- Slide indicator dots -->
            <div class="flex justify-center mt-4">
                <span class="dot w-3 h-3 rounded-full bg-blue-500 mx-1"></span>
                <span class="dot w-3 h-3 rounded-full bg-gray-300 mx-1"></span>
                <span class="dot w-3 h-3 rounded-full bg-gray-300 mx-1"></span>
                <span class="dot w-3 h-3 rounded-full bg-gray-300 mx-1"></span>
                <span class="dot w-3 h-3 rounded-full bg-gray-300 mx-1"></span>
                <span class="dot w-3 h-3 rounded-full bg-gray-300 mx-1"></span>
                <span class="dot w-3 h-3 rounded-full bg-gray-300 mx-1"></span>
                <span class="dot w-3 h-3 rounded-full bg-gray-300 mx-1"></span>
                <span class="dot w-3 h-3 rounded-full bg-gray-300 mx-1"></span>
                <span class="dot w-3 h-3 rounded-full bg-gray-300 mx-1"></span>
            </div>
        </div>
    </div>
    <script>
        // Make images clickable and show enlarged version
        document.addEventListener('DOMContentLoaded', function() {
            const imageModal = document.getElementById('image-modal');
            const enlargedImage = document.getElementById('enlarged-image');
            const closeImageBtn = document.getElementById('close-image-modal');
            
            // Get all images in the help modal
            const modalImages = document.querySelectorAll('.modal-content img');
            
            // Add click event to each image
            modalImages.forEach(img => {
                img.style.cursor = 'pointer';
                img.addEventListener('click', function() {
                    enlargedImage.src = this.src;
                    enlargedImage.alt = this.alt;
                    imageModal.classList.remove('hidden');
                    imageModal.classList.add('flex');
                });
            });
            
            // Close enlarged image when clicking the close button
            closeImageBtn.addEventListener('click', function() {
                imageModal.classList.remove('flex');
                imageModal.classList.add('hidden');
            });
            
            // Close enlarged image when clicking outside the image
            imageModal.addEventListener('click', function(e) {
                if (e.target === imageModal) {
                    imageModal.classList.remove('flex');
                    imageModal.classList.add('hidden');
                }
            });
        });

        const video = document.getElementById('video');
        const startCameraButton = document.getElementById('start-camera');
        const modal = document.getElementById('modal');
        const closeModalButton = document.getElementById('close-modal');
        const helpButton = document.getElementById('help-button');
        const slides = document.querySelectorAll('.modal-slide');
        const nextSlideButton = document.getElementById('next-slide');
        const prevSlideButton = document.getElementById('prev-slide');
        const getStartedButton = document.getElementById('get-started');
        let currentSlide = 0;
        const scriptOutput = document.getElementById('script-output');
        const scriptOutput1 = document.getElementById('script-output1');
        const scriptOutput2 = document.getElementById('script-output2');
        const scriptOutput3 = document.getElementById('script-output3');
        const scriptOutput4 = document.getElementById('script-output4');
        const scriptOutput5 = document.getElementById('script-output5');
        const modalResult = document.getElementById('modalResult');
        let isCameraActive = false;
        let isModalShown = false;
        let timer = document.getElementById('timer');
        let countdownInterval;
        let isFetching = true;
        timer.style.color = 'green';
        let isCooldownActive = false;
        let previousSets = 0;

        const errorSound = new Audio('{{ asset('sounds/error_sound.mp3') }}');
        const correctSound = new Audio('{{ asset('sounds/correct_sound.mp3') }}');
        const downSound = new Audio('{{ asset('sounds/down_sound.mp3') }}');
        const upSound = new Audio('{{ asset('sounds/up_sound.mp3') }}');
        const dingSound = new Audio('{{ asset('sounds/ding_sound.mp3') }}');
        let lastSignal = null;

        const workout = "{{ $workout }}";
        const difficulty = "{{ $difficulty }}";
        const targetReps = {{ $reps ?? 'null' }};
        const targetSets = {{ $sets ?? 'null' }};
        const targetDuration = {{ $duration ?? 'null' }};
        let finalScore;

        // Function to show modal
        function showModal() {
            modal.classList.remove('hidden');
            currentSlide = 0;
            updateSlides();
        }

        // Function to hide modal
        function hideModal() {
            modal.classList.add('hidden');
        }

        // Update slide visibility and dot indicators
        function updateSlides() {
            slides.forEach((slide, index) => {
                slide.classList.toggle('hidden', index !== currentSlide);
            });
            document.querySelectorAll('.dot').forEach((dot, index) => {
                dot.classList.toggle('bg-blue-500', index === currentSlide);
                dot.classList.toggle('bg-gray-300', index !== currentSlide);
            });
            prevSlideButton.classList.toggle('hidden', currentSlide === 0);
            nextSlideButton.classList.toggle('hidden', currentSlide === slides.length - 1);
            getStartedButton.classList.toggle('hidden', currentSlide !== slides.length - 1);
        }

        // Function to start the countdown timer
        function startTimer(duration) {
            let timeRemaining = duration; // Time in seconds (10 minutes = 600 seconds)

            // Clear any existing timer interval
            if (countdownInterval) {
                clearInterval(countdownInterval);
            }

            // Update the timer display every second
            countdownInterval = setInterval(() => {
                let minutes = Math.floor(timeRemaining / 60);
                let seconds = timeRemaining % 60;

                // Format the time as mm:ss
                timer.textContent = `Timer: ${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;

                // Decrement the timer
                if (timeRemaining > 0) {
                    timeRemaining--;
                } else {
                    clearInterval(countdownInterval);
                    timer.textContent = 'Time\'s up!';
                    timer.style.color = 'red';
                    isTimerActive = false;
                    stop_prediction();
                }
            }, 1000); // 1000ms = 1 second
        }

        function stop_prediction() {
            isFetching = false; // Stop fetchPrediction loop
            resultsModal.classList.remove('hidden'); // Show results modal
            modalResult.textContent = scriptOutput4.textContent.split('Score: ')[1].trim() // Display final score in modal
            isModalShown = true; // Prevent re-triggering the modals

            //let finalScore;

            if (workout === "Push-Up" || workout === "Squat") {
                // For Push-Up or Squat, extract the percentage part
                // const scoreText = scriptOutput4.textContent.split('Score: ')[1].trim().split(' '); // Extract text after "Score: "
                // const secondScore = scoreText[2]; // Get the second score
                // finalScore = parseInt(secondScore.split('/')[0]);
                // const scoreText = scriptOutput4.textContent.split('Score: ')[1].trim();
                // finalScore = parseInt(scoreText.split('/')[0]);


                // const scoreText = scriptOutput4.textContent.split('Score: ')[1].trim();
                // const [score, total] = scoreText.split('/').map(Number); // Convert both parts to numbers
                // finalScore = (score / total) * 100;

                const scoreText = scriptOutput4.textContent.split('Score: ')[1].trim();
                const finalScore1 = parseInt(scoreText.split('/')[0]);
                const finalScore2 = parseInt(scoreText.split('/')[1]);

                finalScore = (finalScore1 / finalScore2) * 100;

            } else {
                // For plank, extract the single value
                finalScore = parseInt(scriptOutput4.textContent.split('Score: ')[1].trim());
            }

            // Extract workout details
            const sessionData = {
                exercise: workout,
                difficulty: difficulty,
                score: finalScore,
            };

            // Send POST request to save data
            fetch('/save-workout-session', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify(sessionData),
            })
                .then(response => {
                    if (!response.ok) {
                        // Log error if response is not OK
                        console.error(`Error: HTTP ${response.status} - ${response.statusText}`);
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => console.log(data.message))
                .catch(error => console.error('Error saving workout session:', error));
        }

        // Request access to the camera
        startCameraButton.addEventListener('click', () => {
            // Start the camera feed
            video.src = "http://127.0.0.1:5000/delay_feed"; // Set the src when the button is clicked
            video.style.display = 'block'; // Show video after countdown finishes
            video.style.height = '100%';
            video.style.width = '100%';
            startCameraButton.style.display = 'none'; // Hide button after starting camera
            isFetching = false;

            let countdown = 10; // 10-second countdown
            const countdownDisplay = document.createElement('div'); // Create a countdown display element
            countdownDisplay.style.position = 'absolute';
            countdownDisplay.style.top = '50%';
            countdownDisplay.style.left = '50%';
            countdownDisplay.style.transform = 'translate(-50%, -50%)';
            countdownDisplay.style.fontSize = '2rem';
            countdownDisplay.style.color = 'red';
            countdownDisplay.style.textAlign = 'center';
            countdownDisplay.style.zIndex = '20'; 

            // Create the overlay element
            const overlay = document.createElement('div');
            overlay.style.position = 'absolute';
            overlay.style.top = '0';
            overlay.style.left = '0';
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'black';
            overlay.style.opacity = '0.25'; // 25% opacity
            overlay.style.zIndex = '10'; // Ensure it sits above the video

            video.parentElement.appendChild(overlay);
            video.parentElement.appendChild(countdownDisplay);

            const countdownInterval = setInterval(() => {
                countdownDisplay.textContent = `Starting in ${countdown} seconds...`;
                countdown -= 1;
                if (countdown < 0) {
                    isFetching = true;
                    clearInterval(countdownInterval);
                    video.parentElement.removeChild(overlay);
                    video.parentElement.removeChild(countdownDisplay); // Remove the countdown display
                    video.src = "http://127.0.0.1:5000/video_feed"; // Set the src when the button is clicked
                    video.style.display = 'block'; // Show video after countdown finishes
                    video.style.height = '100%';
                    video.style.width = '100%';
                    startCameraButton.style.display = 'none'; // Hide button after starting camera
                    timer.style.color = 'red';
                    isCameraActive = true; //flag to check if camera is active
                    startTimer(600); // Start the timer with 10 minutes (600 seconds)
                }
            }, 1000);
        });

        function handleSetIncrease() {
            if (isCooldownActive) return; // Prevent duplicate cooldowns
            isCooldownActive = true;

            console.log("Cooldown started: Switching to delay_feed");

            // Switch to delay feed
            video.src = "http://127.0.0.1:5000/delay_feed";

            // Create overlay for cooldown
            const overlay = document.createElement("div");
            overlay.style.position = "absolute";
            overlay.style.top = "0";
            overlay.style.left = "0";
            overlay.style.width = "100%";
            overlay.style.height = "100%";
            overlay.style.backgroundColor = "black";
            overlay.style.opacity = "0.5";
            overlay.style.zIndex = "10";
            video.parentElement.appendChild(overlay);

            // Create countdown display
            const countdownDisplay = document.createElement("div");
            countdownDisplay.style.position = "absolute";
            countdownDisplay.style.top = "50%";
            countdownDisplay.style.left = "50%";
            countdownDisplay.style.transform = "translate(-50%, -50%)";
            countdownDisplay.style.fontSize = "2rem";
            countdownDisplay.style.color = "red";
            countdownDisplay.style.textAlign = "center";
            countdownDisplay.style.zIndex = "20";
            video.parentElement.appendChild(countdownDisplay);

            let countdown = 90;
            if (workout === "Squat") {
                countdown = 30;
            }

            const countdownInterval = setInterval(() => {
                countdownDisplay.textContent = `Rest for ${countdown} seconds...`;
                countdown--;

                if (countdown < 0) {
                    clearInterval(countdownInterval);
                    isCooldownActive = false;

                    // Remove overlay and countdown display
                    video.parentElement.removeChild(overlay);
                    video.parentElement.removeChild(countdownDisplay);

                    console.log("Cooldown ended: Switching back to video_feed");

                    // Resume normal video feed
                    video.src = "http://127.0.0.1:5000/video_feed";
                }
            }, 1000);
        }

        function fetchPrediction() {
            if (!isFetching || !isCameraActive) { // Stop if not fetching prediction or if camera is active
                scriptOutput.textContent = "Waiting for Camera"; // Keep showing "No data" if camera is not active
                
                if (workout === "Plank"){
                    scriptOutput1.style.display = 'none';
                    scriptOutput2.style.display = 'none';
                    scriptOutput3.textContent = "Time: ";
                    scriptOutput4.textContent = "Score: ";
                }else if (workout === "Push-Up" || workout === "Squat"){
                    scriptOutput1.textContent = "Reps: ";
                    scriptOutput2.textContent = "Sets: ";
                    scriptOutput3.textContent = "Stage: ";
                    scriptOutput4.textContent = "Score: ";
                }
                return;
            }
            
            fetch("http://127.0.0.1:5000/get_prediction")                
                .then(response => response.json())
                .then(data => {
                    scriptOutput.textContent = `Prediction: ${data.latest_prediction.prediction.charAt(0).toUpperCase() + data.latest_prediction.prediction.slice(1)} Posture`;

                    if (data.sets > previousSets) {
                        handleSetIncrease();
                    }
                    previousSets = data.sets;
                    
                    // Update the background color based on the prediction
                    if (data.latest_prediction.prediction === "correct") {
                        scriptOutput5.textContent = "Correct Posture";
                        scriptOutput5.style.backgroundColor = "green";
                        scriptOutput5.style.color = "white";
                    } else if (data.latest_prediction.prediction === "incorrect"){
                        scriptOutput5.textContent = "Incorrect Posture";
                        scriptOutput5.style.backgroundColor = "red";
                        scriptOutput5.style.color = "white";
                    } else {
                        scriptOutput5.textContent = "No Posture";
                        scriptOutput5.style.backgroundColor = "white";
                        scriptOutput5.style.color = "black";
                    }

                    if (workout === "Plank"){
                        if (data.stage === "completed"){
                            scriptOutput3.textContent = `Time:  ${data.total_time} sec - Completed`;
                        }else{
                            scriptOutput3.textContent = `Time:  ${data.total_time} sec`;
                        }
                        const roundedScore = Math.ceil(data.score);
                        scriptOutput4.textContent = `Score:  ${roundedScore}/100`;
                        updateProgressBar(roundedScore);
                    }else if (workout === "Push-Up" || workout === "Squat"){
                        scriptOutput1.textContent = `Reps:  ${data.repetitions}`;
                        scriptOutput2.textContent = `Sets:  ${data.sets}`;
                        scriptOutput3.textContent = `Stage:  ${data.stage}`;
                        //const roundedScore = Math.ceil(data.score);
                        //scriptOutput4.textContent = `Score:  ${roundedScore}/100`;
                        // scriptOutput4.textContent = `Score:  ${data.score}/100`;
                        // updateProgressBar(data.score);

                        scriptOutput4.textContent = `Score:  ${data.score}/100`;
                        // const scoreValue = parseInt(data.score);
                        // updateProgressBar(scoreValue);
                        const scoreText = scriptOutput4.textContent.split('Score: ')[1].trim();
                        const finalScore1 = parseInt(scoreText.split('/')[0]);
                        const finalScore2 = parseInt(scoreText.split('/')[1]);

                        finalScore = (finalScore1 / finalScore2) * 100;
                        updateProgressBar(finalScore);
                    }
                    if (data.stage === "completed" && !isModalShown){
                        stop_prediction();
                        clearInterval(countdownInterval); // Stop the timer
                        timer.textContent = 'Workout Complete!';
                    }
                    if (data.signal && data.signal !== lastSignal) {
                        playSound(data.signal);
                        lastSignal = data.signal; // Update last played signal
                    }
                })
                .catch(error => console.error('Error fetching prediction:', error));
        }

        // Function to play sound
        function playSound(signal) {
            // Stop all sounds when no signal is received (user out of frame)
            if (signal === "no_signal") {
                errorSound.pause();
                errorSound.currentTime = 0;
                correctSound.pause();
                correctSound.currentTime = 0;
                downSound.pause();
                downSound.currentTime = 0;
                upSound.pause();
                upSound.currentTime = 0;
                dingSound.pause();
                dingSound.currentTime = 0;
                return;
            }
            
            if (signal === "error_sound") {
                errorSound.play().catch(error => console.error('Error playing error sound:', error));
            } else if (signal === "correct_sound") {
                correctSound.play().catch(error => console.error('Error playing correct sound:', error));
            } else if (signal === "down_sound") {
                downSound.play().catch(error => console.error('Error playing down sound:', error));
            } else if (signal === "up_sound") {
                upSound.play().catch(error => console.error('Error playing up sound:', error));
            } else if (signal === "ding_sound") {
                dingSound.play().catch(error => console.error('Error playing ding sound:', error));
            }
        }

        // Function to update the progress bar width
        function updateProgressBar(score) {
            const progressBar = document.getElementById('progress-bar');
            progressBar.style.width = `${score}%`; // Set the width based on the score
        }

        setInterval(() => {
            if (isFetching) {
                fetchPrediction();
            }
        }, 1000);

        // // Function to send workout type to Flask backend
        // function setWorkout(workoutType, difficulty) {
        //     fetch('http://127.0.0.1:5000/set_workout', {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        //         },
        //         body: JSON.stringify({ workout: workoutType, difficulty: difficulty }),
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         console.log('Workout set:', data);
        //     })
        //     .catch((error) => {
        //         console.error('Error:', error);
        //     });
        // }

        // Send workout configuration to Flask
        function setWorkout(workoutType, difficulty) {
            fetch('http://127.0.0.1:5000/set_workout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ 
                    workout: workoutType, 
                    difficulty: difficulty,
                    reps: targetReps,
                    sets: targetSets,
                    duration: targetDuration
                }),
            })
            .then(response => response.json())
            .then(data => console.log('Workout set:', data))
            .catch(error => console.error('Error:', error));
        }

        // Call the function to send the workout to Flask when the page is loaded
        setWorkout(workout, difficulty);

        // Show the modal automatically on page load
        window.onload = showModal;

        closeModalButton.addEventListener('click', hideModal);
        helpButton.addEventListener('click', showModal);
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                hideModal();
            }
        });

        nextSlideButton.addEventListener('click', () => {
            if (currentSlide < slides.length - 1) {
                currentSlide++;
                updateSlides();
            }
        });

        prevSlideButton.addEventListener('click', () => {
            if (currentSlide > 0) {
                currentSlide--;
                updateSlides();
            }
        });

        getStartedButton.addEventListener('click', hideModal);

        // Results Modal JS
        const resultsModal = document.getElementById('results-modal');
        const retryButton = document.getElementById('retry-button');
        const closeResultsModalButton = document.getElementById('close-results-modal');
        const endWorkoutButton = document.getElementById('end-workout-button');
        const confirmationModal = document.getElementById('confirmation-modal');
        const confirmEndWorkout = document.getElementById('confirm-end-workout');
        const cancelEndWorkout = document.getElementById('cancel-end-workout');

        // Show the confirmation modal when "End Workout" button is clicked
        endWorkoutButton.addEventListener('click', () => {
            confirmationModal.classList.remove('hidden');
        });

        // Handle "Yes, End Workout" button click
        confirmEndWorkout.addEventListener('click', () => {
            confirmationModal.classList.add('hidden'); // Hide the modal
            stop_prediction(); // Stop the workout
            clearInterval(countdownInterval); // Stop the timer
            timer.style.color = 'red';
            timer.textContent = 'Workout Stopped!';
        });

        // Handle "No, Continue" button click
        cancelEndWorkout.addEventListener('click', () => {
            confirmationModal.classList.add('hidden'); // Hide the modal
        });

        closeResultsModalButton.addEventListener('click', () => {
            resultsModal.classList.add('hidden');
        });

        resultsModal.addEventListener('click', (event) => {
            if (event.target === resultsModal) {
                resultsModal.classList.add('hidden');
                isModalShown = false;
            }
        });

        function restartWorkout() {
            // Reload the page to reset everything
            window.location.reload();
        }

        // Add event listener for retry button
        retryButton.addEventListener('click', restartWorkout);

        const backToWorkoutLink = document.getElementById('back-to-workout-link');
        const leaveSessionModal = document.getElementById('leave-session-modal');
        const confirmLeaveSession = document.getElementById('confirm-leave-session');
        const cancelLeaveSession = document.getElementById('cancel-leave-session');

        // Prevent default navigation and show modal
        backToWorkoutLink.addEventListener('click', (event) => {
            event.preventDefault(); // Stop the default navigation
            leaveSessionModal.classList.remove('hidden'); // Show confirmation modal
        });

        // Handle "No, Stay" button click
        cancelLeaveSession.addEventListener('click', () => {
            leaveSessionModal.classList.add('hidden'); // Hide modal
        });
    </script>
</body>
</html>