@php
    $classes = 'position-relative mb-3 wow rounded-3 col-md-'.($columns-1).' col-lg-'.$columns.' ';
    $classes .= ($arrival == 'right') ? 'ms-sm-4 float-sm-end fromright' : 'me-sm-4 float-sm-start fromleft';
@endphp
<div class="{{ $classes }}" {{ $attributes }}>

    <x-source
        :sourceSmall="$sourceSmall"
        :sourceArray="$sourceArr"
        class="img-article img-article-{{ $arrival }}"
    />

    <img class="img-fluid"
        src="{{ $url }}"
        alt="{{ $alt }}"
        title="{{ $title }}"
    />

</div>
