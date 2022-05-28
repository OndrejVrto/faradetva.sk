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

<x-admin.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-row">
        <div class="col-xl-5">

            <x-admin.form.crop
                label="Obrázok"
                :sizeButton="true"
                :lock="false"
                ratio="false"
                maxSize="1440*560"
                minWidth="{{ $picture->crop_output_width ?? 50 }}"
                minHeight="{{ $picture->crop_output_height ?? 50 }}"
                exact_dimensions="{{ $picture->crop_output_exact_dimensions ?? 0 }}"
                :media_file_name="$media_file_name"
                crop_output_width="{{ $picture->crop_output_width ?? 50 }}"
                crop_output_height="{{ $picture->crop_output_height ?? 50 }}"
                crop_output_exact_dimensions="{{ $picture->crop_output_exact_dimensions ?? 0 }}"
            />

        </div>
        <div class="col-xl-7">

            <hr class="d-xl-none bg-orange mt-4">

            <x-adminlte-input
                name="title"
                label="Názov obrázka"
                enableOldSupport="true"
                value="{{ $picture->title ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-regular fa-flag"></i>
                    </div>
                </x-slot>
                @error('slug')
                    <x-slot:errorManual>
                        {{ $errors->first('slug') }}
                    </x-slot>
                @enderror
            </x-adminlte-input>

            <hr class="d-xl-none bg-orange mt-4">

            <x-admin.form.source :source="$source" />

        </div>
    </div>

</x-admin.form>

