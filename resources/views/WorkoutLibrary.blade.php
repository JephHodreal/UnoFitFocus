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
        <div class="py-12 bg-cover bg-fixed bg-center" style="background-image: url({{ asset('../assets/images/homehero.PNG') }});">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-center space-x-4 my-4 mt-8">
                        <button id="tab-strength" class="tab-button active">{{ __('Muscle Strength') }}</button>
                        <button id="tab-endurance" class="tab-button">{{ __('Muscle Endurance') }}</button>
                        <button id="tab-both" class="tab-button">{{ __('Hybrid Training') }}</button>
                    </div>

                    <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">

                    <!-- Tab Content -->
                    <div id="tab-content-strength" class="tab-content active">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-6">{{ __('Muscle Strength') }}</h2>
                        <p class="text-pretty md:text-balance text-justify text-gray-600 mb-6 mx-8">
                            {{ __("Muscular strength is the maximal amount of force that a muscle or group of muscles can 
                            generate at one time. It's measured by how much force you can exert and how much weight you can 
                            lift for a short period of time. Muscular strength plays a key role in improving physical work 
                            capacity, allowing individuals to perform tasks more efficiently. This strength enhances one's 
                            metabolic rate, which aids in maintaining a healthy body weight and reduce the risk of obesity. 
                            Muscular strength also influences sports performance by improving one's ability to generate force
                            rapidly and reduce the risk of sports-related injuries since stronger muslces can better absorb 
                            the impact of physical activities, thereby protecting the body's joints and reducing the likelihood 
                            of damage. FitFocus will test your muscular strength by having you perform push-ups and squats.") }}
                        </p>
                        @include('components.workouts.pushup')
                        <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">
                        @include('components.workouts.squat')
                    </div>

                    <div id="tab-content-endurance" class="tab-content hidden">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-6">{{ __('Muscle Endurance') }}</h2>
                        <p class="text-pretty md:text-balance text-justify text-gray-600 mb-6 mx-8">
                            {{ __('Muscular endurance refers to the ability to continue contracting a muscle, or group of 
                            muscles, against resistance, such as weights or bodyweight, over a period of time. Increasing 
                            the performance of these muscles means they can continue to contract and work against these 
                            forces. Greater muscular endurance allows one to complete more repetitions of an exercise or 
                            hold a single position without moving, i.e., your muscles contract without changing length. 
                            Muscular endurance helps maintain good posture and stability for longer periods, improve the 
                            aerobic capacity of muscles, improve the ability to carry out daily functional activities, and 
                            increase athletic performance in endurance-based sports. FitFocus will test your muscular 
                            endurance by having you perform multiple repetitions and sets of push-ups and squats, as well 
                            as have you hold a plank position for a specified number of seconds.') }}
                        </p>
                        @include('components.workouts.pushup')
                        <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">
                        @include('components.workouts.squat')
                        <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">
                        @include('components.workouts.plank')
                    </div>

                    <div id="tab-content-both" class="tab-content hidden">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-6">{{ __('Hybrid Training') }}</h2>
                        <p class="text-pretty md:text-balance text-justify text-gray-600 mb-6 mx-8">
                            {{ __("Hybrid training is a term used to describe training for two different activities at the 
                            same time. This combines muscle strength and muscle endurance to improve one's performance in 
                            both health-related fitness components. This allows for positive crossover between activities 
                            since moderate amounts of strength and endurance training can be mutually beneficial. For instance, 
                            endurance training can improve cardiovascular fitness and increase work capacity—which enhances 
                            muscular strength—while strength training can increase bone density and enhance joint stability—
                            which enhances muscular endurance. FitFocus provides hybrid training by testing your ability to 
                            maintain your power as you perform push-ups and squats for multiple sets and repetitions.") }}
                        </p>
                        @include('components.workouts.pushup')
                        <hr class="border-t border-gray-500 my-4 w-1/2 mx-auto">
                        @include('components.workouts.squat')
                    </div>
                </div>
            </div>

            <!-- Warm-Up Exercises -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto py-2 px-6">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-10">{{ __('Warm-Up Exercises') }}</h2>
                        <p class="text-justify text-gray-600 mb-10">
                            {{ __('Warm-ups before workouts are crucial for better performance and injury prevention. It facilitates 
                            the gradual increase in heart rate and muscle temperature, enhancing blood flow and preparing the body 
                            for the demands of physical activity. By conducting warm-ups, it helps prepare the cardiovascular system 
                            by increasing blood flow and oxygen to the muscles, thus allowing the body to perform better during the 
                            exercise.') }}
                        </p>
                        <!-- Carousel Container -->
                        <div class="relative overflow-hidden mb-16" x-data="carousel()">
                            <!-- Main Carousel -->
                            <div class="flex transition-transform duration-700 ease-in-out space-x-2 px-4" 
                                :style="{ transform: `translateX(calc(-${currentIndex * 33.333}% - ${currentIndex * 8}px))` }">
                                <!-- Template for repeating slides -->
                                <template x-for="(exercise, index) in allSlides" :key="index">
                                    <div class="flex-none w-1/3 min-w-[320px] transition-all duration-500 px-1" 
                                        :class="{ 
                                            'grayscale-0': isCenter(index), 
                                            'grayscale opacity-70 scale-95 cursor-pointer': !isCenter(index) 
                                        }"
                                        @click="!isCenter(index) && goToSlide(index)">
                                        <div @click="isCenter(index) && openModal(exercise.id)" class="relative group">
                                            <img :src="exercise.carouselImage" :alt="exercise.title" class="w-full h-80 object-cover rounded-lg mx-auto">
                                            <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                                                <span class="text-white text-lg font-semibold text-center px-2" x-text="exercise.title"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Navigation Arrows -->
                            <button @click="prev()" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-3 rounded-r-lg shadow-lg transition-all duration-300 z-10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button @click="next()" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-3 rounded-l-lg shadow-lg transition-all duration-300 z-10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>

                            <!-- Modal -->
                            <div x-show="isModalOpen" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                                class="fixed inset-0 z-50 overflow-y-auto" 
                                style="display: none;"
                                @click="closeModal()"
                                x-init="$watch('isModalOpen', value => {
                                    if (value) {
                                        document.body.style.overflow = 'hidden';
                                    } else {
                                        document.body.style.overflow = '';
                                    }
                                })">
                                <div class="flex items-center justify-center min-h-screen px-4">
                                    <div class="fixed inset-0 bg-black opacity-50"></div>
                                    <div class="relative bg-white rounded-lg max-w-4xl w-full overflow-y-auto max-h-[90vh]" @click.stop>
                                        <!-- Modal Content -->
                                        <div class="p-6">
                                            <button @click="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                            
                                            <h3 class="text-2xl font-bold mb-4" x-text="modalContent.title"></h3>
                                            <div class="flex justify-center items-center mb-4 w-full">
                                                <img :src="modalContent.modalImage" :alt="modalContent.title" class="rounded-lg max-h-[60vh] object-contain mx-auto">
                                            </div>
                                            
                                            <div class="mb-4">
                                                <h4 class="text-lg font-semibold mb-2">Target Muscles:</h4>
                                                <p class="text-gray-600" x-text="modalContent.muscles"></p>
                                            </div>
                                            
                                            <div>
                                                <h4 class="text-lg font-semibold mb-2">Instructions:</h4>
                                                <p class="text-gray-600 whitespace-pre-line" x-text="modalContent.instructions"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cooldown Exercises -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mx-auto py-2 px-6">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-10">{{ __('Cooldown Exercises') }}</h2>
                        <p class="text-justify text-gray-600 mb-10">
                            {{ __("Cooldowns helps regulate the body's return to homeostasis or a normal or relaxed state. After a 
                            workout, the muscles are fully warmed up, making them more receptive to deep stretches, wherein they 
                            are more flexible and able to hold stretches longer. These exercises help reduce muscle tension and 
                            soreness, promote flexibility, aid in recovery after the workout, and help lower the heart rate and 
                            blood flow back to resting levels to avoid sudden drops that can lead to dizziness.") }}
                        </p>
                        <!-- Carousel Container -->
                        <div class="relative overflow-hidden mb-16" x-data="cooldownCarousel()">
                            <!-- Main Carousel -->
                            <div class="flex transition-transform duration-700 ease-in-out space-x-2 px-4 carousel-container" 
                                :style="{ transform: `translateX(calc(-${currentIndex * 33.333}% - ${currentIndex * 8}px))` }">
                                <!-- Template for repeating slides -->
                                <template x-for="(exercise, index) in allSlides" :key="index">
                                    <div class="flex-none w-1/3 min-w-[320px] transition-all duration-500 px-1" 
                                        :class="{ 
                                            'grayscale-0': isCenter(index), 
                                            'grayscale opacity-70 scale-95 cursor-pointer': !isCenter(index) 
                                        }"
                                        @click="!isCenter(index) && goToSlide(index)">
                                        <div @click="isCenter(index) && openModal(exercise.id)" class="relative group">
                                            <img :src="exercise.carouselImage" :alt="exercise.title" class="w-full h-80 object-cover rounded-lg mx-auto">
                                            <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                                                <span class="text-white text-lg font-semibold text-center px-2" x-text="exercise.title"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Navigation Arrows -->
                            <button @click="prev()" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-3 rounded-r-lg shadow-lg transition-all duration-300 z-10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button @click="next()" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-3 rounded-l-lg shadow-lg transition-all duration-300 z-10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>

                            <!-- Modal -->
                            <div x-show="isModalOpen" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                                class="fixed inset-0 z-50 overflow-y-auto" 
                                style="display: none;"
                                @click="closeModal()"
                                x-init="$watch('isModalOpen', value => {
                                    if (value) {
                                        document.body.style.overflow = 'hidden';
                                    } else {
                                        document.body.style.overflow = '';
                                    }
                                })">
                                <div class="flex items-center justify-center min-h-screen px-4">
                                    <div class="fixed inset-0 bg-black opacity-50"></div>
                                    <div class="relative bg-white rounded-lg max-w-4xl w-full overflow-y-auto max-h-[90vh]" @click.stop>
                                        <!-- Modal Content -->
                                        <div class="p-6">
                                            <button @click="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                            
                                            <h3 class="text-2xl font-bold mb-4" x-text="modalContent.title"></h3>
                                            <div class="flex justify-center items-center mb-4 w-full">
                                                <img :src="modalContent.modalImage" :alt="modalContent.title" class="rounded-lg max-h-[60vh] object-contain mx-auto">
                                            </div>
                                            
                                            <div class="mb-4">
                                                <h4 class="text-lg font-semibold mb-2">Target Muscles:</h4>
                                                <p class="text-gray-600" x-text="modalContent.muscles"></p>
                                            </div>
                                            
                                            <div>
                                                <h4 class="text-lg font-semibold mb-2">Instructions:</h4>
                                                <p class="text-gray-600 whitespace-pre-line" x-text="modalContent.instructions"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        @include('partials.footer')
    </x-guest-layout>  
    <script>
        function carousel() {
            return {
                currentIndex: 0,
                isModalOpen: false,
                modalContent: {},
                exercises: [
                    {
                        id: 'lateral-arm',
                        title: 'Lateral Arm Swings',
                        carouselImage: '../assets/images/workout-library/prev-lateral-arm-swing.PNG',
                        modalImage: '../assets/images/workout-library/wu-lateral-arm-swing.gif',
                        muscles: 'Shoulders, Upper Back, Chest',
                        instructions: '1. Stand with feet shoulder-width apart\n2. Keep arms straight and swing them horizontally from side to side\n3. Maintain a controlled motion and gradually increase range\n4. Continue for 30 seconds'
                    },
                    {
                        id: 'arm-circles',
                        title: 'Arm Circles',
                        carouselImage: '../assets/images/workout-library/prev-arm-circles.PNG',
                        modalImage: '../assets/images/workout-library/wu-arm-circles.gif',
                        muscles: 'Shoulders, Upper Back, Rotator Cuff',
                        instructions: '1. Stand with feet shoulder-width apart\n2. Extend arms out to sides at shoulder height\n3. Make small circles forward for 15 seconds\n4. Reverse direction for another 15 seconds\n5. Gradually increase circle size'
                    },
                    {
                        id: 'chest-expansions',
                        title: 'Chest Expansions',
                        carouselImage: '../assets/images/workout-library/prev-chest-expansion.PNG',
                        modalImage: '../assets/images/workout-library/wu-chest-expansion.gif',
                        muscles: 'Chest, Shoulders, Upper Back',
                        instructions: '1. Stand tall with feet shoulder-width apart\n2. Clasp hands behind back\n3. Lift chest and squeeze shoulder blades together\n4. Hold for 2-3 seconds\n5. Release and repeat 10 times'
                    },
                    {
                        id: 'spine-rotations',
                        title: 'Thoracic Spine Rotations',
                        carouselImage: '../assets/images/workout-library/prev-thoracic-spine-rotation.PNG',
                        modalImage: '../assets/images/workout-library/wu-thoracic-spine-rotation.gif',
                        muscles: 'Upper Back, Core, Obliques',
                        instructions: '1. Stand with feet shoulder-width apart\n2. Place hands behind head\n3. Keep hips stable and rotate upper body to one side\n4. Hold for 2 seconds\n5. Rotate to other side\n6. Repeat 10 times each side'
                    },
                    {
                        id: 'hip-rotations',
                        title: 'Hip Rotations',
                        carouselImage: '../assets/images/workout-library/prev-hip-rotations.PNG',
                        modalImage: '../assets/images/workout-library/wu-hip-rotations.gif',
                        muscles: 'Hips, Lower Back, Core',
                        instructions: '1. Stand with feet shoulder-width apart\n2. Place hands on hips\n3. Make circular motions with hips clockwise\n4. Perform 10 rotations\n5. Repeat counterclockwise'
                    },
                    {
                        id: 'jogging',
                        title: 'Jogging in Place',
                        carouselImage: '../assets/images/workout-library/prev-jogging-in-place.PNG',
                        modalImage: '../assets/images/workout-library/wu-jogging-in-place.gif',
                        muscles: 'Legs, Core, Cardiovascular System',
                        instructions: '1. Stand in place with good posture\n2. Begin jogging by lifting knees alternatively\n3. Keep landing soft and controlled\n4. Swing arms naturally\n5. Continue for 30-60 seconds'
                    }
                ],
                get allSlides() {
                    // Create 5 sets of slides for smooth infinite scrolling
                    return [...this.exercises, ...this.exercises, ...this.exercises, ...this.exercises, ...this.exercises];
                },
                init() {
                    // Start from the middle set of slides
                    this.currentIndex = this.exercises.length * 2;
                    
                    // Add event listener for transition end
                    const carousel = document.querySelector('.carousel-container');
                    if (carousel) {
                        carousel.addEventListener('transitionend', () => this.handleTransitionEnd());
                    }
                },
                handleTransitionEnd() {
                    // If we've scrolled too far right
                    if (this.currentIndex >= this.exercises.length * 3) {
                        // Jump back to the middle set without animation
                        this.disableTransition();
                        this.currentIndex = this.exercises.length * 2;
                        this.enableTransition();
                    }
                    // If we've scrolled too far left
                    else if (this.currentIndex < this.exercises.length) {
                        // Jump forward to the middle set without animation
                        this.disableTransition();
                        this.currentIndex = this.exercises.length * 2;
                        this.enableTransition();
                    }
                },
                disableTransition() {
                    const container = document.querySelector('.carousel-container');
                    if (container) {
                        container.style.transition = 'none';
                        // Force reflow
                        container.offsetHeight;
                    }
                },
                enableTransition() {
                    const container = document.querySelector('.carousel-container');
                    if (container) {
                        container.style.transition = 'transform 700ms ease-in-out';
                    }
                },
                isCenter(index) {
                    const visibleCenter = this.currentIndex + 1;
                    return index === visibleCenter;
                },
                goToSlide(index) {
                    const diff = index - (this.currentIndex + 1);
                    this.currentIndex += diff;
                },
                next() {
                    this.currentIndex++;
                },
                prev() {
                    this.currentIndex--;
                },
                openModal(exerciseId) {
                    const exercise = this.exercises.find(ex => ex.id === exerciseId);
                    if (exercise) {
                        this.modalContent = exercise;
                        this.isModalOpen = true;
                    }
                },
                closeModal() {
                    this.isModalOpen = false;
                }
            }
        }

        function cooldownCarousel() {
            return {
                currentIndex: 0,
                isModalOpen: false,
                modalContent: {},
                exercises: [
                    {
                        id: 'triceps-stretch',
                        title: 'Triceps Stretch',
                        carouselImage: '../assets/images/workout-library/prev-triceps-stretch.PNG',
                        modalImage: '../assets/images/workout-library/cd-triceps-stretch.gif',
                        muscles: 'Triceps, Shoulders',
                        instructions: '1. Stand or sit with proper posture\n2. Raise one arm straight up\n3. Bend your elbow to drop your hand behind your head\n4. Use your other hand to gently pull your elbow back\n5. Hold for 15-30 seconds\n6. Switch arms and repeat\n7. Perform 2-3 sets per arm'
                    },
                    {
                        id: 'shoulder-stretch',
                        title: 'Shoulder Stretch',
                        carouselImage: '../assets/images/workout-library/prev-shoulder-stretch.PNG',
                        modalImage: '../assets/images/workout-library/cd-shoulder-stretch.gif',
                        muscles: 'Shoulders, Upper Back, Chest',
                        instructions: '1. Stand with feet shoulder-width apart\n2. Bring one arm across your chest\n3. Use opposite arm to hold above the elbow\n4. Gently pull the arm closer to your chest\n5. Hold for 15-30 seconds\n6. Switch arms and repeat\n7. Perform 2-3 sets per arm'
                    },
                    {
                        id: 'quad-stretch',
                        title: 'Quadriceps Stretch',
                        carouselImage: '../assets/images/workout-library/prev-quadriceps-stretch.PNG',
                        modalImage: '../assets/images/workout-library/cd-quadriceps-stretch.gif',
                        muscles: 'Quadriceps, Hip Flexors',
                        instructions: '1. Stand on one leg, using a wall for balance if needed\n2. Bend your other leg behind you\n3. Hold your foot with the same-side hand\n4. Keep your knees close together\n5. Stand tall and slightly push your hips forward\n6. Hold for 15-30 seconds\n7. Switch legs and repeat\n8. Perform 2-3 sets per leg'
                    },
                    {
                        id: 'knee-hugs',
                        title: 'Knee Hugs',
                        carouselImage: '../assets/images/workout-library/prev-knee-hugs.PNG',
                        modalImage: '../assets/images/workout-library/cd-knee-hugs.gif',
                        muscles: 'Hamstrings, Lower Back',
                        instructions: '1. Stand tall with your feet hip-width apart and arms at your sides. Maintain a neutral spine and engage your core.\n2. Lift your right knee toward your chest. Wrap your hands around your knee or shin and gently pull it closer to your chest. Avoid rounding your back.\n3. Keep your standing leg slightly bent and maintain your balance. Engage your core and focus on a fixed point to help with stability.\n4. Hold the stretch for 1-2 seconds, feeling the stretch in your glutes and hamstrings.\n5. Gently lower your leg and repeat the movement with your left leg.\n6. Alternate legs for the desired number of repetitions (typically 8-10 per leg).'
                    },
                    {
                        id: 'childs-pose',
                        title: "Child's Pose",
                        carouselImage: '../assets/images/workout-library/prev-childs-pose.PNG',
                        modalImage: '../assets/images/workout-library/cd-childs-pose.gif',
                        muscles: 'Back, Shoulders, Hips, Glutes',
                        instructions: '1. Start on your hands and knees\n2. Sit back on your heels\n3. Extend your arms forward on the ground\n4. Lower your chest toward the ground\n5. Rest your forehead on the mat\n6. Keep your arms extended and palms flat\n7. Hold for 30-60 seconds\n8. Breathe deeply and relax\n9. Perform 2-3 sets'
                    },
                    {
                        id: 'cat-cow',
                        title: 'Cat-Cow Stretch',
                        carouselImage: '../assets/images/workout-library/prev-cat-cow-stretch.PNG',
                        modalImage: '../assets/images/workout-library/cd-cat-cow-stretch.gif',
                        muscles: 'Spine, Core, Neck, Back',
                        instructions: '1. Start on hands and knees in tabletop position\n2. Cat Pose:\n   - Round your spine toward the ceiling\n   - Tuck your chin to chest\n   - Hold for 2-3 seconds\n3. Cow Pose:\n   - Arch your back\n   - Lift your head and tailbone\n   - Hold for 2-3 seconds\n4. Alternate between positions\n5. Perform 10-15 repetitions\n6. Move slowly and coordinate with breathing'
                    }
                ],
                get allSlides() {
                    // Create 5 sets of slides for smooth infinite scrolling
                    return [...this.exercises, ...this.exercises, ...this.exercises, ...this.exercises, ...this.exercises];
                },
                init() {
                    // Start from the middle set of slides
                    this.currentIndex = this.exercises.length * 2;
                    
                    // Add event listener for transition end
                    const carousel = document.querySelector('.carousel-container');
                    if (carousel) {
                        carousel.addEventListener('transitionend', () => this.handleTransitionEnd());
                    }
                },
                handleTransitionEnd() {
                    // If we've scrolled too far right
                    if (this.currentIndex >= this.exercises.length * 3) {
                        // Jump back to the middle set without animation
                        this.disableTransition();
                        this.currentIndex = this.exercises.length * 2;
                        this.enableTransition();
                    }
                    // If we've scrolled too far left
                    else if (this.currentIndex < this.exercises.length) {
                        // Jump forward to the middle set without animation
                        this.disableTransition();
                        this.currentIndex = this.exercises.length * 2;
                        this.enableTransition();
                    }
                },
                disableTransition() {
                    const container = document.querySelector('.carousel-container');
                    if (container) {
                        container.style.transition = 'none';
                        // Force reflow
                        container.offsetHeight;
                    }
                },
                enableTransition() {
                    const container = document.querySelector('.carousel-container');
                    if (container) {
                        container.style.transition = 'transform 700ms ease-in-out';
                    }
                },
                isCenter(index) {
                    const visibleCenter = this.currentIndex + 1;
                    return index === visibleCenter;
                },
                goToSlide(index) {
                    const diff = index - (this.currentIndex + 1);
                    this.currentIndex += diff;
                },
                next() {
                    this.currentIndex++;
                },
                prev() {
                    this.currentIndex--;
                },
                openModal(exerciseId) {
                    const exercise = this.exercises.find(ex => ex.id === exerciseId);
                    if (exercise) {
                        this.modalContent = exercise;
                        this.isModalOpen = true;
                    }
                },
                closeModal() {
                    this.isModalOpen = false;
                }
            }
        }



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

        document.addEventListener('DOMContentLoaded', function() {
            // Only target actual GIF files
            const gifs = document.querySelectorAll('img[src$=".gif"], img[src$=".GIF"]');
            
            gifs.forEach(function(gif) {
                // Store the original animated GIF source
                const originalSrc = gif.src;
                
                // Create a unique ID for this GIF
                const gifId = 'gif-' + Math.random().toString(36).substr(2, 9);
                gif.id = gifId;
                
                // Create a container for positioning
                const container = document.createElement('div');
                container.classList.add('gif-container');
                container.style.position = 'relative';
                container.style.display = 'inline-block';
                container.style.overflow = 'hidden';
                container.style.borderRadius = 'inherit'; // Maintain any border radius from the image
                
                // We'll use a canvas to "pause" the GIF by showing a static frame
                const canvas = document.createElement('canvas');
                canvas.id = gifId + '-canvas';
                canvas.style.position = 'absolute';
                canvas.style.top = '0';
                canvas.style.left = '0';
                canvas.style.width = '100%';
                canvas.style.height = '100%';
                
                // Add a stylish play button overlay
                const playButton = document.createElement('div');
                playButton.classList.add('gif-play-button');
                playButton.style.position = 'absolute';
                playButton.style.top = '50%';
                playButton.style.left = '50%';
                playButton.style.transform = 'translate(-50%, -50%)';
                playButton.style.width = '60px';
                playButton.style.height = '60px';
                playButton.style.backgroundColor = 'rgba(0, 0, 0, 0.6)';
                playButton.style.borderRadius = '50%';
                playButton.style.display = 'flex';
                playButton.style.justifyContent = 'center';
                playButton.style.alignItems = 'center';
                playButton.style.cursor = 'pointer';
                playButton.style.transition = 'opacity 0.3s ease';
                playButton.style.zIndex = '2'; // Ensure it's above other elements
                
                // Create the play/pause icon
                const icon = document.createElement('div');
                // Initially set to play icon since GIFs will be paused by default
                icon.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                    <polygon points="5,3 19,12 5,21"/>
                </svg>
                `;
                playButton.appendChild(icon);
                
                // Add hover effect
                container.addEventListener('mouseenter', function() {
                    playButton.style.opacity = '1';
                });
                
                container.addEventListener('mouseleave', function() {
                    playButton.style.opacity = '0.7';
                });
                
                // Set up the click handler
                let isPlaying = false; // GIFs are paused by default now
                
                container.addEventListener('click', function(e) {
                    if (isPlaying) {
                        // Pause: Capture current frame and display it
                        captureFrame(gif, canvas);
                        canvas.style.display = 'block';
                        gif.style.visibility = 'hidden';
                        isPlaying = false;
                        
                        // Change to play icon
                        icon.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                            <polygon points="5,3 19,12 5,21"/>
                        </svg>
                        `;
                        
                        // Update status
                        statusBar.textContent = 'Click to play';
                    } else {
                        // Play: Show original animated GIF
                        canvas.style.display = 'none';
                        gif.style.visibility = 'visible';
                        isPlaying = true;
                        
                        // Change to pause icon
                        icon.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                            <rect x="6" y="4" width="4" height="16"/>
                            <rect x="14" y="4" width="4" height="16"/>
                        </svg>
                        `;
                        
                        // Update status
                        statusBar.textContent = 'Click to pause';
                    }
                });
                
                // Add a bottom status bar with text
                const statusBar = document.createElement('div');
                statusBar.classList.add('gif-status');
                statusBar.style.position = 'absolute';
                statusBar.style.bottom = '0';
                statusBar.style.left = '0';
                statusBar.style.right = '0';
                statusBar.style.backgroundColor = 'rgba(0, 0, 0, 0.6)';
                statusBar.style.color = 'white';
                statusBar.style.padding = '5px 10px';
                statusBar.style.fontSize = '12px';
                statusBar.style.textAlign = 'center';
                statusBar.style.transform = 'translateY(100%)';
                statusBar.style.transition = 'transform 0.3s ease';
                statusBar.style.zIndex = '2'; // Ensure it's above other elements
                statusBar.textContent = 'Click to play'; // Updated for initial paused state
                
                // Show status on hover
                container.addEventListener('mouseenter', function() {
                    statusBar.style.transform = 'translateY(0)';
                });
                
                container.addEventListener('mouseleave', function() {
                    statusBar.style.transform = 'translateY(100%)';
                });
                
                // Make the image fill the container
                gif.style.display = 'block';
                gif.style.width = '100%';
                gif.style.height = '100%';
                gif.style.objectFit = 'cover';
                
                // Insert the new elements into the DOM
                gif.parentNode.insertBefore(container, gif);
                container.appendChild(gif);
                container.appendChild(canvas);
                container.appendChild(playButton);
                container.appendChild(statusBar);
                
                // Add a subtle animation hint initially
                setTimeout(() => {
                    playButton.style.opacity = '0.7';
                }, 1000);
                
                // Load the GIF to initialize and get its dimensions
                const img = new Image();
                img.onload = function() {
                    canvas.width = img.naturalWidth;
                    canvas.height = img.naturalHeight;
                    
                    // Initialize the paused state immediately after GIF loads
                    captureFrame(gif, canvas);
                    canvas.style.display = 'block';
                    gif.style.visibility = 'hidden';
                };
                img.src = originalSrc;
            });
            
            // Function to capture a frame from a playing GIF
            function captureFrame(gif, canvas) {
                const ctx = canvas.getContext('2d');
                // Match canvas dimensions to the GIF
                canvas.width = gif.naturalWidth || gif.width;
                canvas.height = gif.naturalHeight || gif.height;
                // Draw the current frame
                ctx.drawImage(gif, 0, 0, canvas.width, canvas.height);
            }
        });
    </script>
</body>
</html>