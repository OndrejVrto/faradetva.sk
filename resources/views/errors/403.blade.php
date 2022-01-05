@extends('frontend._layouts.master')

@section('title', 'Error 403')
@section('description', 'Je nám ľúto. K požadovanej stránke nemáte oprávnenia.')

@section('css_master')
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/bootstrap-5.1.3/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/frontend/css/responsive.css') }}">
@stop

@section('body')
	<div class="container d-flex min-vh-100">
		<div class="row w-100 justify-content-center align-self-center">

			<div class="col-md-6 p-5 p-lg-0 my-auto">
				<img src="{{ URL::asset('images/errors/403-error-forbidden-amico.svg') }}" class="mw-100" alt="Detektív s lupou hľadá chybu na stránke.">
			</div>
			<div class="col-md-7 col-lg-6 my-auto pb-5 pb-lg-0 text-center">
				<h1 class="display-1">403</h1>

				<h4>Vyzerá to tak, že k tejto stránke nemáte dostatočné oprávnenia.</h4>
				<p class="h5">
					Oslovte administrátora Ondreja
					<br>
					aby Vám pridelil príslušné práva.
				</p>

				<p class="pt-4">Medzitým choďťe</p>
				<a class="btn btn-outline-secondary" href="{{ URL::previous() }}" role="button">Späť</a>

				<div class="pt-5">
					<a class="link-danger" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						Alebo sa odhláste
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
