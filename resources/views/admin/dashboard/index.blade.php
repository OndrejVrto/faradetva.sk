@extends('admin._layouts.app')

@section('title', __('backend-texts.dashboard.title'))
@section('meta_description', __('backend-texts.dashboard.description'))

@section('content')

    {{-- <div class="row"> --}}
        {{-- <div class="col"> --}}
            {{-- @include('admin.dashboard.partials.health') --}}
        {{-- </div> --}}
    {{-- </div> --}}

    {{-- @include('admin.dashboard.partials.check-gates') --}}

    <div class="row pt-3">
        <div class="col-xl-3 order-xl-2">
            <div class="row">
                <div class="col-md-6 col-xl-12">
                    @include('admin.dashboard.partials.test-features')
                </div>
                <div class="col-md-6 col-xl-12">
                    @include('admin.dashboard.partials.optimize')
                </div>
                <div class="col-md-6 col-xl-12">
                    @include('admin.dashboard.partials.cache')
                </div>
                <div class="col-md-6 col-xl-12">
                    @include('admin.dashboard.partials.crawl-url')
                </div>
                <div class="col-md-6 col-xl-12">
                    @include('admin.dashboard.partials.queue')
                </div>
                <div class="col-md-6 col-xl-12">
                    @include('admin.dashboard.partials.phpinfo')
                </div>
            </div>
        </div>
        <div class="col-xl-9 order-xl-1">
            {{-- @include('admin.dashboard.partials.list-pages') --}}
            @include('admin.dashboard.partials.health')
        </div>
    </div>

    {{-- @include('admin.dashboard.partials.background-picture') --}}
@stop

