@php
    $controlerName = 'file-types';
    $columns = 6;
    $uploadFiles = 'false';

    $typeForm = $identificator = null;
    if ( isset( $fileType ) ) {
        $typeForm = 'edit';
        $identificator = $fileType->slug;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    >

    <x-adminlte-input
        fgroupClass=""
        name="name"
        label="Typ súboru"
        {{-- placeholder="Typ ..." --}}
        enableOldSupport="true"
        value="{{ $fileType->name ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-toilet-paper"></i>
            </div>
        </x-slot>
        @error('slug')
            <x-slot name="errorManual">
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

    <x-adminlte-input
        fgroupClass=""
        name="description"
        label="Popis typu súboru"
        {{-- placeholder="O aký typ dokumentu sa jedná jednou vetou ..." --}}
        enableOldSupport="true"
        value="{{ $fileType->description ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-scroll"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

</x-admin-form>
