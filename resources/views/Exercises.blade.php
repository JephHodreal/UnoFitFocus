<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercises | FitFocus</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body x-data="{ openModal: null }">
    <x-guest-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('FitFocus') }}
            </h2>
            <h2 class="text-x2 text-gray-800 leading-tight">
                {{ __('Revolutionizing bodyweight workouts through posture correction powered by human pose estimation.') }}
            </h2>
        </x-slot>

        <!-- Workout Section -->
        <div class="container mx-auto py-10 px-6">
            <h2 class="text-4xl font-bold text-center mb-10">Workouts</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Push-Up Card -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 cursor-pointer"
                    @click="$dispatch('open-modal', 'push-up-modal')">
                    <div class="p-4 text-center bg-gray-200">
                        <h3 class="text-xl font-semibold mb-2">Push Up</h3>
                    </div>
                    <img src="../assets/images/workout.jpg" alt="Push Up" class="w-full h-48 object-cover">
                </div>

                <!-- Squat Card -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 cursor-pointer"
                    @click="$dispatch('open-modal', 'squat-modal')">
                    <div class="p-4 text-center bg-gray-200">
                        <h3 class="text-xl font-semibold mb-2">Squat</h3>
                    </div>
                    <img src="../assets/images/workout.jpg" alt="Squat" class="w-full h-48 object-cover">
                </div>

                <!-- Plank Card -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 cursor-pointer"
                    @click="$dispatch('open-modal', 'plank-modal')">
                    <div class="p-4 text-center bg-gray-200">
                        <h3 class="text-xl font-semibold mb-2">Plank</h3>
                    </div>
                    <img src="../assets/images/workout.jpg" alt="Plank" class="w-full h-48 object-cover">
                </div>
            </div>

            <!-- Warm-up and Cooldown Sections -->
            <div class="flex justify-between mb-12 space-x-4">
                <div class="bg-blue-500 text-white shadow-lg rounded-lg p-6 hover:bg-blue-600 transition-all duration-300 cursor-pointer transform hover:scale-105 flex-1"
                    @click="$dispatch('open-modal', 'warmup-modal')">
                    <h3 class="text-2xl font-semibold text-center">Warm-Up</h3>
                </div>
                <div class="bg-green-500 text-white shadow-lg rounded-lg p-6 hover:bg-green-600 transition-all duration-300 cursor-pointer transform hover:scale-105 flex-1"
                    @click="$dispatch('open-modal', 'cooldown-modal')">
                    <h3 class="text-2xl font-semibold text-center">Cooldown</h3>
                </div>
            </div>
        </div>

        <!-- Modals Container -->
        <div>
            <!-- Push-Up Modal -->
            <x-modal name="push-up-modal" maxWidth="lg" x-show="openModal === 'push-up-modal'" @click.away="openModal = null">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Push-Up</h2>
                    <p class="text-gray-700 mb-4">Description: The standard push-up is a great upper body exercise that targets the chest, shoulders, and triceps.</p>
                    <ul class="list-disc list-inside mb-4">
                        <li>Start in a plank position with your hands under your shoulders.</li>
                        <li>Lower your body until your chest nearly touches the floor.</li>
                        <li>Push through your palms to raise your body back to the starting position.</li>
                    </ul>
                    <img src="../assets/images/workout.jpg" alt="Push Up" class="w-full h-48 object-cover mb-4">
                </div>
            </x-modal>

            <!-- Squat Modal -->
            <x-modal name="squat-modal" maxWidth="lg" x-show="openModal === 'squat-modal'" @click.away="openModal = null">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Squat</h2>
                    <p class="text-gray-700 mb-4">Description: The squat is a fundamental exercise that targets the quadriceps, hamstrings, and glutes.</p>
                    <ul class="list-disc list-inside mb-4">
                        <li>Stand with your feet shoulder-width apart.</li>
                        <li>Lower your hips as if sitting back into a chair.</li>
                        <li>Push through your heels to return to the starting position.</li>
                    </ul>
                    <img src="../assets/images/workout.jpg" alt="Squat" class="w-full h-48 object-cover mb-4">
                </div>
            </x-modal>

            <!-- Plank Modal -->
            <x-modal name="plank-modal" maxWidth="lg" x-show="openModal === 'plank-modal'" @click.away="openModal = null">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Plank</h2>
                    <p class="text-gray-700 mb-4">Description: The plank is a core-strengthening exercise that engages multiple muscle groups.</p>
                    <ul class="list-disc list-inside mb-4">
                        <li>Start in a forearm plank position with your elbows under your shoulders.</li>
                        <li>Keep your body in a straight line from head to toes.</li>
                        <li>Hold the position as long as possible without dropping your hips.</li>
                    </ul>
                    <img src="../assets/images/workout.jpg" alt="Plank" class="w-full h-48 object-cover mb-4">
                </div>
            </x-modal>

            <!-- Warm-Up Modal -->
            <x-modal name="warmup-modal" maxWidth="lg" x-show="openModal === 'warmup-modal'" @click.away="openModal = null">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Warm-Up Exercises</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold">1. Arm Circles</h3>
                            <p class="text-gray-700">Repetitions: 15-20 per arm</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">2. Leg Swings</h3>
                            <p class="text-gray-700">Repetitions: 10-15 each leg</p>
                        </div>
                    </div>
                </div>
            </x-modal>

            <!-- Cooldown Modal -->
            <x-modal name="cooldown-modal" maxWidth="lg" x-show="openModal === 'cooldown-modal'" @click.away="openModal = null">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Cooldown Exercises</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold">1. Forward Bend</h3>
                            <p class="text-gray-700">Hold for 15-30 seconds</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">2. Shoulder Stretch</h3>
                            <p class="text-gray-700">Hold for 20-30 seconds each side</p>
                        </div>
                    </div>
                </div>
            </x-modal>
        </div>
    
        {{-- <!-- Warm-up Modal (Carousel) -->
        <x-carousel-modal id="warmupModal" title="Warm-up Exercises">
            <!-- Ensure the props are passed correctly to avoid undefined variable errors -->
            <x-carousel-item 
                title="Jumping Jacks" 
                description="A full-body warm-up exercise that increases your heart rate and warms up your muscles." 
                image="../assets/images/workout.jpg" 
                repetitions="30 seconds"
            />
            <x-carousel-item 
                title="Arm Circles" 
                description="Loosens up your shoulders and improves range of motion in your arms." 
                image="../assets/images/workout.jpg" 
                repetitions="20 repetitions"
            />
            <x-carousel-item 
                title="Leg Swings" 
                description="Prepares your legs for dynamic movement and stretches the hip muscles." 
                image="../assets/images/workout.jpg" 
                repetitions="15 repetitions per leg"
            />
            <x-carousel-item 
                title="Hip Rotations" 
                description="Improves flexibility in your hips and helps avoid injuries." 
                image="../assets/images/workout.jpg" 
                repetitions="10 repetitions per side"
            />
            <x-carousel-item 
                title="High Knees" 
                description="A cardio exercise that activates the quads and gets your blood pumping." 
                image="../assets/images/workout.jpg" 
                repetitions="30 seconds"
            />
        </x-carousel-modal>
    
        <!-- Cooldown Modal (Carousel) -->
        <x-carousel-modal id="cooldownModal" title="Cooldown Exercises">
            <!-- Cooldown exercise 1: Standing Quad Stretch -->
            <x-carousel-item 
                title="Standing Quad Stretch" 
                description="A static stretch that targets the quadriceps and helps reduce muscle tension." 
                image="../assets/images/workout.jpg" 
                repetitions="Hold for 30 seconds per leg"
            />
            
            <!-- Cooldown exercise 2: Forward Fold -->
            <x-carousel-item 
                title="Forward Fold" 
                description="Stretches the hamstrings and lower back, improving flexibility." 
                image="../assets/images/workout.jpg" 
                repetitions="Hold for 30 seconds"
            />
            
            <!-- Cooldown exercise 3: Child’s Pose -->
            <x-carousel-item 
                title="Child’s Pose" 
                description="A gentle stretch for the spine and relaxation for the back muscles." 
                image="../assets/images/workout.jpg" 
                repetitions="Hold for 1 minute"
            />
            
            <!-- Cooldown exercise 4: Seated Hamstring Stretch -->
            <x-carousel-item 
                title="Seated Hamstring Stretch" 
                description="Stretches the hamstrings and relieves tension in the lower back." 
                image="../assets/images/workout.jpg" 
                repetitions="Hold for 30 seconds per leg"
            />
            
            <!-- Cooldown exercise 5: Cat-Cow Stretch -->
            <x-carousel-item 
                title="Cat-Cow Stretch" 
                description="A dynamic stretch for the spine that promotes flexibility and relieves tension." 
                image="../assets/images/workout.jpg" 
                repetitions="Perform 10 slow repetitions"
            />
        </x-carousel-modal> --}}
    </x-guest-layout>  
</body>
</html>