<x-web.layout.master :pageData="$pageData">

    {{-- O nás / História --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART I -" row="true" class="pad_t_30">

        <x-partials.card-about
            title="Dejiny farnosti"
            side="left"
            url="{{ secure_url('o-nas/historia/dejiny-farnosti-detva') }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="muzeum-040-menu" class="img-fluid w-100" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Podpoľanie je oblasť situovaná na južných a&nbsp;juhovýchodných svahoch najvyššieho sopečného pohoria na Slovensku - Poľany, územie na rozhraní medzi Slovenským rudohorím a&nbsp;Slovenským stredohorím. Roztratené osídlenie po svahoch nečinného vulkánu predstavuje špecifiká, ktoré výrazne ovplyvňovali život miestnych obyvateľov. Táto rozsiahla časť Zvolenskej kotliny dostala svoj rázovitý charakter vďaka kopaničiarskej kolonizácii 17. storočia.
                <span class="d-none d-xl-inline">
                    Centrom tejto kolonizácie na území Vígľašského panstva sa stala Detva, ktorá bola založená priamo na podnet svojho zemepána. Sťahovali sa sem obyvatelia okolitých dedín, klčovali lesy na okolí majera a&nbsp;stavali si domy. Farnosť v&nbsp;Detve bola oficiálne zriadená v&nbsp;roku 1644.
                </span>
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART II -" row="true" class="pad_t_30 pad_b_50">

        <x-partials.card-bubble
            title="Farári"
            delay=1
            url="{{ secure_url('o-nas/historia/farari-v-detve') }}"
            >
            <x-slot:icon>
                <i class="fa-solid fa-users"></i>
            </x-slot:icon>
            <x-slot:teaser>
                Správcovia detvianskej farnosti od jej založenia v&nbsp;roku 1644
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Kapláni"
            delay=2
            url="{{ secure_url('o-nas/historia/kaplani-v-detve') }}"
            >
            <x-slot:icon>
                <i class="fa-solid fa-people-carry"></i>
            </x-slot:icon>
            <x-slot:teaser>
                Kapláni, ktorí pôsobili v&nbsp;Detve od začiatku 20. storočia
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Povolania"
            delay=3
            url="{{ secure_url('o-nas/historia/duchovne-povolania') }}"
            >
            <x-slot:icon>
                <i class="fa-solid fa-praying-hands"></i>
            </x-slot:icon>
            <x-slot:teaser>
                Kňazi, rehoľníci a&nbsp;rehoľníčky pochádzajúci z&nbsp;farnosti
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Spomíname"
            delay=4
            url="{{ secure_url('o-nas/historia/knazi-pochovany-v-detve') }}"
            >
            <x-slot:icon>
                <i class="fa-solid fa-heartbeat"></i>
            </x-slot:icon>
            <x-slot:teaser>
                Kňazi pochovaní na detvianskom cintoríne
            </x-slot:teaser>
        </x-partials.card-bubble>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART III -" row="true" class="bg-alt-gray pad_t_80">

        <x-partials.card-event
            title="Chudobienec"
            url="{{ secure_url('o-nas/historia/chudobienec') }}"
            side="left"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="chud-039-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Katolícka cirkev v&nbsp;Detve mala výdavky nielen na kostol a&nbsp;faru, ale aj na sociálne ustanovizne, ktoré sa nachádzali v&nbsp;jej správe. Karol Anton Medvecký ich nazýva <em>„ustanovizne kresťanskej lásky“</em>. Medzi ne patril „špitál“, t. j. cirkevný chudobinec, resp. starobinec a&nbsp;o&nbsp;čosi neskôr postavený sirotinec.
                <span class="d-none d-xl-inline">
                    Farnosť v&nbsp;Detve plnila vďaka miestnemu chudobincu aj zdravotnícko-charitatívnu funkciu. Charitatívne zariadenie poskytovalo strechu nad hlavou a&nbsp;stravu pre najbiednejších v&nbsp;okolí už od prvej polovice 18. storočia.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Štatistiky farnosti"
            url="{{ secure_url('o-nas/historia/statistiky') }}"
            side="right"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="grafy-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Za najstarší druh štatistiky možno považovať sčítanie ľudu, ktoré má na našom území pôvod v&nbsp;stredoveku. Prvé moderné sčítanie ľudu v&nbsp;Uhorsku bolo v&nbsp;roku 1869. Skôr než boli v&nbsp;roku 1895 zavedené štátne matriky vedené na matričných úradoch, boli oficiálnymi, resp. úradnými matrikami cirkevné matriky.
                <span class="d-none d-xl-inline">
                    To čo platilo v&nbsp;minulosti, platí v&nbsp;podstate aj dnes, matriky sú úradné knihy zápisov o&nbsp;narodeniach, sobášoch a&nbsp;úmrtiach. Okrem týchto rímskokatolícke farnosti evidujú taktiež matriky birmovaných a&nbsp;prvoprijímajúcich.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART IV -" row="true" class="pad_t_50 pad_b_80">

        <x-partials.card-article
            title="Vianoce v&nbsp;Detve"
            url="{{ secure_url('o-nas/historia/vianoce-v-detve') }}"
            class="col-12 col-md-6"
            delay=2
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="vian-035-menu2" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Polnočnej svätej omše sa každoročne v&nbsp;Detve zúčastňuje množstvo veriacich nielen z&nbsp;detvianskej farnosti, ale aj zo širokého okolia. Spev počas polnočnej omše znie mohutne, v&nbsp;niektorých častiach svätej omše kostol doslova buráca a&nbsp;ľudia sa tešia z&nbsp;každej piesne.
                <span class="d-none d-xl-inline">
                    Vianočná polnočná svätá omša v&nbsp;Detve sa formovala na začiatku 20. storočia. Popretkávaná ľudovými koledami sa traduje už niekoľko desiatok rokov. Polnočná svätá omša v&nbsp;Detve je okrem  duchovného aj umeleckým zážitkom pre milovníkov ľudovej kultúry.
                </span>
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Slávnosť Božieho tela"
            url="{{ secure_url('o-nas/historia/slavnost-najsvatejsieho-kristovho-tela-a-krvi') }}"
            class="col-12 col-md-6"
            delay=1
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="ktk-001-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Medzi eucharistickými procesiami má osobitný význam a&nbsp;dôležitosť v&nbsp;pastoračnom živote farnosti alebo mesta procesia, ktorá sa koná každý rok na slávnosť Kristovho tela a&nbsp;krvi. Sviatok Božího ťela je cirkevne prikázaným sviatkom a&nbsp;slávi sa vo štvrtok po slávnosti Najsvätejšej Trojice.
                <span class="d-none d-xl-inline">
                    Súčasťou bohoslužieb býva v&nbsp;Detve od nepamäti procesia sprevádzaná dychovou hudbou. Na štyroch miestach v&nbsp;uliciach mesta okolo kostola urobili miestne ženy zelené oltáriky - koľibki, pri ktorých sa udeľovalo eucharistické požehnanie.
                </span>
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>

</x-web.layout.master>
