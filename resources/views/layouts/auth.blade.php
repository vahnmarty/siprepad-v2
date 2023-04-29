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
    @livewireStyles
</head>

<body class="font-sans antialiased text-gray-900 bg-hero-pattern">

    <div class="relative flex items-center justify-center gap-x-6 overflow-hidden bg-indigo-500 px-6 py-2.5 sm:px-3.5">

        <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
            <p class="text-sm leading-6 text-white">
                <strong class="font-semibold">
                    {{ \App\Models\SchoolTerm::active()->first()?->name }}
                </strong>
                <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
                    <circle cx="1" cy="1" r="1" />
                </svg>
                The Enrollment for this academic term is in progress.
            </p>
            <a href="#"
                class="flex-none rounded-full bg-gray-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">Register
                now <span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>

    <div class="flex flex-col items-center min-h-screen pt-6 bg-transparent dark:bg-gray-900 sm:justify-center sm:pt-0">


        {{ $slot }}


    </div>

    <footer class="py-16 bg-blue-900">
        <div class="flex justify-center w-full">
            <a href="#">
                <img src="{{ asset('img/logo-white.png') }}" alt="" />
            </a>
        </div>
        <p class="mt-8 text-center text-white/70">&copy; {{ date('Y') }}><a href="https://www.siprep.org">St.
                Ignatius College Preparatory</a>.&nbsp;&nbsp;All rights Reserved.</p>
    </footer>

    @livewireScripts


</body>

</html>
