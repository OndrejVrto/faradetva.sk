@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.priests_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.priests_description_edit') )
@section('content_header', config('farnost-detva.admin_texts.priests_header_edit' ))

@section('content_breadcrumb')
	{{ Breadcrumbs::render('priests.edit', $priest, $priest->full_name_titles )}}
@stop

@section('content')
	@include('backend.priests.form', [ 'type' => 'edit' ])
@endsection
