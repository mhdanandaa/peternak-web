<button {{ $attributes->merge(['type' => 'submit', 'class' => 'nline-flex items-center px-20 py-2 w-full bg-ungu-font border-white border rounded-md font-semibold text-xs text-white uppercase tracking-widest border-4  focus:outline-none focus:ring-2 focus:ring-ungu-font focus:ring-offset-2 transition ease-in-out duration-150 text-center']) }}>
    {{ $slot }}
</button>
