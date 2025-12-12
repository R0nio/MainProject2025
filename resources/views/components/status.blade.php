@php
$classes = match ($type) {
1=> 'text-blue-600',
2=> 'text-green-600',
3=> 'text-red-600',
};
@endphp

<div>
    <p>
        Статус заказа:
        <span {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</span>
    </p>
</div>