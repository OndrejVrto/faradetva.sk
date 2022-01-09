@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.dashboard_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.dashboard_description') )
{{-- @section('content_header', config('farnost-detva.admin_texts.dashboard_header') ) --}}

@section('content_breadcrumb')
    {{ Breadcrumbs::render('admin.home') }}
@stop

@section('content')
        @auth
            @role('Super Admin')
                <h1 class="text-danger text-center mark"> Ak vidíš tento text fungujú Gates správne a si Super-Admin.</h1>
            @endrole
        @endauth
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <img src="{{ URL::asset('images/backend/dashboard-visual-data-amico.svg') }}" class="w-100" alt="Sketch obrázok vizualizácie grafov na tabuľu.">
            </div>
        </div>
@stop

