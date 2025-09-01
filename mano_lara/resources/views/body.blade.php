<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('spalva')</title>
    {{-- sass ir js prijungimas --}}
    @vite(['resources/sass/color.scss', 'resources/js/color.js'])
</head>
<body>
    @yield('turinys')
    @yield('button')
</body>
</html>