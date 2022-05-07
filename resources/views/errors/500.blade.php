@section('title', 'Error 500')
@section('description', 'Chyba serveru.')
@section('keywords', 'Chyba serveru, 500, chyba, MySQL error, administrátor')

<x-frontend.layout.master-error errorNumber="500">

    <x-slot name="image">
        <img
            id="freepik_stories-500-internal-server-error"
            src="{{ asset('images/errors/500-internal-server-error-amico.svg', true) }}"
            class="w-100"
            alt="Chlapček rozmýšľa ako opraviť skrinku kvôli chybe číslo 500.">
    </x-slot>

    <h4>
        Vyzerá to tak, že na serveri vznikla chyba.
        <br>
        Skúste chvíľku počkať, možno sa to opraví samo.
    </h4>

    <p class="pt-2">
        <p>
            Ak ste nedočkaví choďte
            <a class="ms-3 btn btn-outline-secondary" href="{{ route('home') }}" role="button">domov</a>
        </p>
    </p>

</x-frontend.layout.master-error>
