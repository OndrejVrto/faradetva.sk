@php
    // master class
    $class[] = 'position-relative mb-4 mt-2';
    // set width picture
    $class[] = "col-12";
    $class[] = "col-sm-".$classColumns['maxSM'];
    $class[] = "col-md-".$classColumns['maxMD'];
    $class[] = "col-lg-".$classColumns['maxLG'];
    $class[] = "col-xl-".$classColumns['maxXL'];
    $class[] = "col-xxl-".$classColumns['maxXXL'];
    // set side picture in page
    $class[] = ($side == 'right') ? 'ms-sm-4 float-sm-end' : 'me-sm-4 float-sm-start';
    // set animation picture
    $class[] = 'wow '.$animation;
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $class)]) }} title="{{ $picture['source_description'] }}">

    <x-partials.source-sentence
        :dimensionSource="$dimensionSource"
        :sourceArray="$picture['sourceArr']"
        class="img-article img-article-{{ $side }}"
        for="pic-{{ $picture['img-slug'] }}"
    />

    {!! $picture['responsivePicture'] !!}

</div>
