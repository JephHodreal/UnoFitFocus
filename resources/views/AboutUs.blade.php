<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body>
    <main>
        <x-guest-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('About Us') }}
                </h2>
                <h2 class="text-x2 text-gray-800 leading-tight">
                    {{ __('Learn more about FitFocus here!') }}
                </h2>
            </x-slot>

            <!-- About Section -->
            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-cover bg-fixed bg-center text-white" style="background-image: url('../assets/images/favicon.png'); background-color: rgba(0,0,0,0.6); background-blend-mode: darken;">
                        <div class="container mx-auto px-4 py-16">
                            <h2 class="text-4xl font-bold text-center pt-8 mb-10 text-white">{{ __('What We Do') }}</h2>
                            <p class="text-lg text-justify mb-8 max-w-4xl mx-auto text-white">{{ __('FitFocus uses advanced technology to analyze your posture in real time during key bodyweight exercises like push-ups, squats, and planks. Our goal is to help you perfect your form, reduce injury risks, and maximize workout efficiency.') }}</p>
                            
                            <h3 class="text-2xl font-semibold text-center mb-8 text-white">{{ __('Key Features') }}</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="bg-white/20 p-6 rounded-lg text-center transition-all duration-300 hover:bg-white/30 hover:shadow-lg">
                                    <div class="text-xl font-bold mb-2 text-white">{{ __('Real-time Posture') }}</div>
                                    <p class="text-sm text-gray-200">{{ __('Placeholder text for detailed description of real-time posture estimation.') }}</p>
                                </div>
                                
                                <div class="bg-white/20 p-6 rounded-lg text-center transition-all duration-300 hover:bg-white/30 hover:shadow-lg">
                                    <div class="text-xl font-bold mb-2 text-white">{{ __('Personalized Experience') }}</div>
                                    <p class="text-sm text-gray-200">{{ __('Placeholder text for detailed description of personalized workout experience.') }}</p>
                                </div>
                                
                                <div class="bg-white/20 p-6 rounded-lg text-center transition-all duration-300 hover:bg-white/30 hover:shadow-lg">
                                    <div class="text-xl font-bold mb-2 text-white">{{ __('Progress Tracking') }}</div>
                                    <p class="text-sm text-gray-200">{{ __('Placeholder text for detailed description of workout progress monitoring.') }}</p>
                                </div>
                                
                                <div class="bg-white/20 p-6 rounded-lg text-center transition-all duration-300 hover:bg-white/30 hover:shadow-lg">
                                    <div class="text-xl font-bold mb-2 text-white">{{ __('Workout Library') }}</div>
                                    <p class="text-sm text-gray-200">{{ __('Placeholder text for detailed description of dedicated workout library.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- How to use FitFocus section -->
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                        <h2 class="text-4xl font-bold text-center pt-8 mb-10">{{ __('How to work out using FitFocus') }}</h2>
                        <div class="container mx-auto gap-4 flex flex-col lg:flex-row items-center pb-4">
                            <!-- Text section (now on the left) -->
                            <div class="lg:w-1/2 mb-8 lg:mb-0">
                                <p class="text-lg text-justify mb-2 pl-6">{{ __('FitFocus allows you to create your own account to save your workout data, wherein you can view your workout history and see your progress. Through our FitCheck, you would be able to perform bodyweight exercises with the proper posture.') }}</p>
                                <div class="p-6">
                                    <h3 class="text-2xl font-semibold mb-4">{{ __('Experience FitFocus by following these steps:') }}</h3>
                                    <ul class="list-disc list-inside text-left space-y-2">
                                        <li class="slide-step step-1 transition-all duration-300">{{ __('Register for an account by providing your login details') }}</li>
                                        <li class="slide-step step-2 transition-all duration-300">{{ __('Answer the Physical Activity Readiness Questionnaire') }}</li>
                                        <li class="slide-step step-3 transition-all duration-300">{{ __('After logging in, finish setting up your account by providing your user profile') }}</li>
                                        <li class="slide-step step-4 transition-all duration-300">{{ __('Learn about different workouts and exercises in our Workout Library') }}</li>
                                        <li class="slide-step step-5 transition-all duration-300">{{ __('Visit the FitCheck tab and select your desired workout and difficulty level') }}</li>
                                        <li class="slide-step step-6 transition-all duration-300">{{ __('Experience real-time posture checking while performing your workout') }}</li>
                                        <li class="slide-step step-7 transition-all duration-300">{{ __('Complete the listed objective to receive your score') }}</li>
                                        <li class="slide-step step-8 transition-all duration-300">{{ __('View your workout progress in your Dashboard') }}</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Slideshow (now on the right) -->
                            <div class="lg:w-1/2 relative">
                                <div class="slideshow-container relative rounded-lg shadow-lg overflow-hidden h-80 md:h-96 lg:h-[500px]">
                                    <!-- Slides wrapper with horizontal sliding effect -->
                                    <div class="slides-wrapper flex transition-transform duration-500 h-full">
                                        <!-- Slide 1 -->
                                        <div class="slide min-w-full h-full relative">
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                                <img src="../assets/images/AboutUs-Step1.PNG" alt="Create an account by filling out the registration form and entering your name, email, and password." class="max-w-full max-h-full object-contain cursor-pointer" onclick="openModal();currentSlide(1)">
                                            </div>
                                            <div class="slide-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-4 absolute bottom-0 w-full">
                                                <p class="font-medium text-lg">{{ __('Step 1: Register for an account by providing your login details') }}</p>
                                            </div>
                                        </div>
            
                                        <!-- Slide 2 -->
                                        <div class="slide min-w-full h-full relative">
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                                <img src="../assets/images/AboutUs-Step2.PNG" alt="Answer the seven-question form to reflect on how ready you are for physical activity." class="max-w-full max-h-full object-contain cursor-pointer" onclick="openModal();currentSlide(2)">
                                            </div>
                                            <div class="slide-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-4 absolute bottom-0 w-full">
                                                <p class="font-medium text-lg">{{ __('Step 2: Answer the Physical Activity Readiness Questionnaire') }}</p>
                                            </div>
                                        </div>
            
                                        <!-- Slide 3 -->
                                        <div class="slide min-w-full h-full relative">
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                                <img src="../assets/images/AboutUs-Step3.PNG" alt="Provide your user profile by entering your age, weight, height, and other information." class="max-w-full max-h-full object-contain cursor-pointer" onclick="openModal();currentSlide(3)">
                                            </div>
                                            <div class="slide-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-4 absolute bottom-0 w-full">
                                                <p class="font-medium text-lg">{{ __('Step 3: After logging in, finish setting up your account by providing your user profile') }}</p>
                                            </div>
                                        </div>
            
                                        <!-- Slide 4 -->
                                        <div class="slide min-w-full h-full relative">
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                                <img src="../assets/images/AboutUs-Step4.PNG alt="Read about different workouts and exercises in the Workout Library." class="max-w-full max-h-full object-contain cursor-pointer" onclick="openModal();currentSlide(4)">
                                            </div>
                                            <div class="slide-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-4 absolute bottom-0 w-full">
                                                <p class="font-medium text-lg">{{ __('Step 4: Learn about different workouts and exercises in our Workout Library') }}</p>
                                            </div>
                                        </div>
            
                                        <!-- Slide 5 -->
                                        <div class="slide min-w-full h-full relative">
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                                <img src="../assets/images/AboutUs-Step5.PNG" alt="Select a workout and difficulty level in the FitCheck." class="max-w-full max-h-full object-contain cursor-pointer" onclick="openModal();currentSlide(5)">
                                            </div>
                                            <div class="slide-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-4 absolute bottom-0 w-full">
                                                <p class="font-medium text-lg">{{ __('Step 5: Visit the FitCheck tab and select your desired workout and difficulty level') }}</p>
                                            </div>
                                        </div>

                                        <!-- Slide 6 -->
                                        <div class="slide min-w-full h-full relative">
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                                <img src="../assets/images/AboutUs-Step6.PNG" alt="Perform your workout and experience real-time posture checking and feedback." class="max-w-full max-h-full object-contain cursor-pointer" onclick="openModal();currentSlide(6)">
                                            </div>
                                            <div class="slide-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-4 absolute bottom-0 w-full">
                                                <p class="font-medium text-lg">{{ __('Step 6: Experience real-time posture checking while performing your workout') }}</p>
                                            </div>
                                        </div>

                                        <!-- Slide 7 -->
                                        <div class="slide min-w-full h-full relative">
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                                <img src="../assets/images/AboutUs-Step7.PNG" alt="Complete the task displayed to get your score." class="max-w-full max-h-full object-contain cursor-pointer" onclick="openModal();currentSlide(7)">
                                            </div>
                                            <div class="slide-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-4 absolute bottom-0 w-full">
                                                <p class="font-medium text-lg">{{ __('Step 7: Complete the listed objective to receive your score') }}</p>
                                            </div>
                                        </div>

                                        <!-- Slide 8 -->
                                        <div class="slide min-w-full h-full relative">
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                                <img src="../assets/images/AboutUs-Step8.PNG" alt="Take a look at your workout stats in the Dashboard." class="max-w-full max-h-full object-contain cursor-pointer" onclick="openModal();currentSlide(8)">
                                            </div>
                                            <div class="slide-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-4 absolute bottom-0 w-full">
                                                <p class="font-medium text-lg">{{ __('Step 8: View your workout progress in your Dashboard') }}</p>
                                            </div>
                                        </div>
                                    </div>
            
                                    <!-- Navigation arrows -->
                                    <a class="prev absolute top-1/2 left-0 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-3 rounded-r cursor-pointer z-10 transition-all duration-300 hover:scale-110" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="next absolute top-1/2 right-0 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-3 rounded-l cursor-pointer z-10 transition-all duration-300 hover:scale-110" onclick="plusSlides(1)">&#10095;</a>
                                </div>
            
                                <!-- Dots/circles -->
                                <div class="dots-container text-center mt-4">
                                    <span class="dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentSlide(1)"></span>
                                    <span class="dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentSlide(2)"></span>
                                    <span class="dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentSlide(3)"></span>
                                    <span class="dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentSlide(4)"></span>
                                    <span class="dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentSlide(5)"></span>
                                    <span class="dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentSlide(6)"></span>
                                    <span class="dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentSlide(7)"></span>
                                    <span class="dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentSlide(8)"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal for enlarged images -->
            <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center opacity-0 transition-opacity duration-300">
                <div class="modal-content max-w-4xl w-full mx-auto relative transform scale-95 transition-transform duration-300">
                    <span class="close absolute top-4 right-4 text-white text-4xl font-bold cursor-pointer hover:text-gray-300 z-20 transition-transform duration-300 hover:scale-110" onclick="closeModal()">&times;</span>
                    
                    <!-- Modal Slides -->
                    <div class="modal-slides relative overflow-hidden">
                        <div class="modal-slides-wrapper flex transition-transform duration-500">
                            <!-- Modal Slide 1 -->
                            <div class="modal-slide min-w-full">
                                <div class="fixed-size-container w-full h-96 lg:h-[32rem] relative overflow-hidden">
                                    <img src="../assets/images/AboutUs-Step1.png" alt="Create an account by filling out the registration form and entering your name, email, and password." class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain">
                                </div>
                                <div class="modal-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-6 absolute bottom-0 w-full">
                                    <p class="font-medium text-xl">{{ __('Step 1: Register for an account by providing your login details') }}</p>
                                </div>
                            </div>
            
                            <!-- Modal Slide 2 -->
                            <div class="modal-slide min-w-full">
                                <div class="fixed-size-container w-full h-96 lg:h-[32rem] relative overflow-hidden">
                                    <img src="../assets/images/AboutUs-Step2.png" alt="Answer the seven-question form to reflect on how ready you are for physical activity." class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain">
                                </div>
                                <div class="modal-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-6 absolute bottom-0 w-full">
                                    <p class="font-medium text-xl">{{ __('Step 2: Answer the Physical Activity Readiness Questionnaire') }}</p>
                                </div>
                            </div>
            
                            <!-- Modal Slide 3 -->
                            <div class="modal-slide min-w-full">
                                <div class="fixed-size-container w-full h-96 lg:h-[32rem] relative overflow-hidden">
                                    <img src="../assets/images/AboutUs-Step3.png" alt="Provide your user profile by entering your age, weight, height, and other information." class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain">
                                </div>
                                <div class="modal-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-6 absolute bottom-0 w-full">
                                    <p class="font-medium text-xl">{{ __('Step 3: After logging in, finish setting up your account by providing your user profile') }}</p>
                                </div>
                            </div>
            
                            <!-- Modal Slide 4 -->
                            <div class="modal-slide min-w-full">
                                <div class="fixed-size-container w-full h-96 lg:h-[32rem] relative overflow-hidden">
                                    <img src="../assets/images/AboutUs-Step4.png" alt="Read about different workouts and exercises in the Workout Library." class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain">
                                </div>
                                <div class="modal-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-6 absolute bottom-0 w-full">
                                    <p class="font-medium text-xl">{{ __('Step 4: Learn about different workouts and exercises in our Workout Library') }}</p>
                                </div>
                            </div>
            
                            <!-- Modal Slide 5 -->
                            <div class="modal-slide min-w-full">
                                <div class="fixed-size-container w-full h-96 lg:h-[32rem] relative overflow-hidden">
                                    <img src="../assets/images/AboutUs-Step5.png" alt="Select a workout and difficulty level in the FitCheck." class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain">
                                </div>
                                <div class="modal-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-6 absolute bottom-0 w-full">
                                    <p class="font-medium text-xl">{{ __('Step 5: Visit the FitCheck tab and select your desired workout and difficulty level') }}</p>
                                </div>
                            </div>
                            
                            <!-- Modal Slide 6 -->
                            <div class="modal-slide min-w-full">
                                <div class="fixed-size-container w-full h-96 lg:h-[32rem] relative overflow-hidden">
                                    <img src="../assets/images/AboutUs-Step6.png" alt="Perform your workout and experience real-time posture checking and feedback." class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain">
                                </div>
                                <div class="modal-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-6 absolute bottom-0 w-full">
                                    <p class="font-medium text-xl">{{ __('Step 6: Experience real-time posture checking while performing your workout') }}</p>
                                </div>
                            </div>

                            <!-- Modal Slide 7 -->
                            <div class="modal-slide min-w-full">
                                <div class="fixed-size-container w-full h-96 lg:h-[32rem] relative overflow-hidden">
                                    <img src="../assets/images/AboutUs-Step7.png" alt="Complete the task displayed to get your score." class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain">
                                </div>
                                <div class="modal-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-6 absolute bottom-0 w-full">
                                    <p class="font-medium text-xl">{{ __('Step 7: Complete the listed objective to receive your score') }}</p>
                                </div>
                            </div>

                            <!-- Modal Slide 8 -->
                            <div class="modal-slide min-w-full">
                                <div class="fixed-size-container w-full h-96 lg:h-[32rem] relative overflow-hidden">
                                    <img src="../assets/images/AboutUs-Step8.png" alt="Take a look at your workout stats in the Dashboard." class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-full max-h-full object-contain">
                                </div>
                                <div class="modal-caption bg-gradient-to-t from-black to-transparent bg-opacity-75 text-white p-6 absolute bottom-0 w-full">
                                    <p class="font-medium text-xl">{{ __('Step 8: View your workout progress in your Dashboard') }}</p>
                                </div>
                            </div>
                        </div>
            
                        <!-- Modal Navigation -->
                        <a class="modal-prev absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-4 rounded cursor-pointer z-10 transition-all duration-300 hover:scale-110" onclick="plusModalSlides(-1)">&#10094;</a>
                        <a class="modal-next absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-4 rounded cursor-pointer z-10 transition-all duration-300 hover:scale-110" onclick="plusModalSlides(1)">&#10095;</a>
                    </div>
                    
                    <!-- Modal Dots -->
                    <div class="modal-dots text-center mt-4">
                        <span class="modal-dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentModalSlide(1)"></span>
                        <span class="modal-dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentModalSlide(2)"></span>
                        <span class="modal-dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentModalSlide(3)"></span>
                        <span class="modal-dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentModalSlide(4)"></span>
                        <span class="modal-dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentModalSlide(5)"></span>
                        <span class="modal-dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentModalSlide(6)"></span>
                        <span class="modal-dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentModalSlide(7)"></span>
                        <span class="modal-dot bg-gray-300 hover:bg-blue-500 cursor-pointer h-3 w-3 rounded-full inline-block mx-1 transition-all duration-300" onclick="currentModalSlide(8)"></span>
                    </div>
                </div>
            </div>
            
            <!-- JavaScript for slideshow and modal -->
            <script>
                let slideIndex = 1;
                let modalIndex = 1;
                
                // Show slides when page loads
                document.addEventListener('DOMContentLoaded', function() {
                    showSlides(slideIndex);
                    highlightStep(slideIndex);
                });
                
                // Next/previous controls
                function plusSlides(n) {
                    showSlides(slideIndex += n);
                    highlightStep(slideIndex);
                }
                
                // Thumbnail controls
                function currentSlide(n) {
                    showSlides(slideIndex = n);
                    highlightStep(slideIndex);
                }
                
                function showSlides(n) {
                    let slides = document.getElementsByClassName("slide");
                    let dots = document.getElementsByClassName("dot");
                    let slidesWrapper = document.querySelector('.slides-wrapper');
                    
                    if (n > slides.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = slides.length}
                    
                    // Update active dot
                    for (let i = 0; i < dots.length; i++) {
                        dots[i].classList.remove("bg-blue-500");
                        dots[i].classList.add("bg-gray-300");
                    }
                    dots[slideIndex-1].classList.remove("bg-gray-300");
                    dots[slideIndex-1].classList.add("bg-blue-500");
                    
                    // Slide the wrapper to show the current slide
                    slidesWrapper.style.transform = `translateX(-${(slideIndex - 1) * 100}%)`;
                }
                
                // Highlight corresponding step in the list
                function highlightStep(n) {
                    let steps = document.getElementsByClassName("slide-step");
                    
                    for (let i = 0; i < steps.length; i++) {
                        steps[i].classList.remove("font-bold", "text-blue-600");
                    }
                    
                    let activeStep = document.querySelector(`.step-${n}`);
                    if (activeStep) {
                        activeStep.classList.add("font-bold", "text-blue-600");
                    }
                }
                
                // Modal functions
                function openModal() {
                    const modal = document.getElementById("imageModal");
                    modal.classList.remove("hidden");
                    
                    // Use setTimeout to create a smooth transition
                    setTimeout(() => {
                        modal.classList.remove("opacity-0");
                        modal.classList.add("opacity-100");
                        
                        const modalContent = modal.querySelector(".modal-content");
                        modalContent.classList.remove("scale-95");
                        modalContent.classList.add("scale-100");
                    }, 50);
                    
                    currentModalSlide(slideIndex);
                }
                
                function closeModal() {
                    const modal = document.getElementById("imageModal");
                    const modalContent = modal.querySelector(".modal-content");
                    
                    modal.classList.remove("opacity-100");
                    modal.classList.add("opacity-0");
                    modalContent.classList.remove("scale-100");
                    modalContent.classList.add("scale-95");
                    
                    // Use setTimeout to wait for animation to complete before hiding
                    setTimeout(() => {
                        modal.classList.add("hidden");
                    }, 300);
                }
                
                function plusModalSlides(n) {
                    showModalSlides(modalIndex += n);
                }
                
                function currentModalSlide(n) {
                    showModalSlides(modalIndex = n);
                }
                
                function showModalSlides(n) {
                    let slides = document.getElementsByClassName("modal-slide");
                    let dots = document.getElementsByClassName("modal-dot");
                    let slidesWrapper = document.querySelector('.modal-slides-wrapper');
                    
                    if (n > slides.length) {modalIndex = 1}
                    if (n < 1) {modalIndex = slides.length}
                    
                    // Update active dot
                    for (let i = 0; i < dots.length; i++) {
                        dots[i].classList.remove("bg-blue-500");
                        dots[i].classList.add("bg-gray-300");
                    }
                    
                    dots[modalIndex-1].classList.remove("bg-gray-300");
                    dots[modalIndex-1].classList.add("bg-blue-500");
                    
                    // Slide the wrapper to show the current slide
                    slidesWrapper.style.transform = `translateX(-${(modalIndex - 1) * 100}%)`;
                }
                
                // Close modal when clicking outside the image
                window.onclick = function(event) {
                    let modal = document.getElementById("imageModal");
                    if (event.target == modal) {
                        closeModal();
                    }
                }
            </script>

            {{-- <!-- Developers Section -->
            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white px-6 py-10 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="container mx-auto text-center">
                            <h2 class="text-3xl font-bold mb-12">{{ __('Meet the Developers') }}</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                    <div class="w-32 h-32 mx-auto mb-4 overflow-hidden rounded-full relative">
                                        <img src="../assets/images/ResearcherJeph.png" alt="Developer 1" class="absolute top-0 left-0 w-full h-full object-cover">
                                    </div>
                                    <h3 class="text-xl font-semibold">{{ __('Jeph Hodreal') }}</h3>
                                    <p class="text-gray-600">{{ __('Lead Developer & Project Manager') }}</p>
                                </div>
                                <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                    <div class="w-32 h-32 mx-auto mb-4 overflow-hidden rounded-full relative">
                                        <img src="../assets/images/ResearcherMags.png" alt="Developer 2" class="absolute top-0 left-0 w-full h-full object-cover">
                                    </div>
                                    <h3 class="text-xl font-semibold">{{ __('Magallanes Jr. Butuhan') }}</h3>
                                    <p class="text-gray-600">{{ __('Machine Learning Engineer & Backend Developer') }}</p>
                                </div>
                                <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                    <div class="w-32 h-32 mx-auto mb-4 overflow-hidden rounded-full relative">
                                        <img src="../assets/images/ResearcherPrincess.jpg" alt="Developer 3" class="absolute top-0 left-0 w-full h-full object-cover">
                                    </div>
                                    <h3 class="text-xl font-semibold">{{ __('Princess Martinez') }}</h3>
                                    <p class="text-gray-600">{{ __('Dataset Collector & Researcher') }}</p>
                                </div>
                                <div class="developer-card text-center hover:scale-105 transition-transform duration-300 border-2 shadow-lg hover:shadow-xl rounded-lg p-6 bg-white">
                                    <div class="w-32 h-32 mx-auto mb-4 overflow-hidden rounded-full relative">
                                        <img src="../assets/images/ResearcherMonique.PNG" alt="Developer 4" class="absolute top-0 left-0 w-full h-full object-cover">
                                    </div>
                                    <h3 class="text-xl font-semibold">{{ __('Monique Burilla') }}</h3>
                                    <p class="text-gray-600">{{ __('Researcher & Documentation Specialist') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Footer -->
            @include('partials.footer')
        </x-guest-layout>    
    </main>
</body>
</html>