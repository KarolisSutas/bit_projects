<x-card class="mb-4">
    <div class="mb-4 flex justify-between ">
        <h2 class="text-lg font-medium">{{ $story->full_name }}
            <p class="text-sm">
                @if ($story->approved)
                    <span class="font-medium text-green-300">Approved</span>
                @else
                    <span class="font-medium text-red-500">Not Approved</span>
                @endif
            </p>
        </h2>
        <div class="text-fuchsia-500">€{{ number_format($story->required_amount) }}</div>
        
    </div>

    <div class="mb-4 flex items-center justify-between text-sm text-lime-700 ">
        <div class="flex space-x-4">
            <div class="text-lime-700/65">Fundraising cause: </div>
            <div >{{ $story->story_title }}</div>
        </div>
        
        <div class="flex space-x-1 text-xs">

            <x-tag>
                <a href="{{ route('stories.index', ['category' => $story->category]) }}">
                    {{ $story->category }}
                </a>
            </x-tag>
        </div>
    </div>
    
    
    {{ $slot }}
</x-card>