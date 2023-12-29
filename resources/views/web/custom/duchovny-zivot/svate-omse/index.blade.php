<x-web.layout.master :pageData="$pageData">

    {{-- Duchovný život / Sväté omše --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) -" class="static-page pad_b_50">

        <p>
            Zatiaľ túto stránku nepotrebujeme pretože časy konania svätých omší sa zverejňujú
            v&nbsp;<a href="{{ secure_url('duchovny-zivot/sviatosti') }}">oznamoch</a> na každý týždeň.
        </p>

    </x-web.page.section>
</x-web.layout.master>
