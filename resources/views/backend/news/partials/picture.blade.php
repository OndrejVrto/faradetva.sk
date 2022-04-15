@php
    $media_file_name = $source = null;
    if (isset($news)) {
        $media_file_name = $news->getFirstMedia($banner->collectionName)->file_name ?? '';
        $source = $news->source;
    }
@endphp

<x-adminlte-input-file
    name="picture"
    class="border-right-none"
    label="Hlavný obrázok na titulku"
    accept=".jpg,.bmp,.png,.jpeg"
    {{-- fgroupClass="mt-5" --}}
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

<x-backend.form.source :source="$source" />
