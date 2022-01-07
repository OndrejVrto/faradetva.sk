@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.banners_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.banners_description_create') )
@section('content_header', config('farnost-detva.admin_texts.banners_header_create') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('banners.create') }}
@stop

@section('content')
	@include('backend.banners.form')
@endsection
