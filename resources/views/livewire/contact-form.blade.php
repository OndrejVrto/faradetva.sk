@pushOnce('css')
    @livewireStyles(['nonce' => csp_nonce()])
@endpushonce
@pushOnce('js')
    @livewireScripts(['nonce' => csp_nonce()])
@endpushonce

<form wire:submit.prevent="submitForm">
    @csrf

    @if ($successMesage)
        <div class="alert alert-success alert-block alert-dismissible fade show" role="alert">
            <strong>{{ $successMesage }}</strong>
            <button type="button" wire:click="$set('successMesage', null)" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="form-group">
        <span class="input_icon @error('name') border-end-0 border-danger @enderror"><i class="fas fa-user-tie" aria-hidden="true"></i></span>
        <input wire:model.lazy="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Celé meno" value="{{ old('name') }}">
        @error('name')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <span class="input_icon @error('email') border-end-0 border-danger @enderror"><i class="fas fa-at" aria-hidden="true"></i></span>
        <input wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Váš E-mail" value="{{ old('email') }}">
        @error('email')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <span class="input_icon @error('contact') border-end-0 border-danger @enderror"><i class="fas fa-phone-alt" aria-hidden="true"></i></span>
        <input wire:model.lazy="contact" class="form-control @error('contact') is-invalid @enderror" type="text" name="contact" placeholder="Kontaktné číslo" value="{{ old('contact') }}">
        @error('contact')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('contact') }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <span class="input_icon @error('address') border-end-0 border-danger @enderror"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></span>
        <input wire:model.lazy="address" class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="Vaša adresa" value="{{ old('address') }}">
        @error('address')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <textarea wire:model.lazy="message" class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Vaša správa">{{ old('message') }}</textarea>
        @error('message')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('message') }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="submit_btn read_btn">
        <span wire:loading wire:target="submitForm" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
        Pošli správu
        {{-- <i class="fas fa-long-arrow-alt-right"></i> --}}
    </button>
</form>
