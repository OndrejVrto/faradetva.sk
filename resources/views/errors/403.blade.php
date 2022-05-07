@section('title', 'Error 403')
@section('description', 'Je nám ľúto. K požadovanej stránke nemáte oprávnenia.')
@section('keywords', 'Nemáte oprávnenia, 403, chyba')

<x-web.layout.master-error errorNumber="403">

    <x-slot name="image">
        <img
            src="{{ asset('images/errors/403-error-forbidden-amico.svg', true) }}"
            class="w-100"
            alt="Vrátnik stopuje pred dverami."
        >
    </x-slot>

    @auth
        <h2>Dobrý deň <span class="text-church-template">{{ Auth::user()->name }}</span></h2>
    @endauth
    <h4>
        Vyzerá to tak, že k tejto <a class="link-secondary link-template" href="{{ URL::current() }}">stránke</a>
        <br>
        nemáte dostatočné oprávnenia.
    </h4>
    <p class="h5 pt-3">
        Oslovte administrátora Ondreja
        <br>
        aby Vám pridelil príslušné práva.
    </p>

    <p class="pt-5">
        <span class="pe-2">Medzitým choďťe</span>
        <a class="btn btn-outline-secondary" href="{{ URL::previous() }}" role="button">späť</a>
        <span class="px-2">prípadne</span>
        <a class="btn btn-outline-secondary" href="{{ route('home') }}" role="button">domov</a>
    </p>

    <div class="pt-4">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <span class="pe-2">alebo sa</span>
            <button class="btn btn-outline-danger" href="#" type="submit">
                odhláste
            </button>
        </form>
    </div>

</x-web.layout.master-error>
