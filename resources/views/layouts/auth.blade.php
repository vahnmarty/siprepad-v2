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
    </head>
    <body class="font-sans antialiased text-gray-900 bg-hero-pattern">
        <div class="flex flex-col items-center min-h-screen pt-6 bg-transparent sm:justify-center sm:pt-0 dark:bg-gray-900">
           

            {{ $slot }}

            
        </div>

        <footer class="py-16 bg-blue-900">
            <div class="flex justify-center w-full">
                <a href="#">
                    <img src="{{ asset('img/logo-white.png') }}" alt="" />
                </a>
            </div>
            <p class="mt-8 text-center text-white/70">&copy;  {{ date('Y') }}><a href="https://www.siprep.org">St. Ignatius College Preparatory</a>.&nbsp;&nbsp;All rights Reserved.</p>
        </footer>        

        
    </body>
</html>
