@php
    $controlerName = 'prayers';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = null;
    if ( isset( $prayer ) ) {
        $typeForm = 'edit';
        $identificator = $prayer->slug;
        $createdInfo = $prayer->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $prayer->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $prayer->getFirstMedia($prayer->collectionName)->file_name ?? '';
    }
@endphp

<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>
    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazovalo svedectvo na stránke.">
            <input type="hidden" name="active" value="0">
            <input
                type="checkbox"
                name="active"
                class="custom-control-input"
                id="customSwitch3"
                value="1"
                {{ (( $prayer->active ?? (old('active') === "0" ? 0 : 1) ) OR old('active', 0) === 1) ? 'checked' : '' }}
            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
        </div>
    </div>

    <div class="form-row">
        <div class="col-xl-5">
            <x-adminlte-input
                name="title"
                label="Názov modlidby"
                {{-- placeholder="Názov modlidby ..." --}}
                enableOldSupport="true"
                value="{{ $prayer->title ?? '' }}"
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
        </div>
        <div class="col-xl-7">
            <x-adminlte-input
                name="quote_author"
                {{-- placeholder="Tretí riadok ..." --}}
                label="Autor modlidby / odkaz do svätého písma"
                enableOldSupport="true"
                value="{{ $prayer->quote_author ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-pray"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    <x-adminlte-input
        {{-- fgroupClass="mb-1" --}}
        name="quote_row1"
        label="Prvý riadok modlidby"
        {{-- placeholder="Prvý riadok ..." --}}
        enableOldSupport="true"
        value="{{ $prayer->quote_row1 ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-dice-one"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input
        {{-- fgroupClass="mb-1" --}}
        name="quote_row2"
        label="Druhý riadok modlidby"
        {{-- placeholder="Druhá modlidba..." --}}
        enableOldSupport="true"
        value="{{ $prayer->quote_row2 ?? '' }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-dice-two"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <div class="form-row">
        <div class="col-xl-6">
            <x-adminlte-input
                name="quote_link_text"
                label="Text tlačítka"
                enableOldSupport="true"
                value="{{ $prayer->quote_link_text ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-xl-6">
            <x-adminlte-input
                name="quote_link_url"
                label="Link tlačítka (url)"
                enableOldSupport="true"
                value="{{ $prayer->quote_link ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-link"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    <x-adminlte-input-file
        fgroupClass="pt-4"
        class="border-right-none"
        name="photo"
        label="Obrázok"
        placeholder="{{ $media_file_name }}"
        accept=".jpg,.bmp,.png,.jpeg"
    >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: veľkosť obrázka minimálne 1920x800 px.
        </x-slot>
    </x-adminlte-input-file>

    <x-adminlte-input
        fgroupClass="pt-4"

        name="description"
        label="Popis obrázku"
        enableOldSupport="true"
        value="{{ $prayer->source->description ?? '' }}"
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
                value="{{ $prayer->source->source ?? '' }}"
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
                value="{{ $prayer->source->source_url ?? '' }}"
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
                value="{{ $prayer->source->author ?? '' }}"
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
                value="{{ $prayer->source->author_url ?? '' }}"
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
                value="{{ $prayer->source->license ?? '' }}"
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
                value="{{ $prayer->source->license_url ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-info-circle"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

</x-backend.form>

