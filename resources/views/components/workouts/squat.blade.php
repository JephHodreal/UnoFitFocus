<div class="flex flex-col md:flex-row items-center rounded-lg p-8 space-y-4 md:space-y-0">
    <!-- GIF Column -->
    <div class="md:w-1/2 flex justify-center md:justify-start">
        <img src="../assets/images/sq_standard.gif" alt="Squat GIF" class="object-contain h-96 w-full md:w-auto rounded-lg">
    </div>

    <!-- Information Column -->
    <div class="md:w-1/2 space-y-4">
        <h2 class="text-2xl font-bold flex items-center gap-2">
            {{ __('Squat') }}
            <span class="flex items-center gap-2 px-3 py-1 bg-red-200 text-red-800 text-sm rounded-full relative group">
                <img src="../assets/images/legs.PNG" alt="Legs Icon" class="h-4 w-4" />
                {{ __('Lower Extremities') }}
                <span
                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-max bg-gray-700 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"
                >
                    {{ __('This exercise primarily targets the legs and thighs.') }}
                </span>
            </span>
        </h2>
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