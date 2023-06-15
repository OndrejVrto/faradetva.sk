<!-- SLIDER section Start -->
    <section class="section d-print-none ch_slider_wrapper">
        <div class="ch_home_slider owl-carousel owl-theme">

            @forelse ( $sliders as $slider )
                <!-- SLIDER-ITEM-{{ $slider['id'] }} start-->
                <div class="item">
                    <div class="slider_bg slider-img-{{ $slider['id'] }}" id="slid-{{ $slider['id'] }}">
                        <div class="black_overlay">
                            <div class="container-fluid">
                                <div class="slider_captions">
                                    <h1 class="heading_1">{{ $slider['heading_row_1'] }}</h1>
                                    <h1 class="heading_2">{{ $slider['heading_row_2'] }}</h1>
                                    <h1 class="heading_3">{{ $slider['heading_row_3'] }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-1">
                        <x-partials.picture-label
                            class="ms-3 text-church-template-blue"
                            for="slid-{{ $slider['id'] }}"
                        >
                            {{ $slider['source_description'] }}
                        </x-partials.picture-label>

                        <x-partials.source-sentence
                            dimensionSource="medium"
                            :sourceArray="$slider['sourceArr']"
                            class="me-3"
                            title="{{ $slider['source_description'] }}"
                            for="slid-{{ $slider['id'] }}"
                        />
                    </div>
                </div>
                <!-- SLIDER-ITEM-{{ $slider['id'] }} end -->

            @push('css')
                <style @nonce>
                    /* Slider N.{{ $slider['id'] }} - Responsive background images */

                    /* Extra small devices (portrait phones, less than 576px) */
                        .slider-img-{{ $slider['id'] }} {
                            background-image: url({{ $slider['extra_small_image'] }});
                            background-image:
                                -webkit-image-set(
                                "{{ $slider['extra_small_image'] }}" 1x,
                                "{{ $slider['small_image'] }}" 2x,
                                );
                            background-image:
                                image-set(
                                "{{ $slider['extra_small_image'] }}" 1x,
                                "{{ $slider['small_image'] }}" 2x,
                                );
                        }

                    /* Small devices (landscape phones, 576px and up) */
                    @media (min-width: 576px) {
                        .slider-img-{{ $slider['id'] }}{
                            background-image: url({{ $slider['small_image'] }});
                            background-image:
                                -webkit-image-set(
                                "{{ $slider['small_image'] }}" 1x,
                                "{{ $slider['medium_image'] }}" 2x,
                                );
                            background-image:
                                image-set(
                                "{{ $slider['small_image'] }}" 1x,
                                "{{ $slider['medium_image'] }}" 2x,
                                );
                        }
                    }

                    /* Medium devices (tablets, 768px and up) */
                    @media (min-width: 768px) {
                        .slider-img-{{ $slider['id'] }}{
                            background-image: url({{ $slider['medium_image'] }});
                            background-image:
                                -webkit-image-set(
                                "{{ $slider['medium_image'] }}" 1x,
                                "{{ $slider['large_image'] }}" 2x,
                                );
                            background-image:
                                image-set(
                                "{{ $slider['medium_image'] }}" 1x,
                                "{{ $slider['large_image'] }}" 2x,
                                );
                        }
                    }

                    /* Large devices (desktops, 992px and up) */
                    @media (min-width: 992px) {
                        .slider-img-{{ $slider['id'] }} {
                            background-image: url({{ $slider['large_image'] }});
                            background-image:
                            -webkit-image-set(
                                "{{ $slider['large_image'] }}" 1x,
                                "{{ $slider['extra_large_image'] }}" 2x,
                            );
                            background-image:
                            image-set(
                                "{{ $slider['large_image'] }}" 1x,
                                "{{ $slider['extra_large_image'] }}" 2x,
                            );
                        }
                    }

                    /* Extra large devices (large desktops, 1200px and up) */
                    @media (min-width: 1200px) {
                        .slider-img-{{ $slider['id'] }} {
                            background-image: url({{ $slider['extra_large_image'] }});
                        }
                    }

                    </style>
                @endpush

            @empty
                <div class="d-none">Žiaden slider nieje pridaný.</div>
            @endforelse
        </div>
    </section>
<!-- SLIDER section End -->

