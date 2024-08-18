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
    @wireUiScripts
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-700">
    <div class="fixed top-0 bottom-0 left-0 w-full h-full opacity-50">
        <img src="{{ asset('images/cell.jpg') }}" class="object-cover w-full h-full" alt="">
    </div>
    <div class="min-h-screen relative flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div class="px-80">
            <a href="">
                <p class="text-5xl font-bold text-white text-center ">SULTAN KUDARAT PROVINCIAL JAIL MANAGEMENT
                    INFORMATION SYSTEM
                </p>
            </a>
        </div>

        @if (request()->routeIs('login'))
            <div class="w-full sm:max-w-lg mt-10 px-8 py-10 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div>
                    {{ $slot }}
                </div>
            </div>
        @else
            <div class="w-full sm:max-w-3xl mt-10 px-8 py-10 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div>
                    {{ $slot }}
                </div>
            </div>
        @endif
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
