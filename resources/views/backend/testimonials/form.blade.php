@php
    $controlerName = 'testimonials';
    $columns = 10;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = null;
    if ( isset( $testimonial) ) {
        $typeForm = 'edit';
        $identificator = $testimonial->slug;
        $createdInfo = $testimonial->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $testimonial->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $testimonial->getFirstMedia($testimonial->collectionName) ?? '';
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
                {{ (( $testimonial->active ?? (old('active') === "0" ? 0 : 1) ) OR old('active', 0) === 1) ? 'checked' : '' }}
            >
            <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
        </div>
    </div>

    <div class="form-row">
        <div class="col-xl-8">

            <div class="form-row">
                <div class="col-6">

                    <x-adminlte-input
                        name="name"
                        label="Meno alebo prezývka"
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
                rows="8"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                </x-slot>
                    {{ $testimonial->description ?? '' }}
            </x-adminlte-textarea>

        </div>
        <div class="col-xl-4">

            <hr class="d-xl-none bg-orange mt-4">
            <x-backend.form.crop label="Fotka alebo avatar" minWidth="120" minHeight="120" maxSize="460*460" :media_file_name="$media_file_name" />

        </div>
    </div>

</x-backend.form>
