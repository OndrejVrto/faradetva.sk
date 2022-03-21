@extends('backend._layouts.app')

@section('title', __('backend-texts.static-pages.title'))
@section('meta_description', __('backend-texts.static-pages.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('static-pages.create') }}
@stop

@section('content')
    @include('backend.static-pages.form')
@endsection
