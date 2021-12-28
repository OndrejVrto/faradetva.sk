@extends('_layouts.app')

@section('title', 'Svedectvá')

@section('meta-tags')
	<meta name="description" content="Administrácia - Editácia svedectva" />
@stop

@section('content_header')
    <h1>Úprava svedectva viery</h1>
@stop

@section('content')

	@include('testimonials.form', [ 'type' => 'edit' ])

@endsection
