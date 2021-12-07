@extends('_layouts.app')

@section('title', 'Kategória - vytvorenie novej Kategórie')
@section('description', 'Administrácia - vytvorenie novej Kategórie')
@section('keywords', '')
@section('mainTitle', 'Nová kategória')

@section('content')

	<div class="row">
		<div class="col-12 col-xl-6 m-auto">
			<div class="card push-top">
				<div class="card-body">

					<form method="post" action="{{ route('categories.store') }}">
						@csrf

						<x-form-input name="title" label="Titulok kategórie" placeholder="Názov kategórie ..." />

						<x-form-input name="description" label="Popis kategórie" placeholder="Popis .."/>

						<div class="row">
							<div class="col-8">
								<x-form-submit class="btn-block">Vytvoriť kategóriu</x-form-submit>
							</div>
							<div class="col-4">
								<a href="{{ URL::previous() }}" class="btn btn-outline-secondary btn-block">Späť</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
