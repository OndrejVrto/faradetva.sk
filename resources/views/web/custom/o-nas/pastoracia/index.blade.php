<x-web.layout.master :pageData="$pageData">

    {{-- O Nás / Pastorácia --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.page-card routeStaticPages="
            o-nas.pastoracia.akolyti,
            o-nas.pastoracia.farska-rada,
            o-nas.pastoracia.kostolnici,
            o-nas.pastoracia.lektori,
            o-nas.pastoracia.ministranti,
            o-nas.pastoracia.organisti-spevaci,
            o-nas.pastoracia.spevokoly-a-dychovka,
            o-nas.pastoracia.vyucovanie-nabozenstva,
        " />

    </x-web.page.section>
</x-web.layout.master>
