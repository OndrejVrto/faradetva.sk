@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.files_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.files_description_edit') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('files.edit', $file, $file->name )}}
@stop

@section('content')
    @include('backend.files.form')
@endsection
