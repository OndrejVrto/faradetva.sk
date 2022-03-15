<x-frontend.page.section
    name="PRAY"
    row="true"
    overlay="true"
    class="ch_pray_section prayer-img-{{ $pray['id'] }}"
    id="Pray_{{ $pray['slug'] }}"
>
    <!-- PRAY-ITEM-{{ $pray['id'] }} Start-->
    <div class="col-md-12 col-12">
        <div class="full_width hero_heading">
            <h1 class="frombottom wow">
                {{ $pray['title'] }}
            </h1>
            @isset($pray['quote_row1'])
                <p class="frombottom wow mb-0" data-wow-delay=".3s">
                    {{ $pray['quote_row1'] }}
                </p>
            @endisset
            @isset($pray['quote_row2'])
                <p class="frombottom wow" data-wow-delay=".6s">
                    {{ $pray['quote_row2'] }}
                </p>
            @endisset
            @isset($pray['quote_author'])
                <p class="frombottom wow fst-italic" data-wow-delay=".9s">
                    {{ $pray['quote_author'] }}
                </p>
            @endisset
            @isset($link)
                <div class="frombottom wow mt-5" data-wow-delay="1.2s">
                    <a href="{{ url('kontakty') }}" class="read_btn">
                        Prispejte
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </div>
            @endisset
        </div>
    </div>
    <span class="d-none" rel="license" for="Pray_{{ $pray['slug'] }}">
        <x-partials.source-sentence
            :sourceArray="$pray['sourceArr']"
        />
    </span>
    <!-- PRAY-ITEM-{{ $pray['id'] }} End -->

</x-frontend.page.section>

@push('css')
    <style @nonce>
        /* Responsive background images for Slider N.{{ $pray['id'] }} */

        /* Extra small devices (portrait phones, less than 576px) */
            .prayer-img-{{ $pray['id'] }} {
                background-image: url({{ $pray['extra_small_image'] }});
                background-image:
                    -webkit-image-set(
                    "{{ $pray['extra_small_image'] }}" 1x,
                    "{{ $pray['small_image'] }}" 2x,
                    );
                background-image:
                    image-set(
                    "{{ $pray['extra_small_image'] }}" 1x,
                    "{{ $pray['small_image'] }}" 2x,
                    );
            }

        /* Small devices (landscape phones, 576px and up) */
        @media (min-width: 576px) {
            .prayer-img-{{ $pray['id'] }}{
                background-image: url({{ $pray['small_image'] }});
                background-image:
                    -webkit-image-set(
                    "{{ $pray['small_image'] }}" 1x,
                    "{{ $pray['medium_image'] }}" 2x,
                    );
                background-image:
                    image-set(
                    "{{ $pray['small_image'] }}" 1x,
                    "{{ $pray['medium_image'] }}" 2x,
                    );
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) {
            .prayer-img-{{ $pray['id'] }}{
                background-image: url({{ $pray['medium_image'] }});
                background-image:
                    -webkit-image-set(
                    "{{ $pray['medium_image'] }}" 1x,
                    "{{ $pray['large_image'] }}" 2x,
                    );
                background-image:
                    image-set(
                    "{{ $pray['medium_image'] }}" 1x,
                    "{{ $pray['large_image'] }}" 2x,
                    );
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            .prayer-img-{{ $pray['id'] }} {
                background-image: url({{ $pray['large_image'] }});
                background-image:
                -webkit-image-set(
                    "{{ $pray['large_image'] }}" 1x,
                    "{{ $pray['extra_large_image'] }}" 2x,
                );
                background-image:
                image-set(
                    "{{ $pray['large_image'] }}" 1x,
                    "{{ $pray['extra_large_image'] }}" 2x,
                );
            }
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {
            .prayer-img-{{ $pray['id'] }} {
                background-image: url({{ $pray['extra_large_image'] }});
            }
        }

        </style>
    @endpush
