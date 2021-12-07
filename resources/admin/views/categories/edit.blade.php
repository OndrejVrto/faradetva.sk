@extends('_layouts.app')

@section('title', 'Kategórie - Editácia')
@section('description', 'Administrácia - Editácia Kategórie')
@section('keywords', '')
@section('mainTitle', 'Kategória - Editovanie')

@section('content')

	<div class="row">
		<div class="col-12 col-xl-6 m-auto">
			<div class="card push-top">
				<div class="card-body">

					<form method="post" action="{{ route('categories.update', $category->id) }}">
						@csrf
						@method('PATCH')

						<x-form-input name="title" label="Titulok kategórie" placeholder="Názov kategórie ..." :default="$category->title"/>

						<x-form-input name="description" label="Popis kategórie" placeholder="Popis ..." :default="$category->description"/>

						<div class="row">
							<div class="col-8">
								<x-form-submit class="btn-block">Upraviť kategóriu</x-form-submit>
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
