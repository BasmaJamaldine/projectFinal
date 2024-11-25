@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium font-clash text-md text-black dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
