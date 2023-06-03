<x-web.layout.master :pageData="$pageData">

    {{-- Duchovný život --}}
        {{-- zivot-viery --}}
        {{-- sviatosti --}}
        {{-- sveteniny --}}
        {{-- svate-omse --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" class="pad_t_30 pad_b_30">

        <x-partials.card-about
            title="Sedem sviatostí Cirkvi"
            side="left"
            url="{{ secure_url('duchovny-zivot/sviatosti') }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr3-006-menu2" class="img-fluid w-100" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Sviatosti Nového zákona ustanovil Ježiš Kristus. Je ich sedem: krst, birmovanie, Eucharistia, pokánie, pomazanie chorých, posvätný stav a manželstvo. Tieto sviatosti sa týkajú všetkých etáp a všetkých dôležitých chvíľ života kresťana.
                <span class="d-none d-xl-inline">
                </span>
            </x-slot:teaser>
        </x-partials.card-about>

        <hr class="border border-primary border-1 mb-0">

        <x-partials.card-about
            class="my-5"
            title="Sväteniny Cirkvi"
            side="right"
            url="{{ secure_url('duchovny-zivot/sveteniny') }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="poz-007-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Sväteniny sú posvätné znaky, ktorými sa, určitým napodobnením sviatostí, naznačujú a na orodovanie Cirkvi dosahujú najmä duchovné účinky. Sväteniny pripravujú ľudí na prijatie hlavného účinku sviatostí a posväcujú rozličné okolnosti života.
                <span class="d-none d-xl-inline me-2">

                </span>
            </x-slot:teaser>
        </x-partials.card-about>

        <hr class="border border-primary border-1 mb-0">

        <x-partials.card-about
            class="mt-5"
            title="Kresťanský život viery"
            side="left"
            url="{{ secure_url('duchovny-zivot/zivot-viery') }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr7-003-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Spoločenstvo vo viere potrebuje spoločnú reč viery, ktorá je pre všetkých normatívna a spája ich v tom istom vyznaní viery. Základnými piliermi kresťanskej viery sú Sväté pismo, Tradícia a učenie Cirkvi.
                <span class="d-none d-xl-inline me-2">

                </span>
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>

    {{-- <hr class="border border-primary border-4">

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.page-card routeStaticPages="
            duchovny-zivot.zivot-viery.index,
            duchovny-zivot.sviatosti.index,
            duchovny-zivot.sveteniny.index,
            duchovny-zivot.svate-omse.index,
        " />

    </x-web.page.section> --}}

</x-web.layout.master>
