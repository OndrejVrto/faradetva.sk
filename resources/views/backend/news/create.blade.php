@extends('backend._layouts.app')

@section('title', __('backend-texts.news.title'))
@section('meta_description', __('backend-texts.news.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('news.create') }}
@stop

@section('content')
    @include('backend.news.form')
@endsection
