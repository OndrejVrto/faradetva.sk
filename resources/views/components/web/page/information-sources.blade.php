@props([
    'title' => null,
    'animation' => null,
])
@php
    $ANIMATION_TYPE = [
        'fromtop',
        'frombottom',
        'fromleft',
        'fromright',
        'zoom',
        'zoom_in',
        'zoom_out',
        'stratch',
        'rotate',
        'flipin',
        'flipinY',
        'spin',
        'spin_back',
        'sonarEffect',
        'fadeleft',
        'fadeIn',
        'fadeOut',
        'slidein',
        'slideout',
        'slideup',
        'slidedown',
        'loader',
        'load_fade',
    ]
@endphp

<div class="section ch_source d-print-block text-muted ps-5 pt-5">
    @isset($title)
        <h5 class="wow {{ in_array($animation, $ANIMATION_TYPE) ? $animation : 'fromright' }}" data-wow-delay="0.2s">
            {{ $title }}
        </h5>
    @endisset
    <ul {{ $attributes }}>
        {{ $slot }}
    </ul>
</div>
