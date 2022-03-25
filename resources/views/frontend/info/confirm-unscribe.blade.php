@section('title', 'Odhlásenie odberu' )
@section('description', 'Potvrdzujúca stránka po odhlásení odberu noviniek.' )
@section('keywords', 'novinky, články, správy, informácie, farnosť Detva, oznamy, odhlásenie odberu, subscription')

<x-frontend.layout.master>

    <x-frontend.sections.banner
        header="Odhlásenie odberu"
    />

    <x-frontend.page.section name="INFO - Unscribe" class="static-page pad_t_50 pad_b_50">
        <x-frontend.page.subsection title="Ďakujeme za odber {{ $subscriber->name }}">

        <p>Ak v budúcnosti budete chcieť odoberať novinky, môžete využiť formulár v spodnej časti stránky.</p>

        </x-frontend.page.subsection>
    </x-frontend.page.section>

</x-frontend.layout.master>
