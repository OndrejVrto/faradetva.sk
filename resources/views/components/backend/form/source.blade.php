@props([
    'source' => null,
])

<x-adminlte-input
    fgroupClass=""
    name="description"
    label="Popis"
    enableOldSupport="true"
    value="{{ $source->description ?? '' }}"
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
            name="source"
            label="Zdroj (text)"
            enableOldSupport="true"
            value="{{ $source->source ?? '' }}"
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
            label="Link na zdroj (url)"
            enableOldSupport="true"
            value="{{ $source->source_url ?? '' }}"
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
            label="Meno autora"
            enableOldSupport="true"
            value="{{ $source->author ?? '' }}"
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
            label="Kontakt na autora (url)"
            enableOldSupport="true"
            value="{{ $source->author_url ?? '' }}"
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
            label="Licencia (text)"
            enableOldSupport="true"
            value="{{ $source->license ?? '' }}"
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
            label="Link na licenciu (url)"
            enableOldSupport="true"
            value="{{ $source->license_url ?? '' }}"
            >
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-orange">
                    <i class="fas fa-info-circle"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
    </div>
</div>
