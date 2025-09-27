<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>

    <div class="grid grid-cols-1 md:grid-cols-2 min-h-screen">
    <!-- Columna imagen -->
    <div class="bg-cover bg-center hidden md:block"
         style="background-image: url('{{ asset('images/login-bg.jpg') }}');">
    </div>

    <!-- Columna formulario -->
    <div class="flex items-center justify-center bg-gray-100">
        {{ $slot }}
    </div>
</div>



        @livewireScripts
    </body>
</html>
