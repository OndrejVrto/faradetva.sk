@extends('_layouts.app')

@section('title', 'Administrácia - vytvorenie novej Kategórie')

@section('meta-tags')
	<meta name="description" content="Administrácia - vytvorenie novej Kategórie" />
@stop

@section('content_header')
    <h1>Nová kategória</h1>
@stop

@section('content')

	@include('categories.form', [
		'type' => 'create',
		'button_text' => 'Vytvoriť kategóriu'
	])

@endsection
