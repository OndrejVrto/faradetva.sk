@extends('frontend._layouts.static-page')

@push('content_header')
    {{-- Prepend content Header --}}
@endpush
@prepend('content_footer')
    {{-- After content Footer --}}
@endprepend

@section('content')
    <x-page-section title="Čo je sviatosť posvätného stavu?">
        {{-- <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/> --}}
        <x-page-section.text type="right">
            <p>
                Ten, kto prijíma sviatosť posvätného stavu, dostáva osobitnú účasť na Kristovom kňazstve, ktoré sa kvalitatívne líši od všeobecného kňazstva veriacich. Sviatostné kňazstvo je dar Ducha Svätého, ktorý udeľuje Kristus prostredníctvom Cirkvi. Zo sviatostného kňazstva nevyplýva úloha plniť iba určitú funkciu alebo zastávať nejaký úrad. Vysviackou dostáva kňaz konkrétnu moc a poslanie slúžiť svojim bratom a sestrám vo viere. Sviatosť posväteného stavu má tri stupne: biskupský stav (episkopát), kňazský stav (presbyterát), diakonský stav (diakonát).
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Aké miesto má sviatosť posvätného stavu v Božom pláne spásy?">
        {{-- <x-page-section.img-media columns="5" type="right" name="" :model="$pageData"/> --}}
        <x-page-section.text type="left">
            <p>
                Kňazi Starého zákona boli predovšetkým prostredníkmi medzi nebo a zemou, medzi Bohom a jeho národom. Ježiš Kristus ako jediný „prostredník medzi Bohom a ľuďmi“ (1Tim 2,5) toto starozákonné kňazstvo naplnil, dovŕšil a ukončil. Po Ježišovej vykupiteľskej obete môže existovať už iba sviatostné kňazstvo v Kristovi, v Kristovej obete na kríži a skrze Kristovo povolanie a apoštolské poslanie. Katolícky kňaz, ktorý udeľuje sviatosti, nekoná na vlastnú päsť, z vlastnej moci alebo zo svojej morálnej dokonalosti, ale „in persona Christi“ - v osobe Krista. Vysviackou v ňom rastie Kristova premieňajúca, uzdravujúca a zachraňujúca moc, ktorou slúži zverenému ľudu.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Kto môže prijať sviatosť posvätného stavu?">
        <x-page-section.text type="right">
            <p>
                Za diakona, kňaza a biskupa môže byť platne vysvätený muž, ktorý prijal katolícku vieru, bol v nej pokrstený a pobirmovaný a je Cirkvou povolaný na tento úrad.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Aký účinok má diakonská vysviacka?">
        {{-- <x-page-section.img-media columns="5" type="right" name="" :model="$pageData"/> --}}
        <x-page-section.text type="left">
            <p>
                Diakon je ustanovený pre osobitnú službu Cirkvi. Zastupuje totiž Krista, ktorý „neprišiel dať sa obsluhovať, ale slúžiť a položiť svoj život ako výkupné za mnohých“ (Mt 20,28). V liturgii diakonskej vysviacky sa hovorí: „Posilnený darom Ducha Svätého bude pomáhať biskupovi a jeho kňazom v službe slova, oltára a charity. Stane sa služobníkom všetkých.“ Prvotným vzorom diakona je svätý mučeník Štefan, ktorý bol medzi prvými siedmimi diakonmi, ktorých ustanovili apoštoli, keď sa v službe prvotnej cirkvi v Jeruzaleme cítili preťažení množstvom charitatívnych úloh. Neskôr sa diakonská služba stala na dlhé storočia len nižším stupňom na ceste ku kňazstvu. Dnes sú opäť do tejto služby povolaní jednak tí, ktorí žijú v celibáte, ako aj ženatí muži. Takto chápaná diakonská služba nanovo zdôrazňuje služobný charakter Cirkvi. Zároveň poskytuje kňazom pomoc v duchu prvotnej Cirkvi tým, že diakon prijíma predovšetkým pastoračné a sociálne úlohy v Cirkvi. Aj diakonská vysviacka vtláča celoživotnú a nezrušiteľnú pečať.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Aký účinok má kňazská vysviacka?">
        {{-- <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/> --}}
        <x-page-section.text type="right">
            <p>
                Pri kňazskej vysviacke Duch Svätý vtláča kňazovi nezmazateľnú pečať, ktorou ho pripodobňuje Kristovi a dáva mu schopnosť konať v Ježišovom mene. Kňaz ako spolupracovník svojho biskupa má hlásať Božie slovo, udeľovať sviatosti a predovšetkým sláviť Eucharistiu.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Aký účinok má biskupská vysviacka?">
        {{-- <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/> --}}
        <x-page-section.text type="left">
            <p>
                Biskupskou vysviackou sa udeľuje plnosť sviatosti posvätného stavu. Po vysvätení sa biskup stáva právoplatným nástupcom apoštolov a vstupuje do biskupského zboru. Od okamihu svojho vysvätenia je zodpovedný za celú Cirkev spolu s ostatnými biskupmi a s pápežom. Biskupskou vysviackou sa mu udeľuje poslanie učiť, posväcovať a spravovať. Biskup, ktorý spolu s kňazmi a diakonmi ako so svojimi vysvätenými spolupracovníkmi vykonáva pastiersku službu, je viditeľným princípom a základom miestnej cirkvi (biskupstva/diecézy).
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Ako sa odlišuje všeobecné kňazstvo všetkých veriacich od sviatostného kňazstva?">
        {{-- <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/> --}}
        <x-page-section.text type="right">
            <p>
                Každý kresťan je povolaný k všeobecnému kňazstvu, aby v Božom mene pôsobil vo svete a prinášal mu Božie požehnanie a milosť. Pri Poslednej večeri a pri rozoslaní apoštolov dal však Ježiš niektorým posvätnú moc na službu veriacim. Preto len títo vysvätení kňazi zastupujú Ježiša, Pastiera svojho ľudu a Hlavu svojho tela - Cirkvi. Všetci by sme mali nanovo objaviť Boží dar pre Cirkev, ktorým je vysvätený kňaz, ktorý medzi nami zastupuje samého Pána.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section>
        <hr class="text-church-template">
    </x-page-section>

    <x-page-section title="Ako sa niekto môže stať kňazom?">
        {{-- <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/> --}}
        <x-page-section.text type="left">
            <p>
                Mladý muž, ktorý by v sebe cítil povolanie ku kňazstvu, môže sa cez svojho farára prihlásiť na štúdium teológie a prípravu na kňazstvo v Banskobystrickej diecéze, v Kňazskom seminári sv. Gorazda v Nitre. Medzi podmienky prijatia adeptov na kňazstvo patrí okrem iného najmä mravný a bezúhonný život kresťana, dobrý zdravotný stav pre výkon povolania a stredoškolské vzdelanie s maturitou. Bližšie informácie na stránke seminára: www.ksnr.sk
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section.sources title="Použitá literatúra:">
        <li>Youcat po slovensky. Katechizmus Katolíckej cirkvi pre mladých. Bratislava: Karmelitánske nakladateľstvo, 2011. ISBN 978-80-89231-99-7.</li>
    </x-page-section.sources>

@endsection
