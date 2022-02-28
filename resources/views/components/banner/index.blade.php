<!-- Banner section Start -->
<div class="section ch_banner_wrapper banner-img">
    <div class="black_overlay">
        <div class="container">
            <div class="row">
                <x-source-sentence
                    :dimensionSource="$dimensionSource"
                    :sourceArray="$banner['sourceArr']"
                    class="img-article img-article-left"
                />
                <div class="col-12">
                    <div class="banner_heading">
                        <div class="page_heading">
                            <h2>{{ $header }}</h2>
                        </div>
                        @isset($breadcrumb)
                            {!! $breadcrumb !!}
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner section End -->

@once
    @push('css')
        <style>
        /* Responsive background images for Banner */

        /* Extra small devices (portrait phones, less than 576px) */
            .banner-img {
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
            .banner-img{
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
            .banner-img{
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
            .banner-img {
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
            .banner-img {
                background-image: url({{ $banner['extra_large_image'] }});
            }
        }

        </style>
    @endpush
@endonce
