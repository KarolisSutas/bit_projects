<x-layout>
    <x-breadcrumbs class="flex px-5 py-3" 
    :links="['Create story' => route('stories.create')]"/>

    <section class="rounded-md border border-lime-600 bg-lime-50 p-4 shadow-md">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-4">
            <h2 class="mb-4 text-xl font-bold text-lime-600">Create new story</h2>
            <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
            
                @if ($errors->any())
                    <div class="mb-4 rounded-md border border-red-300 bg-red-50 p-3 text-sm text-red-800">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="relative w-full">
                        <label for="full_name" class="block mb-2 text-sm font-medium text-lime-950">Full Name</label>
                        <x-text-input
                            type="text" name="full_name" id="full_name"
                            class="pr-6 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2"
                            placeholder="Your full name" required
                            value="{{ old('full_name') }}"
                        />
                        <button type="button"
                            class="absolute top-8 right-2 flex items-center cursor-pointer"
                            onclick="document.getElementById('full_name').value=''"
                            aria-label="Clear name">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        @error('full_name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

                    </div>
            
                    <div class="relative sm:col-span-2">
                        <label for="story_title" class="block mb-2 text-sm font-medium text-lime-950">Story Title</label>
                        <x-text-input
                            type="text" name="story_title" id="story_title"
                            class="pr-6 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2"
                            placeholder="Your story title" required
                            value="{{ old('story_title') }}"
                        />
                        <button type="button"
                            class="absolute top-8 right-2 flex items-center cursor-pointer"
                            onclick="document.getElementById('story_title').value=''"
                            aria-label="Clear title">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        @error('story_title') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

                    </div>
            
                    <div class="relative w-full">
                        <label for="required_amount" class="block mb-2 text-sm font-medium text-lime-950">Target amount</label>
                        <x-text-input
                            type="number" name="required_amount" id="required_amount" step="1" min="1"
                            class="pr-6 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2"
                            placeholder="€0" required
                            value="{{ old('required_amount') }}"
                        />
                        <button type="button"
                            class="absolute top-8 right-2 flex items-center cursor-pointer"
                            onclick="document.getElementById('required_amount').value=''"
                            aria-label="Clear amount">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        @error('required_amount') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

                    </div>
            
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-lime-950">Category</label>
                        <select
                            id="category" name="category"
                            class="pr-6 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 focus:ring-2"
                            required
                        >
                            <option value="" @selected(old('category')==='')>Select category</option>
                            <option value="health"    @selected(old('category')==='health')>Health</option>
                            <option value="education" @selected(old('category')==='education')>Education</option>
                            <option value="travel"    @selected(old('category')==='travel')>Travel</option>
                            <option value="hobbies"   @selected(old('category')==='hobbies')>Hobbies</option>
                        </select>

                        @error('category') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

                    </div>
            
                    <div class="w-full mb-4">
                        <label class="block mb-2 text-sm font-medium text-lime-950" for="cover_image">Story photo</label>
                        <input
                            id="cover_image" 
                            name="cover_image" 
                            type="file" 
                            accept="image/*"
                            class="block w-full text-sm text-slate-700 border border-stone-300 ring-1 ring-stone-300 rounded-lg cursor-pointer bg-white focus:outline-none file:bg-lime-400"
                        >
                        @error('cover_image') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-lime-950" for="avatar_image">Avatar</label>
                        <input
                            id="avatar_image" 
                            name="avatar_image" 
                            type="file" 
                            accept="image/*"
                            class="block w-full text-sm text-slate-700 border border-stone-300 ring-1 ring-stone-300 rounded-lg cursor-pointer bg-white focus:outline-none file:bg-lime-400"
                        >
                        @error('avatar_image') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    
            
                    <div class="sm:col-span-2 relative">
                        <label for="description" class="block mb-2 text-sm font-medium text-lime-950">Description</label>
                        <textarea
                            name="description" id="description" rows="8"
                            class="h-50 w-full pr-6 rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2"
                            placeholder="Your description here"
                        >{{ old('description') }}</textarea>
            
                        <button type="button"
                            class="absolute top-8 right-2 flex items-center cursor-pointer"
                            onclick="document.getElementById('description').value=''"
                            aria-label="Clear description">
                            <!-- X icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            
                <div class="mt-2 space-x-4">
                    <x-button type="submit">Save</x-button>
                    <x-button type="button" onclick="window.location='{{ route('main.index') }}'">Cancel</x-button>
                </div>
            </form>
        </div>
    </section>
</x-layout>