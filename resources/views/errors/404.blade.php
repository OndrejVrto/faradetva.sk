
@section('title', 'Error 404')
@section('description', 'Je nám ľúto. Požadovaná stránka neexistuje.')
@section('keywords', 'Stránka neexistuje, 404, chyba')

<x-frontend.layout.master-error errorNumber="404">

    <x-slot name="image">
        <img
            src="{{ URL::asset('images/errors/404-error-with-a-brokenrobot-amico.svg') }}"
            class="w-100"
            alt="Detektív s lupou hľadá chybu na stránke."
        >
    </x-slot>

    <h4>Vyzerá to tak, že táto stránka chýba.</h4>
    <p class="h5">Nebojte sa, náš najlepší robot <br> na tom už pracuje.</p>
    <p class="pt-4">Medzitým skúste ísť</p>
    <a class="btn btn-outline-secondary" href="{{ route('home') }}" role="button">Domov</a>

</x-frontend.layout.master-error>
