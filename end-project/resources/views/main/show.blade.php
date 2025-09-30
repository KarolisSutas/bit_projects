<x-layout>
    <x-breadcrumbs class="flex px-5 py-3"
    :links="[$story->full_name => null]"
     />
    <x-story-card :$story>
      
        <img class="h-75 w-150 mx-auto mb-4"
        src="{{ asset('storage/' . ltrim($story->image_path, '/')) }}"
        alt="{{ $story->story_title }}">

        <p class="mb-4 text-sm text-slate-500 ">
            {!! nl2br(e($story->description)) !!}
        </p>

        <p class="mb-4 text-sm text-indigo-500">Created {{ $story->created_at->diffForHumans() }} • Modified {{ $story->updated_at->diffForHumans() }}</p>
       
    </x-story-card>

    <x-card></x-card>

</x-layout>