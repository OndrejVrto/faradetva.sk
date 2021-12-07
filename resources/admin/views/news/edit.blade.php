@extends('_layouts.app')

@section('title', 'Editácia článku')
@section('description', 'Administrácia - Editácia článku')
@section('keywords', '')
@section('mainTitle', 'Článok - Editovanie')

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="card push-top">
				<div class="card-body">

					<form method="post" action="{{ route('news.update', $news->id) }}">
						@csrf
						@method('PATCH')

						<x-form-input name="title" label="Titulok článku" placeholder="Názov .." :default="$news->title"/>

						<x-form-textarea rows=15 name="content" label="Obsah článku" placeholder="Html kód článku ..." :default="$news->content"/>

						<div class="row px-5">
							<div class="col-8">
								<x-form-submit class="btn-block">Uložiť zmeny v článku</x-form-submit>
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


