<x-layout>
    <x-breadcrumbs class="flex px-5 py-3"
    :links="['Stories' => route('stories.index'), $story->full_name => '#']" />
    <x-job-card :$story>
        
        {{-- <pre>
            image_path: {{ var_export($story->image, true) }}
            storage_url: {{ Storage::url(ltrim($story->image, '/')) }}
            asset_url:   {{ asset('storage/' . ltrim($story->image, '/')) }}
            exists?:     {{ Storage::disk('public')->exists(ltrim($story->image, '/')) ? 'YES' : 'NO' }}
        </pre> --}}
        @php
        $path = ltrim($story->image, '/'); // pvz. "stories/85PuyaN....jpg"
        @endphp
        <div class="flex justify-center mb-2">
            <img class="mb-2 rounded-2xl shadow-lg" src="{{ asset('storage/' . $path) }}" alt="{{ $story->story_title }}">
        </div>
        <p class="mb-4 text-sm text-slate-500 text-justify">
            {!! nl2br(e($story->description)) !!}
        </p>

        <p class="mb-4 text-sm text-indigo-500">Created {{ $story->created_at->diffForHumans() }} • Modified {{ $story->updated_at->diffForHumans() }}</p>

        <form method="POST" action="{{ route('stories.toggle-approve', $story) }}" class="inline space-x-4">
            @csrf
            @method('PUT')
            <x-button type="submit" class="mt-2">
                Mark as {{ $story->approved ? 'not approved' : 'approved' }}
            </x-button>
            <x-button>Delete</x-button>
            <span class="text-lime-700 text-md space-x-1">Funds raised: <span class="text-fuchsia-500">€{{ number_format($story->collected_amount) }}</span>   Required: <span class="text-fuchsia-500">€{{ number_format($story->required_amount) }}</span></span>
        </form>
    </x-job-card>
    
</x-layout>