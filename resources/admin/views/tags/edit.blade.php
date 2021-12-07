@extends('_layouts.app')

@section('title', 'Tagy - Editácia Tagu')
@section('description', 'Administrácia - Editácia Tagu')
@section('keywords', '')
@section('mainTitle', 'Tag - Editovanie')

@section('content')

	<div class="row">
		<div class="col-12 col-xl-6 m-auto">
			<div class="card push-top">
				<div class="card-body">

					<form method="post" action="{{ route('tags.update', $tag->id) }}">
						@csrf
						@method('PATCH')

						<x-form-input name="title" label="Titulok tagu" placeholder="Názov Tagu ..." :default="$tag->title"/>

						<x-form-input name="description" label="Popis tagu" placeholder="Popis ..." :default="$tag->description"/>

						<div class="row">
							<div class="col-8">
								<x-form-submit class="btn-block">Upraviť Tag</x-form-submit>
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
