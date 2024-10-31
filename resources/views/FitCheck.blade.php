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
                <pre id="script-output"></pre>
            </div>
            
            <div class="py-12 flex justify-center">
                <div id="camera-container">
                    <button id="start-camera">Start Camera</button>
                    <img id="video" alt="Live Posture Check"></img>
                </div>
            </div>
        </x-app-layout>
    </main>

    <!-- Modal -->
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
            <div class="flex justify-between mt-4">
                <button id="prev-slide" class="hidden text-gray-700 hover:text-gray-900">❮ Previous</button>
                <button id="next-slide" class="text-gray-700 hover:text-gray-900">Next ❯</button>
            </div>
            <button id="get-started" class="hidden mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Get started!</button>
            <div class="flex justify-center mt-4">
                <span class="dot active w-3 h-3 rounded-full bg-blue-500 mx-1"></span>
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
        const scriptOutput =document.getElementById('script-output')

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
                dot.classList.toggle('active', index === currentSlide);
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
            }
        });

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
    </script>
</body>
</html>