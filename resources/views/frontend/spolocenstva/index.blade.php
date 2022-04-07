<x-frontend.layout.master :pageData="$pageData" header="off">

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" row="true" class="ch_ministry_section pad_t_50">

    <x-frontend.page.section-header :header="$pageData['header']" class=""/>

        <x-partials.page-card delay=".2s" routeStaticPage="spolocenstva.frantiskansky-svetstky-rad" />
        <x-partials.page-card delay=".4s" routeStaticPage="spolocenstva.marianske-veceradlo" />
        <x-partials.page-card delay=".6s" routeStaticPage="spolocenstva.rad-bosych-karmelitanok" />
        <x-partials.page-card delay=".8s" routeStaticPage="spolocenstva.ruzencove-bratstvo" />
        <x-partials.page-card delay="1s"  routeStaticPage="spolocenstva.svetsky-rad-bosych-karmelitanov" />
        <x-partials.page-card delay="1.2s" routeStaticPage="spolocenstva.zdruzenie-salezianskych-spolupracovnikov" />

    </x-frontend.page.section>
</x-frontend.layout.master>
