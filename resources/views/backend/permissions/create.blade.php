@extends('backend._layouts.app')

@section('title', __('backend-texts.permissions.title'))
@section('meta_description', __('backend-texts.permissions.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('permissions.create') }}
@stop

@section('content')
    @include('backend.permissions.form')
@endsection
