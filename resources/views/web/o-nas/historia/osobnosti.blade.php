<x-web.layout.master :pageData="$pageData" header="off">

    <x-web.page.section name="PAGE: ({{$pageData['title']}}) -" row="true" class="ch_ministry_section pad_t_50">

        <x-web.page.section-header :header="$pageData['header']" class=""/>

        <x-partials.page-card routeStaticPages="
            o-nas.historia.anton-prokop,
            o-nas.historia.imrich-durica,
            o-nas.historia.jozef-zavodsky,
            o-nas.historia.karol-anton-medvecky,
            o-nas.historia.jan-strban,
            o-nas.historia.jozef-buda
        "/>

    </x-web.page.section>
</x-web.layout.master>
