<x-card class="mb-4">
    <div class="mb-4 flex justify-between ">
        <h2 class="text-lg font-medium">{{ $story->full_name }}</h2>
        <div class="text-fuchsia-500">€{{ number_format($story->required_amount) }}</div>
        
    </div>

    <div class="mb-4 flex items-center justify-between text-sm text-slate-500 ">
        <div class="flex space-x-4">
            <div class="text-lime-700">Fundraising cause: </div>
            <div >{{ $story->story_title }}</div>
        </div>
        
        <div class="flex space-x-1 text-xs">

            <x-tag>
                <a href="{{ route('main.index', ['category' => $story->category]) }}">
                    {{ $story->category }}
                </a>
            </x-tag>
        </div>
    </div>
    
    
    {{ $slot }}
</x-card>