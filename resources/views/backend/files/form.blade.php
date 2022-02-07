@php
    $controlerName = 'files';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificator = null;
    if ( isset( $file ) ) {
        $typeForm = 'edit';
        $identificator = $file->id;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    >

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
            Poznámka: Veľkosť dokumentu maximálne 10MB.
        </x-slot>
    </x-adminlte-input-file>

    <div class="form-row">
        <div class="col-xl-6">
            <x-adminlte-select2
                name="static_page_id"
                label="Stránka ku ktorej je tento súbor priradený"
                {{-- data-placeholder="Vyber stránku ..." --}}
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fab fa-pagelines fa-lg"></i>
                    </div>
                </x-slot>
                <option/>
                @if ($pages->count())
                    @foreach($pages as $page)
                        <option
                            value="{{ $page->id }}"
                            title="{{ $page->description }}"
                            @if( $page->id == ($file->static_page_id ?? '') OR $page->id == old('static_page_id'))
                                selected
                            @endif
                            >
                            {{ $page->title }}
                        </option>
                    @endforeach
                @endif
            </x-adminlte-select2>
        </div>
        <div class="col-xl-6">
            <x-adminlte-select2
                name="file_type_id"
                label="Typ obsahu súboru"
                {{-- data-placeholder="Vyber typ dokumentu ..." --}}
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-icons fa-lg"></i>
                    </div>
                </x-slot>
                <option/>
                @if ($fileTypes->count())
                    @foreach($fileTypes as $typ)
                        <option
                            value="{{ $typ->id }}"
                            title="{{ $typ->description }}"
                            @if( $typ->id == ($file->file_type_id ?? '') OR $typ->id == old('file_type_id'))
                                selected
                            @endif
                            >
                            {{ $typ->name }}
                        </option>
                    @endforeach
                @endif
            </x-adminlte-select2>
        </div>
    </div>

    <x-adminlte-input
        fgroupClass=""
        name="name"
        label="Pracovný názov súboru"
        {{-- placeholder="Názov dokumentu ..." --}}
        enableOldSupport="true"
        value="{{ $file->name ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-laptop-code"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: Text bude automaticky prekonvertovaný na verziu Slug.
            <br>
            Malým písmom bez diakritiky a medzery nahradené pomlčkou (napr: svaty-jozef-s-mariou)
        </x-slot>
        @error('slug')
            <x-slot name="errorManual">
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

    <div class="py-2"></div>

    <x-adminlte-input
        fgroupClass=""
        name="description"
        label="Popis obsahu dokumentu"
        {{-- placeholder="Obsah dokumentu jednou vetou ..." --}}
        enableOldSupport="true"
        value="{{ $file->description ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-scroll"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <div class="form-row">
        <div class="col-xl-5">
            <x-adminlte-input
                fgroupClass=""
                name="author"
                label="Meno autora dokumentu"
                {{-- placeholder="Meno autora ..." --}}
                enableOldSupport="true"
                value="{{ $file->author ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-user-astronaut fa-lg"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-xl-7">
            <x-adminlte-input
                fgroupClass=""
                name="source"
                label="Zdroj dokumentu (link na www, ...)"
                {{-- placeholder="Zdroj dokumentu (link na www, ...)" --}}
                enableOldSupport="true"
                value="{{ $file->source ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="far fa-copyright"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

</x-admin-form>

