@extends('admin._layouts.app')

@section('title', __('backend-texts.charts.title'))
@section('meta_description', __('backend-texts.charts.description_show'))

@section('content_breadcrumb')
    {{  Breadcrumbs::render('charts.show', false, $chart, $chart->title )}}
@stop

@php
    $controlerName = 'charts';
    $columns = 8;

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $chart ) ) {
        $typeForm = 'show';
        $identificator = $chart->slug;
    }
@endphp

@section('content')

    <x-admin.form
        controlerName="{{ $controlerName }}" columns="{{ $columns }}"
        typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
        createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        <x-partials.statistics-graph names="{{ $chart->slug }}"/>

    </x-admin.form>

@endsection
