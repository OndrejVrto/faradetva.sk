@extends('backend._layouts.app')

@section('title', __('backend-texts.galleries.title'))
@section('meta_description', __('backend-texts.galleries.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.create') }}
@stop

@section('content')
    @include('backend.galleries.form')
@endsection
