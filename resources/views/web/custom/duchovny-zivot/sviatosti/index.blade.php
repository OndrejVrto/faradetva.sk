<x-web.layout.master :pageData="$pageData">

    {{-- Duchovný život / Sviatosti --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART I -" row="true" class="pad_b_50">

        <x-partials.card-article
            title="Krst"
            url="{{ secure_url('duchovny-zivot/sviatosti/krst') }}"
            delay=1
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr1-004-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Krst je základná sviatosť, brána, ktorá otvára prístup k&nbsp;ostatným sviatostiam. Zjednocuje nás s&nbsp;Ježišom Kristom, vťahuje nás do jeho vykupiteľskej smrti na kríži, a&nbsp;tak nás vyslobodzuje z&nbsp;moci hriechu.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Birmovanie"
            url="{{ secure_url('duchovny-zivot/sviatosti/birmovanie') }}"
            delay=3
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr2-002-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Birmovanie je sviatosť, ktorá dovršuje krst a&nbsp;v&nbsp;ktorej dostávame dary Ducha Svätého. Pobirmovaný dostane silu svedčiť o&nbsp;Božej láske životom. Stáva sa plnohodnotným a&nbsp;zodpovedným členom Cirkvi.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Eucharistia"
            url="{{ secure_url('duchovny-zivot/sviatosti/eucharistia') }}"
            delay=2
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr3-006-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Svätá Eucharistia je sviatosť, v&nbsp;ktorej Ježiš Kristus za nás dáva svoje telo a&nbsp;svoju krv - seba samého, aby sme sa s&nbsp;ním zjednotili vo svätom prijímaní a&nbsp;vytvárali spojenie s&nbsp;Kristovým telom - Cirkvou.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART II -" row="true" class="ch_event_section bg-alt-gray pad_t_80">

        <x-partials.card-event
            title="Svätá spoveď"
            url="{{ secure_url('duchovny-zivot/sviatosti/spoved') }}"
            side="left"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr4-001-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Sviatosť zmierenia sa nazýva tiež sviatosťou pokánia, odpustenia, obrátenia alebo spoveďou.
                Krst nás síce oslobodzuje z&nbsp;moci hriechu a&nbsp;smrti a&nbsp;uvádza nás do nového života Božích detí, ale neoslobodzuje nás od ľudskej slabosti a&nbsp;od náklonnosti k&nbsp;hriechu.
                Preto sa potrebujeme znovu a&nbsp;znovu uzmierovať s&nbsp;Bohom.
                Túto možnosť nám poskytuje sviatosť zmierenia.
                <span class="d-none d-xl-inline">
                    Nikde nie je krajšie vysvetlená podstata sviatosti zmierenia ako v&nbsp;podobenstve o&nbsp;milosrdnom otcovi.
                    Blúdime a&nbsp;strácame smer, ale náš Otec na nás čaká s&nbsp;veľkou, ba nekonečnou túžbou.
                    Odpúšťa nám, keď sa k&nbsp;nemu navraciame.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Pomazanie chorých"
            url="{{ secure_url('duchovny-zivot/sviatosti/pomazanie-chorych') }}"
            side="right"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr5-001-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Túto sviatosť môže prijať každý pokrstený, ktorý sa nachádza v&nbsp;kritickom zdravotnom stave alebo situácii ohrozujúcej život.
                Sviatosť pomazania chorých môžeme prijať v&nbsp;živote viackrát.
                Preto má zmysel požiadať o&nbsp;túto sviatosť aj v&nbsp;mladom veku, ak má človek podstúpiť ťažkú operáciu.
                <span class="d-none d-xl-inline">
                    Mnohí kresťania v&nbsp;takejto situácii spájajú sviatosť pomazania chorých so sviatosťou zmierenia, spolu so svätým prijímaním; v&nbsp;každom prípade chcú predstúpiť pred Boha s&nbsp;čistým svedomím.
                    Podstatou obradu slávenia tejto sviatosti je modlitba kňaza spojená s&nbsp;pomazaním čela a&nbsp;rúk posväteným olejom.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART 3 -" class="pad_t_80">

        <x-partials.card-about
            title="Posvätný stav"
            side="left"
            url="{{ secure_url('duchovny-zivot/sviatosti/posvatny-stav') }}"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr6-003" class="img-fluid w-100" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Ten, kto prijíma sviatosť posvätného stavu, dostáva osobitnú účasť na Kristovom kňazstve, ktoré sa kvalitatívne líši od všeobecného kňazstva veriacich.
                Sviatostné kňazstvo je dar Ducha Svätého, ktorý udeľuje Kristus prostredníctvom Cirkvi.
                Zo sviatostného kňazstva nevyplýva úloha plniť iba určitú funkciu alebo zastávať nejaký úrad.
                Vysviackou dostáva kňaz konkrétnu moc a&nbsp;poslanie slúžiť svojim bratom a&nbsp;sestrám vo viere.
                <span class="d-none d-xl-inline">
                    Sviatosť posväteného stavu má tri stupne: biskupský stav (episkopát), kňazský stav (presbyterát), diakonský stav (diakonát).
                    Za diakona, kňaza a&nbsp;biskupa môže byť platne vysvätený muž, ktorý prijal katolícku vieru, bol v&nbsp;nej pokrstený a&nbsp;pobirmovaný a&nbsp;je Cirkvou povolaný na tento úrad.
                </span>
            </x-slot:teaser>
        </x-partials.card-about>

        <hr class="border border-primary border-1 mb-0">

        <x-partials.card-about
            class="mt-5"
            title="Manželstvo"
            side="right"
            url="{{ secure_url('duchovny-zivot/sviatosti/manzelstvo') }}"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sacr7-003-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Sviatosť manželstva vychádza zo sľubu muža a&nbsp;ženy pred Bohom a&nbsp;pred Cirkvou, ktorý prijíma a&nbsp;potvrdzuje Boh a&nbsp;napĺňa sa fyzickým zjednotením oboch partnerov.
                Pretože Boh sám spečaťuje puto sviatostného manželstva, zaväzuje tento zväzok až do smrti jedného z&nbsp;partnerov.
                <span class="d-none d-xl-inline me-2">
                    Manželstvo sa môže uzavrieť iba vtedy, ak jestvuje manželský konsenzus, to znamená, že muž a&nbsp;žena chcú vstúpiť do manželstva slobodne, bez strachu alebo nátlaku a&nbsp;keď im v&nbsp;tom nebránia nijaké prirodzené alebo cirkevné záväzky (napr. už existujúce manželstvo alebo sľub celibátu).
                </span>
               K&nbsp;sviatostnému manželstvu nevyhnutne patria prvky: slobodný súhlas, dobrovoľné prijatie celoživotného výlučného zväzku, otvorenosť na prijatie potomstva.
            </x-slot:teaser>
        </x-partials.card-about>

    </x-web.page.section>
</x-web.layout.master>
