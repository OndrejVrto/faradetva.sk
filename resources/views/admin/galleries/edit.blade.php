@extends('admin._layouts.app')

@section('title', __('backend-texts.galleries.title'))
@section('meta_description', __('backend-texts.galleries.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('galleries.edit', false, $gallery, $gallery->title )}}
@stop

@section('content')
    @include('admin.galleries.form')
@endsection
