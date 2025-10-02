@php
    $completed = (bool) $story->is_completed;
@endphp

<x-card class="mb-4 relative {{ $completed ? 'opacity-60' : '' }}">

    <div class="mb-4 flex justify-between">
        <div class="flex space-x-2 items-center">
            <span>
                @if ($story->avatar_image)
                <img 
                    src="{{ asset('storage/' . ltrim($story->avatar_image, '/')) }}" 
                    alt="Avatar of {{ $story->full_name }}"
                    class="h-12 w-12 rounded-full shadow-md object-cover"
                >
                @else
                <div class="h-12 w-12 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 text-xs">
                    N/A
                </div>
                @endif
            </span>
            <h2 class="text-lg font-medium ">{{ $story->full_name }}</h2>
        </div>
        <div class="text-fuchsia-500">€{{ number_format($story->required_amount) }}</div>
    </div>

    <div class="mb-4 flex items-center justify-between text-sm text-slate-500">
        <div class="flex space-x-4">
            <div class="text-lime-700 text-base">Fundraising cause:</div>
            <div class="text-base">{{ $story->story_title }}</div>
        </div>

        <div class="flex space-x-1 text-xs">
            <x-tag>
                <a href="{{ route('main.index', ['category' => $story->category]) }}">
                    {{ $story->category }}
                </a>
            </x-tag>
        </div>
    </div>

    <div class="{{ $completed ? 'pointer-events-none select-none' : '' }}">
        {{ $slot }}
    </div>

    @if ($completed)
    <img
        src="{{ asset('images/completed.png') }}"
        alt="Completed"
        class="absolute inset-0 w-full h-full object-cover rounded-md pointer-events-none opacity-70"
    />
    @endif
</x-card>

