@php
    $controlerName = 'background-pictures';
    $columns = 12;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = $source = null;
    if ( isset( $backgroundPicture ) ) {
        $typeForm = 'edit';
        $identificator = $backgroundPicture->slug;
        $createdInfo = $backgroundPicture->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $backgroundPicture->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $backgroundPicture->getFirstMedia($backgroundPicture->collectionName) ?? '';
        $source = $backgroundPicture->source;
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
                label="Obrázok pozadia"
                ratio="true"
                minWidth="1920"
                minHeight="1440"
                :media_file_name="$media_file_name"
            />

        </div>
        <div class="col-xl-7">

            <hr class="d-xl-none bg-orange mt-4">

            <x-adminlte-input
                name="title"
                label="Názov obrázka"
                enableOldSupport="true"
                value="{{ $backgroundPicture->title ?? '' }}"
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

