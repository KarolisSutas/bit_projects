<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin dashboard</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite([  'resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-cyan-50 to-emerald-100 text-lime-950">
    {{ $slot }}
</body>
</html>
