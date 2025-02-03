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
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <!-- Scripts -->
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-700">
    <img src="{{ asset('images/cell.jpg') }}" class="object-cover absolute top-0 left-0 w-full h-full opacity-20"
        alt="">
    <section x-data="{ duration: 'monthly' }">
        <div class="px-8 py-24 mx-auto md:px-12 lg:px-24 max-w-screen-xl relative">
            <div class="max-w-3xl text-center mx-auto">
                <p class="text-sm leading-normal font-bold uppercase mb-5 text-gray-200">
                    WELCOME TO
                </p>
                <center>
                    <img src="{{ asset('images/skpj_logo.png') }}" class="h-20" alt="">
                </center>
                <h2
                    class="text-xl leading-tight uppercase tracking-tight sm:text-2xl md:text-3xl lg:text-4xl mt-4 font-semibold text-white lg:text-balance">
                    Sultan Kudarat Provincial Jail Management Information System
                </h2>


            </div>

            <div class="flex mt-20 space-x-6 justify-center">
                <div
                    class="h-64 w-96 hover:scale-95 hover:text-red-600 cursor-pointer bg-white/90 rounded-[3rem] p-5 px-10 py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-file-user">
                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                        <path d="M15 18a3 3 0 1 0-6 0" />
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z" />
                        <circle cx="12" cy="13" r="2" />
                    </svg>
                    <h1 class="text-3xl mt-5 font-bold">VISITOR'S PROFILING</h1>
                    <div class="mt-5">
                        <x-button href="{{ route('visitor-profiling') }}" label="GO" right-icon="arrow-right"
                            slate />
                    </div>
                </div>
                <div
                    class="h-64 w-96 hover:scale-95 hover:text-red-600 cursor-pointer bg-white/90 rounded-[3rem] p-5 px-10 py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-calendar-1">
                        <path d="M11 14h1v4" />
                        <path d="M16 2v4" />
                        <path d="M3 10h18" />
                        <path d="M8 2v4" />
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                    </svg>
                    <h1 class="text-3xl mt-5 font-bold">SCHEDULE AN INMATE VISIT</h1>
                    <div class="mt-5">
                        <x-button href="{{ route('set-schedule') }}" label="GO" right-icon="arrow-right" slate />
                    </div>
                </div>
            </div>
            <div class="mt-20 flex justify-center hover:text-green-500 text-white">
                <a href="{{ route('login') }}" class="flex space-x-2">
                    <span>Sign In</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-log-in">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        <polyline points="10 17 15 12 10 7" />
                        <line x1="15" x2="3" y1="12" y2="12" />
                    </svg>
                </a>
            </div>
        </div>
    </section>


    @filamentScripts
    @vite('resources/js/app.js')

</body>

</html>
