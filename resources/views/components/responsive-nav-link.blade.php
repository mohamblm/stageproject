{{-- resources/views/components/responsive-nav-link.blade.php --}}
@props(['active'])

@php
$classes = ($active ?? false)
    ? 'text-lg font-medium p-2 rounded-md text-cyan-600 bg-cyan-50'
    : 'text-lg font-medium p-2 rounded-md text-gray-700 hover:bg-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>