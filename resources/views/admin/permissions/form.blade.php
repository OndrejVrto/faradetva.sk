@php
    $controlerName = 'permissions';
    $columns = 6;
    $uploadFiles = 'false';

    $typeForm = $identificator = $createdInfo = $updatedInfo = null;
    if ( isset( $permission) ) {
        $typeForm = 'edit';
        $identificator = $permission->id;
        $createdInfo = $permission->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $permission->updated_at->format('d. m. Y \o H:i');
    }
@endphp

<x-admin.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <x-adminlte-input
        name="name"
        label="Povolenie"
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
        @error('slug')
            <x-slot name="errorManual">
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

</x-admin.form>
