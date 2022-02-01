<div class="add-files-group">
    <div id="addFileInput" class="form-row pb-2 d-none">
        <div class="col-md-2">
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

        <div class="col-md-3">
            <x-adminlte-input
                name="filesDescription_new[]"
                placeholder="Popis obsahu dokumentu ..."
                class="input-group-sm"
                fgroupClass="mb-0"
                {{-- enableOldSupport="true" --}}
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange" title="Popis súboru">
                        <i class="far fa-comment"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="col-md-3">
            <x-adminlte-input
                name="filesAuthor_new[]"
                placeholder="Meno autora dokumentu ..."
                class="input-group-sm"
                fgroupClass="mb-0"
                {{-- enableOldSupport="true" --}}
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
                name="filesSource_new[]"
                placeholder="Zdroj dokumentu (link na www, ...)"
                class="input-group-sm"
                fgroupClass="mb-0"
                {{-- enableOldSupport="true" --}}
                >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-orange" title="Popis súboru">
                        <i class="far fa-copyright"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="col-md-1">
            <x-adminlte-button class="buttonDelete bg-gradient-red w-100" icon="fas fa-trash-alt" title="Vymazať súbor" />
        </div>

    </div>
</div>
