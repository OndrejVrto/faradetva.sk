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
