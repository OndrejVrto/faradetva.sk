@if(!empty($gallery))
    <!-- ARTICLE GALLERY Start -->
    <div class="gallery w-100">
        @foreach ($gallery as $picture)
            <a
                href="{{ $picture['href'] }}"
                title="{{ $picture['title'] }}"
                nonce="{{ csp_nonce() }}"
                data-srcset="{{ $picture['srcset'] }}"
            >
                {!! $picture['responsivePicture'] !!}
            </a>
        @endforeach
    </div>
    <!-- ARTICLE GALLERY End -->

    @once
        @push('css')
            <link @nonce rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.8.1/css/justifiedGallery.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link @nonce rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/3.4.0/css/blueimp-gallery.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <style @nonce>
                .gallery {
                    margin-top: 1.5rem;
                }

                .justified-gallery > .jg-entry:hover img {
                    filter: brightness(70%);
                    -webkit-transition: .2s ease-in-out;
                    transition: .2s ease-in-out;
                }
            </style>
        @endpush

        @push('js')
            <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justifiedGallery/3.8.1/js/jquery.justifiedGallery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-gallery/3.4.0/js/blueimp-gallery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script @nonce type="text/javascript" src="{{ asset(mix('asset/app-gallery.js'), true) }}"></script>
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

@endif
