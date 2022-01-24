<div {{ $attributes->merge(['class' => 'mb-4 bg-white rounded-md overflow-hidden shadow-md']) }}>
    <div class="p-4">
        <h2 class="oswald text-2xl font-bold leading-none">
            {{ $header }}
        </h2>
    </div>
    <hr class="border-gray-400">
    <div class="p-4 overflow-hidden">
        {{ $slot }}
    </div>
</div>