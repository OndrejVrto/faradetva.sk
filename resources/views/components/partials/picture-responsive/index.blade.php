{!! $picture['responsivePicture'] !!}

<x-partials.source-sentence
    class="d-none d-print-none"
    :dimensionSource="$dimensionSource"
    :sourceArray="$picture['sourceArr']"
    for="picr-{{ $picture['img-slug'] }}"
/>
