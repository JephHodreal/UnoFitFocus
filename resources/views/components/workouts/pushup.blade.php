<div class="flex flex-col md:flex-row items-center rounded-lg p-8">
    <!-- Information Column -->
    <div class="md:w-1/2 space-y-4">
        <h2 class="text-2xl font-bold flex items-center gap-2">
            {{ __('Push-Up') }}
            <span class="flex items-center gap-2 px-3 py-1 bg-blue-200 text-blue-800 text-sm rounded-full relative group">
                <img src="../assets/images/chest.png" alt="Chest Icon" class="h-4 w-4" />
                {{ __('Upper Extremities') }}
                <span
                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-max bg-gray-700 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"
                >
                    {{ __('This exercise primarily targets the chest and arms.') }}
                </span>
            </span>
        </h2>
        <p class="text-gray-700">{{ __('The push-up is an upper body exercise that targets the chest, shoulders, and triceps while also working out the biceps, back, stomach, and hips.') }}</p>
        <p class="text-gray-700 font-bold">{{ __('Benefits:') }}</p>
        <ul class="list-disc list-inside text-gray-700">
            <li>{{ __('Increases upper-body strength and engages the core') }}</li>
            <li>{{ __('Strengthening your back, shoulders, and abs can help improve posture') }}</li>
            <li>{{ __('As a type of strength training, it supports bone health and boosts heart health') }}</li>
        </ul>
        <p class="text-gray-700 font-bold">{{ __('Process:') }}</p>
        <ol class="list-decimal list-inside text-gray-700">
            <li>{{ __('Start down on all fours in a high plank position, with your palms flat on the floor and positioned slightly wider than the shoulders.') }}</li>
            <li>{{ __('Extend your legs so they form a straight line with your back, keeping your head in line with your spine and balancing your weight on the balls of your feet.') }}</li>
            <li>{{ __('Lower yourself by bending your elbows, breathing in as you do, and stopping with your chest just above the ground. Your elbows should be at a 45 degree angle relative to the torso.') }}</li>
            <li>{{ __('Breathe out as you push your hands firmly against the floor, maintaining the straight line of your back while lifting your body up until your arms are straight.') }}</li>
            <li>{{ __('Repeat the process.') }}</li>
        </ol>
    </div>
    <!-- GIF Column -->
    <div class="md:w-1/2 flex justify-center md:justify-end mt-6 md:mt-0">
        <img src="../assets/images/workout-library/prev-pushup.PNG" alt="Push-Up GIF" class="object-contain h-96 w-full md:w-auto rounded-lg">
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-8 py-8">
    <div class="relative rounded-lg shadow-lg overflow-hidden">
        <img src="../assets/images/workout-library/pushup-1.gif" alt="Push-Up Starting Position" class="w-full rounded-lg">
    </div>
    <div class="relative rounded-lg shadow-lg overflow-hidden">
        <img src="../assets/images/workout-library/pushup-2.gif" alt="Performing Push-Up" class="w-full rounded-lg">
    </div>
</div>