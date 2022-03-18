@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.charts_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.charts_description_show') )

@section('content_breadcrumb')
    {{  Breadcrumbs::render('charts.show', false, $chart, $chart->title )}}
@stop

@php
    $controlerName = 'charts';
    $columns = 8;

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $chart ) ) {
        $typeForm = 'show';
        $identificator = $chart->id;
    }
@endphp

@section('content')

    <x-backend.form
        controlerName="{{ $controlerName }}" columns="{{ $columns }}"
        typeForm="{{ $typeForm }}"  identificator="{{ $identificator }}"
        createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}">

        <x-partials.statistics-graph name="{{ $chart->slug }}"/>

    </x-backend.form>

@endsection
