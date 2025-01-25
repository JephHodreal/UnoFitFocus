<div class="flex flex-col md:flex-row items-center rounded-lg p-8">
    <!-- Information Column -->
    <div class="md:w-1/2 space-y-4">
        <h2 class="text-2xl font-bold flex items-center gap-2">
            {{ __('Plank') }}
            <span class="flex items-center gap-2 px-3 py-1 bg-yellow-200 text-yellow-800 text-sm rounded-full relative group">
                <img src="../assets/images/abs.PNG" alt="Abs Icon" class="h-4 w-4" />
                {{ __('Abs') }}
                <span
                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-max bg-gray-700 text-white text-xs rounded py-1 px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"
                >
                    {{ __('This exercise primarily targets the abs.') }}
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