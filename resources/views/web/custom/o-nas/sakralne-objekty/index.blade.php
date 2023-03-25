@props([
    'class' => 'col-12 col-md-6',
])
<x-web.layout.master :pageData="$pageData">

    {{-- O Nás / Sakrálne objekty --}}
        <!-- Farský kostol -->
        <!-- Kláštorný kostol -->
        <!-- Kalvária -->
        <!-- Kaplnky -->
        <!-- Prícestné sochy -->
        <!-- Detvianske kríže -->

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" class="pad_b_50" row>

        <x-partials.card-article
            title="Farský kostol"
            url="{{ secure_url('o-nas/sakralne-objekty/farsky-kostol-sv-frantiska-z-assisi-v-detve') }}"
            delay=1
            class="{{ $class }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="fk-001-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Prvý a pôvodný renesančný kostol zasvätený sv. Františkovi bol v centre Detve postavený už v roku 1664. Hoci bol pomerne veľký, pre rýchly populačný prírastok obyvateľstva, početným veriacim nestačil. Preto ho zbúrali a na jeho mieste v roku 1803 - 1806 postavili nový, väčší, dnešný kostol v klasicistickom štýle. Až po skompletizovaní celkového vybavenia interiéru bol kostol konsekrovaný v roku 1823. Zo starého kostola sa prevzala len veža, ktorú neskôr nadstavili.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Kláštorný kostol"
            url="{{ secure_url('o-nas/sakralne-objekty/klastorny-kostol-karmel') }}"
            delay=2
            class="{{ $class }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="kk-002-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                V roku 2004 sa v mestskej časti Dolinky začalo s výstavbou kláštora pre kontemplatívne sestry z Rádu bosých karmelitánok. Hoci väčšia časť kláštora je verejnosti neprístupná, kláštorný kostol je možné navštíviť a denne sa v ňom slávia sväté omše za účasti veriacich farnosti. Celý kláštorný komplex s kostolom bol požehnaný v roku 2007. Na stenu presbytéria kostola bola v roku 2018 nainštalovaná mozaika s koncepciou patrocínia kostola.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Kalvária"
            url="{{ secure_url('o-nas/sakralne-objekty/kalvaria') }}"
            delay=1
            class="{{ $class }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="kalv-015-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                V roku 1704 bola na starom (dolnom) cintoríne v Detve postavená Kaplnka sv. Jozefa, ktorá bola v 19. storočí zväčšená na menší kostolík. Ten sa pre havarijný stav musel zbúrať a namiesto neho bola na cintoríne v roku 1910 vybudovaná Kalvária. Tú tvorí 14 zastavení krížovej cesty a Kaplnka Sedembolestnej Panny Márie. Pri príležitosti 100. výročia vybudovania kalvárie sa zrealizovala jej kompletná rekonštrukcia a nanovo ju požehnal biskup Rudolf Baláž.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Kaplnky"
            url="{{ secure_url('o-nas/sakralne-objekty/kaplnky') }}"
            delay=2
            class="{{ $class }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="kapl-005-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Na území detvianskej farnosti sa nachádza niekoľko rôznych kaplniek. Väčšie kaplnky sa nachádzajú v lokalitách Piešť I. - u Slobodov a u Svoreňov, na Sliackej Poľane a v Krnom. V Domove dôchodcov je zriadená ekumenická kaplnka a v Domove sociálnych služieb v stredisku Piešť menšia meditačná kaplnka. Vo farnosti sú aj viaceré Božie muky vo forme menších kaplniek alebo stĺpov. Jedna z najstarších sa nachádza na Sládkovičovej ulici.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Prícestné sochy"
            url="{{ secure_url('o-nas/sakralne-objekty/pricestne-sochy') }}"
            delay=1
            class="{{ $class }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="soch-016-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                K obľúbeným a zľudoveným svätcom 18. storočia patrili sv. Ján Nepomucký so sv. Floriánom. Boli uctievaní ako pomocníci v každodennom živote a ako patróni proti živelným pohromám. V Uhorsku sa ich kult šíril hlavne počas protireformácie a dostal sa aj do Detvy. Dodnes sa tu zachovala kamenná socha sv. Jána Nepomuckého z roku 1768 a neskorobaroková kamenná, polychrómovaná socha sv. Floriána z 2. pol. 18. storočia.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Detvianske kríže"
            url="{{ secure_url('o-nas/sakralne-objekty/detvianske-krize') }}"
            delay=2
            class="{{ $class }}"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="dkriz-kronika-574-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Umelecké cítenie detvianskych ľudí sa dostalo do sveta najmä prostredníctvom pestrých výšiviek a bohato vyrezávaných krížov. Z typologického hľadiska ľudovej umeleckej výroby vyrezávaných krížov v Detve ide jednak o náhrobné kríže, jednak o veľké ústredné a prícestné kríže. V 18. storočí sa v Detve a okolí odrazil vývoj umeleckej úrovne drevených krížov v súvise s barokovým dekorativizmom, označujúc ho termínom zľudovený barok.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>
</x-web.layout.master>
