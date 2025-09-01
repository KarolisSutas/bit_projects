@extends('body')

@section('turinys')
<div style="background-color: {{ $color }};" class="color-box" data-color="{{ $color }}">
    <h1>{{ $color }}</h1>
</div>

{{-- <a href="{{ route('atsitiktine-spalva') }}">Gauti atsitiktinę spalvą</a> --}}

@endsection


@section('spalva')
{{ $color }}
@endsection


@section('button')
<div style="margin-top: 20px; text-align: center;">
    <a href="{{ route('spalva.show', ['color' => 'red']) }}">Red</a>
    <a href="{{ route('spalva.show', ['color' => 'green']) }}">Green</a>
    <a href="{{ route('spalva.show', ['color' => 'blue']) }}">Blue</a>
    <a href="{{ route('spalva.show', ['color' => 'yellow']) }}">Yellow</a>
    <a href="{{ route('spalva.show', ['color' => 'purple']) }}">Purple</a>
</div>
@endsection