@extends('frontend._layouts.page')

@section('title', 'TODO')
@section('description', 'TODO')
@section('keywords', 'TODO')

@prepend('content_header')
    {{-- Begin of the all static pages --}}
    {{-- @include('frontend._sections.banner', ['mainTitle' => 'TODO']) --}}
@endprepend

@push('content_footer')
    {{-- End of the all static pages --}}
@endpush

{{-- Header content static pages--}}
@prepend('content_prepend')
    <div class="section static-page pad_t_50 pad_b_50">
        <div class="container">

            <div class="heading_section wh_headline">
                <h1>TODO</h1>
            </div>
@endprepend

{{-- Footer content static pages--}}
@push('content_append')
        </div>
    </div>
@endpush
