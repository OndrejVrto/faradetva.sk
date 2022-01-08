@php
	$controlerName = 'categories';
	$columns = 6;
	$upload_files = 'false';

	$typeForm = $identificatorEdit = $created_info = $created_by = $updated_info = $updated_by = null;
	if ( isset( $category ) ) {
		$typeForm = 'edit';
		$identificatorEdit = $category->id;
		$created_info = $category->created_info;
		$created_by = $category->created_by;
		$updated_info = $category->updated_info;
		$updated_by = $category->updated_by;
	}
@endphp

<x-admin-form 	controlerName="{{ $controlerName }}" columns="{{ $columns }}" typeForm="{{ $typeForm }}" files="{{ $upload_files }}" identificatorEdit="{{ $identificatorEdit }}"
				createdInfo="{{ $created_info }}"  createdBy="{{ $created_by }}" updatedInfo="{{ $updated_info }}" updatedBy="{{ $updated_by }}">

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

</x-admin-form>
