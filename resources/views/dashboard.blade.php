<x-app-layout>
    <div class="grid grid-cols-12 gap-4">
        <x-card class="col-span-full md:col-span-6">
            <x-slot name="header">Hej {{ auth()->user()->firstname }}!</x-slot>
            <x-list.dl>
                <x-list.dt>Antal träningspass:</x-list.dt>
                <x-list.dd>{{ $activities->count() }}</x-list.dd>

                <x-list.dt>Total distans:</x-list.dt>
                <x-list.dd>
                    @if ($activities->count())
                        {{ $activities->sum('distance') / 1000 }} km
                    @else
                        0 km
                    @endif
                </x-list.dd>
            </x-list.dl>
            <x-link href="{{ route('activities.create') }}" dusk="register-activity">Registrera träningspass</x-link>
        </x-card>

        <x-card class="col-span-full md:col-span-6">
            <x-slot name="header">Nuvarande gren: {{ $currentDiscipline->name }}</x-slot>
            <x-list.dl class="mb-6">
                <x-list.dt>Mål:</x-list.dt>
                <x-list.dd>{{ $currentDiscipline->distance_to_complete / 1000 }} km</x-list.dd>
                <x-list.dt>Deadline:</x-list.dt>
                <x-list.dd>{{ $currentDiscipline->to_date }}</x-list.dd>
                <x-list.dt>Dagar kvar:</x-list.dt>
                <x-list.dd>{{ now()->diff($currentDiscipline->to_date)->days }}</x-list.dd>
                <x-list.dt>Distans kvar:</x-list.dt>
                <x-list.dd>{{ $distanceRemaining / 1000 }} km</x-list.dd>
            </x-list.dl>
        </x-card>

        @if ($activities->count())
            <x-card class="col-span-full">
                <x-slot name="header">Mina träningspass</x-slot>
                <x-link href="{{ route('activities.create') }}">Registrera träningspass</x-link>
                <table class="mt-4 w-full max-w-3xl border border-gray-200">
                    <thead>
                        <tr>
                            <th class="text-left">Datum</th>
                            <th class="text-left">Gren</th>
                            <th class="text-right">Distans</th>
                            <!--<th class="text-right">Redigera</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr class="bg-gray-100">
                                <td>{{ $activity->date }}</td>
                                <td>{{ $activity->discipline->name }}</td>
                                <td class="text-right">{{ $activity->distance }} m</td>
                                <!--<td class="text-right">✍🏻</td>-->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-card>
        @endif
    </div>
</x-app-layout>
