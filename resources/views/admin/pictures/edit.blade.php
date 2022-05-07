@extends('admin._layouts.app')

@section('title', __('backend-texts.pictures.title'))
@section('meta_description', __('backend-texts.pictures.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('pictures.edit', false, $picture, $picture->title )}}
@stop

@section('content')
    @include('admin.pictures.form')
@endsection
