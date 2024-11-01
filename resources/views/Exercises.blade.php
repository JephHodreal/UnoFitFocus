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
                        <h2 class="text-4xl font-bold text-center pt-8 mb-10">{{ __('Bodyweight Exercises') }}</h2>
                        <p class="text-center text-gray-600 mb-10">
                            {{ __('Click each exercise to learn more about its description, targeted muscles, and procedure.') }}
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                            <!-- Push-Up Card -->
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 cursor-pointer"
                                @click="$dispatch('open-modal', 'push-up-modal')">
                                <div class="p-4 text-center bg-gray-200">
                                    <h3 class="text-xl font-semibold mb-2">Push Up</h3>
                                </div>
                                <img src="../assets/images/pu_standard.jpg" alt="Push Up" class="object-contain h-64 w-full">
                            </div>

                            <!-- Squat Card -->
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 cursor-pointer"
                                @click="$dispatch('open-modal', 'squat-modal')">
                                <div class="p-4 text-center bg-gray-200">
                                    <h3 class="text-xl font-semibold mb-2">Squat</h3>
                                </div>
                                <img src="../assets/images/sq_standard.jpg" alt="Squat" class="object-contain h-64 w-full">
                            </div>

                            <!-- Plank Card -->
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 cursor-pointer"
                                @click="$dispatch('open-modal', 'plank-modal')">
                                <div class="p-4 text-center bg-gray-200">
                                    <h3 class="text-xl font-semibold mb-2">Plank</h3>
                                </div>
                                <img src="../assets/images/pl_standard.jpg" alt="Plank" class="object-contain h-64 w-full">
                            </div>
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
                        <p class="text-center text-gray-600 mb-10">
                            {{ __('It is important to conduct warm-up and cooldown exercises before and after a workout session, respectively. Here are some sample exercises you can do.') }}
                        </p>
                        <!-- Buttons for Warm-Up and Cooldown -->
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
                    <img src="../assets/images/pu_standard.gif" alt="Push Up" class="object-contain h-96 w-full mb-4">
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
                    <img src="../assets/images/sq_standard.gif" alt="Squat" class="object-contain h-96 w-full mb-4">
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
                    <img src="../assets/images/pl_standard.gif" alt="Plank" class="object-contain h-96 w-full mb-4">
                </div>
            </x-modal>

            <!-- Warm-Up Modal -->
            <x-modal name="warmup-modal" maxWidth="lg" x-show="openModal === 'warmup-modal'">
                <div x-data="{ currentSlide: 0, exercises: [
                        { title: 'Jumping Jacks', image: '../assets/images/wu_jumpjack.gif', description: 'A full-body warm-up exercise that increases your heart rate and warms up your muscles.', repetitions: '20 repetitions', steps: ['Stand upright with your feet together and hands at your sides.', 'Jump up while spreading your feet wider than shoulder-width apart and lifting your arms overhead.', 'Return to the starting position by jumping back to the initial stance.', 'Repeat the movement for the duration.'] },
                        { title: 'Arm Circles', image: '../assets/images/wu_armcirc.gif', description: 'Loosens up your shoulders and improves range of motion in your arms.', repetitions: '20 repetitions', steps: ['Stand with your feet shoulder-width apart and arms extended out to your sides.', 'Start making small circular motions with your arms.', 'Gradually increase the size of the circles.', 'After completing half the repetitions, reverse the direction.'] },
                        { title: 'Leg Swings', image: '../assets/images/wu_legswing.gif', description: 'Prepares your legs for dynamic movement and stretches the hip muscles.', repetitions: '15 repetitions per leg', steps: ['Stand with your feet shoulder-width apart.', 'Hold onto a support, such as a wall or pole, for balance.', 'Swing one leg forward and backward in a controlled manner.', 'Repeat for the designated repetitions, then switch legs.'] },
                        { title: 'Hip Rotations', image: '../assets/images/wu_hipcirc.gif', description: 'Improves flexibility in your hips and helps avoid injuries.', repetitions: '10 repetitions per side', steps: ['Stand with your feet shoulder-width apart.', 'Place your hands on your hips and rotate your hips in a circular motion.', 'Complete the designated repetitions in one direction, then switch to the other.'] },
                        { title: 'High Knees', image: '../assets/images/wu_highknee.gif', description: 'A cardio exercise that activates the quads and gets your blood pumping.', repetitions: '30 seconds', steps: ['Stand upright with your feet hip-width apart.', 'Lift one knee towards your chest, as high as you can.', 'Switch to the other knee quickly, simulating a running motion.', 'Continue alternating knees for the designated time.'] },
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

                        <img :src="exercises[currentSlide].image" alt="Warm-up exercise" class="object-contain h-96 w-full mb-4">
                        <p class="text-gray-700 mb-4" x-text="exercises[currentSlide].description"></p>
                        <p class="text-gray-700 mb-4">Repetitions: <span x-text="exercises[currentSlide].repetitions"></span></p>
                        
                        <!-- Step-by-step process -->
                        <h3 class="text-lg font-semibold mb-2">How to Perform:</h3>
                        <ol class="list-decimal pl-5 space-y-2">
                            <template x-for="(step, index) in exercises[currentSlide].steps" :key="index">
                                <li class="text-gray-700" x-text="`${step}`"></li>
                            </template>
                        </ol>
                    </div>
                </div>
            </x-modal>

            <!-- Cooldown Modal -->
            <x-modal name="cooldown-modal" maxWidth="lg" x-show="openModal === 'cooldown-modal'">
                <div x-data="{ currentSlide: 0, exercises: [
                        { title: 'Child\'s Pose', description: 'A relaxing stretch for the back, hips, and thighs.', image: '../assets/images/cd_childpose.gif', repetitions: 'Hold for 30 seconds', steps: ['Kneel on the floor with your toes touching and knees spread apart.', 'Sit back on your heels and lower your torso forward between your thighs.', 'Extend your arms forward and relax your head on the floor.', 'Hold the stretch and breathe deeply.'] },
                        { title: 'Forward Bend', description: 'Stretches the hamstrings and lower back.', image: '../assets/images/cd_forwbend.gif', repetitions: 'Hold for 30 seconds', steps: ['Stand with your feet hip-width apart.', 'Hinge at your hips and bend forward, reaching for your toes.', 'Keep your legs straight and feel the stretch in your hamstrings.', 'Hold the position and breathe deeply.'] },
                        { title: 'Quad Stretch', description: 'Stretches the quadriceps muscles, improving flexibility.', image: '../assets/images/cd_quadstr.gif', repetitions: 'Hold for 20 seconds per leg', steps: ['Stand tall and grab your right ankle with your right hand.', 'Pull your heel towards your glutes while keeping your knees together.', 'Hold the stretch and balance yourself.', 'Switch legs and repeat for the designated time.'] },
                        { title: 'Cat-Cow Stretch', description: 'A gentle flow between two yoga poses to warm up the spine.', image: '../assets/images/cd_catcow.gif', repetitions: '10 repetitions', steps: ['Start on your hands and knees in a tabletop position.', 'Arch your back, dropping your belly towards the floor (cow pose).', 'Exhale and round your back, pulling your belly button toward your spine (cat pose).', 'Alternate between the two positions for the designated repetitions.'] },
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