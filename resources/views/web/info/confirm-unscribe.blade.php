@section('title', 'Odhlásenie odberu' )
@section('description', 'Potvrdzujúca stránka po odhlásení odberu noviniek.' )
@section('keywords', 'novinky, články, správy, informácie, farnosť Detva, oznamy, odhlásenie odberu, subscription')

<x-web.layout.master>

    <x-web.sections.banner
        header="Odhlásenie odberu"
    />

    <x-web.page.section name="INFO - Unscribe" class="static-page pad_b_50">
        <x-web.page.subsection title="Ďakujeme za odber {{ $subscriber->name }}">

        <p>Ak v budúcnosti budete chcieť odoberať novinky, môžete využiť formulár v spodnej časti stránky.</p>

        </x-web.page.subsection>
    </x-web.page.section>

</x-web.layout.master>
