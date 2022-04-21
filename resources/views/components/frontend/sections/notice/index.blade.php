{{-- !! MUST BE IN FRONT !!--}}
    @pushOnce('js')
        <!-- NOTICE-PDF script Start -->
            <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.worker.min.js"></script>
            <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
            <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/mainPDF.js') }}"></script>
        <!-- NOTICE-PDF script End -->
    @endPushOnce
{{-- !! MUST BE IN FRONT !!--}}

<x-frontend.page.section
    name="NOTICE"
    class="TODO:"
>
    @push('js')
        <!-- NOTICE-PDF-{{ $typeNotice }} script Start -->
    @endpush

    @forelse ($notices as $notice)

        <div class="col-md-11 col-lg-10 col-xl-9 m-auto">
            <div class="notice_heading_section">
                <h3>{{ $notice['title'] }}</h3>
                <div class="d-flex justify-content-evenly align-items-center">
                    <button class="btn bg-warning text-dark bg-opacity-50 px-3 py-1" id="btn-prev-{{ $notice['id'] }}">
                        Predošlá strana
                    </button>
                    <div class="text-church-template fs-6" id="counter-{{ $notice['id'] }}"></div>
                    <button class="btn bg-warning text-dark bg-opacity-50 px-3 py-1" id="btn-next-{{ $notice['id'] }}">
                        Ďalšia strana
                    </button>
                </div>
            </div>
            <div class="blog_info">
                <a href="{{ $notice['url'] }}" target="_blank" rel="noopener noreferrer">
                    <i class="far fa-save"></i>
                    Link na stiahnutie
                </a>
            </div>
        </div>
        <div class="col-md-11 col-lg-10 col-xl-9 m-auto pb-2">
            <canvas
                id="pdfArea{{ $notice['id'] }}"
                class="pdfArea justify-content-center w-100">
            </canvas>
        </div>

        @push('js')
            <script @nonce>
                new Main(
                    "{{ $notice['url'] }}",
                    "#pdfArea{{ $notice['id'] }}",
                    "btn-prev-{{ $notice['id'] }}",
                    "btn-next-{{ $notice['id'] }}",
                    "counter-{{ $notice['id'] }}"
                );
            </script>
        @endpush
    @empty
        <div class="p-5 m-5">
            <h3>
                Aktuálne nieje zverejnený žiadny oznam.
            </h3>
            <p>
                Skúste hľadať informácie v
                <a class="text-church-template ms-2 me-3" href="{{ route('article.all') }}">článkoch</a>
                alebo
            </p>
            <div class="widget widget_search">
                <form id="search-form-all" class="search-form" action="{{ route('search.all') }}">
                    @csrf
                    <div class="form_group">
                        <label>
                            <input type="text" id="inputSearch" name="searchAll" class="search-field" placeholder="Hľadať na celej stránke ...">
                        </label>
                        <button type="submit" value="Search" class="search-submit">
                            Hľadať
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endforelse

    @push('js')
        <!-- NOTICE-PDF-{{ $typeNotice }} script End -->
    @endpush
</x-frontend.page.section>
