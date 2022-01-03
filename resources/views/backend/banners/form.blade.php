<div class="row">
	<div class="col-12 col-xl-7 mx-auto">
		<div class="card">

			<div class="card-body">

				@if ( $type == 'edit')
					<form id="edit-form" method="post" action="{{ route('banners.update', $banner->id) }}" enctype="multipart/form-data">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ route('banners.store') }}" enctype="multipart/form-data">
				@endif

					@csrf

					<div class="form-group">
						<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazoval banner na stránke.">
							<input
								type="checkbox"
								class="custom-control-input"
								id="customSwitch3"
								name="active"

								@if (!is_null(Session::get('banner_old_input_checkbox')))
									{{ Session::get('banner_old_input_checkbox') == 1 ? 'checked' : '' }}
								@else
									@if( isset($banner) )
										{{ $banner->active == 1 ? 'checked' : '' }}
									@else
										checked
									@endif
								@endif

							>
							<label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
						</div>
					</div>


					<x-adminlte-input
						fgroupClass="mb-1"
						name="title"
						label="Názov"
						placeholder="Názov baneru ..."
						enableOldSupport="true"
						value="{{ $banner->title ?? '' }}"
						>
						<x-slot name="prependSlot">
							<div class="input-group-text bg-gradient-orange">
								<i class="far fa-flag"></i>
							</div>
						</x-slot>
					</x-adminlte-input>

					<x-adminlte-input-file
						class="border-right-none"
						name="photo"
						label="Obrázok"
						placeholder="{{ $banner->media_file_name ?? 'Vložiť obrázok ...' }}">
						<x-slot name="prependSlot">
							<div class="input-group-text bg-gradient-orange">
								<i class="fas fa-file-import"></i>
							</div>
						</x-slot>
						<x-slot name="noteSlot">
							Poznámka: veľkosť obrázka minimálne 1920x480 px.
						</x-slot>
					</x-adminlte-input-file>


					<div class="vstack gap-2 col-md-5 col-xl-4 mx-auto mt-5">
						<button type="submit" class="btn btn-primary btn-block">
							<i class="far fa-lg fa-save mr-2"></i>
							Uložiť
						</button>
						<a href="{{ route('banners.index') }}" class="btn btn-outline-secondary btn-block">
							Späť
						</a>
					</div>

				</form>
			</div>
			@if ( $type == 'edit' )
				<div class="card-footer text-muted d-flex flex-column flex-sm-row small">
					<div class="mr-auto">
						<span class="small mr-2">Vytvorené:</span> {{ $banner->created_info }}
						<br>
						<span class="small mr-2">Vytvoril:</span> {{ $banner->created_by }}
					</div>
					<div class="mt-2 mt-sm-0">
						<span class="small mr-2">Naposledy upravené:</span> {{ $banner->updated_info }}
						<br>
						<span class="small mr-2">Upravil:</span> {{ $banner->updated_by }}
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
