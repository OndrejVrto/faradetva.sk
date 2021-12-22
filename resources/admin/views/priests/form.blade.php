<div class="row pt-xl-5">
	<div class="col-12 col-xl-6 m-auto">
		<div class="card">
			<div class="card-body">

				@if ( $type == 'edit')
					<form id="edit-form" method="post" action="{{ route('priests.update', $priest->id) }}">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ route('priests.store') }}">
				@endif

					@csrf

					<div class="icheck-secondary" title="Zaškrtni keď chceš aby sa zobrazoval kňaz na stránke.">
						<input type="checkbox" name="active" {{ old('active') ? 'checked' : '' }}>
						<label for="active">
							Aktívny kňaz
						</label>
					</div>

					<x-adminlte-input name="titles_before" label="Titul pred menom" placeholder="Titul pred menom..." value="{{ $priest->titles_before ?? old('titles_before') }}" />

					<x-adminlte-input name="first_name" label="Meno" placeholder="Vlož meno ..." value="{{ $priest->first_name ?? old('first_name') }}" />

					<x-adminlte-input name="last_name" label="Priezvisko" placeholder="Vlož priezvisko ..." value="{{ $priest->last_name ?? old('last_name') }}" />

					<x-adminlte-input name="titles_after" label="Titul za menom" placeholder="Titul za menom..." value="{{ $priest->titles_after ?? old('titles_after') }}" />

					<x-adminlte-input name="function" label="Funkcia vo farnosti" placeholder="Akú funkciu zastáva ..." value="{{ $priest->function ?? old('function') }}" />

					<x-adminlte-textarea name="description" label="Krátky životopis" placeholder="krátky životopis ..." value="{{ $priest->description ?? old('description') }}" />

					<div class="row">
						<div class="col-8">
							<x-adminlte-button class="btn-flat btn-block" type="submit" label="{{ $button_text }}" theme="success" icon="fas fa-lg fa-save mr-2"/>
						</div>
						<div class="col-4">
							<a href="{{ route('priests.index') }}" class="btn btn-outline-secondary btn-flat btn-block">Späť</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
