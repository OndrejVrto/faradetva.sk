@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.pictures_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.pictures_description_edit') )

@section('content_breadcrumb')
    {{  Breadcrumbs::render('pictures.edit', false, $picture, $picture->title )}}
@stop

@section('content')
    @include('backend.pictures.form')
@endsection
