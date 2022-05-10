@extends('admin._layouts.app')

@section('title', __('backend-texts.dashboard.title'))
@section('meta_description', __('backend-texts.dashboard.description'))

@pushonce('js')
    <script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script @nonce>
        $(function () {
            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch();
            })
        })
    </script>
@endpushonce

@section('content')

    <div class="row pt-3">
        <div class="col-xl-3 order-xl-2">
            <div class="row">
                <div class="col-md-6 col-xl-12">
                    @include('admin.dashboard.partials.maintenance')
                </div>

                <div class="col-md-6 col-xl-12">
                    @include('admin.dashboard.partials.settings')
                </div>

                <div class="col-md-6 col-xl-12">
                    @include('admin.dashboard.partials.artisan')
                </div>


                {{-- <div class="col-md-6 col-xl-12">
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
                </div> --}}
            </div>
        </div>
        <div class="col-xl-9 order-xl-1">
            @include('admin.dashboard.partials.health')
        </div>
    </div>

@stop

