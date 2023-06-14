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
                <x-partials.picture-responsive titleSlug="kronika-385" class="img-fluid w-100" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Sviatosti Nového zákona ustanovil Ježiš Kristus. Je ich sedem: krst, birmovanie, Eucharistia, pokánie, pomazanie chorých, posvätný stav a&nbsp;manželstvo. Tieto sviatosti sa týkajú všetkých etáp a&nbsp;všetkých dôležitých chvíľ života kresťana.
                Sviatosti nemožno chápať ako <em>sacra-mentum</em>, prostriedok posvätenia, ale ako <em>mysterion</em> - Boží plán spásy realizovaný v Kristovi.
                <p class="d-none d-xl-inline mb-0">
                    Katechizmus Katolíckej cirkvi delí sviatosti do troch kategórií:
                    <ul class="d-none d-xl-inline">
                        <li class="list-unstyled">a) iniciačné sviatosti - krst, birmovanie, Eucharistia</li>
                        <li class="list-unstyled">b) uzdravujúce sviatosti - sviatosť zmierenia a&nbsp;sviatosťpomazania chorých</li>
                        <li class="list-unstyled">c) sviatosti služby a&nbsp;spoločenstva - posvätný stav a&nbsp;manželstvo</li>
                    </ul>
                </p>
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
                Sväteniny sú posvätné znaky, ktorými sa, určitým napodobnením sviatostí, naznačujú a&nbsp;na orodovanie Cirkvi dosahujú najmä duchovné účinky. Sväteniny pripravujú ľudí na prijatie hlavného účinku sviatostí a&nbsp;posväcujú rozličné okolnosti života.
                Ich slávenie vždy obsahuje modlitbu a&nbsp;znaky, odvodzujú sa od krstného kňazstva.
                <p class="text-justify d-none d-xl-inline mb-0">
                    Každý pokrstený je povolaný byť požehnaním a&nbsp;žehnať. Medzi sväteniny zaraďujeme rozličné pobožnosti, požehnania, osobitné služby - ministériá, prvky ľudovej zbožnosti, pohrebné obrady, slávnosti rehoľných spoločenstiev, exorcizmus a podobne.
                </p>
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
                <x-partials.picture-responsive titleSlug="svp-003-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Spoločenstvo vo viere potrebuje spoločnú reč viery, ktorá je pre všetkých normatívna a&nbsp;spája ich v&nbsp;tom istom vyznaní viery. Základnými piliermi kresťanskej viery sú Sväté pismo, Tradícia a&nbsp;učenie Cirkvi.
                Všetci veriaci v&nbsp;Krista sú povolaní, aby poznanie Boha odovzdávali z&nbsp;pokolenia na pokolenia, čiže aby ohlasovali vieru, žili ju v&nbsp;bratskom spoločenstve a&nbsp;slávili ju v&nbsp;liturgii a&nbsp;v&nbsp;modlitbe.
                <p class="text-justify d-none d-xl-inline mb-0">
                    K&nbsp;životu kresťana patrí každodenná modlitba, ktorá povznáša dušu k&nbsp;Bohu. Účasť na svätej omši je vždy slávnostným a&nbsp;radostným trávením času, svetlým bodom všedného života. Tomu by malo patrične zodpovedať oblečenie a&nbsp;aj naše správanie.
                </p>
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>

</x-web.layout.master>
