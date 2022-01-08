@php
	$controlerName = 'testimonials';
	$columns = 7;
	$upload_files = 'true';

	$typeForm = $identificatorEdit = $created_info = $created_by = $updated_info = $updated_by = null;
	if ( isset( $testimonial ) ) {
		$typeForm = 'edit';
		$identificatorEdit = $testimonial->id;
		$created_info = $testimonial->created_info;
		$created_by = $testimonial->created_by;
		$updated_info = $testimonial->updated_info;
		$updated_by = $testimonial->updated_by;
	}
@endphp

<x-admin-form 	controlerName="{{ $controlerName }}" columns="{{ $columns }}" typeForm="{{ $typeForm }}" files="{{ $upload_files }}" identificatorEdit="{{ $identificatorEdit }}"
				createdInfo="{{ $created_info }}"  createdBy="{{ $created_by }}" updatedInfo="{{ $updated_info }}" updatedBy="{{ $updated_by }}">

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
		<x-slot name="noteSlot">
			Poznámka: veľkosť obrázka minimálne 100x100 px.
		</x-slot>
	</x-adminlte-input-file>

</x-admin-form>
