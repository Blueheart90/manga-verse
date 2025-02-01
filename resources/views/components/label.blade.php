@props(['value'])

<label {{ $attributes->merge(['class' => 'uppercase mb-2 text-xs text-plumpPurpleDark']) }}>
    {{ $value ?? $slot }}
</label>
