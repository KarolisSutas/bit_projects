@php
    $completed = (bool) $story->is_completed;
@endphp

<x-card class="mb-4 relative {{ $completed ? 'opacity-60' : '' }}">
    {{-- viršus --}}
    <div class="mb-4 flex justify-between">
        <h2 class="text-lg font-medium">{{ $story->full_name }}</h2>
        <div class="text-fuchsia-500">€{{ number_format($story->required_amount) }}</div>
    </div>

    <div class="mb-4 flex items-center justify-between text-sm text-slate-500">
        <div class="flex space-x-4">
            <div class="text-lime-700 text-base">Fundraising cause:</div>
            <div class="text-base">{{ $story->story_title }}</div>
        </div>

        {{-- Paliekam kategorijos nuorodą aktyvią net kai completed (jei nori – užrakink ir ją) --}}
        <div class="flex space-x-1 text-xs">
            <x-tag>
                <a href="{{ route('main.index', ['category' => $story->category]) }}">
                    {{ $story->category }}
                </a>
            </x-tag>
        </div>
    </div>

    {{-- Slotą (dažniausiai mygtukai / nuorodos) užrakinam, kai completed --}}
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
    {{-- Papildomas juostelės „ribbon“ variantas (nebūtina):
    <div class="absolute top-3 right-[-40px] rotate-45 bg-lime-600 text-white text-xs font-semibold px-12 py-1 shadow">
        COMPLETED
    </div> --}}
