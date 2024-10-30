<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FitCheck | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        #camera-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        #video-stream {
            width: 100%;
            max-width: 600px;
            border: 2px solid black;
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

            <div class="py-12">
                {{-- <div id="camera-container">
                    <img src="{{ asset('../frames/live_frame.jpg') }}" alt="Live Posture Check" id="video-stream">
                </div> --}}
                <div class="container mx-auto text-center">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        Selected Workout: {{ $workout }}
                    </h2>
                    <h2 class="text-xl text-gray-600">
                        Difficulty Level: {{ $difficulty }}
                    </h2>
                </div>
                <div id="camera-container">
                    <video id="video" autoplay alt="Live Posture Check" id="video-stream"></video>
                </div>
            </div>
        </x-app-layout>    
    </main>

    <script>
        const video = document.getElementById('video');

        // Request access to the camera
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error("Error accessing the camera: ", err);
            });
    </script>
</body>
</html>