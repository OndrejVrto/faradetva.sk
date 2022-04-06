@php
    $controlerName = 'galleries';
    $columns = 8;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $source = null;
    if ( isset( $gallery) ) {
        $typeForm = 'edit';
        $identificator = $gallery->slug;
        $createdInfo = $gallery->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $gallery->updated_at->format('d. m. Y \o H:i');
        $source = $gallery->source;
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <x-adminlte-input
        fgroupClass=""
        name="title"
        label="Názov galérie"
        enableOldSupport="true"
        value="{{ $gallery->title ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="far fa-images"></i>
            </div>
        </x-slot>
        @error('slug')
            <x-slot name="errorManual">
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

    <x-backend.form.source :source="$source" />

    @include('backend.galleries.partials.dropzone_attachment')

</x-backend.form>

