@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.static-pages_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.static-pages_description_create') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('static-pages.create') }}
@stop

@section('content')
    @include('backend.static-pages.form')
@endsection
