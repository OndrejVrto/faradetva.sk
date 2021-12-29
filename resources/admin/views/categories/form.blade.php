<div class="row pt-xl-3">
	<div class="col-12 col-xl-6 m-auto">
		<div class="card">

			<div class="card-body">

				@if ( $type == 'edit')
					<form id="edit-form" method="post" action="{{ route('categories.update', $category->id) }}">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ route('categories.store') }}">
				@endif

					@csrf

					<x-adminlte-input
						name="title"
						label="Titulok kategórie"
						placeholder="Názov kategórie ..."
						enableOldSupport="true"
						value="{{ $category->title ?? '' }}"
						>
						<x-slot name="prependSlot">
							<div class="input-group-text bg-gradient-orange">
								<i class="fas fa-stream"></i>
							</div>
						</x-slot>
					</x-adminlte-input>

					<x-adminlte-input
						name="description"
						label="Popis kategórie"
						placeholder="Popis ..."
						enableOldSupport="true"
						value="{{ $category->description ?? '' }}"
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
						<a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-block">
							Späť
						</a>
					</div>

				</form>
			</div>

			@if ( $type == 'edit' )
				<div class="card-footer text-muted d-flex flex-column flex-sm-row small">
					<div class="mr-auto">
						<span class="small mr-2">Vytvorené:</span> {{ $category->created_info }}
						<br>
						<span class="small mr-2">Vytvoril:</span> {{ $category->created_by }}
					</div>
					<div class="mt-2 mt-sm-0">
						<span class="small mr-2">Naposledy upravené:</span> {{ $category->updated_info }}
						<br>
						<span class="small mr-2">Upravil:</span> {{ $category->updated_by }}
					</div>
				</div>
			@endif

		</div>
	</div>
</div>
