@extends('backend._layouts.app')

@section('title', __('backend-texts.charts-data.title'))
@section('meta_description', __('backend-texts.charts-data.description_edit'))

@section('content_breadcrumb')
    {{-- {{  Breadcrumbs::render('charts.data.edit', false, $chart, $chart->title )}} --}}
@stop

@section('content')
    @include('backend.chart-data.form')
@endsection
