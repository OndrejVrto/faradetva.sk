@extends('backend._layouts.app')

@section('title', __('backend-texts.dashboard.title'))
@section('meta_description', __('backend-texts.dashboard.description'))

@section('content')

    <div class="row">
        <div class="col">
            @include('backend.dashboard.partials.check-gates')
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 order-xl-2">
            <div class="row">
                <div class="col-md-6 col-xl-12">
                    @include('backend.dashboard.partials.optimize')
                </div>
                <div class="col-md-6 col-xl-12">
                    @include('backend.dashboard.partials.cache')
                </div>
                <div class="col-md-6 col-xl-12">
                    @include('backend.dashboard.partials.crawl-url')
                </div>
                <div class="col-md-6 col-xl-12">
                    @include('backend.dashboard.partials.queue')
                </div>
                <div class="col-md-6 col-xl-12">
                    @include('backend.dashboard.partials.phpinfo')
                </div>
            </div>
        </div>
        <div class="col-xl-7 order-xl-1">
            @include('backend.dashboard.partials.list-pages')
        </div>
    </div>

    @include('backend.dashboard.partials.background-picture')
@stop

