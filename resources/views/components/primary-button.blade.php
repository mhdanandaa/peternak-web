<button {{ $attributes->merge(['type' => 'submit', 'class' => 'nline-flex items-center px-20 py-2 w-full bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-meta border-4 border-ungu-font focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 text-center']) }}>
    {{ $slot }}
</button>
