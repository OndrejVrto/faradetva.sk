@php
    $controlerName = 'permissions';
    $columns = 6;
    $uploadFiles = 'false';

    $typeForm = $identificator = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $permission ) ) {
        $typeForm = 'edit';
        $identificator = $permission->id;
        $createdInfo = $permission->created_at;
        $updatedInfo = $permission->updated_at;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
>

    <x-adminlte-input
        name="name"
        label="Povolenie"
        {{-- placeholder="Pre kód povolenia môžete použiť aj 'Wildcard'" --}}
        enableOldSupport="true"
        value="{{ $permission->name ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-key"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Pre kód povolenia môžete použiť aj 'Wildcard'. (Napr. news.*)
        </x-slot>
    </x-adminlte-input>

</x-admin-form>
