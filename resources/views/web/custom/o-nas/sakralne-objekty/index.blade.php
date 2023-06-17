@props([
    'class' => 'col-12 col-md-6',
])
<x-web.layout.master :pageData="$pageData">

    {{-- O Nás / Sakrálne objekty --}}
        {{-- Farský kostol --}}
        {{-- Kláštorný kostol --}}
        {{-- Kalvária --}}
        {{-- Kaplnky --}}
        {{-- Prícestné sochy --}}
        {{-- Detvianske kríže --}}

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
                Prvý a&nbsp;pôvodný renesančný kostol zasvätený sv. Františkovi bol v&nbsp;centre Detvy postavený už v&nbsp;roku 1664. Hoci bol pomerne veľký, pre rýchly populačný prírastok obyvateľstva, početným veriacim nestačil. Preto ho zbúrali a&nbsp;na jeho mieste v&nbsp;rokoch 1803 - 1806 postavili nový, väčší, dnešný kostol v&nbsp;klasicistickom štýle. Až po skompletizovaní celkového vybavenia interiéru bol kostol konsekrovaný v&nbsp;roku 1823. Zo starého kostola sa prevzala len veža, ktorú neskôr nadstavili.
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
                V&nbsp;roku 2004 sa v&nbsp;mestskej časti Dolinky začalo s&nbsp;výstavbou kláštora pre kontemplatívne sestry z&nbsp;Rádu bosých karmelitánok. Hoci väčšia časť kláštora je verejnosti neprístupná, kláštorný kostol je možné navštíviť a&nbsp;denne sa v&nbsp;ňom slávia sväté omše za účasti veriacich farnosti. Celý kláštorný komplex s&nbsp;kostolom bol požehnaný v&nbsp;roku 2007. Na stenu presbytéria kostola bola v&nbsp;roku 2018 nainštalovaná mozaika s&nbsp;koncepciou patrocínia kostola.
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
                V&nbsp;roku 1704 bola na starom (dolnom) cintoríne v&nbsp;Detve postavená Kaplnka sv. Jozefa, ktorá bola v&nbsp;19. storočí zväčšená na menší kostolík. Ten sa pre havarijný stav musel zbúrať a&nbsp;namiesto neho bola na cintoríne v&nbsp;roku 1910 vybudovaná Kalvária. Tú tvorí 14 zastavení krížovej cesty a&nbsp;Kaplnka Sedembolestnej Panny Márie. Pri príležitosti 100. výročia vybudovania kalvárie sa zrealizovala jej kompletná rekonštrukcia a&nbsp;nanovo ju požehnal biskup Rudolf Baláž.
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
                Na území detvianskej farnosti sa nachádza niekoľko rôznych kaplniek. Väčšie kaplnky sa nachádzajú v&nbsp;lokalitách Piešť I. - u&nbsp;Slobodov a&nbsp;u&nbsp;Svoreňov, na Sliackej Poľane a&nbsp;v&nbsp;Krnom. V&nbsp;Domove dôchodcov je zriadená ekumenická kaplnka a&nbsp;v&nbsp;Domove sociálnych služieb v&nbsp;stredisku Piešť menšia meditačná kaplnka. Vo farnosti sú aj viaceré Božie muky vo forme menších kaplniek alebo stĺpov. Jedna z&nbsp;najstarších sa nachádza na Sládkovičovej ulici.
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
                K&nbsp;obľúbeným a&nbsp;zľudoveným svätcom 18. storočia patrili sv. Ján Nepomucký so sv. Floriánom. Boli uctievaní ako pomocníci v&nbsp;každodennom živote a&nbsp;ako patróni proti živelným pohromám. V&nbsp;Uhorsku sa ich kult šíril hlavne počas protireformácie a&nbsp;dostal sa aj do Detvy. Dodnes sa tu zachovala kamenná socha sv. Jána Nepomuckého z&nbsp;roku 1768 a&nbsp;neskorobaroková kamenná, polychrómovaná socha sv. Floriána z&nbsp;2. pol. 18. storočia.
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
                Umelecké cítenie detvianskych ľudí sa dostalo do sveta najmä prostredníctvom pestrých výšiviek a&nbsp;bohato vyrezávaných krížov. Z&nbsp;typologického hľadiska ľudovej umeleckej výroby vyrezávaných krížov v&nbsp;Detve ide jednak o&nbsp;náhrobné kríže, jednak o&nbsp;veľké ústredné a&nbsp;prícestné kríže. V&nbsp;18. storočí sa v&nbsp;Detve a&nbsp;okolí odrazil vývoj umeleckej úrovne drevených krížov v&nbsp;súvise s&nbsp;barokovým dekorativizmom, označujúc ho termínom zľudovený barok.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>
</x-web.layout.master>
