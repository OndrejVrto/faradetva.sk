@php
    $controlerName = 'priests';
    $columns = 7;
    $uploadFiles = 'true';

    $typeForm = $identificatorEdit = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $priest ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $priest->slug;
        $createdInfo = $priest->createdInfo;
        $createdBy = $priest->createdBy;
        $updatedInfo = $priest->updatedInfo;
        $updatedBy = $priest->updatedBy;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificatorEdit="{{ $identificatorEdit }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
>

    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazoval kňaz na stránke.">
            <input
                type="checkbox"
                class="custom-control-input"
                id="customSwitch3"
                name="active"

                @if (!is_null(Session::get('priest_old_input_checkbox')))
                    {{ Session::get('priest_old_input_checkbox') == 1 ? 'checked' : '' }}
                @else
                    @if( isset($priest) )
                        {{ $priest->active == 1 ? 'checked' : '' }}
                    @else
                        checked
                    @endif
                @endif

            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4">
            <x-adminlte-input
                name="titles_before"
                label="Titul pred menom"
                {{-- placeholder="Titul pred menom..." --}}
                enableOldSupport="true"
                value="{{ $priest->titles_before ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-md-4">
            <x-adminlte-input
                name="titles_after"
                label="Titul za menom"
                {{-- placeholder="Titul za menom..." --}}
                enableOldSupport="true"
                value="{{ $priest->titles_after ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-microscope"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-md-4">
            <x-adminlte-input
                name="function"
                label="Funkcia"
                {{-- placeholder="Akú funkciu zastáva ..." --}}
                enableOldSupport="true"
                value="{{ $priest->function ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-pray"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <x-adminlte-input
                name="first_name"
                label="Krstné meno"
                {{-- placeholder="Krstné meno ..." --}}
                enableOldSupport="true"
                value="{{ $priest->first_name ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-user"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input
                name="last_name"
                label="Priezvisko"
                {{-- placeholder="Priezvisko ..." --}}
                enableOldSupport="true"
                value="{{ $priest->last_name ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-signature"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <x-adminlte-input
                name="phone"
                label="Telefón"
                {{-- placeholder="Zadaj telefónne číslo ..." --}}
                enableOldSupport="true"
                value="{{ $priest->phone ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-mobile-alt fa-lg"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-md-6">
            <x-adminlte-input
                name="email"
                label="E-mail"
                {{-- placeholder="Zadaj e-mail ..." --}}
                enableOldSupport="true"
                value="{{ $priest->email ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-at"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    <x-adminlte-textarea
        name="description"
        label="Krátky životopis"
        enableOldSupport="true"
        rows="5"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-pen-nib"></i>
            </div>
        </x-slot>
            {{ $priest->description ?? '' }}
    </x-adminlte-textarea>

    <x-adminlte-input-file
        class="border-right-none"
        name="photo"
        label="Fotka"
        {{-- placeholder="{{ $priest->media_file_name ?? 'Vložiť fotku ..' }}"> --}}
        placeholder="{{ $priest->media_file_name ?? '' }}">
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
        <x-slot name="noteSlot">
            Poznámka: veľkosť obrázka minimálne 230x270 px.
        </x-slot>
    </x-adminlte-input-file>

</x-admin-form>
