@props(['manga', 'isslider' => false])
<div
    {{ $attributes->merge(['class' => ' bg-red-400  py-2 flex  items-center justify-between  overflow-hidden min-h-52 relative ']) }}>
    <div class=" p-8  ">
        <a href="" class=" text-xl text-white uppercase">{{ $manga['title'] }}</a>
        <div>
            <x-button class=" bg-turquoise text-plumpPurpleDark">Leer ahora</x-button>
            <x-button>Ver información</x-button>
        </div>
    </div>
    <div class="">
        <a href="#" class=" border-8  ">
            <img src="{{ $manga['cover-art'] }}" class=" w-96 h-96 " alt="poster"
                class="transition duration-150 ease-in-out  hover:opacity-75 ">
        </a>
    </div>

</div>
