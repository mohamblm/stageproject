{{-- resources/views/components/nav-link.blade.php --}}
@props(['active'])

@php
$classes = ($active ?? false)
    ? 'font-medium text-cyan-500 hover:text-cyan-600 transition-colors'
    : 'font-medium text-gray-700 hover:text-cyan-600 transition-colors';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>