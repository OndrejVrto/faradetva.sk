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
            value="{{ $news->published_at ?? old('published_at') }}"
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
