<x-web.layout.master :pageData="$pageData">

    {{-- Spoločenstvá  --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.page-card routeStaticPages="
            spolocenstva.frantiskansky-svetstky-rad,
            spolocenstva.marianske-veceradlo,
            spolocenstva.rad-bosych-karmelitanok,
            spolocenstva.ruzencove-bratstvo,
            spolocenstva.svetsky-rad-bosych-karmelitanov,
            spolocenstva.zdruzenie-salezianskych-spolupracovnikov,
            spolocenstva.hnutie-krestanskych-rodin,
            spolocenstva.katolicka-charizmaticka-obnova,
            spolocenstva.sluzobnici-jezisovho-velknazskeho-srdca,
        " />

    </x-web.page.section>
</x-web.layout.master>
