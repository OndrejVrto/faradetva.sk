@php
    $controlerName = 'pictures';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = $source = null;
    if ( isset( $picture ) ) {
        $typeForm = 'edit';
        $identificator = $picture->slug;
        $createdInfo = $picture->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $picture->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $picture->getFirstMedia($picture->collectionName)->file_name ?? '';
        $source = $picture->source;
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
        name="photo"
        label="Obrázok"
        placeholder="{{ $media_file_name }}"
        accept=".jpg,.bmp,.png,.jpeg,.svg,.tif"
    >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
    </x-adminlte-input-file>

    <x-adminlte-input
        fgroupClass="pb-4"
        name="title"
        label="Názov"
        {{-- placeholder="Názov baneru ..." --}}
        enableOldSupport="true"
        value="{{ $picture->title ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-flag"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-backend.form.source :source="$source" />

</x-backend.form>

