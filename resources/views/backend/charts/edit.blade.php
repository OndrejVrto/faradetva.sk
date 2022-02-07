@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.charts_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.charts_description_edit') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('charts.edit', $chart, $chart->title )}}
@stop

@section('content')
    @include('backend.charts.form')
@endsection
