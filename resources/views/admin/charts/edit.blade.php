@extends('admin._layouts.app')

@section('title', __('backend-texts.charts.title'))
@section('meta_description', __('backend-texts.charts.description_edit'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('charts.edit', false, $chart, $chart->title )}}
@stop

@section('content')
    @include('admin.charts.form')
@endsection
