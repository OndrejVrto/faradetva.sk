@php
    $controlerName = 'pictures';
    $columns = 12;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = $source = null;
    if ( isset( $picture ) ) {
        $typeForm = 'edit';
        $identificator = $picture->slug;
        $createdInfo = $picture->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $picture->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $picture->getFirstMedia($picture->collectionName) ?? '';
        $source = $picture->source;
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-row">
        <div class="col-xl-5">
            <x-adminlte-input
                name="title"
                label="Názov"
                enableOldSupport="true"
                value="{{ $picture->title ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="far fa-flag"></i>
                    </div>
                </x-slot>
                @error('slug')
                    <x-slot name="errorManual">
                        {{ $errors->first('slug') }}
                    </x-slot>
                @enderror
            </x-adminlte-input>

            <x-backend.form.crop label="Obrázok" minWidth="100" minHeight="50" ratio="false" :media_file_name="$media_file_name" />

        </div>
        <div class="col-xl-7">
            <hr class="d-xl-none bg-orange mt-4">
            <x-backend.form.source :source="$source" />
        </div>
    </div>

</x-backend.form>

