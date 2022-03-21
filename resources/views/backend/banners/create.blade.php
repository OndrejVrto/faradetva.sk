@extends('backend._layouts.app')

@section('title', __('backend-texts.banners.title'))
@section('meta_description', __('backend-texts.banners.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('banners.create') }}
@stop

@section('content')
    @include('backend.banners.form')
@endsection
