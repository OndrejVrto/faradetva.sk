@extends('admin._layouts.app')

@section('title', __('backend-texts.prayers.title'))
@section('meta_description', __('backend-texts.prayers.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('prayers.create') }}
@stop

@section('content')
    @include('admin.prayers.form')
@endsection
