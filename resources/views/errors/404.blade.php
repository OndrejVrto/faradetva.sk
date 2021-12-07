@extends('_layouts.blank')

@section('title', 'Farnosť Detva - Chyba 404')
@section('description', 'Popis')
@section('keywords', 'Slová')

@push('style')
	<link href="{{ mix('css/main.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('contentBlank')

		<div class="container vh-100">
			<div class="row position-absolute top-50 start-50 translate-middle">
				<div class="col-lg-6 p-5 p-lg-0">
					<img src="{{ URL::asset('images/404/page-not-found.svg') }}" class="mw-100" alt="Detektív s lupou hľadá chybu na stránke.">
				</div>
				<div class="col-lg-6 my-auto pb-5 pb-lg-0 text-center">
					<h1 class="display-1">404</h1>
					<h4>Vyzerá to tak, že táto stránka chýba.</h4>
					<p class="h5">Nebojte sa, náš najlepší detektív <br> na tom už pracuje.</p>
					<p class="pt-4">Medzitým skúste ísť</p>
					<a class="btn btn-outline-secondary" href="{{ route('home') }}" role="button">Domov</a>
				</div>
			</div>
		</div>

@endsection
