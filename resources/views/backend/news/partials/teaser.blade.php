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
