<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FitCheck | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    
    <style>
        #camera-container {
            display: flex;
            justify-content: center;
            align-items: center; /* Center vertically */
            margin-top: 20px;
            background-color: black; /* Black background */
            height: 400px; /* Set a height for the camera container */
            position: relative; /* For absolute positioning of the button */
        }
        #video-stream {
            width: 100%;
            max-width: 600px;
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
        #script-output {
            margin-top: 20px;
            white-space: pre-wrap;
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
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
                    <a href="{{ route('Workout') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-200">
                        {{ __('← Back to Workout Selection') }}
                    </a>
                    <button id="help-button" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-200">
                        <img src="https://img.icons8.com/material-outlined/24/000000/help.png" alt="help icon" class="mr-2"/>
                        {{ __('Help') }}
                    </button>
                </div>
            </div>
            
            <div class="container mx-auto text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                    Selected Workout: {{ $workout }}
                </h2>
                <h2 class="text-xl text-gray-600">
                    Difficulty Level: {{ $difficulty }}
                </h2>
                <h2 class="text-xl text-gray-600">
                    Task: {{ $task }}
                </h2>
                <pre id="script-output">
                    Waiting for Camera:
                </pre>
                <!-- Table structure for Reps, Set, Stage, and Score -->
                <table class="mx-auto mt-4 text-xl text-gray-600">
                    <tr>
                        <td class="text-left" style="width: 350px;"><pre id="script-output1">Reps:</pre></td>
                        <td class="text-left" style="width: 350px;"><pre id="script-output2">Sets:</pre></td>
                    </tr>
                    <tr>
                        <td class="text-left" style="width: 350px;"><pre id="script-output3">Stage:</pre></td>
                        <td class="text-left" style="width: 350px;"><pre id="script-output4">Score:</pre></td>
                    </tr>
                </table>
            </div>
            
            <div class="py-12 flex justify-center">
                <div id="camera-container">
                    <button id="start-camera">Start Camera</button>
                    <img id="video" alt="Live Posture Check"></img>
                </div>
            </div>

            <!-- New button to open results modal -->
            <div class="text-center mt-6">
                <button id="show-results-button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Show Workout Results
                </button>
            </div>

            <!-- Workout Results Modal -->
            <div id="results-modal" class="modal fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                <div class="modal-content bg-white rounded-lg p-6 relative max-w-md mx-auto text-center">
                    <h2 class="text-2xl font-bold mb-4">Workout Results</h2>
                    <p><strong>Workout:</strong> {{ $workout }}</p>
                    <p><strong>Difficulty:</strong> {{ $difficulty }}</p>
                    <p><strong>Task:</strong> {{ $task }}</p>
                    <p><strong>Score:</strong> 70</p> <!-- Example static score; replace with dynamic score when ready -->
                    
                    <!-- Score Progress Bar -->
                    <div class="w-full bg-gray-200 rounded-full h-4 mt-2 mb-4">
                        <div class="bg-green-500 h-4 rounded-full" style="width: 70%;"></div>
                    </div>

                    <!-- Buttons for Retry and Back to Workout Selection -->
                    <div class="flex justify-between mt-6">
                        <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-100">
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
        let isCameraActive = false;
        const workout = "{{ $workout }}";

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
        
        // Request access to the camera
        startCameraButton.addEventListener('click', () => {
            if (video.src === "") {
                video.src = "http://127.0.0.1:5000/video_feed"; // Set the src when the button is clicked
                video.style.display = 'block'; // Show video once camera starts
                startCameraButton.style.display = 'none'; // Hide button after starting camera
                isCameraActive = true; //flag to check if camera is active     
            }
        });

        function fetchPrediction() {
            if (!isCameraActive) { // Only fetch prediction if camera is active
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
                    scriptOutput.textContent = `Prediction: ${data.latest_prediction.prediction}`;
                    if (workout === "Plank"){
                        if (data.stage === "completed"){
                            scriptOutput3.textContent = `Time:  ${data.total_time} sec - Completed`;
                        }else{
                            scriptOutput3.textContent = `Time:  ${data.total_time} sec`;
                        }
                        scriptOutput4.textContent = `Score:  ${data.score}`;
                    }else if (workout === "Push-Up" || workout === "Squat"){
                        scriptOutput1.textContent = `Reps:  ${data.repetitions}`;
                        scriptOutput2.textContent = `Sets:  ${data.sets}`;
                        scriptOutput3.textContent = `Stage:  ${data.stage}`;
                        scriptOutput4.textContent = `Score:  ${data.score}`;
                    }
                })
                .catch(error => console.error('Error fetching prediction:', error));
        }

        setInterval(fetchPrediction, 100);

        // Function to send workout type to Flask backend
        function setWorkout(workoutType) {
            fetch('http://127.0.0.1:5000/set_workout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ workout: workoutType }),
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
        setWorkout(workout);

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

        showResultsButton.addEventListener('click', () => {
            resultsModal.classList.remove('hidden');
        });

        closeResultsModalButton.addEventListener('click', () => {
            resultsModal.classList.add('hidden');
        });

        resultsModal.addEventListener('click', (event) => {
            if (event.target === resultsModal) {
                resultsModal.classList.add('hidden');
            }
        });
    </script>
</body>
</html>