@props([
    'type' => 'right',
    'columns' => 3,
    'alt',
    'url'
])
@php
    $classes = 'img-fluid mb-3 wow rounded-3 border border-5 border-warning col-md-'.($columns-1).' col-lg-'.$columns.' ';
    $classes .= ($type == 'right') ? 'ms-sm-4 float-sm-end fromright' : 'me-sm-4 float-sm-start fromleft';
@endphp
<img
    {{ $attributes->merge(['class' => $classes]) }}
    src="{{ $url }}"
    alt="{{ $alt }}"
/>
