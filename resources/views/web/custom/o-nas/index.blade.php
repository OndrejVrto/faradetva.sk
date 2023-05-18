<x-web.layout.master :pageData="$pageData">

    {{-- O Nás --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.page-card routeStaticPages="
            o-nas.historia.index,
            o-nas.pastoracia.index,
            o-nas.patron-farnosti.svaty-frantisek-assisi,
            o-nas.sakralne-objekty.index,
            o-nas.vyznamne-osobnosti.index,
        " />

    </x-web.page.section>
</x-web.layout.master>
