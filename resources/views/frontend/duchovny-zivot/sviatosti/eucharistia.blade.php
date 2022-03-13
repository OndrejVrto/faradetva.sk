<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$pageData['breadCrumb']"
        :titleSlug="$pageData['banners']"
        dimensionSource="full"
    />

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" class="static-page pad_t_50 pad_b_50">

    <x-frontend.page.subsection title="Čo je Eucharistia?">
        {{-- <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4"/> --}}
        <x-frontend.page.text-segment type="right">
            <p>
                Svätá Eucharistia je sviatosť, v ktorej Ježiš Kristus za nás dáva svoje telo a svoju krv - seba samého, aby sme sa mu aj my odovzdali v láske a aby sme sa s ním zjednotili vo svätom prijímaní. Tak sa spájame s jediným Kristovým telom - Cirkvou. Eucharistia je po krste a po birmovaní tretia iniciačná sviatosť Katolíckej cirkvi. Eucharistia je tajomným stredobodom všetkých týchto sviatostí, pretože Ježišova historická obeta na kríži sa pri premenení sprítomňuje skrytým nekrvavým spôsobom. Tak sa slávenie Eucharistie stáva „prameňom a vrcholom celého kresťanského života“. Eucharistia je súhrnom našej viery. Nejestvuje nič väčšie, čo by sme ešte mohli dosiahnuť. Keď prijímame eucharistický chlieb zjednocujeme sa s láskou Ježiša, ktorý dal za nás svoje telo na dreve kríža. Keď pijeme z kalicha premenené víno, zjednocujeme sa s tým, ktorý za nás vylial svoju krv. Tento obrad sme si nevymysleli. Sám Ježiš slávil so svojimi učeníkmi Poslednú večeru a predvídal v nej svoju smrť. Daroval sa svojim učeníkom v podobe chleba a vína a vyzval ich, aby od toho okamihu vždy a všade slávili v Eucharistii jeho smrť: „Toto robte na moju pamiatku.“ (1Kor 11,24)
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Nakoľko je Eucharistia dôležitá pre Cirkev?">
        {{-- <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="5" /> --}}
        <x-frontend.page.text-segment type="left">
            <p>
                Slávenie Eucharistie je jadrom kresťanského spoločenstva. Práve v nej sa Cirkev stáva Cirkvou. Cirkvou nie sme preto, že prispievame do kostolnej zbierky, že si navzájom dobre rozumieme alebo že nás osud zavial do určitého spoločenstva, ale preto, že v Eucharistii prijímame Kristovo telo a stávame sa jeho tajomným telom.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Ktoré prvky patria neodmysliteľne k svätej omši?">
        <x-frontend.page.text-segment type="right">
            <p>
                Každá svätá omša (Eucharistia) pozostáva z dvoch hlavných častí - z bohoslužby slova a zo slávenia Eucharistie v užšom zmysle slova. V bohoslužbe slova počúvame čítania zo Starého a Nového zákona a z evanjelia. Okrem toho je tu priestor na homíliu a na spoločné prosby. V nadväzujúcej eucharistickej bohoslužbe sa prinášajú dary chleba a vína, ktoré sa následne premieňajú a podávajú sa veriacim vo svätom prijímaní.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Kto vedie slávenie Eucharistie?">
        {{-- <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="5" /> --}}
        <x-frontend.page.text-segment type="left">
            <p>
                Každému sláveniu Eucharistie neviditeľne predsedá sám Ježiš Kristus. Biskup alebo kňaz ho zastupuje. Cirkev verí, že celebrant stojí pri oltári in persona Christi Capitis (lat. = v osobe Krista Hlavy). Znamená to, že kňaz nielenže koná z Ježišovho poverenia, ale na základe sviatosti kňazstva koná cez neho sám Kristus ako hlava Cirkvi.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Akým spôsobom je Ježiš prítomný v Eucharistii?">
        {{-- <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4"/> --}}
        <x-frontend.page.text-segment type="right">
            <p>
                Ježiš je vo sviatosti Eucharistie prítomný tajomným, ale skutočným spôsobom. Vždy, keď Cirkev uskutočňuje Ježišovo poverenie „Toto robte na moju pamiatku.“, láme chlieb a podáva kalich, práve v tej chvíli sa uskutočňuje jedinečná a neopakovateľná Ježišova obeta na kríži sprítomnená na oltári; napĺňa sa tak dielo nášho vykúpenia a my na ňom máme skutočný podiel.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="	Akým spôsobom sa Cirkev podieľa na Eucharistii?">
        {{-- <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4" /> --}}
        <x-frontend.page.text-segment type="left">
            <p>
                Zakaždým, keď Cirkev slávi Eucharistiu, pristupuje k prameňu, z ktorého sama vždy znovu vyrastá. Do obety Ježiša Krista, ktorý sa nám dáva s telom i dušou, sa zmestí celý náš život. S Ježišovou obetou môžeme spojiť naše práce, naše trápenia i radosti. Ak takto prinesieme seba samých, budeme premenení: budeme sa páčiť Bohu a pre svojich blížnych sa staneme dobrým, výživným chlebom.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Ako máme správne uctievať Pána Ježiša prítomného v chlebe a vo víne?">
        {{-- <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4"/> --}}
        <x-frontend.page.text-segment type="right">
            <p>
                Pretože Boh je skutočne prítomný v konsekrovanej podobe chleba a vína, musíme mať tieto posvätné dary vo veľkej úcte a klaňať sa v nich nášmu Najsvätejšiemu Pánovi a Vykupiteľovi. Ak po skončení svätej omše zostanú ešte konsekrované hostie, uchovávajú sa v posvätných nádobách vo svätostánku. Pretože je v ňom prítomný „Najsvätejší“, je svätostánok tým najčestnejším miestom každého kostola. Pred každým svätostánkom si pokľakneme. Kto naozaj nasleduje Ježiša Krista, dozaista ho spoznáva v tých najúbohejších a slúži mu v nich. Nájde si však tiež čas na tichú adoráciu pred svätostánkom, aby tu vyznal sviatostnému Pánovi svoju lásku.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Ako často sa má kresťan katolík zúčastňovať na svätej omši?">
        {{-- <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4" /> --}}
        <x-frontend.page.text-segment type="left">
            <p>
                Každú nedeľu a v prikázané sviatky je kresťan katolík povinný zúčastniť sa na svätej omši. Kto však skutočne vyhľadáva Ježišovo priateľstvo, nasleduje Ježišovo osobné pozvanie na hostinu, kedykoľvek má možnosť. „Povinnosť“ svätiť nedeľu je pre skutočného kresťana pojmom rovnako nevhodným, ako by bolo pre zamilovaného „povinnosť bozkávať sa“. Nikto nemôže žiť v skutočne živom vzťahu s Ježišom, ak nezájde tam, kde na nás čaká Pán. Preto je svätá omša pre kresťana oddávna „srdcom nedele“ a najdôležitejším bodom týždenného programu.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Ako sa mám pripraviť, aby som mohol pristúpiť k svätému prijímaniu?">
        <x-frontend.page.text-segment type="right">
            <p>
                Kto chce prijať sväté prijímanie, musí byť katolík. Ak si je vedomý ťažkého hriechu, musí sa predtým vyspovedať. Skôr ako pristúpi k oltáru, mal by sa zmieriť s blížnymi. Ešte pred niekoľkými rokmi bola bežná prax, že sa pred svätou omšou minimálne tri hodiny nič nejedlo; ľudia sa tak chceli pripraviť na stretnutie s Pánom Ježišom vo svätom prijímaní. Dnes Cirkev predpisuje zachovať hodinu pôstu pred svätým prijímaním. Iným znakom úcty je aj primerane pekné oblečenie.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Ako ma mení sväté prijímanie?">
        {{-- <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4" /> --}}
        <x-frontend.page.text-segment type="left">
            <p>
                Každé sväté prijímanie ma hlbšie spája s Ježišom Kristom, robí ma živým článkom Kristovho tela, obnovuje vo mne milosti, ktoré som dostal pri krste a birmovaní a posilňuje ma v boji proti hriechu.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Môže sa Eucharistia podávať aj nekatolíckym kresťanom?">
        <x-frontend.page.text-segment type="right">
            <p>
                Sväté prijímanie je vyjadrením jednoty Kristovho tela. Do Katolíckej cirkvi patrí ten, kto je v nej pokrstený, kto vyznáva jej vieru a kto s ňou žije v jednote. Došlo by k rozporu, keby Cirkev pozývala na sväté prijímanie ľudí, ktorí sa (zatiaľ) nepodieľajú na jej viere a živote. Utrpela by tak vierohodnosť znaku Eucharistie. Jednotliví pravoslávni kresťania môžu za vhodných okolností požiadať cirkevnú vrchnosť o podanie svätého prijímania pri katolíckej bohoslužbe, pretože vyznávajú eucharistickú vieru Katolíckej cirkvi, i keď ich spoločenstvo ešte nežije v plnej jednote s Katolíckou cirkvou. Členovia iných kresťanských vyznaní môžu v jednotlivých prípadoch pristúpiť k svätému prijímaniu vtedy, keď sa ocitnú v stave ohrozenia alebo núdze a keď dotyčný preukáže plnú vieru vo sviatostnú prítomnosť Pána Ježiša v Eucharistii.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        <hr class="text-church-template">
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Kedy môžem po prvýkrát prijať Eucharistiu?">
        {{-- <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4" /> --}}
        <x-frontend.page.text-segment type="left">
            <p>
                Už pokrstené deti, ktoré dokážu vnímať rozdiel medzi obyčajným chlebom a eucharistickým chlebom (svätým prijímaním), môžu po prvýkrát pristúpiť k Eucharistii, avšak len po náležitej príprave.
            </p>
            <p>
                V našich končinách je zaužívaná prax, že k 1. svätému prijímaniu a deň predtým k 1. svätej spovedi môžu pristúpiť najskôr tretiaci základných škôl. Tí sa k prijatiu týchto sviatostí pripravujú na hodinách náboženskej výchovy a účasťou na nedeľných svätých omšiach.
            </p>
            <p>
                Dospelí pokrstení, ktorí neprijali ďalšie iniciačné sviatosti, môžu sa prihlásiť na našom farskom úrade a po niekoľkomesačnej individuálnej príprave budú môcť, v určenom čase podľa dohody, prvýkrát pristúpiť k svätej spovedi a svätému prijímaniu vo svätej omši.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.information-sources title="Použitá literatúra:">
        <li>Youcat po slovensky. Katechizmus Katolíckej cirkvi pre mladých. Bratislava: Karmelitánske nakladateľstvo, 2011. ISBN 978-80-89231-99-7.</li>
    </x-frontend.page.information-sources>

    </x-frontend.page.section>
</x-frontend.layout.master>
