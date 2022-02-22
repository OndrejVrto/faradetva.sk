@php
    $controlerName = 'testimonials';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $testimonial ) ) {
        $typeForm = 'edit';
        $identificator = $testimonial->slug;
        $createdInfo = $testimonial->createdInfo;
        $createdBy = $testimonial->createdBy;
        $updatedInfo = $testimonial->updatedInfo;
        $updatedBy = $testimonial->updatedBy;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
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
                {{ (( $testimonial->active ?? (old('active') === "0" ? 0 : 1) ) OR old('active', 0) === 1) ? 'checked' : '' }}
            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
        </div>
    </div>

    <div class="form-row">
        <div class="col-6">
            <x-adminlte-input
                name="name"
                label="Meno alebo prezývka"
                {{-- placeholder="Vlož meno svedka ..." --}}
                enableOldSupport="true"
                value="{{ $testimonial->name ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-signature"></i>
                    </div>
                </x-slot>
                @error('slug')
                    <x-slot name="errorManual">
                        {{ $errors->first('slug') }}
                    </x-slot>
                @enderror
            </x-adminlte-input>
        </div>
        <div class="col-6">
            <x-adminlte-input
                name="function"
                label="Charakteristika osoby"
                {{-- placeholder="Akú prácu vykonáva svedok ..." --}}
                enableOldSupport="true"
                value="{{ $testimonial->function ?? '' }}"
            >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-briefcase"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    <x-adminlte-textarea
        name="description"
        label="Svedectvo"
        enableOldSupport="true"
        rows="5"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-pen-nib"></i>
            </div>
        </x-slot>
            {{ $testimonial->description ?? '' }}
    </x-adminlte-textarea>

    <x-adminlte-input-file
        class="border-right-none"
        name="photo"
        label="Fotka alebo avatar"
        accept=".jpg,.bmp,.png,.jpeg,.svg"
        {{-- placeholder="{{ $testimonial->media_file_name ?? 'Vložiť fotku ...' }}"> --}}
        placeholder="{{ $testimonial->media_file_name ?? '' }}">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: veľkosť obrázka minimálne 100x100 px.
        </x-slot>
    </x-adminlte-input-file>

</x-admin-form>
