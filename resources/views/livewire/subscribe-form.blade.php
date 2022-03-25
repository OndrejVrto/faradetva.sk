@pushOnce('css')
    @livewireStyles
@endpushonce
@pushOnce('js')
    @livewireScripts
@endpushonce

<form wire:submit.prevent="submitForm">
    @csrf

    @if ($successMesage)
        <div class="alert alert-success alert-dismissible rounded-pill mb-2" role="alert">
            {{ $successMesage }}
            <button type="button" wire:click="$set('successMesage', null)" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="form-group">
        @error('name')
            <span class="invalid-feedback d-block mt-0 mb-1 ms-3" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @enderror
        <input wire:model.lazy="name" type="text" name="name" placeholder="Vaše celé meno" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        @error('email')
            <span class="invalid-feedback d-block mt-0 mb-1 ms-3" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @enderror
        <input wire:model.lazy="email" type="text" name="email" placeholder="Váš E-mail" value="{{ old('name') }}">
    </div>

    <button type="submit" class="news_btn read_btn">
        <span wire:loading wire:target="submitForm" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
        Zaregistrovať
        <i class="fas fa-long-arrow-alt-right"></i>
    </button>

</form>
