<x-web.layout.master :pageData="$pageData" header="off">

    {{-- O nás / Významné osobnosti --}}

    <x-web.page.section name="SECTION: Významné osobnosti" row="true" class="ch_about_section pad_b_50">

        <x-partials.page-card descriptionCrop=3 routeStaticPages="
            o-nas.vyznamne-osobnosti.anton-prokop,
            o-nas.vyznamne-osobnosti.imrich-durica,
            o-nas.vyznamne-osobnosti.jozef-zavodsky,
            o-nas.vyznamne-osobnosti.karol-anton-medvecky,
            o-nas.vyznamne-osobnosti.jan-strban,
            o-nas.vyznamne-osobnosti.jozef-buda
        "/>

    </x-web.page.section>
</x-web.layout.master>
