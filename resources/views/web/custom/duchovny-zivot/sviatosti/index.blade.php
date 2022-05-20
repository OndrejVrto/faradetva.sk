<x-web.layout.master :pageData="$pageData">

    {{-- Duchovný život / Sviatosti --}}

    <x-web.page.section name="PAGE: ({{$pageData['title']}}) PART 1 -" row="true" class="ch_blog_section pad_b_50">

        <x-partials.card-article-small
            title="Krst"
            url="{{ secure_url('duchovny-zivot/sviatosti/krst') }}"
            delay="1"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pob-002-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Krst zjednocuje s Ježišom Kristom, vťahuje do jeho vykupiteľskej smrti na kríži, a tak vyslobodzuje z moci hriechu, očisťuje od všetkých osobných hriechov a umožňuje spolu s ním vstať z mŕtvych k životu, ktorý sa nekončí.
            </x-slot:teaser>
        </x-partials.card-article-small>

        <x-partials.card-article-small
            title="Birmovanie"
            url="{{ secure_url('duchovny-zivot/sviatosti/birmovanie') }}"
            delay="2"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pob-002-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Kto sa v slobode rozhodne žiť ako Božie dieťa a kto požiada o Ducha Svätého prostredníctvom vkladania rúk a pomazania krizmou, dostane silu svedčiť o Božej láske slovom i skutkom.
            </x-slot:teaser>
        </x-partials.card-article-small>

        <x-partials.card-article-small
            title="Eucharistia"
            url="{{ secure_url('duchovny-zivot/sviatosti/eucharistia') }}"
            delay="3"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pob-002-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Eucharistia je tajomným stredobodom iniciačných sviatostí, pretože Ježišova historická obeta na kríži sa pri premenení sprítomňuje skrytým nekrvavým spôsobom. Tak sa slávenie Eucharistie stáva „prameňom a vrcholom celého kresťanského života“.
            </x-slot:teaser>
        </x-partials.card-article-small>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{$pageData['title']}}) PART 2 -" row="true" class="ch_event_section pad_b_50">

        <x-partials.cart-event
            title="Svätá spoveď"
            url="{{ secure_url('duchovny-zivot/sviatosti/spoved') }}"
            side="left"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pob-002-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                {{-- TODO:  --}}
                Krst nás síce oslobodzuje z moci hriechu a smrti a uvádza nás do nového života Božích detí, ale neoslobodzuje nás od ľudskej slabosti a od náklonnosti k hriechu. Preto sa potrebujeme znovu a znovu uzmierovať s Bohom. Túto možnosť nám poskytuje sviatosť zmierenia.
            </x-slot:teaser>
        </x-partials.cart-event>

        <x-partials.cart-event
            title="Pomazanie chorých"
            url="{{ secure_url('duchovny-zivot/sviatosti/pomazanie-chorych') }}"
            side="right"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pob-002-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                {{-- TODO:  --}}
                Podstatou obradu pri slávení sviatosti pomazania chorých je modlitba kňaza spojená s pomazaním čela a rúk chorého posväteným olejom. Ježiš Kristus mocou vysvätenia biskupa alebo kňaza koná prostredníctvom nich.
            </x-slot:teaser>
        </x-partials.cart-event>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{$pageData['title']}}) PART 3 -" class="ch_about_section pad_b_50">

        <x-partials.card-about
            title="Posvätný stav"
            side="left"
            url="{{ secure_url('duchovny-zivot/sviatosti/posvatny-stav') }}"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pob-002-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Vysviackou dostáva kňaz konkrétnu moc a poslanie slúžiť svojim bratom a sestrám vo viere. Sviatosť posväteného stavu má tri stupne: biskupský stav (episkopát), kňazský stav (presbyterát), diakonský stav (diakonát).
            </x-slot:teaser>
        </x-partials.card-about>

        <x-partials.card-about
            title="Manželstvo"
            side="right"
            url="{{ secure_url('duchovny-zivot/sviatosti/manzelstvo') }}"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pob-002-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Manželstvo sa môže uzavrieť iba vtedy, ak jestvuje manželský konsenzus, to znamená, že muž a žena chcú vstúpiť do manželstva slobodne, bez strachu alebo nátlaku a keď im v tom nebránia nijaké prirodzené alebo cirkevné záväzky.
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>
</x-web.layout.master>
