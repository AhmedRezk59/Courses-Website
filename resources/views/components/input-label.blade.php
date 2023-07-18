@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 start-0']) }} dir="rtl">
    {{ $value ?? $slot }}
</label>
