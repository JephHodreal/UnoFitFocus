@props(['id', 'title'])

<div x-data="{ open: false, currentSlide: 0 }" 
    x-show="open" 
    @keydown.window.escape="open = false" 
    {{-- @open-modal.window="if ($event.detail === '{{ $id }}') open = true"  --}}
    @open-modal.window="if ($event.detail === id) open = true"
    id="{{ $id }}" 
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50" 
    style="display: none;">
    
    <!-- Modal content -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full md:w-2/3 lg:w-1/2 transition-transform transform" @click.away="open = false">
        <!-- Modal Header -->
        <div class="p-4 border-b">
            <h3 class="text-2xl font-semibold">{{ $title }}</h3>
            <button @click="open = false" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                <span class="text-2xl">&times;</span>
            </button>
        </div>
        
        <!-- Carousel Body -->
        <div class="relative p-6">
            <div class="carousel-content" x-ref="slides">
                <template x-for="(slide, index) in $refs.slides.children" :key="index">
                    <div x-show="currentSlide === index" class="space-y-6" x-cloak>
                        <slot :name="'slide-' + index"></slot>
                    </div>
                </template>
            </div>
        </div>

        <!-- Carousel Navigation -->
        <div class="flex justify-between p-4">
            <button @click="currentSlide = Math.max(currentSlide - 1, 0)" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                Previous
            </button>
            <button @click="currentSlide = Math.min(currentSlide + 1, $refs.slides.children.length - 1)" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                Next
            </button>
        </div>
    </div>
</div>