@php
    $config_Sumernote = [
        'height' => '200',                 // set editor height
          'minHeight' => 'null',             // set minimum height of editor
          'maxHeight' => 'null',             // set maximum height of editor
          // 'focus' => 'true',                  // set focus to editable area after initializing summernote
        'toolbar' => [
            // [groupName, [list of button]]
            ['misc', ['undo','redo']],
            ['style', ['style','paragraph']],
            ['fontstyle', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol']],
            ['insert', ['link', 'hr']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
    ];

    $config_select = [
        // "placeholder" => " Vyber niekoľko slov popisujúcich obsah ...",
        "allowClear" => 'true',
    ];
@endphp

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

        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"
                title="Zaškrtni keď chceš aby sa zobrazovala správa na stránke.">
                <input
                    name="active"
                    type="checkbox"
                    class="custom-control-input"
                    id="customSwitch3"

                    @if (!is_null(Session::get('news_old_input_checkbox')))
                        {{ Session::get('news_old_input_checkbox') == 1 ? 'checked' : '' }}
                    @else
                        @if( isset($news) )
                            {{ $news->active == 1 ? 'checked' : '' }}
                        @else
                            checked
                        @endif
                    @endif

                >
                <label class="custom-control-label" for="customSwitch3">Zobrazovať na stránke</label>
            </div>
        </div>

    </div>
    <div class="form-row">

        <div class="col-xl-6">
            <x-adminlte-input
                name="title"
                label="Nadpis článku"
                {{-- placeholder="Nadpis článku ..." --}}
                enableOldSupport="true"
                value="{{ $news->title ?? '' }}" >
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
        </div>
        <div class="col-md-6 col-xl-3">

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

        </div>
        <div class="col-md-6 col-xl-3">

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
                        value="{{ $news->unpublished_at ?? old('unpublished_at') }}"
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

    <div class="form-row">

        <div class="col-xl-4 order-xl-2">

            <x-adminlte-select2
                name="category_id"
                label="Kategória článku"
                {{-- data-placeholder="Vybrať kategóriu článku ..." --}}
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-stream"></i>
                    </div>
                </x-slot>
                <option/>
                @if ($categories->count())

                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        title="{{ $category->description }}"
                        @if( $category->id == ($news->category_id ?? '') OR $category->id == old('category_id'))
                            selected
                        @endif
                        >
                        {{ $category->title }}
                    </option>
                @endforeach

                @endif
            </x-adminlte-select2>

            <x-adminlte-input-file
                name="news_picture"
                class="border-right-none"
                label="Obrázok na titulku"
                {{-- placeholder="{{ $news->media_file_name ?? 'Vložiť obrázok ...' }}" --}}
                placeholder="{{ $news->media_file_name ?? '' }}"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-file-import"></i>
                    </div>
                </x-slot>
                <x-slot name="noteSlot">
                    Poznámka: veľkosť obrázka minimálne 848x460 px.
                </x-slot>
            </x-adminlte-input-file>

            {{-- With multiple slots, and plugin config parameter --}}
            <x-adminlte-select2
                name="tags[]"
                id="sel2Tag"
                label="Kľúčové slová"
                :config="$config_select"
                multiple
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fas fa-tag"></i>
                    </div>
                </x-slot>

                @if ($tags->count())

                @foreach($tags as $tag)
                <option
                    value="{{ $tag->id }}"
                    title="{{ $tag->description }}"
                    @if( in_array($tag->id, old("tags") ?: []) OR in_array($tag->id, $selectedTags) )
                        selected
                    @endif
                >
                    {{ $tag->title }}
                </option>
                @endforeach

                @endif
            </x-adminlte-select2>

        </div>

        <div class="col-xl-8 order-xl-1">
            <x-adminlte-textarea
                name="teaser"
                label="Upútavka"
                enableOldSupport="true"
                rows="2"
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange">
                        <i class="fab fa-diaspora"></i>
                    </div>
                </x-slot>
                    {{ $news->teaser ?? '' }}
            </x-adminlte-textarea>
            <x-adminlte-text-editor
                name="content"
                id="Summernote"
                label="Obsah článku"
                placeholder="Text článku ..."
                :config="$config_Sumernote"
                >
                {{ $news->content ?? old('content') }}
            </x-adminlte-text-editor>
        </div>
    </div>

    @isset($news)
    @if ( count($files) > 0 )

        <div class="add-files-group">
            <label>Zoznam už vložených príloh</label>

            @foreach ($files as $file)
            <div class="form-row pb-3">
                <div class="col-12 col-md-4">
                    <a download="{{ $file->file_name }}"
                        class="btn btn-default bg-gradient-yellow w-100"
                        href="{{ $file->getFullUrl() }}"
                        title="Stiahnuť súbor: {{ $file->file_name }}@isset($file->description) - {{ $file->description }}@endisset"
                    >
                        {{ $file->file_name }}
                        <span class="ml-2 text-muted">
                            ({{ $file->human_readable_size }})
                        </span>
                    </a>
                </div>
                <div class="col-10 col-md-7 pr-0 pr-md-1">
                    {{-- TODO: description in SpatieMedia --}}
                    <x-adminlte-input
                        name="fileDescription_old[{{ $file->id }}]"
                        placeholder="Vložiť popis ..."
                        value="{{ $file->getCustomProperty('filesDescription') ?? old('fileDescription_old[' .$file->id. ']') }}"
                        class="input-group-sm"
                        fgroupClass="mb-0"
                    >
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-gray" title="Popis súboru">
                                <i class="fas fa-comment"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-2 col-md-1 pl-0 pl-md-1">
                    <x-adminlte-button class="buttonDelete bg-gradient-red w-100" icon="fas fa-trash-alt" title="Vymazať súbor" />
                </div>
            </div>
            @endforeach

        </div>
    @endif
    @endisset

    <div class="add-files-group">
        <label>Nové prílohy</label>
        <div class="form-row pb-3 d-none" id="addFileInput">
            <div class="col-12 col-md-4">
                <x-adminlte-input-file
                    name="files[]"
                    placeholder="Nová príloha ..."
                    errorKey="files.*"
                    fgroupClass="mb-0"
                    >
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-orange">
                            <i class="fas fa-file-import"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
            </div>
            <div class="col-10 col-md-7 pr-0 pr-md-1">
                <x-adminlte-input
                    name="filesDescription_new[]"
                    placeholder="Vložiť popis ..."
                    class="input-group-sm"
                    fgroupClass="mb-0"
                    enableOldSupport="true"
                    >
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-orange" title="Popis súboru">
                            <i class="far fa-comment"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-2 col-md-1 pl-0 pl-md-1">
                <x-adminlte-button class="buttonDelete bg-gradient-red w-100" icon="fas fa-trash-alt" title="Vymazať súbor" />
            </div>
        </div>
    </div>

    <div class="form-row">
        <x-adminlte-button class="px-5 bg-gradient-red" icon="fas fa-plus" title="Pridať ďalší súbor" id="addFileSubmit" />
    </div>

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
