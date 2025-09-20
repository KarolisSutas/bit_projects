@props(['href'])

<a href="{{ $href }}"
   {{ $attributes->merge([
       'class' => 'rounded-md border border-lime-700 bg-lime px-2.5 py-1.5 text-center text-sm font-semibold text-lime-950 shadow-sm hover:bg-lime-300 mr-2'
   ]) }}>
    {{ $slot }}
</a>