<div class="gallery mt-3 w-100">
    @for ($i=1; $i<=11; $i++)
        <a href="{{ asset('photo/dychovka-na-stefana-2015/Dychovka2015-'.$i.'.jpg') }}" rel="gallery-item-1">
            <img src="{{ asset('photo/dychovka-na-stefana-2015/thumbs/Dychovka2015-'.$i.'.jpg') }}" />
        </a>
    @endfor
</div>

<div class="gallery mt-3 w-100">
    @for ($i=1; $i<=12; $i++)
        <a href="{{ asset('photo/bazilika/foto'.$i.'.jpg') }}" rel="gallery-item-2">
            <img src="{{ asset('photo/bazilika/thumbs/foto'.$i.'.jpg') }}" />
        </a>
    @endfor
</div>

<div class="gallery mt-3 w-100">
    @for ($i=1; $i<=24; $i++)
        <a href="{{ asset('photo/370-rocna-detva/Obrazok-'.$i.'.jpg') }}" rel="gallery-item-2">
            <img src="{{ asset('photo/370-rocna-detva/thumbs/Obrazok-'.$i.'.jpg') }}" />
        </a>
    @endfor
</div>


@once
    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/justified-gallery/css/justifiedGallery.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/blueimp-gallery/css/blueimp-gallery.min.css') }}" />
    @endpush

    @push('js')
        <script type="text/javascript" src="{{ asset('vendor/justified-gallery/js/jquery.justifiedGallery.min.js') }}"></script>
        {{-- <script type="text/javascript" src="{{ asset('vendor/blueimp-gallery/js/blueimp-helper.js') }}"></script> --}}
        <script type="text/javascript" src="{{ asset('vendor/blueimp-gallery/js/blueimp-gallery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/blueimp-gallery/js/blueimp-gallery-indicator.js') }}"></script>
        {{-- <script type="text/javascript" src="{{ asset('vendor/blueimp-gallery/js/blueimp-gallery-fullscreen.js') }}"></script> --}}
        {{-- <script type="text/javascript" src="{{ asset('vendor/blueimp-gallery/js/blueimp-gallery-video.js') }}"></script> --}}
        {{-- <script type="text/javascript" src="{{ asset('vendor/blueimp-gallery/js/blueimp-gallery-vimeo.js') }}"></script> --}}
        {{-- <script type="text/javascript" src="{{ asset('vendor/blueimp-gallery/js/blueimp-gallery-youtube.js') }}"></script> --}}
        {{-- <script type="text/javascript" src="{{ asset('vendor/blueimp-gallery/js/jquery.blueimp-gallery.js') }}"></script> --}}
        <script>
            $('.gallery').each(function (i, el) {
                $(el).justifiedGallery({
                    rel: 'gallery-item-' + i,
                    lastRow : 'hide',
                    rowHeight : 150,
                    margins : 2,
                    // border: -1,
                }).on('jg.complete', function () {
                    $(this).on('click', function(event) {
                        event = event || window.event;
                        var target = event.target || event.srcElement;
                        var link = target.src ? target.parentNode : target;
                        var options = { index: link, event: event };
                        var links = this.getElementsByTagName('a');
                        blueimp.Gallery(links, options);
                    });
                });
            });
        </script>
    @endpush

    @push('body')
        <!-- The Gallery as lightbox dialog, should be a document body child element -->
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
    @endpush

@endonce
