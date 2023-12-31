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

        <link rel="icon" href="{{ asset("assets/icon.svg")}}">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-no-repeat bg-cover bg-center body-font min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-meta" style="background-image: url('/assets/bg-new.svg');">
        <div>
            <div class="text-3xl font-semibold">
                <h1 class="text-white">Login Akun Peternak <span class="text-ungu-void"> Web</span></h1>
            </div>
            <hr class="h-px mb-8 bg-ungu-font border-0 mt-4 mx-10">

        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-meta bg-opacity-75 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </body>
</html>
