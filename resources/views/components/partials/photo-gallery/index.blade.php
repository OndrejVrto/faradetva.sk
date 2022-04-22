<!-- GALLERY Start ({{ $gallery['title'] }}) -->
<div class="row ch_about_desc" {{ $attributes }}>
    <h3 class="fromright wow" data-wow-delay="0.4s">{{ $gallery['title'] }}</h3>

    @isset($gallery['description'])
        <h5>{{ $gallery['description'] }}</h5>
    @endisset

    <div class="gallery mx-3 w-100">
        @forelse ($gallery['picture'] as $picture )
            <a
                href="{{ $picture['href'] }}"
                title="{{ $picture['title'] }}"
                nonce="{{ csp_nonce() }}"
                data-srcset="{{ $picture['srcset'] }}"
            >
                {!! $picture['responsivePicture'] !!}
            </a>
        @empty
            <p class="text-danger">Album neobsahuje žiadne obrázky.</p>
        @endforelse
    </div>

    <x-partials.source-sentence
        :dimensionSource="$dimensionSource"
        :sourceArray="$gallery['sourceArr']"
        class="mx-2"
    />

</div>
<!-- GALLERY End ({{ $gallery['title'] }}) -->

@once
    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/blueimp-gallery/css/blueimp-gallery.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/justified-gallery/css/justifiedGallery.min.css') }}">
        <style @nonce>
            .justified-gallery > .jg-entry:hover img {
                filter: brightness(70%);
                -webkit-transition: .2s ease-in-out;
                transition: .2s ease-in-out;
            }
        </style>
    @endpush

    @push('js')
        <!-- GALLERY script Start -->
        <script @nonce type="text/javascript" src="{{ asset('vendor/justified-gallery/js/jquery.justifiedGallery.min.js') }}"></script>
        <script @nonce type="text/javascript" src="{{ asset('vendor/blueimp-gallery/js/blueimp-gallery.min.js') }}"></script>
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/custom-gallery.js') }}"></script>
        <!-- CHART script End -->
    @endpush

    @push('content_footer')
        <!-- START MODAL - The Gallery as lightbox dialog -->
        <div
            id="blueimp-gallery"
            class="blueimp-gallery"
            aria-label="image gallery"
            aria-modal="true"
            role="dialog"
        >
            <div class="slides" aria-live="polite"></div>
            <h3 class="title"></h3>
            <a
                class="prev"
                aria-controls="blueimp-gallery"
                aria-label="previous slide"
                aria-keyshortcuts="ArrowLeft"
            ></a>
            <a
                class="next"
                aria-controls="blueimp-gallery"
                aria-label="next slide"
                aria-keyshortcuts="ArrowRight"
            ></a>
            <a
                class="close"
                aria-controls="blueimp-gallery"
                aria-label="close"
                aria-keyshortcuts="Escape"
            ></a>
            <a
                class="play-pause"
                aria-controls="blueimp-gallery"
                aria-label="play slideshow"
                aria-keyshortcuts="Space"
                aria-pressed="false"
                role="button"
            ></a>
            <ol class="indicator"></ol>
        </div>
        <!-- END Modal Gallery -->
    @endpush

@endonce
