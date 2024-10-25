<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workout History | FitFocus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body>
    <main>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Workout History') }}
                </h2>
            </x-slot>
            <div class="py-12">
                <div class="container mx-auto py-10">
                    <!-- Filter Section -->
                    <form method="GET" action="{{ route('WorkoutHistory') }}">
                        <div class="flex justify-end space-x-4 mb-8">
                            <!-- Exercise Filter Dropdown -->
                            <div class="relative">
                                <select name="exercise" id="exerciseFilter" onchange="this.form.submit()" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded-full leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="all" {{ $exerciseFilter == 'all' ? 'selected' : '' }}>All Exercises</option>
                                    <option value="Push-Up" {{ $exerciseFilter == 'Push-Up' ? 'selected' : '' }}>Push-Up</option>
                                    <option value="Squat" {{ $exerciseFilter == 'Squat' ? 'selected' : '' }}>Squat</option>
                                    <option value="Plank" {{ $exerciseFilter == 'Plank' ? 'selected' : '' }}>Plank</option>
                                </select>
                            </div>
                            <!-- Difficulty Filter Dropdown -->
                            <div class="relative">
                                <select name="difficulty" id="difficultyFilter" onchange="this.form.submit()" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded-full leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="all" {{ $difficultyFilter == 'all' ? 'selected' : '' }}>All Difficulties</option>
                                    <option value="Beginner" {{ $difficultyFilter == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="Intermediate" {{ $difficultyFilter == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="Advanced" {{ $difficultyFilter == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                </select>
                            </div>
                        </div>
                    </form>

                    <!-- Workout History Table -->
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable('workout')">Workout
                                        <span id="workoutSortArrow">▲</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable('difficulty')">Difficulty
                                        <span id="difficultySortArrow">▲</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable('date')">Date
                                        <span id="dateSortArrow">▲</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable('score')">Score
                                        <span id="scoreSortArrow">▲</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="workoutHistory" class="bg-white divide-y divide-gray-200">
                                @foreach ($workouts as $index => $workout)
                                <tr data-workout="{{ $workout->exercise }}" data-difficulty="{{ $workout->difficulty }}" class="workout-row transition duration-300 ease-in-out transform hover:bg-gray-100 hover:scale-105">
                                    <td class="px-6 py-4">{{ $index + 1 + ($workouts->currentPage() - 1) * $workouts->perPage() }}</td>
                                    <td class="px-6 py-4">{{ $workout->exercise }}</td>
                                    <td class="px-6 py-4">{{ $workout->difficulty }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($workout->date_performed)->format('Y-m-d') }}</td>
                                    <td class="px-6 py-4">{{ $workout->score }}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-6 flex justify-center">
                        {{ $workouts->appends(['exercise' => $exerciseFilter, 'difficulty' => $difficultyFilter])->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </x-app-layout>
    </main>
    <script>
        function filterWorkouts() {
            const exerciseType = document.getElementById('exerciseFilter').value;
            const difficultyType = document.getElementById('difficultyFilter').value;
            const rows = document.querySelectorAll('.workout-row');
            rows.forEach(row => {
                const exerciseMatch = exerciseType === 'all' || row.getAttribute('data-workout') === exerciseType;
                const difficultyMatch = difficultyType === 'all' || row.getAttribute('data-difficulty') === difficultyType;
                row.style.display = exerciseMatch && difficultyMatch ? '' : 'none';
            });
        }

        // Sorting functionality
        let sortDirection = {
            workout: true,
            difficulty: true,
            date: true,
            score: true
        };

        function sortTable(column) {
            const rows = Array.from(document.querySelectorAll('.workout-row'));
            
            let comparator;
            if (column === 'workout') {
                comparator = (a, b) => sortDirection.workout
                    ? a.cells[1].textContent.localeCompare(b.cells[1].textContent)
                    : b.cells[1].textContent.localeCompare(a.cells[1].textContent);
            } else if (column === 'difficulty') {
                const order = { Beginner: 1, Intermediate: 2, Advanced: 3 };
                comparator = (a, b) => sortDirection.difficulty
                    ? order[a.cells[2].textContent] - order[b.cells[2].textContent]
                    : order[b.cells[2].textContent] - order[a.cells[2].textContent];
            } else if (column === 'date') {
                comparator = (a, b) => sortDirection.date
                    ? new Date(a.cells[3].textContent) - new Date(b.cells[3].textContent)
                    : new Date(b.cells[3].textContent) - new Date(a.cells[3].textContent);
            } else if (column === 'score') {
                comparator = (a, b) => sortDirection.score
                    ? parseInt(b.cells[4].textContent) - parseInt(a.cells[4].textContent)
                    : parseInt(a.cells[4].textContent) - parseInt(b.cells[4].textContent);
            }

            rows.sort(comparator);
            const tbody = document.getElementById('workoutHistory');
            tbody.innerHTML = '';
            rows.forEach(row => tbody.appendChild(row));

            sortDirection[column] = !sortDirection[column];
            updateArrows(column);
        }

        function updateArrows(column) {
            document.getElementById('workoutSortArrow').textContent = sortDirection.workout ? '▲' : '▼';
            document.getElementById('difficultySortArrow').textContent = sortDirection.difficulty ? '▲' : '▼';
            document.getElementById('dateSortArrow').textContent = sortDirection.date ? '▲' : '▼';
            document.getElementById('scoreSortArrow').textContent = sortDirection.score ? '▲' : '▼';
        }
    </script>
</body>
</html>
