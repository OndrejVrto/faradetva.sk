@php
    $controlerName = 'prayers';
    $columns = 11;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name =  $source = null;
    if ( isset( $prayer ) ) {
        $typeForm = 'edit';
        $identificator = $prayer->slug;
        $createdInfo = $prayer->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $prayer->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $prayer->getFirstMedia($prayer->collectionName) ?? '';
        $source = $prayer->source;
    }
@endphp

<x-admin.form
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

    <hr class="bg-orange mt-4">

    <div class="form-row">
        <div class="col-xl-5">
            <x-admin.form.crop label="Obrázok" minWidth="1920" minHeight="800" :media_file_name="$media_file_name" />
        </div>
        <div class="col-xl-7">
            <hr class="d-xl-none bg-orange mt-4">
            <x-admin.form.source :source="$source" />
        </div>
    </div>

</x-admin.form>
