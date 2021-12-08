@extends('_layouts.app')

@section('title', 'Kategória - Editovanie')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia Kategórie" />
@stop

@section('content_header')
    <h1>Kategória - Editovanie</h1>
@stop

@section('content')

	@include('categories.form', [
		'type' => 'edit',
		'button_text' => 'Upraviť kategóriu'
	])

@endsection
