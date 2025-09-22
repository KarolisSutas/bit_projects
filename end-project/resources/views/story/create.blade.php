<x-layout>
    <x-breadcrumbs class="flex px-5 py-3" 
    :links="['Create story' => route('stories.create')]"/>

    <section class="rounded-md border border-lime-600 bg-lime-50 p-4 shadow-md">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-4">
            <h2 class="mb-4 text-xl font-bold text-lime-600">Create new story</h2>
            <form id="" action="POST">

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    <div class="w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-lime-950 ">Full Name</label>
                        <x-text-input type="text" name="name" id="name" class="pr-6 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2" placeholder="You full name" required="" form-id></x-text-input>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-lime-950">Story Title</label>
                        <x-text-input type="text" name="name" id="name" class="pr-6 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2" placeholder="You story Title" required="" form-id="#"></x-text-input>
                    </div>
            
                    <div class="w-full">
                        <label for="required_amount" class="block mb-2 text-sm font-medium text-lime-950 ">Target amount</label>
                        <x-text-input type="number" name="required_amount" id="required_amount" class="pr-6 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2" placeholder="€0" required="" form-id="#"></x-text-input>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-lime-950 ">Category</label>
                        <select id="category" class="pr-6 w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2">
                            <option selected="">Select category</option>
                            <option value="HE">Health</option>
                            <option value="ED">Education</option>
                            <option value="TR">Travel</option>
                            <option value="HO">Hobbies</option>
                        </select>
                    </div>

                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-lime-950" for="file_input">Upload file</label>
                        <input class="block w-full text-sm text-slate-400 border border-stone-300 ring-1 ring-stone-300 rounded-lg cursor-pointer bg-white focus:outline-none placeholder-slate-400 file:bg-stone-300" id="file_input" type="file">
                    </div>

                    <div class="sm:col-span-2 relative">
                        <label for="description" class="block mb-2 text-sm font-medium text-lime-950 ">Description</label>
                        <textarea name="description" id="description" rows="8" class="h-50 w-full pr-6 rounded-md border-0 py-1.5 px-2.5 text-sm ring-2 ring-stone-300 placeholder:text-slate-400 focus:ring-2" placeholder="Your description here" form-id="#"></textarea>
                        <button type="button"
                        class="absolute top-8 right-2 flex items-center cursor-pointer"
                        onclick="document.getElementById('description').value = ''"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-2 space-x-4">
                    <x-button>Save</x-button>
                    <x-button>Cancel</x-button>
                </div>
            </form>
        </div>
    </section>
</x-layout>