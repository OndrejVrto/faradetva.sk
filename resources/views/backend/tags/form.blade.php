@php
	$typeForm = $linkActionEdit = $created_info = $created_by = $updated_info = $updated_by = null;

	$linkBack = route('tags.index');
	$linkActionCreate = route('tags.store');
	$columns = 6;
	$columnsSaveButton = 6;

	if ( isset( $tag ) ) {
		$typeForm = 'edit';
		$linkActionEdit = route('tags.update', $tag->id);
		$created_info = $tag->created_info;
		$created_by = $tag->created_by;
		$updated_info = $tag->updated_info;
		$updated_by = $tag->updated_by;
	}
@endphp

<x-admin-form 	columns="{{ $columns }}" columnsSaveButton="{{ $columnsSaveButton }}" typeForm="{{ $typeForm }}"
				linkActionCreate="{{ $linkActionCreate }}" linkBack="{{ $linkBack }}" linkActionEdit="{{ $linkActionEdit }}"
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
