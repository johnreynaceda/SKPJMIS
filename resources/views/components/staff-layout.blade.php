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

<body class="font-sans text-gray-900 antialiased">
    {{-- <div
        class="absolute text-stroke font-mont text-stroke-md opacity-20 text-gray-500 top-40 font-extrabold text-[10rem] -left-80">
        STYLESYNC
    </div>
    <div
        class="absolute text-stroke font-mont text-stroke-md opacity-25 text-gray-500 top-[30rem] font-extrabold text-[10rem] right-10">
        STYLESYNC
    </div> --}}


    <div class="flex h-screen overflow-hidden bg-gray-100">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div
                    class="flex flex-col flex-grow pt-5 overflow-y-auto relative bg-gradient-to-bl from-gray-600 to-gray-500 border-r">
                    <img src="{{ asset('images/cell.jpg') }}"
                        class="object-cover absolute top-0 left-0 w-full h-full opacity-20" alt="">
                    <div class="flex flex-col flex-shrink-0 px-4">
                        <a class="text-lg font-semibold tracking-tighter relative text-black focus:outline-none focus:ring"
                            href="/">
                            <img src="" class=" w-full h-40 object-cover bg-white" alt="">
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow px-4 mt-10">
                        <nav class="flex-1 space-y-1 ">
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                Analytics
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.dashboard') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:scale-95 hover:text-gray-700"
                                        href="{{ route('admin.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M13.45 11.55l2.05 -2.05" />
                                            <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                                        </svg>
                                        <span class="ml-3"> Dashboard </span>
                                    </a>
                                </li>

                            </ul>
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                MASTER LIST
                            </p>
                            <ul>

                                <li>
                                    <a class="{{ request()->routeIs('staff.visitor') ? 'bg-white text-main' : 'text-white' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm  transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:scale-95 hover:text-gray-700"
                                        href="{{ route('staff.visitor') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                        </svg>
                                        <span class="ml-4"> Visitors </span>
                                        <span
                                            class="inline-flex ml-auto items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-500">
                                            25
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-white hover:scale-95 hover:text-gray-700"
                                        href="#_">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-app-window">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                            <path d="M6 8h.01" />
                                            <path d="M9 8h.01" />
                                        </svg>
                                        <span class="ml-4"> Daily Attendance </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div
                        class="px-4 mx-auto 2xl:max-w-7xl   bg-gradient-to-bl from-gray-700 relative to-gray-500 rounded-3xl py-2 sm:px-6 md:px-8">
                        <img src="{{ asset('images/cell.jpg') }}"
                            class="object-cover absolute top-0 left-0 w-full h-full opacity-20 rounded-3xl"
                            alt="">
                        <livewire:userdropdown />
                    </div>
                    <div class="px-4 mx-auto 2xl:max-w-7xl sm:px-6 md:px-8">
                        <!-- === Remove and replace with your own content... === -->
                        <div class="py-10">

                            {{ $slot }}
                        </div>
                        <!-- === End ===  -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    @filamentScripts
    @vite('resources/js/app.js')

</body>

</html>
