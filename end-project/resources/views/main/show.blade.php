@php
    $completed = (bool) $story->is_completed;
@endphp

<x-layout>
    <x-breadcrumbs class="flex px-5 py-3"
    :links="[$story->full_name => null]"
     />
    <x-story-card :$story>
 
        @php
        $path = ltrim($story->image, '/');
        @endphp
        @if ($story->cover_image)
        <div class="flex justify-center mb-2 max-h-130">
            <img 
                class="mb-2 rounded-md shadow-lg max-h-130 object-cover" 
                src="{{ asset('storage/' . ltrim($story->cover_image, '/')) }}" 
                alt="{{ $story->story_title }}"
            >
        </div>
        @endif
        <p class="mb-4 text-sm text-slate-600 text-justify">
            {!! nl2br(e($story->description)) !!}
        </p>

        <p class="mb-4 text-sm text-indigo-500">Created {{ $story->created_at->diffForHumans() }} • Modified {{ $story->updated_at->diffForHumans() }}</p>
        <span class="text-lime-700 text-md space-x-3">Funds raised: <span class="text-fuchsia-500">€{{ number_format($story->collected_amount) }}</span>   Missing: <span class="text-fuchsia-500">€{{ number_format($story->required_amount - $story->collected_amount) }}</span></span>
    </x-story-card>
    <div class="flex justify-between space-x-1">
        <x-card class="w-sm">
            <h2 class="mb-2 text-xl font-bold text-lime-600">Donate</h2>
            <div class="w-sm">
                <form class="{{ $completed ? 'pointer-events-none select-none' : '' }}" 
                action="{{ route('donations.store', $story) }}" 
                method="POST" enctype="multipart/form-data"
                id="donate">
                @csrf
                <div class="mb-2 max-w-xs">
                    <label for="donor_full_name" class="block mb-2 text-sm font-medium text-lime-950">Full Name</label>
                    <x-text-input
                        type="text" name="donor_full_name" id="donor_full_name"
                        class="pr-6 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2"
                        placeholder="Your full name"
                        value="{{ old('donor_full_name') }}"
                    />
                    
                    <label class="mb-1 flex items-center">
                        <input class="rounded-xl" type="checkbox" name="is_anonymous" value="1"
                        {{ old('is_anonymous') ? 'checked' : '' }}
                          />
                        <span class="m-2 text-xs">Donate anonymous</span>
                    </label>
                </div>
                <div class="w-3xs">
                    <label for="donated_amount" class="block mb-2 text-sm font-medium text-lime-950">Amount</label>
                    <x-text-input
                        type="number" name="donated_amount" id="donated_amount" step="1" min="1"
                        class="pr-6 rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2"
                        placeholder="€0" required
                        value="{{ old('donated_amount') }}"
                    />
                </div>
                <div class="mt-2 space-x-4">
                    <x-button type="submit">Donate</x-button>
                    <x-button type="reset">Clear</x-button>
                </div>
                </form>
            </div>
    
        </x-card>
        <x-card class="h-auto w-md">
            <h2 class="mb-2 text-xl font-bold text-lime-600">Donations</h2>
                    @forelse($story->donations as $donation)
                    <div class="flex justify-between space-x-4">
                        <div class="text-sm text-lime-950/75">
                            {{ $donation->is_anonymous || empty($donation->donor_full_name)
                            ? 'Anonymous' 
                            : $donation->donor_full_name }}
                        </div>
                        <div class="text-sm text-fuchsia-400/85">
                            €{{ number_format($donation->donated_amount) }}
                        </div>
                    </div>
                    @empty
                    <p>No donations yet.</p>
                    @endforelse
        </x-card>
    </div>
    
    

</x-layout>