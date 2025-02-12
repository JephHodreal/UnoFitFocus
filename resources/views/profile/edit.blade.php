<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | FitFocus</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <!-- Conditionally Render Modal -->
        @if($profileIncomplete)
            <!-- Pop-up Modal -->
            <div x-data="{ showModal: true }">
                <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 transition-opacity">
                    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto relative" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90">

                        <!-- Close Button -->
                        <button @click="showModal = false" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>

                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Almost there!</h3>
                                <p class="text-gray-600 mb-6">Complete your profile by adding some additional information.</p>
                        <div class="flex justify-center w-full">
                            <a href="{{ route('Setup') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'">
                                {{ __('Go to Setup') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- End Modal -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <!-- Profile Information (View-Only Mode) -->
                <div id="profile-view" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" x-data="{ showPictureModal: false, showImageViewer: false }">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Profile Information') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("View your profile details here.") }}
                            </p>
                        </header>

                        <!-- Button to enable edit mode -->
                        <div class="flex items-start mt-4">
                            <!-- Profile Picture Section -->
                            <div class="relative">
                                @php
                                    $profilePicPath = 'uploads/profile_pics/' . $userInfo->profile_pic;
                                    $imageSrc = file_exists(public_path($profilePicPath)) ? asset($profilePicPath) : asset('assets/images/placeholder.png');
                                @endphp
                                <img @click="showImageViewer = true" class="rounded-full w-36 h-36 object-cover cursor-pointer" src="{{ $imageSrc }}" alt="Profile picture">

                                <!-- Pencil Icon for Editing Profile Picture -->
                                <button class="absolute top-2 right-2 bg-gray-200 p-1 rounded-full hover:bg-gray-300"
                                    @click="showPictureModal = true" title="Change profile picture">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L6 11.172V14h2.828l8.586-8.586a2 2 0 000-2.828zM5 13v3h3l8.586-8.586-3-3L5 13z"></path>
                                    </svg>
                                </button>

                                <!-- Edit Profile Button -->
                                <x-primary-button id="edit-profile-btn" class="mt-4 w-full justify-center text-center"> {{ __('Edit Profile') }} </x-primary-button>
                            </div>
                        
                            <!-- Profile Details Section with more spacing -->
                            <div class="ml-16 grid grid-cols-2 gap-x-8 gap-y-4">
                                <strong>First Name:</strong> <span>{{ $userInfo->first_name }}</span>
                                <strong>Middle Name:</strong> <span>{{ $userInfo->middle_name }}</span>
                                <strong>Last Name:</strong> <span>{{ $userInfo->last_name }}</span>
                                <strong>Email:</strong> <span>{{ $user->email }}</span>
                                <strong>Age:</strong> <span>{{ $userInfo->age }}</span>
                                <strong>Height:</strong> <span>{{ $userInfo->height }} cm</span>
                                <strong>Weight:</strong> <span>{{ $userInfo->weight }} kg</span>
                                <strong>BMI:</strong> <span>{{ $userInfo->bmi }}</span>
                                <strong>Gender:</strong> <span>{{ $userInfo->gender }}</span>
                                <strong>Fitness Goal:</strong> <span>{{ $userInfo->fitness_goal }}</span>
                                <strong>Fitness Level:</strong> <span>{{ $userInfo->fitness_level }}</span>
                                <strong>Health Condition:</strong> <span>{{ $userInfo->health_condition }}</span>
                            </div>
                        </div>

                        <!-- Conditionally Render Profile Picture Modal -->
                        <template x-if="showPictureModal">
                            <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 transition-opacity">
                                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto relative">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ __('Change Profile Picture') }}</h3>

                                    <!-- File Input for Profile Picture -->
                                    <form action="{{ route('profile.updatePicture') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <input type="file" name="profile_pic" accept="image/*" class="border border-gray-300 p-2 w-full">
                                        
                                        <div class="mt-4 flex justify-end gap-4">
                                            <x-secondary-button id="cancel-edit-btn" @click="showPictureModal = false" class="px-4 py-2 rounded-md hover:bg-gray-600 hover:text-white">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>
                                            <x-primary-button>{{ __('Upload') }}</x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </template>

                        <!-- Conditionally Render Image Viewer Modal -->
                        <template x-if="showImageViewer">
                            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 transition-opacity" >
                                <div class="relative" @click.stop>                           
                                    <img 
                                        src="{{ asset('uploads/profile_pics/' . $userInfo->profile_pic) }}" 
                                        alt="Profile picture" 
                                        class="rounded-lg w-auto max-h-screen"
                                    >
                                    <!-- Close Button -->
                                    <button 
                                        @click="showImageViewer = false" 
                                        class="absolute top-2 right-2 bg-white p-1 rounded-full shadow-md hover:bg-gray-200"
                                        title="Close"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- PARQ Information (View-Only Mode) -->
                <div class="mt-6">
                    <!-- View Mode -->
                    <div id="parq-view" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('PARQ Assessment Information') }}
                                </h2>
                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __("View your Physical Activity Readiness Questionnaire (PAR-Q) responses.") }}
                                </p>
                            </header>
                
                            <div class="mt-6">
                                <div class="grid grid-cols-1 gap-y-4"> <!--div class="ml-16 grid grid-cols-2 gap-x-8 gap-y-4" -->
                                    <div class="border-b pb-3">
                                        <strong class="text-gray-700">Heart Condition:</strong> <span class="mt-1">{{ $userParq->heart_condition ?? 'Not answered' }}</span>
                                        <p class="mt-1 text-sm text-gray-500">Has your doctor ever said that you have a heart condition and that you should only do physical activity recommended by a doctor?</p>
                                    </div>
                
                                    <div class="border-b pb-3">
                                        <strong class="text-gray-700">Chest Pain During Physical Activity:</strong>
                                        <p class="mt-1">{{ $userParq->chest_pain_phys ?? 'Not answered' }}</p>
                                        <p class="mt-1 text-sm text-gray-500">Do you feel pain in your chest when you do physical activity?</p>
                                    </div>
                
                                    <div class="border-b pb-3">
                                        <strong class="text-gray-700">Chest Pain When Not Active:</strong>
                                        <p class="mt-1">{{ $userParq->chest_pain_non_phys ?? 'Not answered' }}</p>
                                        <p class="mt-1 text-sm text-gray-500">In the past month, have you had chest pain when you were not doing physical activity?</p>
                                    </div>
                
                                    <div class="border-b pb-3">
                                        <strong class="text-gray-700">Balance Issues:</strong>
                                        <p class="mt-1">{{ $userParq->balance_loss ?? 'Not answered' }}</p>
                                        <p class="mt-1 text-sm text-gray-500">Do you lose your balance because of dizziness or do you ever lose consciousness?</p>
                                    </div>
                
                                    <div class="border-b pb-3">
                                        <strong class="text-gray-700">Bone or Joint Problems:</strong>
                                        <p class="mt-1">{{ $userParq->bone_joint_problem ?? 'Not answered' }}</p>
                                        <p class="mt-1 text-sm text-gray-500">Do you have a bone or joint problem that could be worsened by a change in your physical activity?</p>
                                    </div>
                
                                    <div class="border-b pb-3">
                                        <strong class="text-gray-700">Blood Pressure/Heart Medication:</strong>
                                        <p class="mt-1">{{ $userParq->drug_prescrip ?? 'Not answered' }}</p>
                                        <p class="mt-1 text-sm text-gray-500">Is your doctor currently prescribing drugs for your blood pressure or heart condition?</p>
                                    </div>
                
                                    <div class="border-b pb-3">
                                        <strong class="text-gray-700">Other Health Concerns:</strong>
                                        <p class="mt-1">{{ $userParq->other_reason ?? 'Not answered' }}</p>
                                        <p class="mt-1 text-sm text-gray-500">Do you know of any other reason why you should not do physical activity?</p>
                                    </div>
                                </div>
                
                                <!-- Edit PARQ Button -->
                                <x-primary-button id="edit-parq-btn" class="mt-6">
                                    {{ __('Update PARQ Assessment') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PARQ Edit Form (Initially Hidden) -->
                <div id="parq-edit" class="hidden p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.edit-parqs')
                    </div>
                </div>

                <!-- Profile Update Form (Edit Mode) - Hidden by default -->
                <div id="profile-edit" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="display:none;">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Password Change Section -->
                <div id="password-view" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Update Password') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Click the Change Password button to change your password.") }}
                            </p>
                        </header>
                        <x-primary-button id="edit-password-btn" class="mt-4"> {{ __('Change Password') }} </x-primary-button>
                    </div>
                </div>

                <div id="password-edit" class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="display:none;">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    <script>
        document.getElementById('edit-profile-btn').addEventListener('click', function() {
            // Hide the view-only mode and show the edit form
            document.getElementById('profile-view').style.display = 'none';
            document.getElementById('profile-edit').style.display = 'block';
        });
        document.getElementById('edit-password-btn').addEventListener('click', function() {
            // Hide the password display and show the edit form
            document.getElementById('password-view').style.display = 'none';
            document.getElementById('password-edit').style.display = 'block';
        });
    </script>
</body>
</html>