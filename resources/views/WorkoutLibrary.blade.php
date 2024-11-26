<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workout Library | FitFocus</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body x-data="{ openModal: null }">
    <x-guest-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Exercises') }}
            </h2>
            <h2 class="text-x2 text-gray-800 leading-tight">
                {{ __('Find out what exercises FitFocus checks!') }}
            </h2>
        </x-slot>

        <!-- Workout Section -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto py-2 px-6">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-6">{{ __('Bodyweight Exercises') }}</h2>
                        <p class="text-center text-gray-600 mb-6">
                            {{ __('Learn the description, benefits, targeted muscles, and procedure of the workouts analyzed by FitFocus.') }}
                        </p>
                    </div>

                    <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">
                    
                    <!-- Push-Up Section -->
                    <div class="flex flex-col md:flex-row items-center rounded-lg p-8">
                        <!-- Information Column -->
                        <div class="md:w-1/2 space-y-4">
                            <h2 class="text-2xl font-bold">{{ __('Push-Up') }}</h2>
                            <p class="text-gray-700">{{ __('The push-up is an upper body exercise that targets the chest, shoulders, and triceps while also working out the biceps, back, stomach, and hips.') }}</p>
                            <p class="text-gray-700 font-bold">{{ __('Benefits:') }}</p>
                            <ul class="list-disc list-inside text-gray-700">
                                <li>{{ __('Increases upper-body strength and engages the core') }}</li>
                                <li>{{ __('Strengthening your back, shoulders, and abs can help improve posture') }}</li>
                                <li>{{ __('As a type of strength training, it supports bone health and boosts heart health') }}</li>
                            </ul>
                            <p class="text-gray-700 font-bold">{{ __('Process:') }}</p>
                            <ol class="list-decimal list-inside text-gray-700">
                                <li>{{ __('Start in a plank position with your hands under your shoulders.') }}</li>
                                <li>{{ __('Lower your body until your chest nearly touches the floor.') }}</li>
                                <li>{{ __('Push through your palms to raise your body back to the starting position.') }}</li>
                            </ol>
                        </div>
                        <!-- GIF Column -->
                        <div class="md:w-1/2 flex justify-center md:justify-end mt-6 md:mt-0">
                            <img src="../assets/images/pu_standard.gif" alt="Push Up GIF" class="object-contain h-96 w-full md:w-auto rounded-lg">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-8 py-8">
                        <div class="aspect-w-16 aspect-h-9 relative rounded-lg shadow-lg overflow-hidden">
                            <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/jWxvty2KROs" title="Push-Up Video 1" allowfullscreen></iframe>
                        </div>
                        <div class="aspect-w-16 aspect-h-9 relative rounded-lg shadow-lg overflow-hidden">
                            <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/lsRAK6cr5kY" title="Push-Up Video 2" allowfullscreen></iframe>
                        </div>
                    </div>

                    <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">

                    <!-- Squat Section -->
                    <div class="flex flex-col md:flex-row items-center rounded-lg p-8 space-y-4 md:space-y-0">
                        <!-- GIF Column -->
                        <div class="md:w-1/2 flex justify-center md:justify-start">
                            <img src="../assets/images/sq_standard.gif" alt="Squat GIF" class="object-contain h-96 w-full md:w-auto rounded-lg">
                        </div>

                        <!-- Information Column -->
                        <div class="md:w-1/2 space-y-4">
                            <h2 class="text-2xl font-bold">{{ __('Squat') }}</h2>
                            <p class="text-gray-700">{{ __('The squat is a fundamental exercise that targets the quadriceps, hamstrings, and glutes while working out the core, hips, calves, obliques.') }}</p>
                            <p class="text-gray-700 font-bold">{{ __('Benefits:') }}</p>
                            <ul class="list-disc list-inside text-gray-700">
                                <li>{{ __('Helps build muscle and burn calories fast') }}</li>
                                <li>{{ __('Strengthening the lower body muscles can boost speed and keep bones strong') }}</li>
                                <li>{{ __('By working out the core, it improves mobility and balance') }}</li>
                            </ul>
                            <p class="text-gray-700 font-bold">{{ __('Process:') }}</p>
                            <ol class="list-decimal list-inside text-gray-700">
                                <li>{{ __('Stand with your feet shoulder-width apart.') }}</li>
                                <li>{{ __('Lower your hips as if sitting back into a chair.') }}</li>
                                <li>{{ __('Push through your heels to return to the starting position.') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-8 py-8">
                        <div class="relative aspect-w-16 aspect-h-9 rounded-lg shadow-lg overflow-hidden">
                            <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/xqvCmoLULNY" title="Squat Video Tutorial 1" allowfullscreen></iframe>
                        </div>
                        <div class="relative aspect-w-16 aspect-h-9 rounded-lg shadow-lg overflow-hidden">
                            <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/rXEproFdDn4" title="Squat Video Tutorial 2" allowfullscreen></iframe>
                        </div>
                    </div>

                    <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">

                    <!-- Plank Section -->
                    <div class="flex flex-col md:flex-row items-center rounded-lg p-8">
                        <!-- Information Column -->
                        <div class="md:w-1/2 space-y-4">
                            <h2 class="text-2xl font-bold">{{ __('Plank') }}</h2>
                            <p class="text-gray-700">{{ __('The plank is a core-strengthening exercise that engages multiple muscle groups, working out the core, glutes, quads, shoulders, arms, chest, abdominals, and back.') }}</p>
                            <p class="text-gray-700 font-bold">{{ __('Benefits:') }}</p>
                            <ul class="list-disc list-inside text-gray-700">
                                <li>{{ __('Can reduce lower back pain') }} </li>
                                <li>{{ __('Improves balance, stability, and endurance') }} </li>
                                <li>{{ __('By strengthening the core, it promotes good posture') }} </li>
                            </ul>
                            <p class="text-gray-700 font-bold">{{ __('Process:') }}</p>
                            <ol class="list-decimal list-inside text-gray-700">
                                <li>{{ __('Start in a forearm plank position with your elbows under your shoulders.')}}</li>
                                <li>{{ __('Keep your body in a straight line from head to toes.')}}</li>
                                <li>{{ __('Hold the position as long as possible without dropping your hips.')}}</li>
                            </ol>
                        </div>
                
                        <!-- GIF Column -->
                        <div class="md:w-1/2 flex justify-center md:justify-end mt-6 md:mt-0">
                            <img src="../assets/images/pl_standard.gif" alt="Plank GIF" class="object-contain h-96 w-full md:w-auto rounded-lg">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-8 py-8">
                        <div class="aspect-w-16 aspect-h-9 relative rounded-lg shadow-lg overflow-hidden">
                            <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/pvIjsG5Svck" title="Plank Video 1" allowfullscreen></iframe>
                        </div>
                        <div class="aspect-w-16 aspect-h-9 relative rounded-lg shadow-lg overflow-hidden">
                            <iframe class="absolute inset-0 w-full h-full" src="https://www.youtube.com/embed/t7Vjprc8BCY" title="Plank Video 2" allowfullscreen></iframe>
                        </div>
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
    </script>
</body>
</html>