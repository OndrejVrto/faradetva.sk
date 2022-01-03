@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.testimonials_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.testimonials_description') )
@section('content_header', config('farnost-detva.admin_texts.testimonials_header') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('admin.home') }}
@stop

@section('content')
	<h3 class="text-muted">(TODO) </h3>
@stop

