@php
	$config_select = [
		"placeholder" => "Vyber roly ...",
		"allowClear" => 'true',
	];
@endphp
@php
	$controlerName = 'users';
	$columns = 10;
	$upload_files = 'true';

	$typeForm = $identificatorEdit = $created_info = $created_by = $updated_info = $updated_by = null;
	if ( isset( $user ) ) {
		$typeForm = 'edit';
		$identificatorEdit = $user->id;
		$created_info = $user->created_info;
		$created_by = $user->created_by;
		$updated_info = $user->updated_info;
		$updated_by = $user->updated_by;
	}
@endphp

<x-admin-form 	controlerName="{{ $controlerName }}" columns="{{ $columns }}" typeForm="{{ $typeForm }}" files="{{ $upload_files }}" identificatorEdit="{{ $identificatorEdit }}"
				createdInfo="{{ $created_info }}"  createdBy="{{ $created_by }}" updatedInfo="{{ $updated_info }}" updatedBy="{{ $updated_by }}">

	<div class="form-row">
		<div class="col-6">

			<x-adminlte-input
				name="nick"
				label="Nick"
				placeholder="Prezývka ..."
				enableOldSupport="true"
				value="{{ $user->nick ?? '' }}"
				>
				<x-slot name="prependSlot">
					<div class="input-group-text bg-gradient-orange">
						<i class="fas fa-user"></i>
					</div>
				</x-slot>
			</x-adminlte-input>

		</div>
		<div class="col-6">

			<x-adminlte-input
				name="name"
				label="Celé meno"
				placeholder="Vlož meno ..."
				enableOldSupport="true"
				value="{{ $user->name ?? '' }}"
				>
				<x-slot name="prependSlot">
					<div class="input-group-text bg-gradient-orange">
						<i class="fas fa-signature"></i>
					</div>
				</x-slot>
			</x-adminlte-input>

		</div>
	</div>


	<div class="form-row">
		<div class="col-6">

			<x-adminlte-input
				name="password"
				label="Heslo"
				{{-- type="password" --}}
				placeholder="Vlož heslo ..."
				enableOldSupport="false"
				>
				<x-slot name="prependSlot">
					<div class="input-group-text bg-gradient-orange">
						<i class="fas fa-unlock-alt"></i>
					</div>
				</x-slot>
			</x-adminlte-input>

		</div>
		<div class="col-6">

			<x-adminlte-input
				name="password_confirmed"
				label="Heslo potvrdenie"
				{{-- type="password" --}}
				placeholder="Zopakuj heslo ..."
				enableOldSupport="false"
				>
				<x-slot name="prependSlot">
					<div class="input-group-text bg-gradient-orange">
						<i class="fas fa-unlock"></i>
					</div>
				</x-slot>
			</x-adminlte-input>

		</div>
	</div>


	<div class="form-row">
		<div class="col-6">

			<x-adminlte-input
				name="email"
				label="E-mail"
				placeholder="E-mail ..."
				enableOldSupport="true"
				value="{{ $user->email ?? '' }}"
				>
				<x-slot name="prependSlot">
					<div class="input-group-text bg-gradient-orange">
						<i class="fas fa-at"></i>
					</div>
				</x-slot>
			</x-adminlte-input>

		</div>
		<div class="col-6">

			<x-adminlte-input-file
				class="border-right-none"
				name="photo_avatar"
				label="Avatar"
				placeholder="{{ $user->media_file_name ?? 'Vložiť avatara ..' }}">
				<x-slot name="prependSlot">
					<div class="input-group-text bg-gradient-orange">
						<i class="fas fa-file-import"></i>
					</div>
				</x-slot>
				<x-slot name="noteSlot">
					Poznámka: veľkosť obrázka minimálne 100x100 px.
				</x-slot>
			</x-adminlte-input-file>

		</div>
	</div>


	<hr class="bg-orange">

	{{-- With multiple slots, and plugin config parameter --}}
	<x-adminlte-select2
		name="role[]"
		id="sel2Tag"
		label="Prideliť uživateľovi Roly alebo jednotlivé Povolenia"
		:config="$config_select"
		multiple
		>
		<x-slot name="prependSlot">
			<div class="input-group-text bg-gradient-orange">
				<i class="fas fa-chess-queen"></i>
			</div>
		</x-slot>

		@if ($roles->count())
			@foreach($roles as $role)
				<option
					value="{{ $role->id }}"
					title="{{ $role->name }}"
					@if( in_array($role->id, old("role") ?: []) OR in_array($role->id, $userRoles) )
						selected
					@endif
				>
					{{ $role->name }}
				</option>
			@endforeach
		@endif
	</x-adminlte-select2>


	<div class="form-group">
		<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby mal užívateľ všetky oprávnenia.">
			<input
				type="checkbox"
				class="custom-control-input"
				id="customSwitch3"
				name="all_permission"
			>
			<label class="custom-control-label" for="customSwitch3">Všetko</label>
		</div>
	</div>

	<div class="row no-gutters row-cols-1 row-cols-md-2 row-cols-xl-3">
		@foreach($permissions as $permission)
			<div class="col text-break">
				<input type="checkbox"
					name="permission[{{ $permission->id }}]"
					value="{{ $permission->id }}"
					class='d-inline permission m-2'
					{{ in_array($permission->id, $userPermissions)
						? 'checked'
						: '' }}
				>
				{{ $permission->name }}
			</div>
			@php
			@endphp
		@endforeach
	</div>


</x-admin-form>


@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }
            });
        });
    </script>
@endpush
