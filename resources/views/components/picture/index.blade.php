@php
    $classes = 'position-relative mb-3 wow rounded-3 col-md-'.($columns-1).' col-lg-'.$columns.' ';
    $classes .= ($arrival == 'right') ? 'ms-sm-4 float-sm-end fromright' : 'me-sm-4 float-sm-start fromleft';
@endphp
<div class="{{ $classes }}" {{ $attributes }}>

    <x-source-sentence
        :dimensionSource="$dimensionSource"
        :sourceArray="$picture['sourceArr']"
        class="img-article img-article-{{ $arrival }}"
    />

    {!! $picture['responsivePicture'] !!}

</div>
