@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.banners_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.banners_description_edit') )
@section('content_header', config('farnost-detva.admin_texts.banners_header_edit' ))

@section('content_breadcrumb')
	{{ Breadcrumbs::render('banners.edit', $banner, $banner->title )}}
@stop

@section('content')
	@include('backend.banners.form', [ 'type' => 'edit' ])
@endsection
