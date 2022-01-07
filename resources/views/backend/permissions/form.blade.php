@php
	$controlerName = 'permissions';
	$columns = 6;
	$columnsSaveButton = 4;
	$upload_files = false;

	$typeForm = $identificatorEdit = $created_info = $created_by = $updated_info = $updated_by = null;
	if ( isset( $permission ) ) {
		$typeForm = 'edit';
		$identificatorEdit = $permission->id;
		$created_info = $permission->created_at;
		$updated_info = $permission->updated_at;
	}
@endphp

<x-admin-form 	controlerName="{{ $controlerName }}" columns="{{ $columns }}" columnsSaveButton="{{ $columnsSaveButton }}"
				typeForm="{{ $typeForm }}" files="{{ $upload_files }}" identificatorEdit="{{ $identificatorEdit }}"
				createdInfo="{{ $created_info }}"  createdBy="{{ $created_by }}" updatedInfo="{{ $updated_info }}" updatedBy="{{ $updated_by }}">

	<x-adminlte-input
		name="name"
		label="Povolenie"
		placeholder="Kód povolenia s použitím 'Wildcard'"
		enableOldSupport="true"
		value="{{ $permission->name ?? '' }}"
		>
		<x-slot name="prependSlot">
			<div class="input-group-text bg-gradient-orange">
				<i class="fas fa-key"></i>
			</div>
		</x-slot>
	</x-adminlte-input>

</x-admin-form>
