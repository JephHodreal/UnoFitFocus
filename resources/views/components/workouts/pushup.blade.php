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
            <li>{{ __('Start in a plank position with your hands under your shoulders.') }}</li>
            <li>{{ __('Lower your body until your chest nearly touches the floor.') }}</li>
            <li>{{ __('Push through your palms to raise your body back to the starting position.') }}</li>
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