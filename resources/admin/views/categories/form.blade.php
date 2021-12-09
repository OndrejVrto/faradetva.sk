<div class="row pt-xl-5">
	<div class="col-12 col-xl-6 m-auto">
		<div class="card push-top">
			<div class="card-body">

				@if ( $type == 'edit')
					<form method="post" action="{{ route('categories.update', $category->id) }}">
					@method('PATCH')
				@else
					<form method="post" action="{{ route('categories.store') }}">
				@endif

					@csrf
					<x-adminlte-input name="title" label="Titulok kategórie" placeholder="Názov kategórie ..." value="{{ $category->title ?? old('title') }}" />

					<x-adminlte-input name="description" label="Popis kategórie" placeholder="Popis ..." value="{{ $category->description ?? old('description') }}" />

					<div class="row">
						<div class="col-8">
							<x-adminlte-button class="btn-flat btn-block" type="submit" label="{{ $button_text }}" theme="success" icon="fas fa-lg fa-save mr-2"/>
						</div>
						<div class="col-4">
							<a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-flat btn-block">Späť</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
