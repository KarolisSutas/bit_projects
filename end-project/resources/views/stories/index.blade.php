<x-layout>
    <x-breadcrumbs class="flex px-5 py-3" 
    :links="['Stories' => route('stories.index')]"/>

    <x-card class="mb-4 text-sm">
        <form id="filtering-form" action="{{ route('stories.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                {{-- <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text"  form-id="filtering-form"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Target Amount</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_amount" value="{{ request('min_amount') }}" placeholder="From" form-id="filtering-form"/>
                        <x-text-input name="max_amount" value="{{ request('max_amount') }}" placeholder="To" form-id="filtering-form"/>
                    </div>
                </div> --}}
           
                <div>
                    <div class="mb-1 font-semibold">Category</div>

                    <x-radio-group name="category"
                        :options="array_combine(array_map('ucfirst', \App\Models\Story::$category),
                         \App\Models\Story::$category)" />
                    
                </div>
                <div>
                    <div class="mb-1 font-semibold">Status</div>

                    <x-radio-group name="status"
                        :options="array_combine(array_map('ucfirst', \App\Models\Story::$status),
                         \App\Models\Story::$status)" />
                </div>         
            </div>
            <x-button class="w-full">Filter</x-button>
        </form>
    </x-card>

    @foreach ($stories as $story)
    <x-job-card class="mb-4" :story="$story">
        <div>
            <x-link-button :href="route('stories.show', $story)">
                 Show
            </x-link-button>
         </div>
    </x-job-card>
    @endforeach

    <div class="mt-4">
        {{ $stories->links() }}
    </div>
</x-layout>