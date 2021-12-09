<div class="row pt-xl-5">
	<div class="col-12 col-xl-6 m-auto">
		<div class="card push-top">
			<div class="card-body">

				@if ( $type == 'edit')
					<form id="edit-form" method="post" action="{{ route('tags.update', $tag->id) }}">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ route('tags.store') }}">
				@endif

					@csrf
					<x-adminlte-input name="title" label="Kľúčové slovo" placeholder="Jediné slovo" value="{{ $tag->title ?? old('title') }}" />

					<x-adminlte-input name="description" label="Popis" placeholder="Stručný popis ..." value="{{ $tag->description ?? old('description') }}" />

					<div class="row">
						<div class="col-8">
							<x-adminlte-button class="btn-flat btn-block" type="submit" label="{{ $button_text }}" theme="success" icon="fas fa-lg fa-save mr-2"/>
						</div>
						<div class="col-4">
							<a href="{{ route('tags.index') }}" class="btn btn-outline-secondary btn-flat btn-block">Späť</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
