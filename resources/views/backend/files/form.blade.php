@php
    $controlerName = 'files';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificatorEdit = null;
    if ( isset( $file ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $file->id;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificatorEdit="{{ $identificatorEdit }}"
    >

    <div class="form-row">
        <div class="col-xl-6">

            <x-adminlte-select2
                name="file_type_id"
                label="Typ dokumentu"
                data-placeholder="Vyber typ dokumrntu ..."
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-stream"></i>
                    </div>
                </x-slot>
                <option/>
                @if ($fileTypes->count())
                    @foreach($fileTypes as $typ)
                        <option
                            value="{{ $typ->id }}"
                            title="{{ $typ->description }}"
                            @if( $typ->id == ($file->file_types_id ?? '') OR $typ->id == old('file_types_id'))
                                selected
                            @endif
                            >
                            {{ $typ->name }}
                        </option>
                    @endforeach
                @endif
            </x-adminlte-select2>

        </div>
        <div class="col-xl-6">

            <x-adminlte-input
                fgroupClass=""
                name="name"
                label="Názov"
                placeholder="Názov dokumentu ..."
                enableOldSupport="true"
                value="{{ $file->name ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="far fa-flag"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>
    </div>

    <div class="form-row">
        <div class="col-xl-6">

            <x-adminlte-input
                fgroupClass=""
                name="author"
                label="Autor dokumentu"
                placeholder="Celé meno  ..."
                enableOldSupport="true"
                value="{{ $file->author ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="far fa-flag"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>
        <div class="col-xl-6">

            <x-adminlte-input
                fgroupClass=""
                name="copywright"
                label="Copywright"
                placeholder="Akú online licenciu má dokument"
                enableOldSupport="true"
                value="{{ $file->copywright ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="far fa-flag"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

        </div>
    </div>

    <x-adminlte-input
        fgroupClass=""
        name="description"
        label="Popis dokumentu"
        placeholder="Obsah dokumentu jednou vetou ..."
        enableOldSupport="true"
        value="{{ $file->description ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-flag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input-file
        class="border-right-none"
        name="file"
        label="Obrázok alebo dokument"
        {{-- TODO: --}}
        {{-- placeholder="{{ $file->media_file_name ?? 'Vložiť obrázok ...' }}" --}}
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: veľkosť dokuemntu maximálne 10MB.
        </x-slot>
    </x-adminlte-input-file>

</x-admin-form>

