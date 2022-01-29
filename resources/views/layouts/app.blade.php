<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('_head')
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
