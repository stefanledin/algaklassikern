<x-app-layout>
    <x-card class="mx-auto max-w-lg">
        <x-slot name="header">Registrera träningspass</x-slot>

        @if ($errors->count())
            <div class="mb-4 px-4 py-2 bg-red-400 rounded-lg">
                <ul>
                @foreach ($errors->all() as $error)
                    <li class="mb-2 last:mb-0">{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('activities.store') }}" method="post">
            @csrf
            <x-label for="discipline">Gren</x-label>
            <x-input type="text" id="discipline" name="discipline" value="{{ $currentDiscipline->name }}" class="mb-4 bg-gray-200" disabled />

            <x-label for="date">Datum</x-label>
            <x-input id="date" name="date" type="date" class="mb-4" />

            <x-label for="distance">Distans, meter</x-label>
            <x-input type="number" min="0" id="distance" name="distance" placeholder="1000" class="mb-4" />

            <input 
                type="submit" 
                class="bg-blue px-4 py-2 hover:bg-dark-blue text-white rounded-md cursor-pointer"
                value="Registrera">
        </form>
    </x-card>
</x-app-layout>