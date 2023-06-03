<x-web.layout.master :pageData="$pageData">

    {{-- Spoločenstvá  --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.page-card routeStaticPages="
            {{-- spolocenstva.index, --}}

            spolocenstva.frantiskansky-svetstky-rad,
            {{-- Spoločenstvo Najsvätejšieho Srdca Ježišovho --}}
            spolocenstva.ruzencove-bratstvo,
            spolocenstva.saleziansky-spolupracovnici,
            spolocenstva.hnutie-krestanskych-rodin,
            spolocenstva.katolicka-charizmaticka-obnova,
            spolocenstva.marianske-veceradlo,
            spolocenstva.modlitby-matiek,
            spolocenstva.spolocenstvo-barka,
            spolocenstva.zdruzenie-faustinum,
            spolocenstva.rad-bosych-karmelitanok,
            spolocenstva.svetsky-rad-bosych-karmelitanov,
            spolocenstva.sluzobnici-jezisovho-velknazskeho-srdca,
        " />

    </x-web.page.section>
</x-web.layout.master>
