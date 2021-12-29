@extends('_layouts.app')

@section('title', 'Článok')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia článku" />
@stop

@section('content_header')
    <h1>Úprava článku</h1>
@stop

@section('content')

	@include('news.form', [ 'type' => 'edit' ])

@endsection
