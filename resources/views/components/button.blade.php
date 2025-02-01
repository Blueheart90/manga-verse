<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'uppercase px-4 py-2 bg-plumpPurpleDark text-white rounded transition ease-in-out duration-150 hover:bg-plumpPurple ']) }}>
    {{ $slot }}
</button>
