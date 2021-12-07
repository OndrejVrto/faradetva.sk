@extends('_layouts.app')

@section('title', 'Vytvorenie článku')
@section('description', 'Administrácia - vytvorenie nového článku')
@section('keywords', '')
@section('mainTitle', 'Nový článok')

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="card push-top">
				<div class="card-body">

					<form method="post" action="{{ route('news.store') }}">
						@csrf
						<div class="row">
							<div class="col-lg-8">
								<x-form-input name="title" label="Titulok článku" placeholder="Názov .." />

								<x-form-textarea rows=15 name="content" label="Obsah článku" placeholder="Html kód článku ..."/>
							</div>
							<div class="col-lg-4">
								<x-form-select name="category_id" label="Kategória článku" :options="$categories" />

								<x-form-group label="Tagy" inline>
								@foreach ( $tags as $tag )
									<x-form-checkbox class="mr-3" :value="$tag->id" name="tags[]" :label="$tag->title" :id="$tag->id"/>
								@endforeach
								</x-form-group>

								{{-- <x-form-select name="tags_id" multiple label="Tagy" :options="$tags" /> --}}
							</div>
						</div>
						<div class="row px-5">
							<div class="col-8">
								<x-form-submit class="btn-block">Vytvoriť nový článok</x-form-submit>
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
