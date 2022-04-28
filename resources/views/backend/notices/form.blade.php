@php
    $controlerName = $controller;
    $columns = 6;
    $uploadFiles = 'true';

    $typeForm = $identificator = $createdInfo = $updatedInfo = $media_file_name = null;
    if ( isset( $notice ) ) {
        $typeForm = 'edit';
        $identificator = $notice->slug;
        $createdInfo = $notice->created_at->format('d. m. Y \o H:i');
        $updatedInfo = $notice->updated_at->format('d. m. Y \o H:i');
        $media_file_name = $notice->getFirstMedia($notice->collectionName)->file_name ?? null;
    }
@endphp
{{-- @dd($media_file_name, $notice->collectionName, $notice) --}}
<x-backend.form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificator="{{ $identificator }}"
    createdInfo="{{ $createdInfo }}" updatedInfo="{{ $updatedInfo }}"
>

    <input type="hidden" name="timezone" id="timezone">

    <div class="form-row">

        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"
                title="Zaškrtni keď chceš aby sa zobrazoval oznam na stránke.">
                <input type="hidden" name="active" value="0">
                <input
                    type="checkbox"
                    name="active"
                    class="custom-control-input"
                    id="customSwitch3"
                    value="1"
                    {{ (( $notice->active ?? (old('active') === "0" ? 0 : 1) ) OR old('active', 0) === 1) ? 'checked' : '' }}
                >
                <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
            </div>
        </div>

    </div>

    <x-adminlte-input-file
        name="notice_file"
        class="border-right-none"
        label="Pdf súbor"
        accept=".pdf"
        {{-- placeholder="{{ $notice->media_file_name ?? 'Vložiť obrázok ...' }}" --}}
        placeholder="{{ $media_file_name }}"
        >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-file-import"></i>
            </div>
        </x-slot>
    </x-adminlte-input-file>

    <div class="form-row">

        <div class="col-md-6">

            <div class="form-group">
                <label>Publikovať od</label>
                <div class="input-group date @error('published_at') adminlte-invalid-igroup @enderror" id="published_at" data-target-input="nearest">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-gradient-orange">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <input
                        name="published_at"
                        type="text"
                        {{-- placeholder="Vyber dátum a čas ..." --}}
                        class="form-control datetimepicker-input @error('published_at') is-invalid @enderror"
                        data-target="#published_at"
                        value="{{ $notice->published_at ?? old('published_at') }}"
                    >
                    <div class="input-group-append" data-target="#published_at" data-toggle="datetimepicker">
                        <div class="input-group-text bg-gradient-green">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                </div>
                {{-- Error feedback --}}
                @error('published_at')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('published_at') }}</strong>
                    </span>
                @enderror
            </div>

        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label>Publikovať do</label>
                <div class="input-group date @error('unpublished_at') adminlte-invalid-igroup @enderror" id="unpublished_at" data-target-input="nearest">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-gradient-orange">
                            <i class="fas fa-pause"></i>
                        </div>
                    </div>
                    <input
                        name="unpublished_at"
                        type="text"
                        {{-- placeholder="Vyber dátum a čas ..." --}}
                        class="form-control datetimepicker-input @error('unpublished_at') is-invalid @enderror"
                        data-target="#unpublished_at"
                        value="{{ $notice->unpublished_at ?? old('unpublished_at') }}"
                    >
                    <div class="input-group-append" data-target="#unpublished_at" data-toggle="datetimepicker">
                        <div class="input-group-text bg-gradient-green">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                </div>
                {{-- Error feedback --}}
                @error('unpublished_at')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('unpublished_at') }}</strong>
                    </span>
                @enderror
            </div>

        </div>

    </div>

    <x-adminlte-input
        name="title"
        label="Nadpis oznamu"
        {{-- placeholder="Nadpis oznamu ..." --}}
        enableOldSupport="true"
        value="{{ $notice->title ?? '' }}" >
        <x-slot name="prependSlot">
            <div class="input-group-text bg-gradient-orange">
                <i class="fas fa-font"></i>
            </div>
        </x-slot>
        @error('slug')
            <x-slot name="errorManual">
                {{ $errors->first('slug') }}
            </x-slot>
        @enderror
    </x-adminlte-input>

</x-backend.form>

@push('js')
    {{-- <script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> --}}
    {{-- <script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script> --}}
    <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data-10-year-range.min.js"></script>
    <script @nonce type="text/javascript" src="{{ asset('asset/backend/js/custom-datepicker.js') }}"></script>

    <script @nonce>
        setupDatepicker('#published_at', '#unpublished_at');
    </script>
@endpush
