@extends('frontend._layouts.master')

@section('title', 'Error 404')
@section('description', 'Je nám ľúto. Požadovaná stránka neexistuje.')

@section('css_master')
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/responsive.css') }}">
@stop

@section('body')

		<div class="container vh-100">
			<div class="row position-absolute top-50 start-50 translate-middle">
				<div class="col-md-5 col-lg-6 p-5 p-lg-0">
					<img src="{{ URL::asset('images/errors/404-page-not-found.svg') }}" class="mw-100" alt="Detektív s lupou hľadá chybu na stránke.">
				</div>
				<div class="col-md-7 col-lg-6 my-auto pb-5 pb-lg-0 text-center">
					<h1 class="display-1">404</h1>
					<h4>Vyzerá to tak, že táto stránka chýba.</h4>
					<p class="h5">Nebojte sa, náš najlepší detektív <br> na tom už pracuje.</p>
					<p class="pt-4">Medzitým skúste ísť</p>
					<a class="btn btn-outline-secondary" href="{{ route('home') }}" role="button">Domov</a>
				</div>
			</div>
		</div>

@endsection
