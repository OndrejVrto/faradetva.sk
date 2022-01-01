@extends('_layouts.app')

@section('title', config('farnost-detva.admin_texts.sliders_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.sliders_description_edit') )
@section('content_header', config('farnost-detva.admin_texts.sliders_header_edit' ))

@section('content_breadcrumb')
	{{ Breadcrumbs::render('sliders.edit', $slider, $slider->breadcrumb_teaser )}}
@stop

@section('content')
	@include('sliders.form', [ 'type' => 'edit' ])
@endsection
