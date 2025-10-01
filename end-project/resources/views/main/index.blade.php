<x-layout>
    <a href="{{ route('main.index') }}" class=" mb-2 ml-4 inline-flex items-center text-sm font-bold text-lime-800 hover:text-lime-600">
        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
        </svg>
        Home
    </a>
    <x-card class="mb-4">
            <dl class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-fuchsia-500 sm:grid-cols-3 xl:grid-cols-3 sm:p-8 justify-between">
                <div class="flex flex-col items-center">
                    <dt class="mb-2 text-3xl font-extrabold ">{{ $data['total_stories'] }}</dt>
                    <dd class="text-stone-400 ">Stories</dd>
                </div>
                <div class="flex flex-col items-center">
                    <dt class="mb-2 text-3xl font-extrabold">{{ $data['stories_completed'] }}</dt>
                    <dd class="text-stone-400 ">Stories completed</dd>
                </div>
                <div class="flex flex-col items-center">
                    <dt class="mb-2 text-3xl font-extrabold">€{{ number_format($data['total_donations']) }}</dt>
                    <dd class="text-stone-400 ">Donations</dd>
                </div>
            </dl>
    </x-card>
        @foreach ($stories as $story)
        <x-story-card class="mb-4" :story="$story">
            @php
            $percent = 0;
            if ($story->required_amount > 0) {
                $percent = ($story->collected_amount / $story->required_amount) * 100;
                $percent = min(100, $percent);
            }
            @endphp
        
        <div class="w-full rounded-full bg-lime-950">
            <div class="bg-cyan-500 text-xs font-medium text-lime-50 text-center p-0.5 leading-none rounded-full mb-4"
                 style="width: {{ $percent }}%">
                {{ number_format($story->collected_amount) }}
            </div>
        </div>
        
            <x-link-button :href="route('main.show', $story)">
                Show
           </x-link-button>
        </x-story-card>
        @endforeach
</x-layout>
