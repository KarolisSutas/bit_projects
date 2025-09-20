<x-layout>
    <x-breadcrumbs class="flex px-5 py-3"
    :links="['Stories' => route('stories.index'), $story->full_name => '#']" />
    <x-job-card :$story>
        <p class="mb-4 text-sm text-lime-700 ">
            {!! nl2br(e($story->description)) !!}
        </p>
        <x-link-button :href="route('stories.index', $story)">
            Approve
       </x-link-button>
    </x-job-card>
</x-layout>