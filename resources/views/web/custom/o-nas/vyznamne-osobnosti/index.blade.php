<x-web.layout.master :pageData="$pageData">

    {{-- O nás / Významné osobnosti --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART 1 -" row="true" class="pad_t_30 pad_b_50">

        {{-- <x-partials.page-card descriptionCrop=3 routeStaticPages="
            o-nas.vyznamne-osobnosti.karol-anton-medvecky,
            o-nas.vyznamne-osobnosti.anton-prokop,
            o-nas.vyznamne-osobnosti.jan-strban,

            o-nas.vyznamne-osobnosti.stefan-vlk,

            o-nas.vyznamne-osobnosti.jozef-buda,
            o-nas.vyznamne-osobnosti.imrich-durica,
            o-nas.vyznamne-osobnosti.jozef-zavodsky,
        "/> --}}

        <x-partials.card-article
            title="Karol Anton Medvecký"
            url="{{ secure_url('o-nas/vyznamne-osobnosti/karol-anton-medvecky') }}"
            delay=1
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="med-018-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Titulárny prepošt, múzejník, etnograf, historik, publicista a najznámejší kňaz, ktorý doposiaľ pôsobil v Detve. Signatár Martinskej deklarácie a autor prvej slovenskej monografie Detvy.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Anton Prokop"
            url="{{ secure_url('o-nas/vyznamne-osobnosti/anton-prokop') }}"
            delay=2
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pro-001-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Nábožný mladík a horlivý vlastenec. Za aktívny odpor voči okupujúcej armáde maďarských boľševikov, bol nimi popravený obesením na konári lipy pred kostolom v Detve.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Ján Štrbáň"
            url="{{ secure_url('o-nas/vyznamne-osobnosti/mons-jan-strban') }}"
            delay=3
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="str-001-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Pápežský komorník, dlhoročný detviansky farár, obľúbený dušpastier, bývalý františkán a publicista. S horlivou túžbou po svätosti sa angažoval aj v sociálnej a kultúrnej oblasti.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART 2 -" row="true" class="ch_event_section bg-alt-gray pad_t_80">

        <x-partials.card-event
            title="Štefan Vlk"
            url="{{ secure_url('o-nas/vyznamne-osobnosti/stefan-vlk') }}"
            side="left"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="vlk-001-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Štefan Vlk sa narodil v Drahovciach na západnom Slovensku.
                Ako 27 ročný sa rozhodol, že zanechá starý spôsob života.
                Sadol na bicykel a šiel.
                Cestou sa modlil, aby sa zastavil a zostal tam, kde to bude chcieť Pán Boh.
                <span class="d-none d-xl-inline">
                    Prešiel poriadny kus cesty po celom Slovensku až po Čiernu nad Tisou a stále nemal pocit, že tam niekde treba zostať.
                    Na spiatočnej ceste sa mu neďaleko Detvy pokazil bicykel, ktorý si začal opravovať a keď počul z diaľky kostolné zvony, zaumienil si ísť sa pozrieť čo je to za kostol.
                    Prostredie aj kostol sa mu páčil a takto sa napokon rozhodol ostať v Detve.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        {{-- <x-partials.card-event
            title="Pomazanie chorých"
            url="{{ secure_url('duchovny-zivot/sviatosti/pomazanie-chorych') }}"
            side="right"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr5-001-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Túto sviatosť môže prijať každý pokrstený, ktorý sa nachádza v kritickom zdravotnom stave alebo situácii ohrozujúcej život.
                Sviatosť pomazania chorých môžeme prijať v živote viackrát.
                Preto má zmysel požiadať o túto sviatosť aj v mladom veku, ak má človek podstúpiť ťažkú operáciu.
                <span class="d-none d-xl-inline">
                    Mnohí kresťania v takejto situácii spájajú sviatosť pomazania chorých so sviatosťou zmierenia, spolu so svätým prijímaním; v každom prípade chcú predstúpiť pred Boha s čistým svedomím.
                    Podstatou obradu slávenia tejto sviatosti je modlitba kňaza spojená s pomazaním čela a rúk posväteným olejom.
                </span>
            </x-slot:teaser>
        </x-partials.card-event> --}}

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART 3 -" row="true" class="pad_t_80 pad_b_50">

        <x-partials.card-article
            title="Jozef Búda"
            url="{{ secure_url('o-nas/vyznamne-osobnosti/prof-thdr-jozef-buda') }}"
            delay=1
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="bud-007-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Univerzitný profesor, teológ, prekladateľ Starého zákona, trpiteľ za vieru. Ako kaplán v Detve sa stal prvým správcom novozriadenej farnosti v Hriňovej, o ktorej vznik sa sám pričinil.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Imrich Ďurica"
            url="{{ secure_url('o-nas/vyznamne-osobnosti/imrich-durica') }}"
            delay=2
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="dur-009-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Honorárny kanonik, pedagóg, publicista, trpiteľ za vieru. Pochádzal z chudobnej maloroľníckej rodiny. Počas gymnaziálnych štúdií sa jeho rodičia presťahovali z Detvy do Hodejova.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Jozef Závodský"
            url="{{ secure_url('o-nas/vyznamne-osobnosti/jozef-zavodsky') }}"
            delay=3
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="zav-039-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Nositeľ Československého vojnového kríža za zásluhy počas druhej svetovej vojny. Aktívny farár - staviteľ novej budovy fary, iniciátor výstavby kostolov v Kriváni a Korytárkach.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>
</x-web.layout.master>
