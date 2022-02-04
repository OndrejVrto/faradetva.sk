@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.galleries_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.galleries_description_edit') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.edit', $gallery, $gallery->title )}}
@stop

@section('content')
    @include('backend.galleries.form')
@endsection
