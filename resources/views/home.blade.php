<x-app-layout>
    @dump(get_defined_vars())
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="container mx-auto">


            <x-manga.card :manga="$popularMangas[0]" />
        </div>
    </div>

</x-app-layout>
