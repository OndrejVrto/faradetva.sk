<x-frontend.layout.master :pageData="$pageData" header="off">

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" row="true" class="ch_ministry_section pad_t_50">

    <x-frontend.page.section-header :header="$pageData['header']" class=""/>

        <x-partials.page-card routeStaticPages="
                spolocenstva.frantiskansky-svetstky-rad
                spolocenstva.marianske-veceradlo,
                spolocenstva.rad-bosych-karmelitanok,
                spolocenstva.ruzencove-bratstvo,
                spolocenstva.svetsky-rad-bosych-karmelitanov,
                spolocenstva.zdruzenie-salezianskych-spolupracovnikov
            " />
    </x-frontend.page.section>
</x-frontend.layout.master>
