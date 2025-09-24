<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Job Board</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-cyan-50 to-emerald-100 text-lime-950">
    <nav class="mb-8 flex justify-between text-lg font-medium items-center">
        <ul class="flex space-x-2 items-center">
          <li>
            <img class="h-20 w96 object-cover rounded-full border-2 border-lime-600" src="{{ asset('images/lime_logo.png') }}" alt="Logo">
          </li>
          <li>
            <a href="{{ route('jobs.index') }}">LimeTogether</a>
          </li>
        </ul>
    
        <ul class="flex space-x-4">
          @auth
            <li>
              {{ auth()->user()->name ?? 'Anonymous' }}
            </li>
            <li>
              <form action="{{ route('auth.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="cursor-pointer">Logout</button>
              </form>
            </li>
          @else
            <li>
              <a href="{{ route('auth.create') }}">Sign in</a>
            </li>
          @endauth
        </ul>
      </nav>
    {{ $slot }}
</body>
</html>