<!-- Slider section Start -->

<div class="section ch_slider_wrapper">
    <div class="ch_home_slider">

        @foreach ( $sliders as $slider )

            <!-- item end -->
            <div class="item">
                <div class="slider_bg slider-img-{{ $loop->iteration }}">
                    <div class="black_overlay">
                        <div class="container">
                            <div class="slider_captions">
                                <h1 class="heading_1">{{ $slider->heading_1 }}</h1>
                                <h1 class="heading_2">{{ $slider->heading_2 }}</h1>
                                <h1 class="heading_3">{{ $slider->heading_3 }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- item end -->

@php
    $extra_small_image = $slider->getFirstMediaUrl('slider', 'extra-small') ?: "http://via.placeholder.com/720x300";
    $small_image = $slider->getFirstMediaUrl('slider', 'small') ?: "http://via.placeholder.com/960x400";
    $medium_image = $slider->getFirstMediaUrl('slider', 'medium') ?: "http://via.placeholder.com/1200x500";
    $large_image = $slider->getFirstMediaUrl('slider', 'large') ?: "http://via.placeholder.com/1440x600";
    $extra_large_image = $slider->getFirstMediaUrl('slider', 'extra-large') ?: "http://via.placeholder.com/1920x800";
@endphp

@push('css')
<style>
    /* Responsive background images for Slider N.{{ $loop->iteration }} */

    /* Extra small devices (portrait phones, less than 576px) */
        .slider-img-{{ $loop->iteration }} {
            background-image: url({{ $extra_small_image }});
            background-image:
                -webkit-image-set(
                "{{ $extra_small_image }}" 1x,
                "{{ $small_image }}" 2x,
                );
            background-image:
                image-set(
                "{{ $extra_small_image }}" 1x,
                "{{ $small_image }}" 2x,
                );
        }

    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) {
        .slider-img-{{ $loop->iteration }}{
            background-image: url({{ $small_image }});
            background-image:
                -webkit-image-set(
                "{{ $small_image }}" 1x,
                "{{ $medium_image }}" 2x,
                );
            background-image:
                image-set(
                "{{ $small_image }}" 1x,
                "{{ $medium_image }}" 2x,
                );
        }
    }

    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        .slider-img-{{ $loop->iteration }}{
            background-image: url({{ $medium_image }});
            background-image:
                -webkit-image-set(
                "{{ $medium_image }}" 1x,
                "{{ $large_image }}" 2x,
                );
            background-image:
                image-set(
                "{{ $medium_image }}" 1x,
                "{{ $large_image }}" 2x,
                );
        }
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {
        .slider-img-{{ $loop->iteration }} {
            background-image: url({{ $large_image }});
            background-image:
            -webkit-image-set(
                "{{ $large_image }}" 1x,
                "{{ $extra_large_image }}" 2x,
            );
            background-image:
            image-set(
                "{{ $large_image }}" 1x,
                "{{ $extra_large_image }}" 2x,
            );
        }
    }

    /* Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .slider-img-{{ $loop->iteration }} {
            background-image: url({{ $extra_large_image }});
        }
    }

    </style>
@endpush

        @endforeach

    </div>
</div>
<!-- Slider section End -->


