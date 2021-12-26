<div class="row pt-xl-5">
	<div class="col-12 col-xl-7 m-auto">
		<div class="card">
			<div class="card-body">

				@if ( $type == 'edit')
					<form id="edit-form" method="post" action="{{ route('priests.update', $priest->id) }}" enctype="multipart/form-data">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ route('priests.store') }}" enctype="multipart/form-data">
				@endif

					@csrf

					<div class="form-group">
						<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazoval kňaz na stránke.">
							<input
								type="checkbox"
								class="custom-control-input"
								id="customSwitch3"
								name="active"

								@if (!is_null(Session::get('_old_input_checkbox')))
									{{ Session::get('_old_input_checkbox') == 1 ? 'checked' : '' }}
								@else
									@if( isset($priest) )
										{{ $priest->active == 1 ? 'checked' : '' }}
									@else
										checked
									@endif
								@endif

							>
							<label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
						</div>
					</div>

					<div class="form-row">
						<div class="col-6">
							<x-adminlte-input
								name="titles_before"
								label="Titul pred menom"
								placeholder="Titul pred menom..."
								enableOldSupport="true"
								value="{{ $priest->titles_before ?? '' }}"
							/>
						</div>
						<div class="col-6">
							<x-adminlte-input
								name="titles_after"
								label="Titul za menom"
								placeholder="Titul za menom..."
								enableOldSupport="true"
								value="{{ $priest->titles_after ?? '' }}"
							/>
						</div>
					</div>

					<div class="form-row">
						<div class="col-6">
							<x-adminlte-input
								name="first_name"
								label="Meno"
								placeholder="Krstné meno ..."
								enableOldSupport="true"
								value="{{ $priest->first_name ?? '' }}"
							/>
						</div>
						<div class="col-6">
							<x-adminlte-input
								name="last_name"
								label="Priezvisko"
								placeholder="Priezvisko ..."
								enableOldSupport="true"
								value="{{ $priest->last_name ?? '' }}"
							/>
						</div>
					</div>
					<div class="form-row">
						<div class="col-6">
							<x-adminlte-input
								name="function"
								label="Funkcia vo farnosti"
								placeholder="Akú funkciu zastáva ..."
								enableOldSupport="true"
								value="{{ $priest->function ?? '' }}"
							/>
						</div>
						<div class="col-6">
							<x-adminlte-input
								name="phone"
								label="Telefón"
								placeholder="Zadaj telefónne číslo ..."
								enableOldSupport="true"
								value="{{ $priest->phone ?? '' }}"
							/>
						</div>
					</div>

					<x-adminlte-textarea
						name="description"
						label="Krátky životopis"
						enableOldSupport="true">
							{{ $priest->description ?? '' }}
					</x-adminlte-textarea>

					<x-adminlte-input-file
						class="border-right-none"
						name="photo"
						label="Fotka"
						placeholder="{{ $priest->media_file_name ?? 'Vložiť fotku ..' }}">
						<x-slot name="prependSlot">
							<div class="input-group-text bg-gradient-red">
								<i class="fas fa-file-import"></i>
							</div>
						</x-slot>
					</x-adminlte-input-file>

					<div class="row">
						<div class="col-8">
							<x-adminlte-button
								class="btn-flat btn-block"
								type="submit"
								label="{{ $button_text }}"
								theme="success"
								icon="fas fa-lg fa-save mr-2"
							/>
						</div>
						<div class="col-4">
							<a 	href="{{ route('priests.index') }}"
								class="btn btn-outline-secondary btn-flat btn-block">
									Späť
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
