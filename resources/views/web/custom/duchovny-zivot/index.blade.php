<x-web.layout.master :pageData="$pageData">

    {{-- Duchovný život --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.page-card routeStaticPages="
            duchovny-zivot.zivot-viery.index,
            duchovny-zivot.sviatosti.index,
            duchovny-zivot.sveteniny.index,
            duchovny-zivot.svate-omse.index,
        " />

    </x-web.page.section>
</x-web.layout.master>
