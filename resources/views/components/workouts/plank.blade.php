<div class="flex flex-col md:flex-row items-center rounded-lg p-8">
    <!-- Information Column -->
    <div class="md:w-1/2 space-y-4">
        <h2 class="text-2xl font-bold flex items-center gap-2">
            {{ __('Plank') }}
            <span class="flex items-center gap-2 px-3 py-1 bg-yellow-200 text-yellow-800 text-sm rounded-full relative group">
                <img src="../assets/images/abs.png" alt="Abs Icon" class="h-4 w-4" />
                {{ __('Core') }}
                <span
                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-max bg-gray-700 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"
                >
                    {{ __('This exercise primarily targets the abs and back, as well as the arms.') }}
                </span>
            </span>
        </h2>
        <p class="text-gray-700">{{ __('The plank is a core-strengthening exercise that engages multiple muscle groups, working out the core, glutes, quads, shoulders, arms, chest, abdominals, and back.') }}</p>
        <p class="text-gray-700 font-bold">{{ __('Benefits:') }}</p>
        <ul class="list-disc list-inside text-gray-700">
            <li>{{ __('Can reduce lower back pain') }} </li>
            <li>{{ __('Improves balance, stability, and endurance') }} </li>
            <li>{{ __('By strengthening the core, it promotes good posture') }} </li>
        </ul>
        <p class="text-gray-700 font-bold">{{ __('Process:') }}</p>
        <ol class="list-decimal list-inside text-gray-700">
            <li>{{ __('Balance on your forearms and your toes, keeping your elbows directly underneath your shoulders.')}}</li>
            <li>{{ __('Engage your abs and your torso to rise up onto your toes, keeping your hips and stomach off the ground.')}}</li>
            <li>{{ __('Keep your body in a straight line from the head to your toes by squeezing your legs and glutes.')}}</li>
            <li>{{ __('Hold the position as long as possible without dropping your hips.')}}</li>
        </ol>
    </div>

    <!-- GIF Column -->
    <div class="md:w-1/2 flex justify-center md:justify-end mt-6 md:mt-0">
        <img src="../assets/images/workout-library/prev-plank.PNG" alt="Plank Position" class="object-contain h-96 w-full md:w-auto rounded-lg">
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-8 py-8">
    <div class="relative rounded-lg shadow-lg overflow-hidden">
        <img src="../assets/images/workout-library/plank-1.gif" alt="Getting into Plank Position" class="w-full rounded-lg">
    </div>
    <div class="relative rounded-lg shadow-lg overflow-hidden">
        <img src="../assets/images/workout-library/plank-2.gif" alt="Performing Plank" class="w-full rounded-lg">
    </div>
</div>