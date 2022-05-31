<x-web.page.section
    name="BANER"
    row="true"
    overlay="true"
    class="ch_banner_wrapper banner-img-{{$banner['id']}} h-100 mb-5"
    id="bnr-{{ $banner['slug'] }}"
>

    <div class="col-12">

        <x-partials.picture-label
            class="img-article img-article-left ms-2 d-print-none text-church-template-blue"
            for="bnr-{{ $banner['slug'] }}"
        >
            {{ $banner['source_description'] }}
        </x-partials.picture-label>

        <x-partials.source-sentence
            dimensionSource="{{ $dimensionSourceBanner }}"
            :sourceArray="$banner['sourceArr']"
            class="img-article img-article-right me-2 d-print-none"
            title="{{ $banner['source_description'] }}"
            for="bnr-{{ $banner['slug'] }}"
        />

        <div class="banner_heading">

            @isset($header)
                <div class="page_heading">
                    <h1>{{ $header }}</h1>
                </div>
            @endisset

            @isset($breadcrumb)
                {!! $breadcrumb !!}
            @endisset

        </div>
    </div>

</x-web.page.section>

@pushOnce('css')
    <style @nonce>
    /* Banner N.{{ $banner['id'] }} - Responsive background images */

    /* Extra small devices (portrait phones, less than 576px) */
        .banner-img-{{$banner['id']}} {
            background-image: url({{ $banner['extra_small_image'] }});
            background-image:
                -webkit-image-set(
                "{{ $banner['extra_small_image'] }}" 1x,
                "{{ $banner['small_image'] }}" 2x,
                );
            background-image:
                image-set(
                "{{ $banner['extra_small_image'] }}" 1x,
                "{{ $banner['small_image'] }}" 2x,
                );
        }

    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) {
        .banner-img-{{$banner['id']}} {
            background-image: url({{ $banner['small_image'] }});
            background-image:
                -webkit-image-set(
                "{{ $banner['small_image'] }}" 1x,
                "{{ $banner['medium_image'] }}" 2x,
                );
            background-image:
                image-set(
                "{{ $banner['small_image'] }}" 1x,
                "{{ $banner['medium_image'] }}" 2x,
                );
        }
    }

    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        .banner-img-{{$banner['id']}} {
            background-image: url({{ $banner['medium_image'] }});
            background-image:
                -webkit-image-set(
                "{{ $banner['medium_image'] }}" 1x,
                "{{ $banner['large_image'] }}" 2x,
                );
            background-image:
                image-set(
                "{{ $banner['medium_image'] }}" 1x,
                "{{ $banner['large_image'] }}" 2x,
                );
        }
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {
        .banner-img-{{$banner['id']}} {
            background-image: url({{ $banner['large_image'] }});
            background-image:
            -webkit-image-set(
                "{{ $banner['large_image'] }}" 1x,
                "{{ $banner['extra_large_image'] }}" 2x,
            );
            background-image:
            image-set(
                "{{ $banner['large_image'] }}" 1x,
                "{{ $banner['extra_large_image'] }}" 2x,
            );
        }
    }

    /* Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .banner-img-{{$banner['id']}} {
            background-image: url({{ $banner['extra_large_image'] }});
        }
    }

    </style>
@endpushOnce
