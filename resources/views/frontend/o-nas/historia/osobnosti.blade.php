<x-frontend.layout.master :pageData="$pageData" header="off">

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" row="true" class="ch_ministry_section pad_t_50">

        <x-frontend.page.section-header :header="$pageData['header']" class=""/>

        <x-partials.page-card delay=".2s" routeStaticPage="o-nas.historia.anton-prokop" />
        <x-partials.page-card delay=".4s" routeStaticPage="o-nas.historia.imrich-durica" />
        <x-partials.page-card delay=".6s" routeStaticPage="o-nas.historia.jozef-zavodsky" />
        <x-partials.page-card delay=".8s" routeStaticPage="o-nas.historia.karol-anton-medvecky" />
        <x-partials.page-card delay="1s"  routeStaticPage="o-nas.historia.jan-strban" />
        <x-partials.page-card delay="1.2s" routeStaticPage="o-nas.historia.jozef-buda" />

    </x-frontend.page.section>
</x-frontend.layout.master>
