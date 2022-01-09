@extends('frontend._layouts.master')

@section('title', 'Error 500')
@section('description', 'Chyba serveru.')

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
				<img
					id="freepik_stories-500-internal-server-error"
					src="{{ URL::asset('images/errors/500-internal-server-error-amico.svg') }}"
					class="w-100"
					alt="Chlapček rozmýšľa ako opraviť skrinku kvôli chybe číslo 500.">
			</div>
			<div class="col-md-6 my-auto pb-5 pb-lg-0 text-center">
				<h1 class="display-1">500</h1>
				<h4>
					Vyzerá to tak, že na serveri vznikla chyba.
					<br>
					Skúste chvíľku počkať, možno sa to opraví samo.
				</h4>

				<p class="pt-2">
					<p>
						Ak ste nedočkaví choďte
						<a class="ms-3 btn btn-outline-secondary" href="{{ route('home') }}" role="button">domov</a>
					</p>
				</p>

			</div>
		</div>
	</div>
@endsection

@push('js')
	<script type='text/javascript'>
		document.addEventListener('DOMContentLoaded', function () {
			window.setTimeout( document.querySelector('svg').classList.add('animated'),1000);
		})
	</script>
@endpush
