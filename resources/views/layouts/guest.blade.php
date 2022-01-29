<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('_head')
    <body class="antialiased bg-light-blue">
        <div>
            {{ $slot }}
        </div>
    </body>
</html>
