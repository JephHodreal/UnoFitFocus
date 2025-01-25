<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workout Library | FitFocus</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .tab-button {
            padding: 0.5rem 1.5rem;
            border: 2px solid transparent;
            border-radius: 9999px;
            transition: all 0.3s;
            font-weight: bold;
        }
    
        .tab-button.active {
            background-color: #1d4ed8;
            color: white;
            border-color: #1d4ed8;
        }
    
        .tab-content.hidden {
            display: none;
        }
    
        .tab-content.active {
            animation: fade-in 0.3s ease-in-out;
        }
    
        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body x-data="{ openModal: null }">
    <x-guest-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Workout Library') }}
            </h2>
            <h2 class="text-x2 text-gray-800 leading-tight">
                {{ __('Learn the description, benefits, targeted muscles, and procedure of the workouts analyzed by FitFocus.') }}
            </h2>
        </x-slot>

        <!-- Workout Section -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-center space-x-4">
                        <button id="tab-strength" class="tab-button active">{{ __('Muscle Strength') }}</button>
                        <button id="tab-endurance" class="tab-button">{{ __('Muscle Endurance') }}</button>
                        <button id="tab-both" class="tab-button">{{ __('Muscle Strength and Endurance') }}</button>
                    </div>

                    <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">

                    <!-- Tab Content -->
                    <div id="tab-content-strength" class="tab-content active">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-6">{{ __('Muscle Strength') }}</h2>
                        <p class="text-center text-gray-600 mb-6">
                            {{ __("Muscular strength relates to your ability to move and lift objects. It's measured by how much force
                            you can exert and how much weight you can lift for a short period of time. In FitFocus, muscle
                            strength will test your ability to perform push-ups and squats in the proper form for a specific
                            number of repetitions.") }}
                        </p>
                        @include('components.workouts.pushup')
                        <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">
                        @include('components.workouts.squat')
                    </div>

                    <div id="tab-content-endurance" class="tab-content hidden">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-6">{{ __('Muscle Endurance') }}</h2>
                        <p class="text-center text-gray-600 mb-6">
                            {{ __('Muscular endurance refers to the ability of a muscle to sustain repeated contractions against
                            resistance for an extended period of time. To increase muscular endurance, you should engage in
                            activities that work your muscles more than usual such as squats and push-ups. In FitFocus, muscle
                            endurance will test your ability to perform as many correct push-ups and squats within a limited
                            amount of time, as well as to hold a plank position for a specified number of seconds.') }}
                        </p>
                        @include('components.workouts.pushup')
                        <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">
                        @include('components.workouts.squat')
                        <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">
                        @include('components.workouts.plank')
                    </div>

                    <div id="tab-content-both" class="tab-content hidden">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-6">{{ __('Muscle Strength and Endurance') }}</h2>
                        <p class="text-center text-gray-600 mb-6">
                            {{ __('Muscle strength and endurance combines both health-related fitness components to test your 
                            ability to maintain your power as you perform push-ups and squats for multiple sets.') }}
                        </p>
                        @include('components.workouts.pushup')
                        <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">
                        @include('components.workouts.squat')
                    </div>
                </div>
            </div>
        </div>

        <!-- Warmup and Cooldown Section -->
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto py-2 px-6">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-10">{{ __('Warm-Up and Cooldown Exercises') }}</h2>
                        <p class="text-justify text-gray-600 mb-10">
                            {{ __('It is important to conduct warm-up and cooldown exercises before and after a workout session, 
                            respectively. Warm-ups increases your heart rate and blood flow to improve oxygen delivery, reduces the 
                            risk of injuries or strains, and enhances performances. Cooldowns help lower the heart rate and blood flow 
                            back to resting levels to avoid sudden drops that can lead to dizziness, reduce muscle soreness, and enhances 
                            recovery from physical exertion. Here are some sample exercises you can do.') }}
                        </p>
                        <!-- Buttons for Warm-Up and Cooldown -->
                        <div class="flex justify-between mb-12 space-x-4">
                            <div class="bg-blue-500 text-white shadow-lg rounded-lg p-6 hover:bg-blue-600 transition-all duration-300 cursor-pointer transform hover:scale-105 flex-1"
                                @click="$dispatch('open-modal', 'warmup-modal')">
                                <h3 class="text-2xl font-semibold text-center">{{ __('Warm-Up') }}</h3>
                            </div>
                            <div class="bg-green-500 text-white shadow-lg rounded-lg p-6 hover:bg-green-600 transition-all duration-300 cursor-pointer transform hover:scale-105 flex-1"
                                @click="$dispatch('open-modal', 'cooldown-modal')">
                                <h3 class="text-2xl font-semibold text-center">{{ __('Cooldown')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals Container -->
        <div>
            <!-- Warm-Up Modal -->
            <x-modal name="warmup-modal" maxWidth="lg" x-show="openModal === 'warmup-modal'">
                <div x-data="{ currentSlide: 0, exercises: [
                        { title: 'Jumping Jacks', image: '../assets/images/wu_jumpjack.gif', description: 'A full-body warm-up exercise that increases heart rate and warms up the muscles.', repetitions: '20 repetitions', steps: ['Stand upright with your feet together and hands at your sides.', 'Jump up while spreading your feet wider than shoulder-width apart and lifting your arms overhead.', 'Return to the starting position by jumping back to the initial stance.', 'Repeat the movement for the duration.'] },
                        { title: 'Arm Circles', image: '../assets/images/wu_armcirc.gif', description: 'Loosens up shoulders and improves arm range motion.', repetitions: '20 repetitions', steps: ['Stand with your feet shoulder-width apart and arms extended out to your sides.', 'Start making small circular motions with your arms.', 'Gradually increase the size of the circles.', 'After completing half the repetitions, reverse the direction.'] },
                        { title: 'Leg Swings', image: '../assets/images/wu_legswing.gif', description: 'Prepares legs for dynamic movement and stretches the hip muscles.', repetitions: '15 repetitions per leg', steps: ['Stand with your feet shoulder-width apart.', 'Hold onto a support, such as a wall or pole, for balance.', 'Swing one leg forward and backward in a controlled manner.', 'Repeat for the designated repetitions, then switch legs.'] },
                        { title: 'Hip Rotations', image: '../assets/images/wu_hipcirc.gif', description: 'Improves flexibility in the hips and helps avoid injuries.', repetitions: '10 repetitions per side', steps: ['Stand with your feet shoulder-width apart.', 'Place your hands on your hips and rotate your hips in a circular motion.', 'Complete the designated repetitions in one direction, then switch to the other.'] },
                        { title: 'High Knees', image: '../assets/images/wu_highknee.gif', description: 'A cardio exercise that activates the quads.', repetitions: '30 seconds', steps: ['Stand upright with your feet hip-width apart.', 'Lift one knee towards your chest, as high as you can.', 'Switch to the other knee quickly, simulating a running motion.', 'Continue alternating knees for the designated time.'] },
                    ] }">
                    
                    <div class="p-6" x-effect>
                        <div class="flex justify-between items-center mb-4">
                            <button @click="currentSlide = (currentSlide === 0 ? exercises.length - 1 : currentSlide - 1)">
                                ← Previous
                            </button>
                            <h2 class="text-2xl font-bold" x-text="exercises[currentSlide].title"></h2>
                            <button @click="currentSlide = (currentSlide === exercises.length - 1 ? 0 : currentSlide + 1)">
                                Next →
                            </button>
                        </div>
            
                        <img :src="exercises[currentSlide].image" alt="Warm-up exercise" class="object-contain h-96 w-full mb-4">
                        <p class="text-gray-700 mb-4" x-text="exercises[currentSlide].description"></p>
                        <p class="text-gray-700 mb-4">Repetitions: <span x-text="exercises[currentSlide].repetitions"></span></p>
                        
                        <!-- Step-by-step process -->
                        <h3 class="text-lg font-semibold mb-2">How to Perform:</h3>
                        <ol class="list-decimal pl-5 space-y-2">
                            <template x-for="(step, index) in exercises[currentSlide].steps" :key="`${currentSlide}-${index}`">
                                <li class="text-gray-700" x-text="`${index + 1}. ${currentSlide}.. ${currentSlide-index}.. ${step}`"></li>
                            </template>
                        </ol>
                    </div>
                </div>
            </x-modal>

            <!-- Cooldown Modal -->
            <x-modal name="cooldown-modal" maxWidth="lg" x-show="openModal === 'cooldown-modal'">
                <div x-data="{ currentSlide: 0, exercises: [
                        { title: 'Child\'s Pose', description: 'Stretches the back, hips, and thighs.', image: '../assets/images/cd_childpose.gif', repetitions: 'Hold for 30 seconds', steps: ['Kneel on the floor with your toes touching and knees spread apart.', 'Sit back on your heels and lower your torso forward between your thighs.', 'Extend your arms forward and relax your head on the floor.', 'Hold the stretch and breathe deeply.'] },
                        { title: 'Forward Bend', description: 'Stretches the hamstrings and lower back.', image: '../assets/images/cd_forwbend.gif', repetitions: 'Hold for 30 seconds', steps: ['Stand with your feet hip-width apart.', 'Hinge at your hips and bend forward, reaching for your toes.', 'Keep your legs straight and feel the stretch in your hamstrings.', 'Hold the position and breathe deeply.'] },
                        { title: 'Quad Stretch', description: 'Stretches the quadriceps muscles, improving flexibility.', image: '../assets/images/cd_quadstr.gif', repetitions: 'Hold for 20 seconds per leg', steps: ['Stand tall and grab your right ankle with your right hand.', 'Pull your heel towards your glutes while keeping your knees together.', 'Hold the stretch and balance yourself.', 'Switch legs and repeat for the designated time.'] },
                        { title: 'Cat-Cow Stretch', description: 'Warms up the spine.', image: '../assets/images/cd_catcow.gif', repetitions: '10 repetitions', steps: ['Start on your hands and knees in a tabletop position.', 'Arch your back, dropping your belly towards the floor (cow pose).', 'Exhale and round your back, pulling your belly button toward your spine (cat pose).', 'Alternate between the two positions for the designated repetitions.'] },
                        { title: 'Seated Hamstring Stretch', description: 'Stretches the hamstrings and improves flexibility.', image: '../assets/images/cd_seatham.gif', repetitions: 'Hold for 30 seconds per leg', steps: ['Sit on the floor with your legs extended in front of you.', 'Reach forward and try to touch your toes while keeping your back straight.', 'Hold the stretch and feel the pull in your hamstrings.', 'Switch legs after holding the stretch for the designated time.'] },
                    ] }">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <button @click="currentSlide = (currentSlide === 0 ? exercises.length - 1 : currentSlide - 1)">
                                ← Previous
                            </button>
                            <h2 class="text-2xl font-bold" x-text="exercises[currentSlide].title"></h2>
                            <button @click="currentSlide = (currentSlide === exercises.length - 1 ? 0 : currentSlide + 1)">
                                Next →
                            </button>
                        </div>

                        <img :src="exercises[currentSlide].image" alt="Cooldown exercise" class="object-contain h-96 w-full mb-4">
                        <p class="text-gray-700 mb-4" x-text="exercises[currentSlide].description"></p>
                        <p class="text-gray-700 mb-4">Repetitions: <span x-text="exercises[currentSlide].repetitions"></span></p>
                        
                        <!-- Step-by-step process -->
                        <h3 class="text-lg font-semibold mb-2">How to Perform:</h3>
                        <ol class="list-decimal pl-5 space-y-2">
                            <template x-for="(step, index) in exercises[currentSlide].steps" :key="index">
                                <li x-text="step" class="text-gray-700"></li>
                            </template>
                        </ol>
                    </div>
                </div>
            </x-modal>
        </div>

        <!-- Footer -->
        @include('partials.footer')
    </x-guest-layout>  
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('modalHandler', () => ({
                openModal: null,
                init() {
                    this.$el.addEventListener('open-modal', event => {
                        this.openModal = event.detail;
                    });
                }
            }));
        });

        const tabs = document.querySelectorAll('.tab-button');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                tabs.forEach((t) => t.classList.remove('active'));
                contents.forEach((content) => content.classList.add('hidden'));

                tab.classList.add('active');
                contents[index].classList.remove('hidden');
            });
        });
    </script>
</body>
</html>