@extends('_layouts.app')

@section('title', 'Administrácia - Pridanie nového kňaza')

@section('meta-tags')
	<meta name="description" content="Administrácia - pridanie nového kňaza" />
@stop

@section('content_header')
    <h1>Nový duchovný</h1>
@stop

@section('content')

	@include('priests.form', [
		'type' => 'create',
		'button_text' => 'Pridať kňaza'
	])

@endsection
