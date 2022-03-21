@extends('backend._layouts.app')

@section('title', __('backend-texts.pictures.title'))
@section('meta_description', __('backend-texts.pictures.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('pictures.create') }}
@stop

@section('content')
    @include('backend.pictures.form')
@endsection
