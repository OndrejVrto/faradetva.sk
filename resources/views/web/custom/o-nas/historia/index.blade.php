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
                Podpoľanie je oblasť situovaná na južných a juhovýchodných svahoch najvyššieho sopečného pohoria na Slovensku - Poľany, územie na rozhraní medzi Slovenským rudohorím a Slovenským stredohorím. Roztratené osídlenie po svahoch nečinného vulkánu predstavuje špecifiká, ktoré výrazne ovplyvňovali život miestnych obyvateľov. Táto rozsiahla časť Zvolenskej kotliny dostala svoj rázovitý charakter vďaka kopaničiarskej kolonizácii 17. storočia.
                <span class="d-none d-xl-inline">
                    Centrom tejto kolonizácie na území Vígľašského panstva sa stala Detva, ktorá bola založená priamo na podnet svojho zemepána. Sťahovali sa sem obyvatelia okolitých dedín, klčovali lesy na okolí majera a stavali si domy. Farnosť v Detve bola oficiálne zriadená v roku 1644.
                </span>
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART II -" row="true" class="pad_t_30 pad_b_50">

        <x-partials.card-bubble
            title="Farári"
            icon="fa-solid fa-users"
            delay=1
            url="{{ secure_url('o-nas/historia/farari-v-detve') }}"
            >
            <x-slot:teaser>
                Správcovia detvianskej farnosti od jej založenia v roku 1644
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Kapláni"
            icon="fa-solid fa-people-carry"
            delay=2
            url="{{ secure_url('o-nas/historia/kaplani-v-detve') }}"
            >
            <x-slot:teaser>
                Kapláni, ktorí pôsobili v Detve od začiatku 20. storočia
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Povolania"
            icon="fa-solid fa-praying-hands"
            delay=3
            url="{{ secure_url('o-nas/historia/duchovne-povolania') }}"
            >
            <x-slot:teaser>
                Kňazi, rehoľníci a rehoľníčky pochádzajúci z farnosti
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Spomíname"
            icon="fa-solid fa-heartbeat"
            delay=4
            url="{{ secure_url('o-nas/historia/knazi-pochovany-v-detve') }}"
            >
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
                Katolícka cirkev v Detve mala výdavky nielen na kostol a faru, ale aj na sociálne ustanovizne, ktoré sa nachádzali v jej správe. Karol Anton Medvecký ich nazýva <em>„ustanovizne kresťanskej lásky“</em>. Medzi ne patril „špitál“, t. j. cirkevný chudobinec, resp. starobinec a o čosi neskôr postavený sirotinec.
                <span class="d-none d-xl-inline">
                    Farnosť v Detve plnila vďaka miestnemu chudobincu aj zdravotnícko-charitatívnu funkciu. Charitatívne zariadenie poskytovalo strechu nad hlavou a stravu pre najbiednejších v okolí už od prvej polovice 18. storočia.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Vianoce v Detve"
            url="{{ secure_url('o-nas/historia/vianoce-v-detve') }}"
            side="right"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="vian-035-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Polnočnej svätej omše sa každoročne v Detve zúčastňuje množstvo veriacich nielen z detvianskej farnosti, ale aj zo širokého okolia. Spev počas polnočnej omše znie mohutne, v niektorých častiach svätej omše kostol doslova buráca a ľudia sa tešia z každej piesne.
                <span class="d-none d-xl-inline">
                    Vianočná polnočná svätá omša v Detve sa formovala na začiatku 20. storočia. Popretkávaná ľudovými koledami sa traduje už niekoľko desiatok rokov. Polnočná svätá omša v Detve je okrem  duchovného aj umeleckým zážitkom pre milovníkov ľudovej kultúry.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Štatistiky farnosti"
            url="{{ secure_url('o-nas/historia/statistiky') }}"
            side="left"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="grafy-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Za najstarší druh štatistiky možno považovať sčítanie ľudu, ktoré má na našom území pôvod v stredoveku. Prvé moderné sčítanie ľudu v Uhorsku bolo v roku 1869. Skôr než boli v roku 1895 zavedené štátne matriky vedené na matričných úradoch, boli oficiálnymi, resp. úradnými matrikami cirkevné matriky.
                <span class="d-none d-xl-inline">
                    To čo platilo v minulosti, platí v podstate aj dnes, matriky sú úradné knihy zápisov o narodeniach, sobášoch a úmrtiach. Okrem týchto rímskokatolícke farnosti evidujú taktiež matriky birmovaných a prvoprijímajúcich.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

    </x-web.page.section>

</x-web.layout.master>

