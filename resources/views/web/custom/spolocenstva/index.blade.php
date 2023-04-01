<x-web.layout.master :pageData="$pageData">

    {{-- Spoločenstvá  --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.page-card routeStaticPages="
            spolocenstva.index,
            spolocenstva.spolocenstvo-barka,
            spolocenstva.frantiskansky-svetstky-rad,
            spolocenstva.hnutie-krestanskych-rodin,
            spolocenstva.katolicka-charizmaticka-obnova,
            spolocenstva.marianske-veceradlo,
            spolocenstva.modlitby-matiek,
            spolocenstva.rad-bosych-karmelitanok,
            spolocenstva.ruzencove-bratstvo,
            spolocenstva.saleziansky-spolupracovnici,
            spolocenstva.sluzobnici-jezisovho-velknazskeho-srdca,
            spolocenstva.svetsky-rad-bosych-karmelitanov,
            spolocenstva.zdruzenie-faustinum,
        " />

    </x-web.page.section>
</x-web.layout.master>
