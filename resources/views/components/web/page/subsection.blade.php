@props([
    'title' => null,
    'icon' => null,
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

@isset($title)<!-- SUBSECTION Start ({{ $title }}) -->@endisset
    <div class="row mb-3 ch_about_desc">
        @isset($title)
            <h3 class="mt-2 wow {{ in_array($animation, $ANIMATION_TYPE) ? $animation : 'fromright' }}" data-wow-delay="0.4s">
                {{ $title }}
                @isset($icon)<i class="{{ $icon }}"></i>@endisset
            </h3>
        @endisset
        <div class="clearfix">
            {{ $slot }}
        </div>
    </div>
@isset($title)<!-- SUBSECTION End ({{ $title }}) -->@endisset
