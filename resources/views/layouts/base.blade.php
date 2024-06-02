<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>@yield('title')</title>
</head>
<body class="flex flex-col min-h-screen justify-between">

    @include('includes.layout.alert')
    @include('includes.layout.header')

    <main class="flex-grow bg-main">
        @yield('content')
    </main>

    @include('includes.layout.footer')

    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
