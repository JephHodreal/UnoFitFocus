@props(['title', 'description', 'image', 'repetitions'])

<div class="carousel-item">
    <h4 class="text-xl font-bold mb-2">{{ $title }}</h4>
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full rounded-lg mb-4">
    <p class="mb-4">{{ $description }}</p>
    <p><strong>Repetitions:</strong> {{ $repetitions }}</p>
</div>