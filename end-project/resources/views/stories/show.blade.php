<x-layout>
    <x-breadcrumbs class="flex px-5 py-3"
    :links="['Stories' => route('stories.index'), $story->full_name => '#']" />
    <x-job-card :$story>
        
        <pre>
            image_path: {{ var_export($story->image, true) }}
            storage_url: {{ Storage::url(ltrim($story->image, '/')) }}
            asset_url:   {{ asset('storage/' . ltrim($story->image, '/')) }}
            exists?:     {{ Storage::disk('public')->exists(ltrim($story->image, '/')) ? 'YES' : 'NO' }}
        </pre>
        <img class="mx-auto mb-4"
        src="{{ $story->image ? Storage::url(ltrim($story->image, '/')) : asset('images/placeholder.jpg') }}"
        alt="{{ $story->story_title }}">
   
        <p class="mb-4 text-sm text-slate-500 ">
            {!! nl2br(e($story->description)) !!}
        </p>

        <p class="mb-4 text-sm text-indigo-500">Created {{ $story->created_at->diffForHumans() }} • Modified {{ $story->updated_at->diffForHumans() }}</p>
        
        <form method="POST" action="{{ route('stories.toggle-approve', $story) }}" class="inline">
            @csrf
            @method('PUT')
            <x-button type="submit" class="mt-2">
                Mark as {{ $story->approved ? 'not approved' : 'approved' }}
            </x-button>
        </form>
    </x-job-card>
</x-layout>