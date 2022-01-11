@extends('frontend._layouts.page')

@section('title', 'TODO')
@section('description', 'TODO')
@section('keywords', 'TODO')

@prepend('content_header')
    @include('frontend._sections.banner', ['mainTitle' => 'TODO'])
@endprepend

@push('content_footer')
    @include('frontend._sections.banner', ['mainTitle' => 'TODO footer'])
@endpush

@prepend('content_prepend')
    <!-- Static page Start -->
    <div class="section static-page pad_t_50 pad_b_50">
        <div class="container">

            <!-- heading Start -->
            <div class="heading_section wh_headline">
                <h1>TODO</h1>
            </div>
            <!-- heading End -->
@endprepend

@push('content_append')
        </div>
    </div>
@endpush
