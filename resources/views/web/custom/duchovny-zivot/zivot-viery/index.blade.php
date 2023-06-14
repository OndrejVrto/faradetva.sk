<x-web.layout.master :pageData="$pageData">

    {{-- Duchovný život /  Život viery --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART I -" row="true" class="pad_t_30 pad_b_10">

        <x-partials.card-about
            title="Viera v&nbsp;Boha"
            side="left"
            url="{{ secure_url('duchovny-zivot/zivot-viery/viera-v-boha') }}"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="viera-001-menu" class="img-fluid w-100" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Dokonalý a&nbsp;sám v&nbsp;sebe blažený Boh podľa číro dobrotivého rozhodnutia slobodne stvoril človeka, aby mu dal účasť na svojom blaženom živote.
                Volá ho a&nbsp;pomáha mu, aby ho hľadal, poznával a&nbsp;zo všetkých síl miloval. Všetkých ľudí, rozdelených a&nbsp;rozptýlených hriechom, zvoláva do jednoty svojej rodiny, ktorou je Cirkev.
                Aby to uskutočnil, poslal v&nbsp;plnosti času svojho Syna ako Vykupiteľa a&nbsp;Spasiteľa.
                <span class="d-none d-xl-inline">
                    V&nbsp;ňom a&nbsp;skrze neho volá ľudí, aby sa v&nbsp;Duchu Svätom stali jeho adoptovanými deťmi, a&nbsp;teda aj dedičmi jeho blaženého života.
                    Všetci veriaci v&nbsp;Krista sú povolaní, aby ho odovzdávali z&nbsp;pokolenia na pokolenia, čiže aby ohlasovali vieru, žili ju v&nbsp;bratskom spoločenstve a&nbsp;slávili ju v&nbsp;liturgii a&nbsp;v&nbsp;modlitbe.
                </span>
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART II -" row="true" class="bg-alt-gray pad_t_50 pad_b_50">

        <x-partials.card-article
            title="Sväté písmo"
            url="{{ secure_url('duchovny-zivot/zivot-viery/svate-pismo') }}"
            delay=1
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="svp-007-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Názov Biblia označuje zbierku všetkých biblických spisov mimoriadneho pôvodu. Zvyčajný názov Sväté písmo naznačuje skutočnosť, že vo všetkých jeho spisoch je zachytené Božie zjavenie a&nbsp;Božie slovo.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Božie prikázania"
            url="{{ secure_url('duchovny-zivot/zivot-viery/bozie-prikazania') }}"
            delay=2
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="bpr-006-menu" class="img-fluid w-100" descriptionCrop="4"/>
            </x-slot:img>
            <x-slot:teaser>
                Desatoro Božích prikázaní je vynikajúcim vyjadrením prirodzeného zákona: poznávame ho prostredníctvom Božieho zjavenia a&nbsp;ľudským rozumom. To, čo Boh svojím slovom prikazuje, svojou milosťou umožňuje.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Cirkevné prikázania"
            url="{{ secure_url('duchovny-zivot/zivot-viery/cirkevne-prikazania') }}"
            delay=3
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="etik-013-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Päť cirkevných prikázaní svojimi minimálnymi požiadavkami pripomína, že nemožno byť kresťanom bez morálneho úsilia, bez konkrétnej účasti na sviatostnom živote Cirkvi a&nbsp;bez solidárneho spojenia s&nbsp;ňou.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART III -" row="true" class="pad_t_80">

        <x-partials.card-event
            title="Modlitba"
            url="{{ secure_url('duchovny-zivot/zivot-viery/modlitba') }}"
            side="left"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="modl-001-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Modlitba je povznesenie duše k&nbsp;Bohu. Keď sa človek modlí, vstupuje do živého vzťahu s&nbsp;Bohom.
                Modlitba je veľkou bránou k&nbsp;viere. Ten, kto sa modlí, nežije už viac zo seba, pre seba a&nbsp;z&nbsp;vlastných síl.
                Vie, že jestvuje Boh, s&nbsp;ktorým sa môže rozprávať a&nbsp;čoraz viac sa mu zverovať.
                <span class="d-none d-xl-inline">
                    Už teraz hľadá kontakt s&nbsp;tým, s&nbsp;ktorým sa jedného dňa stretne z&nbsp;tváre do tváre. Preto k&nbsp;životu kresťana patrí každodenná modlitba. Modlitbe sa však nemožno naučiť tak ako nejakej technike. Modlitba je totiž dar, ktorý človek dostáva práve tým, že sa modlí, pretože nás napĺňa nekonečná túžba po Bohu.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Etiketa v&nbsp;kostole"
            url="{{ secure_url('duchovny-zivot/zivot-viery/etiketa-v-kostole') }}"
            side="right"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="etik-001-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Človek, ktorý vchádza do kostola a&nbsp;chce sa zúčastniť na slávení svätej omše, by mal byť čisto, vkusne a&nbsp;aj trochu sviatočne oblečený.
                <span class="d-none d-xl-inline me-2">
                    Dámy by sa mali vyhnúť mikrosukniam a&nbsp;hlbokým výstrihom, páni krátkym nohaviciam.
                    To, čo si dnes najmä v&nbsp;lete ľudia obliekajú do kostola, je vhodné skôr na kúpalisko.
                </span>
                Možno niekto namietne, že vo svojom voľnom čase sa môže obliecť, ako chce.
                No nie je účasť na svätej omši slávnostným a&nbsp;radostným trávením voľného času?
                Nie je to svetlý bod všedného života?
                <span class="d-none d-xl-inline">
                    Tomu by potom malo zodpovedať oblečenie a&nbsp;aj naše správanie.
                    Etiketa platí aj v&nbsp;kostole.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

    </x-web.page.section>

</x-web.layout.master>
