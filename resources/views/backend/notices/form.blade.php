@php
    $controlerName = 'notices';
    $columns = 6;
    $uploadFiles = 'true';

    $typeForm = $identificatorEdit = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $notice ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $notice->id;
        $createdInfo = $notice->createdInfo;
        $createdBy = $notice->createdBy;
        $updatedInfo = $notice->updatedInfo;
        $updatedBy = $notice->updatedBy;
    }
@endphp

<x-admin-form
    controlerName="{{ $controlerName }}" columns="{{ $columns }}"
    typeForm="{{ $typeForm }}" uploadFiles="{{ $uploadFiles }}"
    identificatorEdit="{{ $identificatorEdit }}"
    createdInfo="{{ $createdInfo }}" createdBy="{{ $createdBy }}"
    updatedInfo="{{ $updatedInfo }}" updatedBy="{{ $updatedBy }}"
>

    <input type="hidden" name="timezone" id="timezone">

    <div class="form-row">

        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"
                title="Zaškrtni keď chceš aby sa zobrazoval oznam na stránke.">
                <input
                    name="active"
                    type="checkbox"
                    class="custom-control-input"
                    id="customSwitch3"

                    @if (!is_null(Session::get('notices_old_input_checkbox')))
                        {{ Session::get('notices_old_input_checkbox') == 1 ? 'checked' : '' }}
                    @else
                        @if( isset($notice) )
                            {{ $notice->active == 1 ? 'checked' : '' }}
                        @else
                            checked
                        @endif
                    @endif

                >
                <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
            </div>
        </div>

    </div>

    <x-adminlte-input-file
        name="notice_file"
        class="border-right-none"
        label="Pdf súbor"
        {{-- placeholder="{{ $notice->media_file_name ?? 'Vložiť obrázok ...' }}" --}}
        placeholder="{{ $notice->media_file_name ?? '' }}"
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

</x-admin-form>

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script>

<script type="text/javascript">

    $(function ()
    {
        $('#timezone').val(moment.tz.guess())

        //Date and time pickers
        var options = {
            icons: {
                time: 'far fa-clock'
            },
            locale: 'sk',
            useCurrent: false,
            buttons: {
                showToday: true,
                showClear: true,
                // showClose: true
            },
            tooltips: {

                today: 'Choď na dnešný dátum',
                clear: 'Vymazať výber',
                close: 'Zavrieť',

                selectTime: 'Vyber čas',
                selectDate: 'Vyber dátum',

                selectMonth: 'Vyber mesiac',
                prevMonth: 'Predchádzajúci mesiac',
                nextMonth: 'Nasledovný mesiac',

                selectYear: 'Vyber rok',
                prevYear: 'Predchádzajúci rok',
                nextYear: 'Nasledovný rok',

                selectDecade: 'Vyber dekádu',
                prevDecade: 'Predchádzajúca dekáda',
                nextDecade: 'Nasledovná dekáda',

                prevCentury: 'Predchádzajúce storočie',
                nextCentury: 'Nasledujúce storočie',

                incrementHour: 'Pridať hodinu',
                pickHour: 'Vybrať hodinu',
                decrementHour:'Odobrať hodinu',
                incrementMinute: 'Pridať minútu',
                pickMinute: 'Vybrať minútu',
                decrementMinute:'Odobrať minútu',
                incrementSecond: 'Pridať sekundu',
                pickSecond: 'Vybrať sekundu',
                decrementSecond:'Odobrať sekundu'
            },
        };

        $('#unpublished_at').datetimepicker(options);
        $('#published_at').datetimepicker(options);

        $("#published_at").on("change.datetimepicker", function (e) {
            $('#unpublished_at').datetimepicker('minDate', e.date);
        });
        $("#unpublished_at").on("change.datetimepicker", function (e) {
            $('#published_at').datetimepicker('maxDate', e.date);
        });
    })

</script>

@endpush
