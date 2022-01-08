@php
	$controlerName = 'tags';
	$columns = 6
	$upload_files = 'true';

	$typeForm = $identificatorEdit = $created_info = $created_by = $updated_info = $updated_by = null;
	if ( isset( $tag ) ) {
		$typeForm = 'edit';
		$identificatorEdit = $tag->id;
		$created_info = $tag->created_info;
		$created_by = $tag->created_by;
		$updated_info = $tag->updated_info;
		$updated_by = $tag->updated_by;
	}
@endphp

<x-admin-form 	controlerName="{{ $controlerName }}" columns="{{ $columns }}" typeForm="{{ $typeForm }}" files="{{ $upload_files }}" identificatorEdit="{{ $identificatorEdit }}"
				createdInfo="{{ $created_info }}"  createdBy="{{ $created_by }}" updatedInfo="{{ $updated_info }}" updatedBy="{{ $updated_by }}">

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

</x-admin-form>
