@extends('_layouts.app')

@section('title', 'Svedectvo - Editovanie')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia svedectva" />
@stop

@section('content_header')
    <h1>Svedectvo viery - editovanie</h1>
@stop

@section('content')

	@include('testimonials.form', [
		'type' => 'edit',
		'button_text' => 'Upraviť svedectvo'
	])

@endsection
