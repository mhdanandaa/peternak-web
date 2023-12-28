@props(['disabled' => false])

<input class="py-1 w-full bg-biru-ungu rounded border-b-4 border-ungu-font text-grey-pudar" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
