<x-layout>
    <x-breadcrumbs class="flex px-5 py-3"
    :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job>
        <p class="mb-4 text-sm text-lime-700 ">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>
</x-layout>
