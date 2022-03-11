@once
    @push('js')
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.worker.min.js"></script>
        <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
        <script @nonce type="text/javascript" src="{{ asset('asset/frontend/js/mainPDF.js') }}"></script>
    @endpush
@endonce

<!-- Notice section Start -->
    @forelse ($notices as $notice)

        <div class="col-md-11 col-lg-10 col-xl-9 m-auto">
            <div class="notice_heading_section">
                <h3>{{ $notice['title'] }}</h3>
                <div class="d-flex justify-content-evenly mt-3">
                    <button class="btn bg-warning text-dark bg-opacity-50 px-3 py-1" id="btn-prev-{{ $notice['id'] }}">
                        Predošlá strana
                    </button>
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
            <canvas id="pdfArea{{ $notice['id'] }}" class="pdfArea justify-content-center w-100">
            </canvas>
        </div>

        @push('js')
            <script @nonce>
                let main{{ $notice['id'] }} = new Main("{{ $notice['url'] }}", "#pdfArea{{ $notice['id'] }}");
                document.getElementById("btn-prev-{{ $notice['id'] }}").addEventListener('click', function(){
                    main{{ $notice['id'] }}.showPrevPage();
                });
                document.getElementById("btn-next-{{ $notice['id'] }}").addEventListener('click', function(){
                    main{{ $notice['id'] }}.showNextPage();
                });
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
<!-- Notice section End -->
