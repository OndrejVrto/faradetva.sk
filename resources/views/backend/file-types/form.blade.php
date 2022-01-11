@php
    $controlerName = 'file-types';
    $columns = 6;
    $uploadFiles = 'false';

    $typeForm = $identificatorEdit = null;
    if ( isset( $fileType ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $fileType->id;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificatorEdit="{{ $identificatorEdit }}"
    >

    <x-adminlte-input
        fgroupClass=""
        name="name"
        label="Typ dokumentu"
        placeholder="Typ ..."
        enableOldSupport="true"
        value="{{ $fileType->name ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-flag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input
        fgroupClass=""
        name="description"
        label="Popis typu"
        placeholder="O aký typ dokumentu sa jedná jednou vetou ..."
        enableOldSupport="true"
        value="{{ $fileType->description ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-flag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

</x-admin-form>
