@php
    $controlerName = 'galleries';
    $columns = 8;
    $uploadFiles = 'true';

    $typeForm = $identificatorEdit = null;
    if ( isset( $gallery ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $gallery->slug;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificatorEdit="{{ $identificatorEdit }}"
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

    <x-adminlte-input
        fgroupClass=""
        name="description"
        label="Popis obsahu galérie"
        enableOldSupport="true"
        value="{{ $gallery->description ?? '' }}"
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
                name="author"
                label="Meno autora obrázkov"
                enableOldSupport="true"
                value="{{ $gallery->author ?? '' }}"
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
                value="{{ $gallery->author_url ?? '' }}"
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
                name="source"
                label="Zdroj obrázkov (text)"
                enableOldSupport="true"
                value="{{ $gallery->source ?? '' }}"
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
                label="Link na zdroj obrázku (url)"
                enableOldSupport="true"
                value="{{ $gallery->source_url ?? '' }}"
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
                name="license"
                label="Licencia obrázkov (text)"
                enableOldSupport="true"
                value="{{ $gallery->license ?? '' }}"
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
                value="{{ $gallery->license_url ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-info-circle"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    @include('backend.galleries.partials.dropzone_attachment')

</x-admin-form>

