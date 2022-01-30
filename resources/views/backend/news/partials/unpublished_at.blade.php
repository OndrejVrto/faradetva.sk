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
