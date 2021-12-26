@extends('_layouts.app')

@section('title', 'Administrácia - Pridanie svedectva')

@section('meta-tags')
	<meta name="description" content="Administrácia - pridanie nového svedectva viery" />
@stop

@section('content_header')
    <h1>Nové svedectvo</h1>
@stop

@section('content')

	@include('testimonials.form', [
		'type' => 'create',
		'button_text' => 'Pridať svedectvo'
	])

@endsection
