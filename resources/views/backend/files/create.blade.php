@extends('backend._layouts.app')

@section('title', __('backend-texts.files.title'))
@section('meta_description', __('backend-texts.files.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('files.create') }}
@stop

@section('content')
    @include('backend.files.form')
@endsection
