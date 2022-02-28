@extends('frontend._layouts.page')

@section('title', $pageData['title'] )
@section('description', $pageData['description'])
@section('keywords', $pageData['keywords'])
@section('author', $pageData['author'])

@prepend('content_header')
    {{-- Begin of the all static pages --}}
@endprepend

@push('content_footer')
    {{-- End of the all static pages --}}
@endpush

{{-- Header content static pages--}}
@prepend('content_prepend')
    <div class="section static-page pad_t_50 pad_b_50">
        <div class="container">

            <div class="heading_section wh_headline">
                <h1>{{ $pageData->header }}</h1>
            </div>
@endprepend

{{-- Footer content static pages--}}
@push('content_append')
        </div>
    </div>
@endpush
