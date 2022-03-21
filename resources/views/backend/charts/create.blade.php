@extends('backend._layouts.app')

@section('title', __('backend-texts.charts.title'))
@section('meta_description', __('backend-texts.charts.description_create'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('charts.create') }}
@stop

@section('content')
    @include('backend.charts.form')
@endsection
