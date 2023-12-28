@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-ungu-void mb-2']) }}>
    {{ $value ?? $slot }}
</label>
