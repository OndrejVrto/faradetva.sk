@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.pictures_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.pictures_description_create') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('pictures.create') }}
@stop

@section('content')
    @include('backend.pictures.form')
@endsection
