@props([
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
    // $type = in_array($animation, $ANIMATION_TYPE) ? $animation : 'fromright';
@endphp

<div {{ $attributes->merge(['class' => 'wow '. in_array($animation, $ANIMATION_TYPE) ? $animation : 'fromright']) }}>
    {{ $slot }}
</div>
