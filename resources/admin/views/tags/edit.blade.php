@extends('_layouts.app')

@section('title', 'Tag - Editovanie')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia Tagu" />
@stop

@section('content_header')
    <h1>Tagy - Editovanie</h1>
@stop

@section('content')

	@include('tags.form', [
		'type' => 'edit',
		'button_text' => 'Upraviť Tag'
	])

@endsection
