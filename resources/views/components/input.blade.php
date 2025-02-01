@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-none bg-purple-100 text-plumpPurpleDark rounded text-sm px-5 focus:ring-0',
]) !!}>
