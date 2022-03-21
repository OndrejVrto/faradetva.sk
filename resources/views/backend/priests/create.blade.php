@extends('backend._layouts.app')

@section('title', __('backend-texts.priests.title'))
@section('meta_description', __('backend-texts.priests.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('priests.create') }}
@stop

@section('content')
    @include('backend.priests.form')
@endsection
