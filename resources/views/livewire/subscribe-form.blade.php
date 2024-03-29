@if ($type)
    {{-- section type --}}
    <div class="newsletter_section_form">
        <form wire:submit.prevent="submitForm">
            @csrf

            @if ($successMesage)
                <div class="alert alert-success alert-dismissible rounded-pill mt-3" role="alert">
                    {{ $successMesage }}
                    <button type="button" wire:click="$set('successMesage', null)" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-4 form-group">
                    <input id="liveware-register-name" wire:model.lazy="name" type="text" name="name" autocomplete="name" placeholder="Vaše celé meno" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-church-template-blue d-block mt-1 ms-4" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-5 mt-3 mt-lg-0 form-group">
                    <input id="liveware-register-email" wire:model.lazy="email" type="text" name="email" autocomplete="email" placeholder="Váš E-mail" value="{{ old('name') }}">
                    @error('email')
                        <span class="text-church-template-blue d-block mt-1 ms-4" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-lg-3 mt-3 mt-lg-0 form-group">
                    <button class="read_btn_blue w-100" type="submit">
                        <span wire:loading wire:target="submitForm" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Zaregistrovať
                        <i class="fa-solid fa-long-arrow-alt-right"></i>
                    </button>
                </div>
            </div>

        </form>
    </div>

@else

    {{-- footer type --}}
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
            <input id="liveware-register-name" wire:model.lazy="name" type="text" name="name" autocomplete="name" placeholder="Vaše celé meno" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            @error('email')
                <span class="invalid-feedback d-block mt-0 mb-1 ms-3" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @enderror
            <input id="liveware-register-email" wire:model.lazy="email" type="text" name="email" autocomplete="email" placeholder="Váš E-mail" value="{{ old('name') }}">
        </div>

        <button type="submit" class="news_btn read_btn">
            <span wire:loading wire:target="submitForm" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
            Zaregistrovať
            <i class="fa-solid fa-long-arrow-alt-right"></i>
        </button>

    </form>

@endif
