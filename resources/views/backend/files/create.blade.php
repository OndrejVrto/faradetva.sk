@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.files_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.files_description_create') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('files.create') }}
@stop

@section('content')
    @include('backend.files.form')
@endsection
