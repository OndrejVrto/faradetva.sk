@php
    $controlerName = 'permissions';
    $columns = 6;
    $uploadFiles = 'false';

    $typeForm = $identificatorEdit = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $permission ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $permission->id;
        $createdInfo = $permission->created_at;
        $updatedInfo = $permission->updated_at;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificatorEdit="{{ $identificatorEdit }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
>

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
