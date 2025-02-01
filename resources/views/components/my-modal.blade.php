@props(['trigger'])
<!-- Fondo con opacidad -->
<div class="fixed inset-0 bg-gray-900 bg-opacity-60" x-show="{{ $trigger }}"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-end="opacity-0" x-cloak @click="{{ $trigger }} = false">
</div>
<div class="fixed top-0 flex items-center justify-center inset-x-0 inset-y-0" x-show="{{ $trigger }}"
    x-on:keydown.escape.window="{{ $trigger }} = false" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-[-50px]" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-end="opacity-0 translate-y-[-50px]" x-cloak>
    <div {{ $attributes->merge(['class' => 'rounded-xl w-full max-w-[500px]']) }}
        @click.away="{{ $trigger }} = false">
        {{ $slot }}
    </div>
</div>
