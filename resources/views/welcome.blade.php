<x-guest-layout>
    <div class="w-full max-w-sm mx-auto h-screen flex justify-center flex-col">
        <x-application-logo class="w-full sm:max-w-md mb-4" />
        <p>Här registrerar du dina träningspass och följer dina framsteg på vägen till en fullbordad Älgåklassiker.</p>
        <x-link href="{{ route('login') }}" class="my-4" dusk="login">Logga in</x-link>
        <x-link href="{{ route('register') }}">Registrerar dig</x-link>
    </div>
</x-guest-layout>