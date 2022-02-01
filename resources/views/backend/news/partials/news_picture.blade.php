@php
    $media_id = $media_file_name = $media_author = $media_source = null;
    if (isset($news)) {
        $mediaFile = $news->getFirstMedia($news->collectionPicture);

        $media_id = $mediaFile->id ?? '';
        $media_file_name = $mediaFile->file_name ?? '';
        $media_author = 'TODO';
        $media_source = 'TODO';

        // $media_author = $mediaFile->hasCustomProperty('author') ? $mediaFile->getCustomProperty('author') : '';
        // $media_source = $mediaFile->hasCustomProperty('source') ? $mediaFile->getCustomProperty('source') : '';
    }
@endphp

<x-adminlte-input-file
    name="picture[{{ $media_id }}]"
    class="border-right-none"
    label="Obrázok na titulku"
    fgroupClass="mt-5"
    placeholder="{{ $media_file_name }}"
    >
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-orange">
            <i class="fas fa-file-import"></i>
        </div>
    </x-slot>
    <x-slot name="noteSlot">
        Poznámka: veľkosť obrázka minimálne 848x460 px.
    </x-slot>
</x-adminlte-input-file>

<x-adminlte-input
    name="picture_author[{{ $media_id }}]"
    label="Autor obrázku"
    value="{{ $media_author ?? old('picture_author') ?? '' }}"
    class="input-group-sm"
    enableOldSupport="true"
    >
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-orange" title="Popis obrázka">
            <i class="fas fa-user-astronaut fa-lg"></i>
        </div>
    </x-slot>
</x-adminlte-input>

<x-adminlte-input
    name="picture_source[{{ $media_id }}]"
    label="Zdroj obrázku (link na www, ...)"
    value="{{ $media_source ?? old('picture_source') ?? '' }}"
    class="input-group-sm"
    enableOldSupport="true"
    >
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-orange" title="Popis súboru">
            <i class="far fa-copyright"></i>
        </div>
    </x-slot>
</x-adminlte-input>
