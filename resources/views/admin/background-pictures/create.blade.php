@extends('admin._layouts.app')

@section('title', __('backend-texts.background-pictures.title'))
@section('meta_description', __('backend-texts.background-pictures.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('background-pictures.create') }}
@stop

@section('content')
    @include('admin.background-pictures.form')
@endsection
