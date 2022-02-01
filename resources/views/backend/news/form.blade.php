@php
    $controlerName = 'news';
    $columns = 12;
    $uploadFiles = 'true';

    $typeForm = $identificatorEdit = $createdInfo = $createdBy = $updatedInfo = $updatedBy = null;
    if ( isset( $news ) ) {
        $typeForm = 'edit';
        $identificatorEdit = $news->slug;
        $createdInfo = $news->createdInfo;
        $createdBy = $news->createdBy;
        $updatedInfo = $news->updatedInfo;
        $updatedBy = $news->updatedBy;
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
        @include('backend.news.partials.active')
    </div>

    <div class="form-row">
        <div class="col-xl-6">
            @include('backend.news.partials.title')
        </div>
        <div class="col-md-6 col-xl-3">
            @include('backend.news.partials.published_at')
        </div>
        <div class="col-md-6 col-xl-3">
            @include('backend.news.partials.unpublished_at')
        </div>
    </div>

    <div class="form-row">
        <div class="col-xl-4 order-xl-2">
            @include('backend.news.partials.category_id')
            @include('backend.news.partials.tags')
            @include('backend.news.partials.news_picture')
        </div>
        <div class="col-xl-8 order-xl-1">
            @include('backend.news.partials.teaser')
            @include('backend.news.partials.content')
        </div>
    </div>

    {{-- @include('backend.news.partials.files_old') --}}

    {{-- @include('backend.news.partials.files_new') --}}

    @include('backend.news.partials.dropzone_attachment')


    {{-- <div class="form-row">
        <x-adminlte-button class="px-5 bg-gradient-red" icon="fas fa-plus" title="Pridať ďalší súbor" id="addFileSubmit" />
    </div> --}}

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
