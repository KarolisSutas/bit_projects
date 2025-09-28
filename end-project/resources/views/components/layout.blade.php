<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LimeTogether</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite([  'resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-cyan-50 to-emerald-100 text-lime-950">
<div class="relative min-h-screen">

  <div aria-hidden="true" class="bg-animated">
    <ul class="circles">
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
      <li><img src="{{ asset('images/lime-slice.png') }}" alt="lime slice"></li>
    </ul>
  </div>

  <nav class="mb-6 px-4 py-2.5 bg-transparent relative z-10">
    <div class="flex flex-wrap items-center justify-between mx-auto">
      <a href="{{ route('main') }}" class="flex items-center space-x-2">
        <img src="{{ asset('images/lime_logo.png') }}" class="h-20 w-20 rounded-full border-2 border-lime-600 object-cover" alt="Logo">
        <span class="self-center text-xl font-semibold whitespace-nowrap text-lime-950">
          LimeTogether
        </span>
      </a>

      <button data-collapse-toggle="navbar-default" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-lime-500 rounded-lg md:hidden hover:bg-lime-200 focus:outline-none focus:ring-2 focus:ring-lime-600"
        aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>

      <div class="hidden w-full items-center md:flex md:w-auto" id="navbar-default">
        <ul class="flex flex-col p-4 md:p-0 mt-4 items-center rounded-lg bg-lime-50 md:bg-transparent md:flex-row md:space-x-6 md:mt-0 md:border-0">
          <li>
            <a href="{{ route('stories.create') }}" class="block py-2 px-3 rounded hover:bg-lime-300 md:hover:bg-transparent md:hover:text-lime-600 md:p-0 text-lime-950">
              Create story
            </a>
          </li>
          <li>
            <a href="{{ route('stories.index') }}" class="block py-2 px-3 rounded hover:bg-lime-300 md:hover:bg-transparent md:hover:text-lime-600 md:p-0 text-lime-950">
              Dashboard
            </a>
          </li>

          @auth
            <li>
              <form action="{{ route('auth.destroy') }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button class="block py-2 px-3 cursor-pointer hover:bg-lime-300 md:hover:bg-transparent md:hover:text-lime-600 md:p-0 text-lime-950">
                  Logout
                </button>
              </form>
            </li>
          @else
            <li>
              <a href="{{ route('auth.create') }}" class="block py-2 px-3 rounded hover:bg-lime-300 md:hover:bg-transparent md:hover:text-lime-600 md:p-0 text-lime-950">
                Sign in
              </a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav> 

    <div class="px-4 py-6">
      <span class="block py-2 px-3 mb-2 text-sm text-indigo-500 md:p-0">
        {{ auth()->user()->name ?? null }}
      </span>
      {{ $slot }}
    </div>
  </main>
</div>

</body>
</html>
