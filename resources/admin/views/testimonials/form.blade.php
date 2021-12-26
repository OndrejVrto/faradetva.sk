<div class="row pt-xl-5">
	<div class="col-12 col-xl-7 m-auto">
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
						<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazoval kňaz na stránke.">
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
								label="Meno"
								placeholder="Vlož meno svedka..."
								enableOldSupport="true"
								value="{{ $testimonial->name ?? '' }}"
							/>
						</div>
						<div class="col-6">
							<x-adminlte-input
								name="function"
								label="Pracovná pozícia"
								placeholder="Akú prácu vykonáva svedok ..."
								enableOldSupport="true"
								value="{{ $testimonial->function ?? '' }}"
							/>
						</div>
					</div>

					<x-adminlte-textarea
						name="description"
						label="Svedectvo v troch vetách"
						enableOldSupport="true">
							{{ $testimonial->description ?? '' }}
					</x-adminlte-textarea>

					<x-adminlte-input-file
						class="border-right-none"
						name="photo"
						label="Fotka"
						placeholder="{{ $testimonial->media_file_name ?? 'Vložiť fotku ..' }}">
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
							<a 	href="{{ route('testimonials.index') }}"
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
