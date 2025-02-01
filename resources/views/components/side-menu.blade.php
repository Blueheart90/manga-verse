@props(['trigger'])

<!-- Fondo con opacidad (Overlay) -->
<div class="fixed inset-0 bg-gray-900 bg-opacity-60" x-show="{{ $trigger }}"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-end="opacity-0" x-cloak @click="{{ $trigger }} = false">
</div>

<!-- Sidebar -->
<div x-show="{{ $trigger }}" x-transition:enter="transition ease-in-out duration-300"
    x-on:keydown.escape.window="{{ $trigger }} = false" x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-200"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg" x-cloak>
    <!-- Botón para cerrar el Sidebar -->
    <div class="h-[70px] flex items-center px-4">
        <button @click="{{ $trigger }} = false"
            class="p-2 bg-purple-200 rounded-full hover:bg-purple-300 transition-colors">
            <x-heroicon-m-chevron-left class="size-6 fill-plumpPurpleDark" />
        </button>
    </div>
    <!-- Contenido del Sidebar -->
    <div class="p-4">
        {{ $slot }}
    </div>
</div>
