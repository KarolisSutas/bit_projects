<x-layout>
    <x-breadcrumbs class="flex px-5 py-3"
    :links="['Stories' => route('stories.index'), $story->full_name => '#']" />
    <x-job-card :$story>
        
        <img class="h-75 w-150 mx-auto mb-4" src="{{ asset('images/logo.png') }}" alt="image description">

        <p class="mb-4 text-sm text-slate-500 ">
            {!! nl2br(e($story->description)) !!}
        </p>

        <p class="mb-4 text-sm text-indigo-500">Created {{ $story->created_at->diffForHumans() }} • modified {{ $story->updated_at->diffForHumans() }}</p>
        
        <form method="POST" action="{{ route('stories.toggle-approve', $story) }}" class="inline">
            @csrf
            @method('PUT')
            <x-button type="submit" class="mt-2">
                Mark as {{ $story->approved ? 'not approved' : 'approved' }}
            </x-button>
        </form>
    </x-job-card>
</x-layout>