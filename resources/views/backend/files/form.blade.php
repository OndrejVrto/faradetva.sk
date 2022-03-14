@php
    $controlerName = 'files';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = null;
    if ( isset( $file ) ) {
        $typeForm = 'edit';
        $identificator = $file->slug;
        $createdInfo = $file->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $file->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $file->getFirstMedia($file->collectionName)->file_name ?? '';
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <x-adminlte-input-file
        class="border-right-none"
        name="attachment"
        label="Príloha"
        placeholder="{{ $media_file_name }}"
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

    <x-adminlte-input
        fgroupClass=""
        name="title"
        label="Pracovný názov súboru"
        {{-- placeholder="Názov dokumentu ..." --}}
        enableOldSupport="true"
        value="{{ $file->title ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-laptop-code"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: Text bude automaticky prekonvertovaný na verziu Slug.
            <br>
            Malým písmom bez diakritiky a medzery nahradené pomlčkou (napr: tabulka-krstov-pdf)
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
        value="{{ $file->source->description ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-scroll"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <div class="py-2"></div>

    <div class="form-row">
        <div class="col-xl-5">
            <x-adminlte-input
                name="source"
                label="Zdroj obrázkov (text)"
                enableOldSupport="true"
                value="{{ $file->source->source ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-cart-arrow-down"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-xl-7">
            <x-adminlte-input
                name="source_url"
                label="Link na zdroj obrázkov (url)"
                enableOldSupport="true"
                value="{{ $file->source->source_url ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-link"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    <div class="form-row">
        <div class="col-xl-5">
            <x-adminlte-input
                name="author"
                label="Meno autora obrázkov"
                enableOldSupport="true"
                value="{{ $file->source->author ?? '' }}"
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
                name="author_url"
                label="Kontakt na autora obrázkov (url)"
                enableOldSupport="true"
                value="{{ $file->source->author_url ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fab fa-facebook"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    <div class="form-row">
        <div class="col-xl-5">
            <x-adminlte-input
                name="license"
                label="Licencia obrázkov (text)"
                enableOldSupport="true"
                value="{{ $file->source->license ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="far fa-copyright"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-xl-7">
            <x-adminlte-input
                name="license_url"
                label="Link na licenciu obrázkov (url)"
                enableOldSupport="true"
                value="{{ $file->source->license_url ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-info-circle"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

</x-backend.form>

