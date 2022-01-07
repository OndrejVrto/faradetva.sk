@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.testimonials_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.testimonials_description_edit') )
@section('content_header', config('farnost-detva.admin_texts.testimonials_header_edit' ))

@section('content_breadcrumb')
	{{ Breadcrumbs::render('testimonials.edit', $testimonial, $testimonial->name )}}
@stop

@section('content')
	@include('backend.testimonials.form')
@endsection
