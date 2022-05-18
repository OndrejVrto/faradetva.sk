@php
    // master classes
    $classes[] = 'position-relative mb-4 mt-1';
    // set width picture
    $maxXXL = max(0, min($columns, 12));
    $maxXL = max(0, min($columns + 1, 12));
    $maxLG = max(0, min($columns + 2, 12));
    $maxMD = max(0, min($columns + 3, 12));
    $maxSM = max(0, min($columns + 4, 12));
    $classes[] = "col-12 col-sm-".$maxSM." col-md-".$maxMD." col-lg-".$maxLG." col-xl-".$maxXL." col-xxl-".$maxXXL;
    // set side picture in page
    if($side == 'left'){
        $classes[] = 'me-sm-4 float-sm-start';
    } elseif($side == 'right') {
        $classes[] = 'ms-sm-4 float-sm-end';
    }
    // set animation picture
    $classes[] = 'wow ' . $animation;
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $classes)]) }} title="{{ $picture['source_description'] }}">

    <x-partials.source-sentence
        :dimensionSource="$dimensionSource"
        :sourceArray="$picture['sourceArr']"
        class="img-article img-article-{{ $side }}"
    />

    {!! $picture['responsivePicture'] !!}

</div>
