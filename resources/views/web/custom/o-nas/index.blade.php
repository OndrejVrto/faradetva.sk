<x-web.layout.master :pageData="$pageData">

    {{-- O&nbsp;nás --}}
        {{-- História --}}
        {{-- Patrón farnosti --}}
        {{-- Sakrálne objekty --}}
        {{-- Významné osobnosti --}}
        {{-- Spoločenstvá --}}
        {{-- Pastorácia --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) -" class="ch_event_section pad_t_30">

        <x-partials.card-event
            title="História"
            url="{{ secure_url('o-nas/historia') }}"
            side="right"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="kronika-001-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Farnosť bola oficiálne zriadená v&nbsp;roku 1644 ostrihomským arcibiskupom Jurajom Lippayom. Okrem jezuitov pôsobili v&nbsp;mladej osade aj františkáni, ich služba v&nbsp;Detve zanechala trvalú pamiatku v&nbsp;podobe patrocínia Kostola sv. Františka Assiského. Farnosť v&nbsp;Detve plnila vďaka miestnemu chudobincu aj zdravotnícko-charitatívnu funkciu.
                <span class="d-none d-xl-inline me-2">
                    Charitatívne zariadenie poskytovalo strechu nad hlavou a&nbsp;stravu pre najbiednejších v&nbsp;okolí už od prvej polovice 18.&nbsp;storočia. Skôr než boli v&nbsp;roku 1895 zavedené štátne matriky vedené na matričných úradoch, boli oficiálnymi, resp. úradnými matrikami cirkevné matriky. To čo platilo v&nbsp;minulosti, platí v&nbsp;podstate aj dnes, matriky sú úradné knihy zápisov o&nbsp;narodeniach, sobášoch a&nbsp;úmrtiach. Farnosť eviduje taktiež matriky birmovaných a&nbsp;prvoprijímajúcich.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Svätý František z&nbsp;Assisi"
            url="{{ secure_url('o-nas/patron-farnosti') }}"
            side="left"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="patr-015-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Svätý František sa narodil okolo roku 1181 v&nbsp;umbrijskom meste Assisi na úpätí hory Monte Subasio v&nbsp;Taliansku.
                <span class="d-none d-xl-inline">
                    Vlastným menom sa volal Giovanni Battista Bernardone.
                </span>
                František získal pomerne dobré vzdelanie a&nbsp;vo svojej mladosti viedol bezstarostný život s&nbsp;dostatkom finančných prostriedkov.
                V&nbsp;opustenom poľnom kostolíku sv. Damiána zažil František videnie, ktoré dalo jeho životu nový smer.
                <span class="d-none d-xl-inline">
                    Prihovoril sa mu z&nbsp;oltárneho kríža ukrižovaný Kristus: <cite>„František, oprav mi kostol! Veď vidíš, že sa celkom rozpadáva!“</cite>
                    Po smrti svätého Františka v&nbsp;roku 1226 sa rozrástol počet nielen jeho ctiteľov, ale aj nasledovníkov.
                    Za svätého bol vyhlásený hneď v&nbsp;roku 1228.
                    Mužská vetva Rehole menších bratov, nazývaná podľa zakladateľa františkáni, dosiahla ku koncu 13.&nbsp;storočia už do 40&nbsp;000 členov.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Sakrálne objekty vo farnosti"
            url="{{ secure_url('o-nas/sakralne-objekty') }}"
            side="right"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="kapl-008-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Prvý a&nbsp;pôvodný kostol v&nbsp;Detve bol postavený v&nbsp;roku 1664.
                Hoci bol pomerne veľký, pre rýchly populačný prírastok obyvateľstva, početným veriacim nestačil.
                Preto ho zbúrali a&nbsp;na jeho mieste v&nbsp;rokoch 1803 - 1806 postavili nový, väčší, dnešný kostol.
                <span class="d-none d-xl-inline">
                    Na cintoríne bola postavená Kaplnka sv. Jozefa, ktorá bola neskôr zväčšená na menší kostolík. Ten sa pre havarijný stav musel zbúrať a&nbsp;namiesto neho bola na cintoríne v&nbsp;roku 1910 vybudovaná Kalvária.
                    Na území detvianskej farnosti sa nachádza niekoľko rôznych kaplniek, dve prícestné sochy a&nbsp;množstvo drevených vyrezávaných krížov s&nbsp;bohatým umeleckým zdobením.
                    V&nbsp;časti Dolinky sa pre kontemplatívne sestry z&nbsp;Rádu bosých karmelitánok v&nbsp;roku 2004 začalo s&nbsp;výstavbou kláštora, ktorý bol spolu s&nbsp;kostolom dokončený a&nbsp;požehnaný v&nbsp;roku 2007.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Významné osobnosti"
            url="{{ secure_url('o-nas/vyznamne-osobnosti') }}"
            side="left"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="str-019-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                V&nbsp;detvianskej farnosti žilo a&nbsp;pôsobilo viacero významných osobností cirkevného i&nbsp;kultúrneho života.
                Medzi najvýraznejšie osobnosti 20.&nbsp;storočia určite patria:
                Karol A.&nbsp;Medvecký - autor prvej slovenskej monografie Detvy.
                <span class="d-xl-none">
                    Ďalej Anton Prokop, Ján Štrbáň, Štefan Vlk, Jozef Búda, Imrich Ďurica, Jozef Závodský.
                </span>
                <span class="d-none d-xl-inline">
                    Anton Prokop - nábožný mladík a&nbsp;horlivý vlastenec popravený boľševikmi pred detvianskym kostolom.
                    Ján Štrbáň - dlhoročný detviansky farár, obľúbený dušpastier, bývalý františkán.
                    Štefan Vlk - ľudovo obľúbená osobnosť s&nbsp;mnohými zásluhami na Podpoľaní, žil a&nbsp;zomrel v&nbsp;povesti svätosti.
                    Jozef Búda - univerzitný profesor, ako kaplán v&nbsp;Detve sa stal prvým správcom novozriadenej farnosti v&nbsp;Hriňovej.
                    Imrich Ďurica - trpiteľ za vieru, pochádzajúci z&nbsp;chudobnej maloroľníckej detvianskej rodiny.
                    Jozef Závodský - aktívny detviansky farár, staviteľ novej budovy fary.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Spoločenstvá"
            url="{{ secure_url('spolocenstva') }}"
            side="right"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="ocds-001-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Farnosť je určité spoločenstvo spoločenstiev veriacich, natrvalo ustanovené v&nbsp;partikulárnej cirkvi pod starostlivosťou vlastného pastiera - farára.
                Farnosť cez svoje spoločenstvá uvádza kresťanský ľud do riadneho liturgického života a&nbsp;zhromažďuje ho na nedeľné slávenia; vyučuje Kristovo učenie; praktizuje Pánovu lásku v&nbsp;dobrých a&nbsp;bratských skutkoch.
                <span class="d-none d-xl-inline me-2">
                    Vo farnosti v&nbsp;Detve pôsobí viacero aktívnych spoločenstiev: Františkánsky svetský rád, Spoločenstvo Najsvätejšieho Srdca Ježišovho, Ružencové bratstvo, Združenie saleziánskych spolupracovníkov, Hnutie kresťanských rodín, Katolícka charizmatická obnova, Mariánske večeradlo, Modlitby matiek, Spoločenstvo Bárka, Združenie Faustínum, Rád bosých karmelitánok, Svetský rád bosých karmelitánov, Služobníci Ježišovho Veľkňazského Srdca.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Pastorácia vo farnosti"
            url="{{ secure_url('o-nas/pastoracia') }}"
            side="left"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="far-002-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                <span class="d-none d-xl-inline me-2">
                    Každý kňaz poverený správou farnosti potrebuje svojich spolupracovníkov, ktorí sú poverení jednotlivými úlohami vo farskej rade, pri liturgických sláveniach, pri katechéze vo farnosti, ako aj vyučovaním náboženskej výchovy.
                </span>
                Vo farnosti je ustanovená Farská ekonomická rada a&nbsp;volená Farská pastoračná rada.
                Niektoré služby pre potreby Božieho ľudu ustanovila Cirkev už v&nbsp;najstarších dobách.
                Do služieb, ktoré sa zverujú veriacim, aby ich vykonávali pri liturgii zahŕňame služby lektorov, akolytov, miništrantov, kostolníkov, organistov, spevákov, speváckych zborov či dychovky.
                <span class="d-none d-xl-inline me-2">
                    V&nbsp;dnešnej spoločnosti, ktorá naznačuje, že nepotrebuje nijaké náboženstvo, je veľmi dôležité poukázať na potrebu kresťanského pôsobenia v&nbsp;nej, k&nbsp;čomu má prispievať aj vyučovanie náboženstva na školách.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

    </x-web.page.section>
</x-web.layout.master>
