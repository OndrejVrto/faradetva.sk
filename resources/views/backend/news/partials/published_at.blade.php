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
    {{-- <script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script> --}}
    {{-- <script @nonce src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone-with-data-2012-2022.min.js"></script> --}}
    <script @nonce type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data-10-year-range.min.js"></script>
    <script @nonce type="text/javascript" src="{{ asset('asset/backend/js/custom-datepicker.js') }}"></script>

    <script @nonce>
        setupDatepicker('#published_at', '#unpublished_at');
    </script>
@endpush
