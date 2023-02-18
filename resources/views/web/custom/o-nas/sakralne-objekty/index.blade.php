<x-web.layout.master :pageData="$pageData">

    {{-- O Nás / Sakrálne objekty --}}
        <!-- Farský kostol -->
        <!-- Kláštorný kostol -->
        <!-- Kalvária, kaplnky -->
        <!-- Prícestné sochy -->
        <!-- Detvianske kríže -->

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART 1 -" row="true" class="pad_t_30">

        <x-partials.card-about
            title="Farský kostol"
            side="left"
            url="{{ secure_url('o-nas/sakralne-objekty/farsky-kostol-sv-frantiska-z-assisi-v-detve') }}"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="fk-001-menu" class="img-fluid w-100" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Prvý a pôvodný renesančný kostol bol v Detve postavený už v r. 1664. Hoci bol pomerne veľký, pre rýchly populačný prírastok obyvateľstva, početným veriacim nestačil. Preto ho zbúrali a na jeho mieste v r. 1803 - 1806 postavili nový, väčší, dnešný kostol v klasicistickom štýle. Až po skompletizovaní celkového vybavenia interiéru bol kostol konsekrovaný v r. 1823. Zo starého kostola sa prevzala len veža, ktorú neskôr nadstavili.
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART 2 -" row="true" class="bg-alt-gray pad_t_50 pad_b_30">

        <x-partials.card-article
            title="Kalvária, kaplnky"
            url="{{ secure_url('o-nas/sakralne-objekty/kalvaria-kaplnky') }}"
            delay=1
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="kapl-005-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Na území detvianskej farnosti sa nachádza niekoľko menších i pár väčších kaplniek. V r. 1704 bola na starom cintoríne postavená Kaplnka sv. Jozefa, neskôr zväčšená na menší kostolík. Ten sa pre havarijný stav musel zbúrať a namiesto neho bola na cintoríne v r. 1910 vybudovaná Kalvária. Tú tvorí 14 zastavení krížovej cesty a Kaplnka Sedembolestnej Panny Márie. Niektoré miestne lokality a inštitúcie majú aj svoje vlastné kaplnky.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Prícestné sochy"
            url="{{ secure_url('o-nas/sakralne-objekty/pricestne-sochy') }}"
            delay=2
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
            delay=3
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="dkriz-kronika-574-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Umelecké cítenie detvianskych ľudí sa dostalo do sveta najmä prostredníctvom pestrých výšiviek a bohato vyrezávaných krížov. Z typologického hľadiska ľudovej umeleckej výroby vyrezávaných krížov v Detve ide jednak o náhrobné kríže, jednak o veľké ústredné a prícestné kríže. V 18. storočí sa v Detve a okolí odrazil vývoj umeleckej úrovne drevených krížov v súvise s barokovým dekorativizmom, označujúc ho termínom zľudovený barok.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART 3 -" row="true" class="pad_t_80">

        <x-partials.card-about
            title="Kláštorný kostol"
            side="left"
            url="{{ secure_url('o-nas/sakralne-objekty/klastorny-kostol-karmel') }}"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="kk-001-menu" class="img-fluid w-100" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                V r. 2004 sa v mestskej časti Dolinky začalo s výstavbou kláštora pre kontemplatívne sestry z Rádu bosých karmelitánok. Hoci väčšia časť kláštora je verejnosti neprístupná, kláštorný kostol je možné navštíviť a denne sa v ňom slávia sväté omše za účasti veriacich farnosti. Celý kláštorný komplex s kostolom bol požehnaný v r. 2007. Na stenu presbytéria kostola bola v r. 2018 nainštalovaná mozaika s koncepciou patrocínia kostola.
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>
</x-web.layout.master>
