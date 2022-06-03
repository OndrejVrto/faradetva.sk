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
        <div class="col-xl-4 order-xl-2">
            <div class="row">
                <div class="col-sm-6 col-xl-12">
                    @include('admin.dashboard.partials.maintenance')
                    @include('admin.dashboard.partials.cache-settings')
                </div>

                <div class="col-sm-6 col-xl-12">
                    {{-- @include('admin.dashboard.partials.artisan') --}}
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            @include('admin.dashboard.partials.health')
        </div>
    </div>

@stop
