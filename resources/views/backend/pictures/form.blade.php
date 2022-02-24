@php
    $controlerName = 'pictures';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $createdBy = $updatedInfo = $updatedBy = $media_file_name = null;
    if ( isset( $picture ) ) {
        $typeForm = 'edit';
        $identificator = $picture->slug;
        $createdInfo = $picture->createdInfo;
        $createdBy = $picture->createdBy;
        $updatedInfo = $picture->updatedInfo;
        $updatedBy = $picture->updatedBy;
        $media_file_name = $picture->getFirstMedia($picture->collectionName)->file_name ?? '';
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
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

    <x-adminlte-input
        fgroupClass=""
        name="description"
        label="Popis obrázku"
        enableOldSupport="true"
        value="{{ $picture->description ?? '' }}"
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
                name="source"
                label="Zdroj obrázkov (text)"
                enableOldSupport="true"
                value="{{ $picture->source ?? '' }}"
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
                value="{{ $picture->source_url ?? '' }}"
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
                value="{{ $picture->author ?? '' }}"
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
                value="{{ $picture->author_url ?? '' }}"
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
                value="{{ $picture->license ?? '' }}"
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
                value="{{ $picture->license_url ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-info-circle"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

</x-admin-form>

