@extends('backend._layouts.app')

@section('title', __('backend-texts.users.title'))
@section('meta_description', __('backend-texts.users.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('users.create') }}
@stop

@section('content')
    @include('backend.users.form')
@endsection
