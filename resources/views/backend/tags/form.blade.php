<div class="row">
	<div class="col-12 col-xl-6 mx-auto">
		<div class="card">

			<div class="card-body">

				@if ( $type == 'edit')
					<form id="edit-form" method="post" action="{{ route('tags.update', $tag->id) }}">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ route('tags.store') }}">
				@endif

					@csrf

					<x-adminlte-input
						name="title"
						label="Kľúčové slovo"
						placeholder="Jediné slovo"
						enableOldSupport="true"
						value="{{ $tag->title ?? '' }}"
						>
						<x-slot name="prependSlot">
							<div class="input-group-text bg-gradient-orange">
								<i class="fas fa-tag"></i>
							</div>
						</x-slot>
					</x-adminlte-input>

					<x-adminlte-input
						name="description"
						label="Popis"
						placeholder="Stručný popis ..."
						enableOldSupport="true"
						value="{{ $tag->description ?? '' }}"
						>
						<x-slot name="prependSlot">
							<div class="input-group-text bg-gradient-orange">
								<i class="fas fa-scroll"></i>
							</div>
						</x-slot>
					</x-adminlte-input>

					<div class="vstack gap-2 col-md-5 col-xl-4 mx-auto mt-5">
						<button type="submit" class="btn btn-primary btn-block">
							<i class="far fa-lg fa-save mr-2"></i>
							Uložiť
						</button>
						<a href="{{ route('tags.index') }}" class="btn btn-outline-secondary btn-block">
							Späť
						</a>
					</div>

				</form>
			</div>

			@if ( $type == 'edit' )
				<div class="card-footer text-muted d-flex flex-column flex-sm-row small">
					<div class="mr-auto">
						<span class="small mr-2">Vytvorené:</span> {{ $tag->created_info }}
						<br>
						<span class="small mr-2">Vytvoril:</span> {{ $tag->created_by }}
					</div>
					<div class="mt-2 mt-sm-0">
						<span class="small mr-2">Naposledy upravené:</span> {{ $tag->updated_info }}
						<br>
						<span class="small mr-2">Upravil:</span> {{ $tag->updated_by }}
					</div>
				</div>
			@endif

		</div>
	</div>
</div>
