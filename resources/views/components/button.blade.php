@props([
    'variant' => 'primary',
    'href' => false,
])

@php
    $baseClasses = 'px-3 py-2 font-weight-bold';

    switch ($variant) {
        case 'primary':
            $variantClasses = 'text-white rounded bg-primary font-weight-bold text-xs';
            break;
        case 'info':
            $variantClasses = 'focus:outline-none text-white bg-cyan-500 uppercase font-semibold hover:bg-cyan-600 focus:ring-4 focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-cyan-600 dark:hover:bg-cyan-500 dark:focus:ring-cyan-800';
            break;
        case 'success':
            $variantClasses = 'focus:outline-none text-white bg-green-500 uppercase font-semibold hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800';
            break;
        case 'danger':
            $variantClasses = 'focus:outline-none text-white bg-red-500 uppercase font-semibold hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-500 dark:focus:ring-red-800';
            break;
        case 'warning':
            $variantClasses = 'focus:outline-none text-white bg-yellow-400 uppercase font-semibold hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-yellow-600 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800';
            break;

        default:
            $variantClasses = 'text-white rounded bg-white font-weight-bold text-xs';
            break;
    }

    $classes = $baseClasses . ' ' . $variantClasses;
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
