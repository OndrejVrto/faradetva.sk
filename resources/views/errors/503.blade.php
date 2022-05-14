@section('title', 'Stránka v údržbe')
@section('description', 'Služba je dočasne nedostupná. Stránka je v procese údržby.')
@section('keywords', 'Stánka je v údržbovom režime, 503, chyba')

<x-web.layout.master-error errorNumber="Vitajte">

    <x-slot:image>
        <img
            src="{{ asset('images/errors/503-service-in-maitenence-mode-amico.svg', true) }}"
            class="w-100"
            alt="Pracujeme na stránke ako včielky."
        >
    </x-slot>

    <h4>Vyzerá to tak, že na stránke sa práve vykonáva údžba.</h4>
    <p class="pt-2">Musíte síce chvíľu počkať, ale výsledok bude stáť zato.</p>
    <p class="pt-4">Medzitým skúste hľadať informácie na</p>
    <a class="btn btn-outline-primary" href="https://www.facebook.com/Farnos%C5%A5-Detva-103739418174148" role="button">
        <i class="fab fa-facebook me-1"></i>
        Facebooku
    </a>

</x-web.layout.master-error>
