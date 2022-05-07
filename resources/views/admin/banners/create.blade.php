@extends('admin._layouts.app')

@section('title', __('backend-texts.banners.title'))
@section('meta_description', __('backend-texts.banners.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('banners.create') }}
@stop

@section('content')
    @include('admin.banners.form')
@endsection
