@extends('frontend._layouts.page')

@section('title', 'Hľadať' )
@section('meta_description', 'Vyhľadávanie medzi čLánkami.' )
@section('content_header', 'Hľadaný výraz: XXX' )

{{-- @section('content_breadcrumb')
    {{ Breadcrumbs::render('article.show', $oneNews, $oneNews->title )}}
@stop --}}

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
    <script src="{{ asset('asset/frontend/js/mainPDF.js') }}"></script>
@endpush

@section('content')
    <div class="section">
        <div class="container">

            @foreach ($notices as $notice)

                <div class="col-md-11 col-lg-10 col-xl-9 m-auto">
                    <div class="notice_heading_section">
                        <h1>{{ $notice->title }}</h1>
                        <div class="d-flex justify-content-evenly mt-3">
                            <button class="btn bg-warning text-dark bg-opacity-50 px-3 py-1" onclick="main{{ $loop->iteration }}.showPrevPage()">
                                Predošlá strana
                            </button>
                            <button class="btn bg-warning text-dark bg-opacity-50 px-3 py-1" onclick="main{{ $loop->iteration }}.showNextPage()">
                                Ďalšia strana
                            </button>
                        </div>
                    </div>
                    <div class="blog_info">
                        <a href="{{ $notice->getFirstMedia('notice_pdf')->getFullUrl() }}" target="_blank" rel="noopener noreferrer">
                            <i class="far fa-save"></i>
                            Link na stiahnutie
                        </a>
                    </div>
                </div>
                <div class="col-md-11 col-lg-10 col-xl-9 m-auto pb-2">
                    <canvas id="pdfArea{{ $loop->iteration }}" class="pdfArea justify-content-center w-100">
                    </canvas>
                </div>

                @push('js')
                    <script>
                        let main{{ $loop->iteration }} = new Main("{{ $notice->getFirstMedia('notice_pdf')->getUrl() }}", "#pdfArea{{ $loop->iteration }}");
                    </script>
                @endpush
            @endforeach

        </div>
    </div>
@endsection
