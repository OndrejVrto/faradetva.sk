@isset($news)
@if ( count($files) > 0 )

    <div class="add-files-group">
        <h6>Zoznam príloh</h6>

        @foreach ($files as $file)
        <div class="form-row pb-2">

            <div class="col-md-2">
                <a download="{{ $file->file_name }}"
                    class="btn btn-default w-100 text-left"
                    href="{{ $file->getFullUrl() }}"
                    title="Stiahnuť súbor: {{ $file->file_name }}@if($file->hasCustomProperty('description')) - {{ $file->getCustomProperty('description') }}@endif"
                >
                    <i class="fas fa-download mr-2"></i>
                    {{ $file->file_name }}
                    <span class="ml-2 text-muted">
                        ({{ $file->human_readable_size }})
                    </span>
                </a>
            </div>

            <div class="col-md-3">
                <x-adminlte-input
                    name="fileDescription_old[{{ $file->id }}]"
                    placeholder="Popis obsahu dokumentu ..."
                    value="{{ $file->getCustomProperty('description') ?? old('fileDescription_old[' .$file->id. ']') }}"
                    class="input-group-sm"
                    fgroupClass="mb-0"
                >
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-orange" title="Popis súboru2">
                            <i class="far fa-comment"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-md-3">
                <x-adminlte-input
                    name="filesAuthor_old[{{ $file->id }}]"
                    placeholder="Meno autora dokumentu ..."
                    value="{{ $file->getCustomProperty('author') ?? old('filesAuthor_old[' .$file->id. ']') }}"
                    class="input-group-sm"
                    fgroupClass="mb-0"
                    enableOldSupport="true"
                    >
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-orange" title="Popis súboru">
                            <i class="fas fa-user-astronaut fa-lg"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-md-3">
                <x-adminlte-input
                    name="filesSource_old[{{ $file->id }}]"
                    placeholder="Zdroj dokumentu (link na www, ...)"
                    value="{{ $file->getCustomProperty('source') ?? old('filesSource_old[' .$file->id. ']') }}"
                    class="input-group-sm"
                    fgroupClass="mb-0"
                    enableOldSupport="true"
                    >
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-orange" title="Popis súboru">
                            <i class="far fa-copyright"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="col-md-1 d-flex align-items-end">
                <x-adminlte-button class="buttonDelete bg-gradient-red w-100" icon="fas fa-trash-alt" title="Vymazať súbor" />
            </div>

        </div>
        @endforeach

    </div>
@endif
@endisset
