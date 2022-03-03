@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.priests_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.priests_description_create') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('priests.create') }}
@stop

@section('content')
    @include('backend.priests.form')
@endsection
