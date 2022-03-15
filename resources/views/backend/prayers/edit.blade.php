@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.prayers_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.prayers_description_edit') )

@section('content_breadcrumb')
    {{  Breadcrumbs::render('prayers.edit', false, $prayer, $prayer->title )}}
@stop

@section('content')
    @include('backend.prayers.form')
@endsection
