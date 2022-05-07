@extends('admin._layouts.app')

@section('title', __('backend-texts.charts-data.title'))
@section('meta_description', __('backend-texts.charts-data.description_create'))

@section('content_breadcrumb')
    {{-- {{ Breadcrumbs::render('charts.data.create') }} --}}
@stop

@section('content')
    @include('admin.chart-data.form')
@endsection
