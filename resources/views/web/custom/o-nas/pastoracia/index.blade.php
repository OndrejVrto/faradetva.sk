<x-web.layout.master :pageData="$pageData">

    {{-- O Nás / Pastorácia --}}
        {{-- akolyti --}}
        {{-- farske-rady --}}
        {{-- kostolnici --}}
        {{-- lektori --}}
        {{-- ministranti --}}
        {{-- organisti-spevaci --}}
        {{-- spevokoly-a-dychovka --}}
        {{-- vyucovanie-nabozenstva --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.page-card routeStaticPages="
            {{-- o-nas.pastoracia.akolyti, --}}
                o-nas.pastoracia.farske-rady,
                o-nas.pastoracia.kostolnici,
            {{-- o-nas.pastoracia.lektori, --}}
                o-nas.pastoracia.ministranti,
            {{-- o-nas.pastoracia.organisti-spevaci, --}}
            {{-- o-nas.pastoracia.spevokoly-a-dychovka, --}}
            {{-- o-nas.pastoracia.vyucovanie-nabozenstva, --}}
        " />

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" class="pad_b_50" row>

        <x-partials.card-article
            title="Lektori"
            url="{{ secure_url('o-nas/pastoracia/lektori') }}"
            delay=1
            class="col-12 col-md-6"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="lekt-009-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Lektor je ten, kto číta v&nbsp;liturgii Božie slovo. Prostredníctvom prednesu, čítania sa Božie slovo stáva živým a&nbsp;oslovujúcim všetkých členov liturgického zhromaždenia. Už v&nbsp;3. storočí boli lektori ustanovení biskupom nato, aby čítali Božie slovo v&nbsp;rámci liturgických slávení. Všade, kde chýba lektor, sú určení laici na prednášanie liturgických čítaní.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Akolyti"
            url="{{ secure_url('o-nas/pastoracia/akolyti') }}"
            delay=2
            class="col-12 col-md-6"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="akol-014-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Akolyta je mimoriadny vysluhovateľ svätého prijímania, ktorý je biskupom ustanovený pomáhať kňazom a&nbsp;diakonom pri liturgických úkonoch, najmä pri slávení svätej omše. V&nbsp;prvých dvoch storočiach kvôli prenasledovaniam kresťanov a&nbsp;z&nbsp;nedostatku kňazov bolo bežné, že si veriaci laici sami sebe podávali sväté prijímanie.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.page-card routeStaticPages="
            o-nas.pastoracia.organisti-spevaci,
            o-nas.pastoracia.spevokoly-a-dychovka,
            o-nas.pastoracia.vyucovanie-nabozenstva,
        " />

    </x-web.page.section>
</x-web.layout.master>


{{-- o-nas.pastoracia.farske-rady,
o-nas.pastoracia.ministranti,
o-nas.pastoracia.kostolnici,

o-nas.pastoracia.lektori,
o-nas.pastoracia.akolyti,

o-nas.pastoracia.organisti-spevaci,
o-nas.pastoracia.spevokoly-a-dychovka,
o-nas.pastoracia.vyucovanie-nabozenstva, --}}



