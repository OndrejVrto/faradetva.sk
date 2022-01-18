@props([
    'type' => 'right',
    'columns' => 3,
    'source' => null,
    'alt',
    'url',
])
@php
    $classes = 'position-relative mb-3 wow rounded-3 col-md-'.($columns-1).' col-lg-'.$columns.' ';
    $classes .= ($type == 'right') ? 'ms-sm-4 float-sm-end fromright' : 'me-sm-4 float-sm-start fromleft';
@endphp
<div class="{{ $classes }}">
    @isset($source)
        <div class="img-article img-article-{{ $type }}">
            {{ $source }}
        </div>
    @endisset
    <img class="img-fluid"
    src="{{ $url }}"
    alt="{{ $alt }}"
    />
</div>
