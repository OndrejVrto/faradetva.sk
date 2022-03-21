@if ($message = session('success_message'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

<form method="POST" action="{{ route('contact.email') }}">
    @csrf
    <div class="form-group">
        <span class="input_icon"><i class="fas fa-user-tie" aria-hidden="true"></i></span>
        <input class="form-control @error('name')is-invalid @enderror" type="text" name="name" placeholder="Celé meno" value="{{ old('name') }}">
        @error('name')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <span class="input_icon"><i class="fas fa-at" aria-hidden="true"></i></span>
        <input class="form-control @error('email')is-invalid @enderror" type="text" name="email" placeholder="Váš E-mail" value="{{ old('email') }}">
        @error('email')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <span class="input_icon"><i class="fas fa-phone-alt" aria-hidden="true"></i></span>
        <input class="form-control @error('contact')is-invalid @enderror" type="text" name="contact" placeholder="Kontaktné číslo" value="{{ old('contact') }}">
        @error('contact')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('contact') }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <span class="input_icon"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></span>
        <input class="form-control @error('address')is-invalid @enderror" type="text" name="address" placeholder="Vaša adresa" value="{{ old('address') }}">
        @error('address')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <textarea class="form-control @error('message')is-invalid @enderror" name="message" placeholder="Vaša správa">{{ old('message') }}</textarea>
        @error('message')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('message') }}</strong>
            </span>
        @enderror
    </div>
    <button type="submit" class="submit_btn read_btn">Pošli správu
        <i class="fas fa-long-arrow-alt-right"></i>
    </button>
</form>
