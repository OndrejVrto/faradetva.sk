@extends('_layouts.app')

@section('title', 'Editácia článku')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia článku" />
@stop

@section('content_header')
    <h1>Článok - Editovanie</h1>
@stop

@section('content')

	@include('news.form', [
		'type' => 'edit',
		'button_text' => 'Uložiť zmeny v článku'
	])

@endsection
