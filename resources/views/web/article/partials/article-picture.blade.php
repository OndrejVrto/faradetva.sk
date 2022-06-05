<div class="blog_thumb">

    {!! $oneNews->getFirstMedia($oneNews->collectionName)->img('large', [
            'class' => 'w-100 img-fluid',
            'id' => 'picNews-'.$oneNews->id,
            'alt' => $oneNews->source->source_description,
            'nonce' => csp_nonce(),
            'width' => '700',
            'height' => '400',
        ])
    !!}

    <div class="d-flex justify-content-between bg-transparent mt-1">
        <x-partials.picture-label
            for="picNews-{{ $oneNews->id }}"
        >
            {{ $oneNews->source->source_description }}
        </x-partials.picture-label>

        @php
            $source = [
                'source_source'      => $oneNews->source->source_source,
                'source_source_url'  => $oneNews->source->source_source_url,
                'source_author'      => $oneNews->source->source_author,
                'source_author_url'  => $oneNews->source->source_author_url,
                'source_license'     => $oneNews->source->source_license,
                'source_license_url' => $oneNews->source->source_license_url
            ];
        @endphp
        <x-partials.source-sentence
            dimensionSource="medium"
            :sourceArray="$source"
            for="picNews-{{ $oneNews->id }}"
        />
    </div>

</div>
