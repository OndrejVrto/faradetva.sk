@extends('backend._layouts.app')

@section('title', __('backend-texts.roles.title'))
@section('meta_description', __('backend-texts.roles.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('roles.create') }}
@stop

@section('content')
    @include('backend.roles.form')
@endsection
