<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('img/logo-white.svg') }}" type="image/x-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex h-screen items-center justify-center xl:px-20 px-5">
            <div class="w-full xl:w-1/3 flex flex-col xl:gap-20">
                <img src="{{ asset('img/logo.svg') }}" alt="" class="w-[2rem] mb-10 hidden xl:block">
                <div>
                    <h1 class="text-5xl w-full xl:text-7xl font-bold xl:w-[90%]">Meet your animal needs here</h1>
                    <img src="{{ asset('img/Illustration.svg') }}" alt="Illustration" class="w-[80%] mt-10 mx-auto xl:hidden">
                    <p class="xl:w-[80%] mt-7 text-lg xl:text-2xl text-gray-500">Get interesting promos here, register your account immediately so you can meet your animal needs.</p>
                    <a href="{{ route('login') }}">
                        <x-button class="xl:w-1/3 w-full mt-10">Get Started</x-button>
                    </a>
                </div>
            </div>
            <div class="w-1/2 hidden xl:block">
                <img src="{{ asset('img/Illustration.svg') }}" alt="Illustration" class="w-[80%] mx-auto hidden xl:block">
            </div>
        </div>
    </body>
</html>
