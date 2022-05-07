@section('title', 'Error 419')
@section('description', 'Boli ste automaticky odhlesený po dlhšej nečinnosti.')
@section('keywords', 'Automatické odhlásenie, 419, chyba, session expires')

<x-frontend.layout.master-error errorNumber="419">

    <x-slot name="image">
        <img src="{{ asset('images/errors/419-time-management-amico.svg', true) }}" class="w-100" alt="Dievčatko sedí na hodinách vedľa kalendára.">
    </x-slot>

    <h4>
        Vyzerá to tak, že ste už boli odhlásený.
        <br>
        Asi ste boli dlhšiu dobu neaktívny.
    </h4>

    <p class="pt-2">
        <p>
            Skúste sa opäť
            <a class="ms-3 btn btn-outline-warning" href="{{ route('login') }}" role="button" rel="nofollow">prihlásiť</a>
        </p>
        <p>
            Prípadne choďte
            <a class="ms-3 btn btn-outline-secondary" href="{{ route('home') }}" role="button">domov</a>
        </p>
    </p>

</x-frontend.layout.master-error>
