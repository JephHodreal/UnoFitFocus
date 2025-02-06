@php
    function isInWeightRange($userWeight, $weightRange) {
        $userWeight = is_numeric($userWeight) ? (float)$userWeight : 0;
        
        // Handle different range formats
        if (str_contains($weightRange, '-')) {
            [$min, $max] = array_map('floatval', explode('-', $weightRange));
            return $userWeight >= $min && $userWeight <= $max;
        } elseif (str_starts_with($weightRange, '<=')) {
            $max = (float)substr($weightRange, 2);
            return $userWeight <= $max;
        } elseif (str_starts_with($weightRange, '>=')) {
            $min = (float)substr($weightRange, 2);
            return $userWeight >= $min;
        }
        
        return false;
    }
@endphp

<div class="overflow-x-auto">
    <h2 class="text-lg font-semibold flex justify-center text-gray-800 mb-2">
        Norms Table for {{ ucfirst($userDetails->gender) }} ({{ $selectedFitnessLevel }} Fitness Level) conducting {{ $selectedWorkout }} ({{ $selectedDifficulty }} Difficulty Level)
    </h2>
    <table class="min-w-full border-collapse border border-gray-300 text-center">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">Age \ Weight</th>
                @foreach ($weightRanges as $weight)
                    <th class="border px-4 py-2 whitespace-nowrap">{{ $weight }} kg</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ages as $age)
                <tr class="odd:bg-gray-100 even:bg-white">
                    <td class="border px-4 py-2 font-semibold bg-gray-200 whitespace-nowrap">{{ $age }}</td>
                    @foreach ($weightRanges as $weight)
                        @php
                            $isHighlighted = $highlightedNorms && 
                                           $age == $userDetails->age && 
                                           isInWeightRange($userDetails->weight, $weight);
                        @endphp
                        <td class="border px-4 py-2 {{ $isHighlighted ? 'bg-yellow-200 font-bold' : '' }}">
                            {{ $normTable[$age][$weight] ?? 'N/A' }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>