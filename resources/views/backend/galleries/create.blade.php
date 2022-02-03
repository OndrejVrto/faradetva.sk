@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.galleries_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.galleries_description_create') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.create') }}
@stop

@section('content')
    @include('backend.galleries.form')
@endsection
