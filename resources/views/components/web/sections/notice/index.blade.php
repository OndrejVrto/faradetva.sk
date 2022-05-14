<x-web.page.section
    name="NOTICE"
>
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
                    <i class="fa-regular fa-save"></i>
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

        @php
            $scripts[] = sprintf(
                "new generatePdf('%s', '#pdfArea%s', 'btn-prev-%s', 'btn-next-%s', 'counter-%s');",
                $notice['url'],
                $notice['id'],
                $notice['id'],
                $notice['id'],
                $notice['id']
            );
        @endphp

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

</x-web.page.section>

@pushOnce('js')
    <!-- NOTICE-PDF script Start -->
    <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.worker.min.js"></script>
    <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
    <script @nonce type="text/javascript" src="{{ asset(mix('asset/app-pdf.js'), true) }}"></script>
    <!-- NOTICE-PDF script End -->
@endPushOnce

@push('js')
    <!-- NOTICE-PDF-{{ $typeNotice }} script Start -->
    <script @nonce>
        {!! implode(PHP_EOL."\t", $scripts ?? null) !!}
    </script>
    <!-- NOTICE-PDF-{{ $typeNotice }} script End -->
@endpush
