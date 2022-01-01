<div class="row">
	<div class="col-12 col-xl-7 mx-auto">
		<div class="card">

			<div class="card-body">

				@if ( $type == 'edit')
					<form id="edit-form" method="post" action="{{ route('testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
				@endif

					@csrf

					<div class="form-group">
						<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazovalo svedectvo na stránke.">
							<input
								type="checkbox"
								class="custom-control-input"
								id="customSwitch3"
								name="active"

								@if (!is_null(Session::get('testimonial_old_input_checkbox')))
									{{ Session::get('testimonial_old_input_checkbox') == 1 ? 'checked' : '' }}
								@else
									@if( isset($testimonial) )
										{{ $testimonial->active == 1 ? 'checked' : '' }}
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
								name="name"
								label="Meno alebo prezývka"
								placeholder="Vlož meno svedka ..."
								enableOldSupport="true"
								value="{{ $testimonial->name ?? '' }}"
								>
								<x-slot name="prependSlot">
									<div class="input-group-text bg-gradient-orange">
										<i class="fas fa-signature"></i>
									</div>
								</x-slot>
							</x-adminlte-input>
						</div>
						<div class="col-6">
							<x-adminlte-input
								name="function"
								label="Pracovná pozícia"
								placeholder="Akú prácu vykonáva svedok ..."
								enableOldSupport="true"
								value="{{ $testimonial->function ?? '' }}"
							>
								<x-slot name="prependSlot">
									<div class="input-group-text bg-gradient-orange">
										<i class="fas fa-briefcase"></i>
									</div>
								</x-slot>
							</x-adminlte-input>
						</div>
					</div>

					<x-adminlte-textarea
						name="description"
						label="Svedectvo (dve-tri vety)"
						enableOldSupport="true"
						rows="5"
						>
						<x-slot name="prependSlot">
							<div class="input-group-text bg-gradient-orange">
								<i class="fas fa-pen-nib"></i>
							</div>
						</x-slot>
							{{ $testimonial->description ?? '' }}
					</x-adminlte-textarea>

					<x-adminlte-input-file
						class="border-right-none"
						name="photo"
						label="Fotka svedka"
						placeholder="{{ $testimonial->media_file_name ?? 'Vložiť fotku ...' }}">
						<x-slot name="prependSlot">
							<div class="input-group-text bg-gradient-orange">
								<i class="fas fa-file-import"></i>
							</div>
						</x-slot>
					</x-adminlte-input-file>


					<div class="vstack gap-2 col-md-5 col-xl-4 mx-auto mt-5">
						<button type="submit" class="btn btn-primary btn-block">
							<i class="far fa-lg fa-save mr-2"></i>
							Uložiť
						</button>
						<a href="{{ route('testimonials.index') }}" class="btn btn-outline-secondary btn-block">
							Späť
						</a>
					</div>

				</form>
			</div>

			@if ( $type == 'edit' )
				<div class="card-footer text-muted d-flex flex-column flex-sm-row small">
					<div class="mr-auto">
						<span class="small mr-2">Vytvorené:</span> {{ $testimonial->created_info }}
						<br>
						<span class="small mr-2">Vytvoril:</span> {{ $testimonial->created_by }}
					</div>
					<div class="mt-2 mt-sm-0">
						<span class="small mr-2">Naposledy upravené:</span> {{ $testimonial->updated_info }}
						<br>
						<span class="small mr-2">Upravil:</span> {{ $testimonial->updated_by }}
					</div>
				</div>
			@endif

		</div>
	</div>
</div>
