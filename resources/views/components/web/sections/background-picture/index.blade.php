<x-web.page.section
    name="BACKGROUND-PICTURE-{{ $backgroundPicture['id'] }}: ({{ $backgroundPicture['source_description'] }}) - "
    row="true"
    overlay="true"
    class="ch_pray_section d-print-none background-picture-{{ $backgroundPicture['id'] }}"
    id="bgr-{{ $backgroundPicture['slug'] }}"
>
    <div class="picture-background-size"></div>

    <x-partials.source-sentence
        class="d-none"
        :sourceArray="$backgroundPicture['sourceArr']"
        for="bgr-{{ $backgroundPicture['slug'] }}"
    />
</x-web.page.section>

@push('css')
    <style @nonce>
        /* Background Picture N.{{ $backgroundPicture['id'] }} - Responsive background images */

        /* Extra small devices (portrait phones, less than 576px) */
            .background-picture-{{ $backgroundPicture['id'] }} {
                background-image: url({{ $backgroundPicture['extra_small_image'] }});
                background-image:
                    -webkit-image-set(
                    "{{ $backgroundPicture['extra_small_image'] }}" 1x,
                    "{{ $backgroundPicture['small_image'] }}" 2x,
                    );
                background-image:
                    image-set(
                    "{{ $backgroundPicture['extra_small_image'] }}" 1x,
                    "{{ $backgroundPicture['small_image'] }}" 2x,
                    );
            }

        /* Small devices (landscape phones, 576px and up) */
        @media (min-width: 576px) {
            .background-picture-{{ $backgroundPicture['id'] }}{
                background-image: url({{ $backgroundPicture['small_image'] }});
                background-image:
                    -webkit-image-set(
                    "{{ $backgroundPicture['small_image'] }}" 1x,
                    "{{ $backgroundPicture['medium_image'] }}" 2x,
                    );
                background-image:
                    image-set(
                    "{{ $backgroundPicture['small_image'] }}" 1x,
                    "{{ $backgroundPicture['medium_image'] }}" 2x,
                    );
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) {
            .background-picture-{{ $backgroundPicture['id'] }}{
                background-image: url({{ $backgroundPicture['medium_image'] }});
                background-image:
                    -webkit-image-set(
                    "{{ $backgroundPicture['medium_image'] }}" 1x,
                    "{{ $backgroundPicture['large_image'] }}" 2x,
                    );
                background-image:
                    image-set(
                    "{{ $backgroundPicture['medium_image'] }}" 1x,
                    "{{ $backgroundPicture['large_image'] }}" 2x,
                    );
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            .background-picture-{{ $backgroundPicture['id'] }} {
                background-image: url({{ $backgroundPicture['large_image'] }});
                background-image:
                -webkit-image-set(
                    "{{ $backgroundPicture['large_image'] }}" 1x,
                    "{{ $backgroundPicture['extra_large_image'] }}" 2x,
                );
                background-image:
                image-set(
                    "{{ $backgroundPicture['large_image'] }}" 1x,
                    "{{ $backgroundPicture['extra_large_image'] }}" 2x,
                );
            }
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {
            .background-picture-{{ $backgroundPicture['id'] }} {
                background-image: url({{ $backgroundPicture['extra_large_image'] }});
            }
        }

        </style>
    @endpush
