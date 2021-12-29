@extends('_layouts.app')

@section('title', 'Kňaz - Editovanie')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia kňaza" />
@stop

@section('content_header')
    <h1>Duchovný - editovanie</h1>
@stop

@section('content')

	@include('priests.form', [ 'type' => 'edit' ])

@endsection
