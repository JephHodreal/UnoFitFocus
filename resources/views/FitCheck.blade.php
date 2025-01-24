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
            
                    <!-- Reps -->
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
                    </div>
                </div>
            </div>

            <!-- New button to open results modal -->
            <div class="text-center mt-6">
                <button id="show-results-button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    {{ __('Show Workout Results') }}
                </button>
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
                            Retry
                        </button>
                        <a href="{{ route('Workout') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Back to Workout Selection
                        </a>
                    </div>

                    <!-- Close Button for Results Modal -->
                    <button id="close-results-modal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
                </div>
            </div>
        </x-app-layout>
    </main>

    <!-- Help Modal -->
    <div id="modal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="modal-content bg-white rounded-lg p-6 relative max-w-md mx-auto">
            <button id="close-modal" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
            <div class="modal-slide">
                <h2 class="text-xl font-bold">Let's get started on your FitCheck!</h2>
                <p>This page uses human pose estimation to verify the correctness of your posture during bodyweight workouts.</p>
            </div>
            <div class="modal-slide hidden">
                <img src="placeholder-image.jpg" alt="FitCheck Page" class="w-full rounded"/>
                <p>Here is the description of the camera view and other controls.</p>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold">If you need help, click this question mark here.</h2>
                <img src="placeholder-image.jpg" alt="Help Icon Location" class="w-full rounded"/>
            </div>
            <div class="modal-slide hidden">
                <h2 class="text-xl font-bold">Reminder:</h2>
                <p>Don't forget to do warm-up and cooldown exercises before and after your workout.</p>
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
            </div>
        </div>
    </div>
    <script>
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
        const workout = "{{ $workout }}";
        const difficulty = "{{$difficulty}}";
        let isModalShown = false;
        let timer = document.getElementById('timer');
        let countdownInterval;
        let isFetching = true;
        timer.style.color = 'green';
        const errorSound = new Audio('{{ asset('sounds/error_sound.MP3') }}');
        const correctSound = new Audio('{{ asset('sounds/correct_sound.MP3') }}');
        const downSound = new Audio('{{ asset('sounds/down_sound.MP3') }}');
        const upSound = new Audio('{{ asset('sounds/up_sound.MP3') }}');
        const dingSound = new Audio('{{ asset('sounds/ding_sound.MP3') }}');

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

            let finalScore;

            if (workout === "Push-Up" || workout === "Squat") {
                // For Push-Up or Squat, extract the percentage part
                const scoreText = scriptOutput4.textContent.split('Score: ')[1].trim().split(' '); // Extract text after "Score: "
                const secondScore = scoreText[2]; // Get the second score
                finalScore = parseInt(secondScore.split('/')[0]);
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
                        scriptOutput4.textContent = `Score:  ${data.score}/100`;
                        updateProgressBar(data.score);
                    }
                    if (data.stage === "completed" && !isModalShown){
                        stop_prediction();
                        clearInterval(countdownInterval); // Stop the timer
                        timer.textContent = 'Workout Complete!';
                    }
                    if (data.signal) {
                        playSound(data.signal);
                    }
                })
                .catch(error => console.error('Error fetching prediction:', error));
        }

        // Function to play sound
        function playSound(signal) {
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

        // Function to send workout type to Flask backend
        function setWorkout(workoutType, difficulty) {
            fetch('http://127.0.0.1:5000/set_workout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ workout: workoutType, difficulty: difficulty }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Workout set:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
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
        const showResultsButton = document.getElementById('show-results-button');
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

        showResultsButton.addEventListener('click', () => {
            resultsModal.classList.remove('hidden');
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