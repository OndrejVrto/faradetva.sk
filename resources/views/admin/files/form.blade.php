@php
    $controlerName = 'files';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = $source = null;
    if ( isset( $file ) ) {
        $typeForm = 'edit';
        $identificator = $file->slug;
        $createdInfo = $file->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $file->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $file->getFirstMedia($file->collectionName)->file_name ?? '';
        $source = $file->source;
    }
@endphp

<x-admin.form
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

    <x-admin.form.source :source="$source" />

</x-admin.form>

