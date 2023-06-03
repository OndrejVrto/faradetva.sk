<x-web.layout.master :pageData="$pageData">

    {{-- Štatistiky --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) - I." class="static-page">

        <!-- krsty -->
        <x-partials.statistics-graph id=1>
            <x-slot:teaser>
                Svätý krst je základom celého kresťanského života, vstupnou bránou do života v&nbsp;Duchu Svätom, ako aj bránou, ktorá otvára prístup k&nbsp;ostatným sviatostiam. Krstom sme oslobodení od hriechu a&nbsp;znovuzrodení ako Božie deti, sme začlenení do Cirkvi a&nbsp;dostávame účasť na jej poslaní. (KKC 1213)
            </x-slot:teaser>

            <x-slot:after>
                Dlhodobý pokles pôrodnosti, ktorého následkom je postupné znižovanie prirodzeného prírastku v&nbsp;krajine, sa prejavuje aj v&nbsp;počtoch krstov detí. V&nbsp;ojedinelých prípadoch pristupujú ku krstu taktiež dospelí, ktorí spolu s&nbsp;krstom prijímajú aj sviatosť birmovania a&nbsp;prvýkrát pristupujú k&nbsp;svätému prijímaniu. Klesajúcu tendenciu má aj počet ľudí praktizujúcich katolícku vieru.
            </x-slot:after>
        </x-partials.statistics-graph>

        <!-- prve-svate-prijimanie -->
        <x-partials.statistics-graph id=2>
            <x-slot:teaser>
                Eucharistia je prameň a&nbsp;vrchol celého kresťanského života. Ostatné sviatosti, ako aj všetky cirkevné služby a&nbsp;diela úzko súvisia so svätou Eucharistiou a&nbsp;sú na ňu zamerané. Najsvätejšia Eucharistia obsahuje celé duchovné dobro Cirkvi, totiž samého Krista, nášho veľkonočného Baránka. (KKC 1324)
            </x-slot:teaser>

            <x-slot:after>
                K&nbsp;prvej svätej spovedi a&nbsp;k&nbsp;prvému svätému prijímaniu u&nbsp;nás pristupujú zvyčajne žiaci tretieho ročníka základnej školy. Žiaľ, nie všetci rodičia, ktorí svoje dieťa priviedli na krst, ho neskôr v&nbsp;škole prihlásia na náboženskú výchovu a&nbsp;nie všetci vytvoria vo svojich rodinách také podmienky, aby ich deti pristupovali aj k&nbsp;ďalším sviatostiam, čiže, aby mohli ďalej rásť vo viere, v&nbsp;ktorej boli pokrstené.
            </x-slot:after>
        </x-partials.statistics-graph>

        <!-- birmovanie -->
        <x-partials.statistics-graph id=3>
            <x-slot:teaser>
                Sviatosť birmovania tvorí spolu s&nbsp;krstom a&nbsp;Eucharistiou jeden celok sviatostí uvádzania do kresťanského života. Pokrstených sviatosť birmovania dokonalejšie spája s&nbsp;Cirkvou a&nbsp;bohato ich obdarúva osobitnou silou Ducha Svätého, takže sú ako praví Kristovi svedkovia väčšmi povinní šíriť a&nbsp;brániť vieru slovom i&nbsp;skutkom. (KKC 1285)
            </x-slot:teaser>

            <x-slot:after>
                V&nbsp;našom prostredí môžu k&nbsp;sviatosti birmovania pristúpiť dospievajúci chlapci a&nbsp;dievčatá končiaci základnú školu alebo stredoškoláci či starší. Príprava k&nbsp;tejto sviatosti si vyžaduje väčšiu vlastnú angažovanosť do náboženského života vo farnosti, keďže prijatie sviatosti birmovania je potrebné na dovŕšenie krstnej milosti. Slávnosť birmovania sa v&nbsp;našej farnosti organizuje spravidla každý druhý rok.
            </x-slot:after>
        </x-partials.statistics-graph>

        <!-- sobase -->
        <x-partials.statistics-graph id=4>
            <x-slot:teaser>
                Manželskú zmluvu, ktorou muž a&nbsp;žena vytvárajú medzi sebou celoživotné spoločenstvo, zamerané svojou prirodzenou povahou na dobro manželov a&nbsp;na plodenie a&nbsp;výchovu detí, povýšil Kristus Pán medzi pokrstenými na hodnosť sviatosti. (KKC 1601)
            </x-slot:teaser>

            <x-slot:after>
                Súčasná doba priniesla zvláštny fenomén spoločného bývania partnerov pred sobášom, alebo aj bez sobáša. Zvýšená miera rozvodovosti tiež neprispieva k&nbsp;možnosti uzavretia cirkevného sobáša. Odzrkadľuje sa to aj v&nbsp;menšom počte párov, ktoré sa odhodlajú uzatvoriť manželstvo nielen pred civilnými úradmi, ale aj pred Bohom, sviatostne a&nbsp;natrvalo. Pandémia COVID-19 spôsobila pre rok 2020 rekordný pokles sobášov na celom Slovensku.
            </x-slot:after>
        </x-partials.statistics-graph>

        <!-- pohreby -->
        <x-partials.statistics-graph id=5>
            <x-slot:teaser>
                Kresťanský pohreb je liturgickým slávením Cirkvi. Služba Cirkvi tu má za cieľ jednak vyjadriť účinné spoločenstvo so zosnulým a&nbsp;jednak umožniť na ňom účasť spoločenstvu zídenému na pohrebe a&nbsp;ohlasovať mu večný život. (KKC 1684)
            </x-slot:teaser>

            <x-slot:after>
                V&nbsp;duchu kresťanskej lásky, ktorá nám káže pochovávať mŕtvych, preukazujeme úctu telu, ktoré bolo príbytkom nesmrteľnej duše. Na pohrebné obrady prichádzame, aby sme sa s&nbsp;našimi zosnulými rozlúčili a&nbsp;ich telo uložili na dočasný odpočinok v&nbsp;nádeji na vzkriesenie. Demografická kríza jasne dosvedčuje vyššiu úmrtnosť než pôrodnosť, v&nbsp;našom prípade väčší počet pohrebov než krstov. Pandémia COVID-19 sa výraznou mierou podpísala pod najväčší počet úmrtí v&nbsp;roku 2021 na Slovensku od druhej svetovej vojny.
            </x-slot:after>
        </x-partials.statistics-graph>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) - II." row class="static-page">

        <div class="col-12 col-lg-6">
            <!-- scitanie-obyvatelov-detvy -->
            <x-partials.statistics-graph id=6 aspectRatio=2/>
        </div>
        <div class="col-12 col-lg-6">
            <!-- rimsko-katolici-v-detve -->
            <x-partials.statistics-graph id=7 aspectRatio=2/>
        </div>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) - III." class="static-page">

        <x-partials.statistics-graph notId="1,2,3,4,5,6,7"/>

    </x-web.page.section>
</x-web.layout.master>
