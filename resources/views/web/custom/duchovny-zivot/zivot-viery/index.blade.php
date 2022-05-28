<x-web.layout.master :pageData="$pageData">

    {{-- Duchovný život /  Život viery --}}

    <x-web.page.section name="PAGE: ({{$pageData['title']}}) PART 1 -" row="true" class="pad_t_30 pad_b_30">

        <x-partials.card-about
            title="Viera v Boha"
            side="left"
            url="{{ secure_url('duchovny-zivot/zivot-viery/viera-v-boha') }}"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="viera-001-menu" class="w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Dokonalý a sám v sebe blažený Boh podľa číro dobrotivého rozhodnutia slobodne stvoril človeka, aby mu dal účasť na svojom blaženom živote.
                Volá ho a pomáha mu, aby ho hľadal, poznával a zo všetkých síl miloval. Všetkých ľudí, rozdelených a rozptýlených hriechom, zvoláva do jednoty svojej rodiny, ktorou je Cirkev.
                Aby to uskutočnil, poslal v plnosti času svojho Syna ako Vykupiteľa a Spasiteľa.
                <span class="d-none d-xl-inline">
                    V ňom a skrze neho volá ľudí, aby sa v Duchu Svätom stali jeho adoptovanými deťmi, a teda aj dedičmi jeho blaženého života.
                    Všetci veriaci v Krista sú povolaní, aby ho odovzdávali z pokolenia na pokolenia, čiže aby ohlasovali vieru, žili ju v bratskom spoločenstve a slávili ju v liturgii a v modlitbe.
                </span>
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{$pageData['title']}}) PART 2 -" row="true" class="pad_t_30 pad_b_30">

        <x-partials.page-card
            routeStaticPages="
                duchovny-zivot.zivot-viery.svate-pismo,
                duchovny-zivot.zivot-viery.bozie-prikazania,
                duchovny-zivot.zivot-viery.cirkevne-prikazania,
            "
        />

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{$pageData['title']}}) PART 3 -" row="true" class="pad_t_30 pad_b_30">

        <x-partials.cart-event
            title="Modlitba"
            url="{{ secure_url('duchovny-zivot/zivot-viery/modlitba') }}"
            side="left"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="modl-001-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Modlitba je povznesenie duše k Bohu. Keď sa človek modlí, vstupuje do živého vzťahu s Bohom.
                Modlitba je veľkou bránou k viere. Ten, kto sa modlí, nežije už viac zo seba, pre seba a z vlastných síl.
                Vie, že jestvuje Boh, s ktorým sa môže rozprávať a čoraz viac sa mu zverovať.
                <span class="d-none d-xl-inline">
                    Už teraz hľadá kontakt s tým, s ktorým sa jedného dňa stretne z tváre do tváre. Preto k životu kresťana patrí každodenná modlitba. Modlitbe sa však nemožno naučiť tak ako nejakej technike. Modlitba je totiž dar, ktorý človek dostáva práve tým, že sa modlí, pretože nás napĺňa nekonečná túžba po Bohu.
                </span>
            </x-slot:teaser>
        </x-partials.cart-event>

        <x-partials.cart-event
            title="Etiketa v kostole"
            url="{{ secure_url('duchovny-zivot/zivot-viery/etiketa-v-kostole') }}"
            side="right"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="etik-001-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Človek, ktorý vchádza do kostola a chce sa zúčastniť na slávení svätej omše, by mal byť čisto, vkusne a aj trochu sviatočne oblečený.
                <span class="d-none d-xl-inline">
                    Dámy by sa mali vyhnúť mikrosukniam a hlbokým výstrihom, páni krátkym nohaviciam.
                    To, čo si dnes najmä v lete ľudia obliekajú do kostola, je vhodné skôr na kúpalisko.
                </span>
                Možno niekto namietne, že vo svojom voľnom čase sa môže obliecť, ako chce.
                No nie je účasť na svätej omši slávnostným a radostným trávením voľného času?
                Nie je to svetlý bod všedného života?
                <span class="d-none d-xl-inline">
                    Tomu by potom malo zodpovedať oblečenie a aj naše správanie.
                    Etiketa platí aj v kostole.
                </span>
            </x-slot:teaser>
        </x-partials.cart-event>

    </x-web.page.section>

</x-web.layout.master>
