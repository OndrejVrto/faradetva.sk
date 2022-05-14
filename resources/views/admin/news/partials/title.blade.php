<x-adminlte-input
    name="title"
    label="Nadpis článku"

    enableOldSupport="true"
    value="{{ $news->title ?? '' }}" >
    <x-slot:prependSlot>
        <div class="input-group-text bg-gradient-orange">
            <i class="fas fa-font"></i>
        </div>
    </x-slot>
    @error('slug')
        <x-slot:errorManual>
            {{ $errors->first('slug') }}
        </x-slot>
    @enderror
</x-adminlte-input>
