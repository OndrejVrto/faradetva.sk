@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.sliders_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.sliders_description_create') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('sliders.create') }}
@stop

@section('content')
    @include('backend.sliders.form')
@endsection
