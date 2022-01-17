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

<!-- blog section Start -->
<div class="section">
    <div class="container">

        @foreach ($notices as $notice)

        <div class="col-md-11 col-lg-10 col-xl-9 m-auto">
                <div class="notice_heading_section">
                    <h1>{{ $notice->title }}</h1>
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn bg-warning text-dark bg-opacity-50 px-3 py-1" onclick="Main_{{ $loop->iteration }}.showPrevPage()">
                            Predchádzajúca strana
                        </button>
                        <button class="btn bg-warning text-dark bg-opacity-50 px-3 py-1" onclick="Main_{{ $loop->iteration }}.showNextPage()">
                            Ďalšia strana
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-11 col-lg-10 col-xl-9 m-auto py-2">
                <canvas id="pdfArea{{ $loop->iteration }}" class="pdfArea justify-content-center w-100">
                </canvas>
            </div>

            @push('js')
                <script>
                    let main_{{ $loop->iteration }} = new Main("{{ $notice->getFirstMedia('notice_pdf')->getUrl() }}", "#pdfArea{{ $loop->iteration }}");
                </script>
            @endpush
        @endforeach

    </div>
</div>
<!-- blog section End -->

@endsection
