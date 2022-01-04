@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.testimonials_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.testimonials_description_create') )
@section('content_header', config('farnost-detva.admin_texts.testimonials_header_create') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('testimonials.create') }}
@stop

@section('content')
	@include('backend.testimonials.form', [ 'type' => 'create' ])
@endsection
