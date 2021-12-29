@extends('_layouts.app')

@section('title', 'Článok')

@section('meta-tags')
	<meta name="description" content="Administrácia - vytvorenie nového článku" />
@stop

@section('content_header')
    <h1>Nový článok</h1>
@stop

@section('content')

	@include('news.form', [ 'type' => 'create' ])

@endsection
