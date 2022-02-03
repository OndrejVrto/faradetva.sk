@props([
    // 'title' => null,
    'title' => 'Album',
])
<div class="ch_about_desc">
    @isset($title)
        <h3 class="fromright wow" data-wow-delay="0.4s">{{ $title }}</h3>
    @endisset
    <div class="gallery w-100">
        @for ($i=1; $i<=11; $i++)
            <a
                rel="gallery-item-1"
                href="{{ asset('photo/dychovka-na-stefana-2015/Dychovka2015-'.$i.'.jpg') }}"
                {{-- data-srcset="images/banana-800w.jpg 800w,
                        images/banana-1024w.jpg 1024w,
                        images/banana-1600w.jpg 1600w"
                data-sizes="(min-width: 990px) 990px, 100vw" --}}
                title="Naspis ALT-{{ $i }}"
            >
                <img alt="ALT-{{ $i }}" src="{{ asset('photo/dychovka-na-stefana-2015/thumbs/Dychovka2015-'.$i.'.jpg') }}" />
            </a>
        @endfor
    </div>
</div>

<div class="ch_about_desc">
    @isset($title)
        <h3 class="fromright wow" data-wow-delay="0.4s">{{ $title }}</h3>
    @endisset
    <div class="gallery w-100">
        @for ($i=1; $i<=12; $i++)
            <a href="{{ asset('photo/bazilika/foto'.$i.'.jpg') }}" rel="gallery-item-2">
                <img src="{{ asset('photo/bazilika/thumbs/foto'.$i.'.jpg') }}" />
            </a>
        @endfor
    </div>
</div>


<div class="ch_about_desc">
    @isset($title)
        <h3 class="fromright wow" data-wow-delay="0.4s">{{ $title }}</h3>
    @endisset
    <div class="gallery w-100">
        @for ($i=1; $i<=24; $i++)
            <a href="{{ asset('photo/370-rocna-detva/Obrazok-'.$i.'.jpg') }}" rel="gallery-item-2">
                <img src="{{ asset('photo/370-rocna-detva/thumbs/Obrazok-'.$i.'.jpg') }}" />
            </a>
        @endfor
    </div>
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
                    // lastRow : 'center',
                    lastRow : 'hide',
                    // lastRow : 'nojustify',
                    // lastRow : 'justify',
                    rowHeight : 140,
					maxRowHeight: 200,
                    margins : 4,
                    border: 0,
                }).on('jg.complete', function () {
                    $(this).on('click', function(event) {
                        event = event || window.event;
                        var target = event.target || event.srcElement;
                        var link = target.src ? target.parentNode : target;
                        var links = this.getElementsByTagName('a');
                        var options = {
                            index: link,
                            event: event,
                        };
                        blueimp.Gallery(links, options);
                    });
                });
            });
        </script>
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
