@php
    $controlerName = 'priests';
    $columns = 10;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = null;
    if ( isset( $priest ) ) {
        $typeForm = 'edit';
        $identificator = $priest->slug;
        $createdInfo = $priest->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $priest->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $priest->getFirstMedia($priest->collectionName) ?? '';
    }
@endphp

<x-admin.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <div class="form-group">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" title="Zaškrtni keď chceš aby sa zobrazoval kňaz na stránke.">
            <input type="hidden" name="active" value="0">
            <input
                type="checkbox"
                name="active"
                class="custom-control-input"
                id="customSwitch3"
                value="1"
                {{ (( $priest->active ?? (old('active') === "0" ? 0 : 1) ) OR old('active', 0) === 1) ? 'checked' : '' }}
            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4">
            <x-adminlte-input
                name="first_name"
                label="Krstné meno"
                enableOldSupport="true"
                value="{{ $priest->first_name ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-md-4">
            <x-adminlte-input
                name="last_name"
                label="Priezvisko"
                enableOldSupport="true"
                value="{{ $priest->last_name ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-solid fa-signature"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-md-4">
            <x-adminlte-input
                name="function"
                label="Funkcia"
                enableOldSupport="true"
                value="{{ $priest->function ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-solid fa-pray"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-4">
            <x-adminlte-input
                name="titles_before"
                label="Titul pred menom"
                enableOldSupport="true"
                value="{{ $priest->titles_before ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-md-4">
            <x-adminlte-input
                name="titles_after"
                label="Titul za menom"
                enableOldSupport="true"
                value="{{ $priest->titles_after ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-solid fa-microscope"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
        <div class="col-md-4">
            <x-adminlte-input
                name="www_page_url"
                label="Osobná www stránka (url)"
                enableOldSupport="true"
                value="{{ $priest->www_page_url ?? '' }}"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-brands fa-html5"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>
    </div>

    <div class="form-row">
        <div class="col-xl-8">

            <div class="form-row">
                <div class="col-md-6">
                    <x-adminlte-input
                        name="phone"
                        label="Telefón"
                        placeholder="(+421) 905 123 456"
                        enableOldSupport="true"
                        value="{{ $priest->phone ?? '' }}"
                        >
                        <x-slot:prependSlot>
                            <div class="input-group-text bg-gradient-orange">
                                <i class="fa-solid fa-mobile-alt fa-lg"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-md-6">
                    <x-adminlte-input
                        name="email"
                        label="E-mail"
                        enableOldSupport="true"
                        value="{{ $priest->email ?? '' }}"
                        >
                        <x-slot:prependSlot>
                            <div class="input-group-text bg-gradient-orange">
                                <i class="fa-solid fa-at"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <x-adminlte-input
                        name="facebook_url"
                        label="Facebook (url)"
                        enableOldSupport="true"
                        value="{{ $priest->facebook_url ?? '' }}"
                        >
                        <x-slot:prependSlot>
                            <div class="input-group-text bg-gradient-orange">
                                <i class="fa-brands fa-facebook"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-md-6">
                    <x-adminlte-input
                        name="twitter_url"
                        label="Twitter (url)"
                        {{-- placeholder="@mojemeno" --}}
                        enableOldSupport="true"
                        value="{{ $priest->twitter_url ?? '' }}"
                        >
                        <x-slot:prependSlot>
                            <div class="input-group-text bg-gradient-orange">
                                <i class="fa-brands fa-twitter"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
            </div>

            <x-adminlte-textarea
                name="description"
                label="Krátky životopis"
                enableOldSupport="true"
                rows="9"
                >
                <x-slot:prependSlot>
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fa-solid fa-pen-nib"></i>
                    </div>
                </x-slot>
                    {{ $priest->description ?? '' }}
            </x-adminlte-textarea>

        </div>
        <div class="col-xl-4">

            <x-admin.form.crop label="Fotka kňaza" minWidth="230" minHeight="270" maxSize="1024*1024" :media_file_name="$media_file_name" />

        </div>
    </div>

</x-admin.form>
