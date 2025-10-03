<x-layout>
    <div class="mx-auto max-w-lg px-4 py-20">
      <x-card class="rounded-2xl border border-red-100 shadow-lg bg-red-100">
        <div class="text-center">

            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-700 ">
                <svg width="100px" height="100px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="oklch(96.7% 0.067 122.328)">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.336"></g>
                    <g id="SVGRepo_iconCarrier"> 
                        <g clip-path="url(#clip0_949_22799)"> <path fill-rule="evenodd" clip-rule="evenodd" 
                            d="M9.82664 2.22902C10.7938 0.590326 13.2063 0.590325 14.1735 2.22902L23.6599 18.3024C24.6578 19.9933 23.3638 22 21.4865 22H2.51362C0.63634 22 -0.657696 19.9933 0.340215 18.3024L9.82664 2.22902ZM10.0586 7.05547C10.0268 6.48227 10.483 6 11.0571 6H12.9429C13.517 6 13.9732 6.48227 13.9414 7.05547L13.5525 14.0555C13.523 14.5854 13.0847 15 12.554 15H11.446C10.9153 15 10.477 14.5854 10.4475 14.0555L10.0586 7.05547ZM14 18C14 19.1046 13.1046 20 12 20C10.8954 20 10 19.1046 10 18C10 16.8954 10.8954 16 12 16C13.1046 16 14 16.8954 14 18Z" 
                            fill="oklch(37.2% 0.044 257.287)"></path> 
                        </g> 
                        <defs> <clipPath id="clip0_949_22799"> 
                            <rect width="24" height="24" fill="white"></rect> </clipPath> 
                        </defs> 
                    </g>
                </svg>
            </div>
  
            <h2 class="text-xl font-semibold text-slate-400">
                Are you sure you want to delete <br><span class="text-rose-900">{{ $story->full_name }}</span> story?
            </h2>
        </div>
  
        <div class="mt-8 flex items-center justify-center gap-4">

          <a href="{{ route('stories.show', $story->id) }}"
             class="inline-flex items-center justify-center rounded-xl  bg-white px-6 py-3 text-sm font-medium text-slate-700 hover:bg-slate-100 transition">
            Cancel
          </a>

          <form action="{{ route('stories.destroy', ['story' => $story->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center justify-center rounded-xl bg-rose-700 px-6 py-3 text-sm font-semibold text-white shadow hover:bg-rose-800 active:bg-rose-800 transition cursor-pointer">
            Delete
            </button>
          </form>
        </div>
      </x-card>
    </div>
  </x-layout>
  