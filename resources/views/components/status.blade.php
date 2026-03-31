@props(['type'])

@php
    $color = match($type) {
        'подтверждено' => 'text-green-600',
        'отклонено' => 'text-red-600',
        'новое' => 'text-blue-600',
    };
@endphp

<p {{ $attributes->merge(['class' => 'font-bold text-gray-900']) }}>
    Статус: <span class="{{ $color }}">{{ $slot }}</span>
</p>