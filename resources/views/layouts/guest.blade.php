<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://api.fontshare.com/v2/css?f[]=clash-display@400,700,500,600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body class="font-sans text-black antialiased flex flex-row overflow-x-hidden bg-[#fef7e4]">
        <div class="min-h-screen flex flex-row gap-[10vw] px-[5vw] sm:justify-center items-center pt-6 sm:pt-0 "  x-data="{ showLogin: false }">
          
            <dotlottie-player src="https://lottie.host/52cb56b0-78c1-4e45-81d5-4fb010f06dd4/AMwjWUT4gn.lottie" background="transparent" speed="1" style="" loop autoplay></dotlottie-player>

            <div class=" w-[80vw] justify-center flex flex-col items-center px-32 py-4   overflow-hidden  h-full">
                {{ $slot }}
            </div>
           
          
        </div>
    </body>
</html>
