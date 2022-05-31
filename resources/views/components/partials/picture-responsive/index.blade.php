{!! $picture['responsivePicture'] !!}

<x-partials.picture-label
    class="img-article img-article-{{ $descriptionSide }} bg-transparent"
    for="picr-{{ $picture['img-slug'] }}"
>
    @if (!is_null($descriptionCrop))
        {{ $picture['source_description_crop'] }}
    @else
        {{ $picture['source_description'] }}
    @endif
</x-partials.picture-label>

{{-- <x-partials.source-sentence
    class="d-none d-print-none"
    :dimensionSource="$dimensionSource"
    :sourceArray="$picture['sourceArr']"
    for="picr-{{ $picture['img-slug'] }}"
/> --}}
