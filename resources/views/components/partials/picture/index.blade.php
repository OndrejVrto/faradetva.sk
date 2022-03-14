@php
    // master classes
    $classes[] = 'position-relative mb-3 rounded-3';
    // set width picture
    $maxXL = max(0, min($columns, 12));
    $maxLG = max(0, min($columns - 1, 12));
    $maxMD = max(0, min($columns - 2, 12));
    $classes[] = "col-md-".$maxMD." col-lg-".$maxLG." col-xl-".$maxXL;
    // set side picture in page
    if($side == 'left'){
        $classes[] = 'me-sm-4 float-sm-start';
    } elseif($side == 'right') {
        $classes[] = 'ms-sm-4 float-sm-end';
    }
    // set animation picture
    $classes[] = 'wow ' . $animation;
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>

    <x-partials.source-sentence
        :dimensionSource="$dimensionSource"
        :sourceArray="$picture['sourceArr']"
        class="img-article img-article-{{ $side }}"
    />

    {!! $picture['responsivePicture'] !!}

</div>
