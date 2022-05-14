<x-adminlte-textarea
    name="teaser"
    label="Upútavka"
    enableOldSupport="true"
    rows="3"
    >
    <x-slot:prependSlot>
        <div class="input-group-text bg-gradient-orange">
            <i class="fab fa-diaspora"></i>
        </div>
    </x-slot>
    <x-slot:noteSlot>
        Poznámka: cca. 50 slov
    </x-slot>
        {{ $news->teaser ?? '' }}
</x-adminlte-textarea>
