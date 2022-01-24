<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="font-sans antialiased bg-blue">
        @if (session('message'))
            <div class="col-span-full bg-green-100">
                <div class="px-4 py-6 flex justify-center items-center">
                    <p class="oswald font-bold text-2xl">{{ session('message') }}</p>
                    <div>
                        <a 
                            class="ml-4 bg-green-500 hover:bg-green-600 px-4 py-2 text-white text-lg rounded-lg leading-none" 
                            href="{{ route('dashboard') }}"
                            dusk="close-message"
                            >Okej
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <nav class="bg-white shadow-md p-4 mb-6">
            <div class="container mx-auto">
                <a href="{{ auth()->user() ? '/dashboard' : '/' }}">
                    <img class="w-full max-w-sm" src="/img/logo.svg">
                </a>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="p-4">
            <div class="container mx-auto">
                {{ $slot }}
            </div>
        </main>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>
