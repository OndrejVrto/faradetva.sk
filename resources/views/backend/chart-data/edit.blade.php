@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.charts-data_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.charts-data_description_edit') )

@section('content_breadcrumb')
    {{-- {{  Breadcrumbs::render('charts.data.edit', false, $chart, $chart->title )}} --}}
@stop

@section('content')
    @include('backend.chart-data.form')
@endsection
