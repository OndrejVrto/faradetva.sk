@extends('frontend._layouts.static-page')
@push('content_header')
    {{-- Prepend content Header --}}
@endpush
@prepend('content_footer')
    {{-- After content Footer --}}
@endprepend

@section('content')

    {{-- História farnosti Detva --}}

    <x-page-section>
        {{-- <x-page-section.img columns="4" type="left" alt="" url="{{ asset('images/.jpg') }}" /> --}}
        <x-page-section.text type="right">
            <p>
                Podpoľanie je oblasť situovaná na južných a juhovýchodných svahoch najvyššieho sopečného pohoria na Slovensku - Poľany, územie na rozhraní medzi Slovenským rudohorím a Slovenským stredohorím. Roztratené osídlenie po svahoch nečinného vulkánu predstavuje špecifiká, ktoré výrazne ovplyvňovali život miestnych obyvateľov. Táto rozsiahla časť Zvolenskej kotliny dostala svoj rázovitý charakter vďaka kopaničiarskej kolonizácii 17. storočia. Do oblasti Podpoľania patrili už stredoveké sídla Očová a Zvolenská Slatina so sídlom hradného panstva v dedine Vígľaš a na severovýchodnej strane Poľany obce Hrochoť a Čerín.
            </p>
        </x-page-section.text>
        <x-page-section.text type="left">
            <p>
                V prvej polovici 17. storočia sa napriek neustálemu tureckému nebezpečenstvu začalo vplyvom kopaničiarskej kolonizácie rozvíjať roztratené osídlenie na území Vígľašského panstva. Na východ od hradu Vígľaš sa v tom čase nenachádzalo trvalé sídlo, hoci obyvatelia panstva toto územie už dobre poznali a hospodársky využívali. V horských a podhorských oblastiach Podpoľania postupne vznikali dočasné obydlia a hospodárske stavby. Postupom času sa tieto sezónne hospodárstva stali základom trvalých kopaničiarskych sídlisk. Centrom kopaničiarskej kolonizácie na území Vígľašského panstva sa stala Detva, ktorá bola založená priamo na podnet svojho zemepána Csákyho. Na jeho podnet sa sem sťahovali obyvatelia okolitých dedín, klčovali lesy na okolí majera a stavali si domy.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-photo-gallery titleSlug="galeria1"/>

    <x-page-section title="Vznik Detvy">
        {{-- <x-page-section.img columns="5" type="right" alt="" url="{{ asset('images/only-for-debug/sv-francisco/602199.jpg') }}" /> --}}
        <x-page-section.text type="left">
            <p>
                V roku 1636 boli Ladislavom Csákym vymenovaní lokátori Juraj Holec a František Péchy, aby vystavali v údolí detvianskeho potoka dedinu. O dva roky neskôr už jestvovala spomínaná nová usadlosť pre komorských uhliarov, ktorá bola neskôr identifikovaná ako Detva. Prvými osadníkmi novej oblasti boli pôvodní obyvatelia z okolitých dedín Očová a Zvolenská Slatina. Prisťahovalcami, ktorí na Podpoľanie prišli v čase valaskej kolonizácie, boli pastieri prichádzajúci z Oravy, Liptova a východoslovenských stolíc a osídľovali vyššie položené lokality. Pred tureckým nebezpečenstvom tu nachádzali nový domov aj obyvatelia z južných stolíc, najmä Novohradu a Hontu.
            </p>
            <p>
                Krátko po založení Detvy v roku 1636, sa objavili pokusy zapojiť ju aj do cirkevnej správy. Detva vznikla v zložitom období reformácie a rekatolizácie, čo sa prejavilo aj na jej cirkevnom vývoji. V najstaršom období patrila pod správu Ostrihomskej arcidiecézy, zvolenského archidiakonátu a očovskej farnosti, ktorá bola v tom čase v rukách evanjelikov. Očovskí farári sa však pre rozľahlosť vlastnej farnosti nemohli dostatočne starať o duchovné potreby Detvanov, a preto Detva dostala samostatnú duchovnú správu. Povolaním členov Spoločnosti Ježišovej (jezuitov) z Banskej Bystrice v prvej polovici 17. storočia sa rod Csákyovcov snažil o vytvorenie katolíckej oblasti na Podpoľaní, ktorá mala byť akousi protiváhou voči susedným evanjelickým oblastiam. Stála jezuitská misia, ktorú riadil Michal Luczicz, spravovala novozaloženú farnosť v dedine. V roku 1638 František Péchy daroval v Detve kúriu s pozemkami pre potreby fary. V darovanej budove bolo zriadené sídlo farnosti a až do postavenia kostola v nej bola aj provizórna kaplnka. Pôvodná drevená budova bola prestavaná na budovu z trvalých stavebných materiálov až v roku 1763.
            </p>
        </x-page-section.text>
        {{-- <x-page-section.img columns="4" type="left" alt="" url="{{ asset('images/only-for-debug/sv-francisco/Josep_Benlliure_Gil43.jpg')  }}" /> --}}
    </x-page-section>

    <x-page-section title="Vznik farnosti">
        {{-- <x-page-section.img columns="4" type="right" alt="" url="{{ asset('images/only-for-debug/sv-francisco/Saint_Francis_of_Assisi_by_Jusepe_de_Ribera.jpg') }}" /> --}}
        <x-page-section.text type="left">
            <p>
                Farnosť bola oficiálne zriadená v roku 1644 ostrihomským arcibiskupom Jurajom Lippayom. Okrem jezuitov pôsobili v mladej osade aj františkáni, ich služba v Detve zanechala trvalú pamiatku v podobe patrocínia Kostola sv. Františka z Assisi. Duchovný život podporovali miestni zemepáni, ktorí na začiatku 60. rokov 17. storočia darovali viaceré pozemky, polia a lúky na založenie a výstavbu kostola. Miestne bratstvo františkánov nemalo k dispozícii základinu, majetok na chod farnosti spravovali prostredníctvom inšpektorov. Ich odchod z detvianskej farnosti pravdepodobne súvisí s patentom Jozefa II. o zrušení kláštorov. Premena malej osady na zemepanské mestečko je úzko spätá s dominantným podielom rímskokatolíckeho obyvateľstva v regióne. O nekatolíkoch žijúcich na Podpoľaní sa v prameňoch dozvedáme len sporadicky. Detviansky farár Anton Okolitsányi v kánonickej vizitácii z roku 1781 uviedol, že v Detve nikoho nepriviedol ku katolicizmu, keďže všetci vo farnosti boli katolíci a nevyskytovali sa tu ani žiadne zmiešané manželstvá. Až v polovici 19. storočia sa v Detve výraznejšie objavili aj príslušníci ďalších konfesií.
            </p>
            {{-- <img class="img-fluid col-md-3 col-lg-2 mb-3 me-sm-4 float-sm-start rounded-3" src="{{ asset('images/only-for-debug/sv-francisco/11008.jpg') }}" alt=""> --}}
            <p>
                Základný kameň prvého kostola bol požehnaný farárom Jurajom Kolossym 24. mája 1662 a jeho stavba uprostred mestečka bola ukončená na Vianoce v roku 1664. O štýle kostola sa nezachovali zmienky, ale zachovali sa rozmery: dĺžka 26 m, šírka 15 m a výška 9 m. V nasledujúcom období bol v kostole dostavaný chór, kazateľnica a organ. Práce boli definitívne ukončené až na konci 80. rokov 17. storočia. Ich postup zdržali nepokoje počas Tökölyho povstania. Dokončený chrám prišiel v roku 1689 konsekrovať ostrihomský pomocný biskup Blažej Jaklin. Kostol bol celý zaklenutý tehlovou klenbou a aj keď bol pomerne veľký, slúžil len 150 rokov. Pre populačný prírastok na začiatku 19. storočia bol už kapacitne nedostatočný, preto ho zbúrali a na jeho mieste v rokoch 1803 - 1806 postavili terajší kostol. Starý kostol, pri ktorom sa nachádzal aj cintorín, bol chránený múrom, ktorý mal na rohoch ozdobné bašty. Múr tiež zbúrali a materiál použili na stavbu. Zo starého kostola zostala len veža.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Charakteristika">
        {{-- <x-page-section.img columns="4" type="left" alt="aaa" url="{{ asset('images/only-for-debug/sv-francisco/StFrancis_part.jpg') }}" /> --}}
        <x-page-section.text type="right">
            <p>
                Po vzniku Banskobystrickej diecézy v roku 1776 sa detvianska farnosť stala súčasťou dolnozvolenského vicearchidiakonátu a očovského dekanátu. Po úprave cirkevnoprávneho členenia diecézy v roku 1821 patrila Detva do katedrálneho archidiakonátu a zvolenského dekanátu. Posledná výrazná zmena územného členenia diecézy, ktorá sa dotýkala Detvy, nastala v roku 1995, keď bol zo zvolenského dekanátu vyčlenený dekanát Detva. Do tohto dekanátu v súčasnosti patria farnosti Detva, Detvianska Huta, Hriňová, Kriváň, Očová, Stožok, Vígľašská Huta-Kalinka a Zvolenská Slatina.
            </p>
            <p>
                Pre detviansku farnosť a jej obyvateľov bolo už od jej začiatkov charakteristické, že na rozľahlom území vznikli početné malé usadlosti, v ktorých žilo veľké množstvo obyvateľstva, o ktorých sa mohlo starať len niekoľko duchovných. Na konci 90. rokov 18. storočia sa stretávame s prípadmi, keď sa veriaci sťažovali detvianskemu farárovi Jánovi Dlholuckému, že im v mnohých situáciách chýba starostlivosť duchovného. Problém malo v roku 1790 sčasti riešiť vytvorenie tzv. lokálnej kaplánskej stanice, neskôr v roku 1804 vznik farnosti v Detvianskej Hute, čo malo zjednodušiť vysluhovanie sviatostí a pastoračnú činnosť duchovných. Aj napriek tomu cesta najvzdialenejších filiálok detvianskej farnosti do Detvy trvala až 6 hodín pešej chôdze. Na ďalekých lazoch síce stále chýbali kaplnky, kde by veriacim mohli byť vysluhované sviatosti, ale aspoň čiastočne tieto miesta a ich úlohu nahrádzali zvonice, pri spoločnej modlitbe veriacich počas slávení rôznych pobožností. Podobnú úlohu plnili aj vysoké vyrezávané kríže.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Neskorší rozvoj">
        {{-- <x-page-section.img columns="4" type="right" alt="" url="{{ asset('images/only-for-debug/sv-francisco/st_francis_of_assisi_receiving_the_stigmata-12701.jpg') }}" /> --}}
        <x-page-section.text type="left">
            <p>
                Keďže od Zvolena po Lučenec nebolo mesto, Detva si začala nárokovať, aby dostala štatút mestečka. Podarilo sa jej to začiatkom 19. storočia, keď bola kráľovskou výsadnou listinou, datovanou 13. decembra 1811, povýšená na mestečko (oppium). Detva dostala privilégium konať štyrikrát v roku jarmok (24. apríla; 24. júna; 24. septembra a 24. novembra) a týždenne trh. Erbom mestečka sa stali tri smreky. Postupne menila Detva svoj charakter. Dominujúce drevorubačské práce nahrádzali remeslá - tesári, kolári, farbiari, mlynári, zámočník, obuvník, krajčír, pivovarník, atď. Po roku 1848 sa tu začali usádzať židia, ktorí sa vypracovali na veľkopriemyselníkov a hlavne obchodníkov a krčmárov. Obchod v mestečku reprezentovali štyria kresťanskí a traja židovskí obchodníci. Nadmieru však boli rozšírené kresťanské i židovské krčmy. V Detve ich bolo sedem, v Kriváni dve, v Hriňovej štyri a na lazoch deväť. Súpis židov z roku 1942 spomína 50 občanov tohto vierovyznania v Detve. Židovská komunita mala v obci neďaleko kostola postavenú aj vlastnú synagógu.
            </p>
            <p>
                Rozsiahlosť a roztratenosť podpolianskeho obyvateľstva si vyžadovali vytvoriť v roku 1881 „politickú obec“ Hriňová a so vzrastajúcim obyvateľstvom veľmi vzdialenom od Detvy bolo nevyhnutné myslieť aj na zriadenie samostatnej duchovnej služby. Hoci v roku 1909 sa s povolením zriadenia novej farnosti začali prípravy na stavbu fary, plány sa nemohli z rôznych príčin uskutočniť. Až po mnohých ťažkostiach bola v roku 1928 zriadená v Hriňovej najskôr expozitúra z Detvy, s vlastnou farskou budovou a kňazom, neskôr už ako farnosť s vlastným farským Kostolom sv. Petra a Pavla z roku 1947. Časti Krivec a Blato však ešte aj dlhý čas potom, spadali pod správu detvianskej farnosti.
            </p>
            <p>
                Zmeny v politickom živote po februári 1948 nenechali na seba dlho čakať a prejavili sa aj na duchovnom živote v Detve. Nová socialistická doba priniesla znárodňovanie, kolektivizáciu pôdy a zakladanie Jednotných roľníckych družstiev (JRD). Zoštátnením farského majetku a lesov zostala farnosti len záhrada, o ktorú sa aj tak nemal kto starať. Farské hospodárske budovy (sýpka, maštale, kočiareň a veľké humno) boli dané do prenájmu Výkupnému podniku Zvolen. Znárodnením sa tak farský dvor stal skladom umelých hnojív a výkupným miestom zemiakov, vlny, sena a iného poľnohospodárskeho tovaru. Politické riadenie bezplatnou zmluvou nasťahovalo do budovy chudobinca sídlo Miestneho národného výboru (MNV) a z izieb charitatívnej inštitúcie urobilo veľkú spoločenskú sálu. Ako zaslúžená a dlho očakávaná odmena, po náročnom období detvianskeho cirkevného života počas komunizmu, prišli duchovné povolania detvianskych rodákov. Niekoľkí rehoľníci a najmä diecézni kňazi predstavovali ovocie, po ktorom cirkev na Podpoľaní túžila.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Novodobé dejiny">
        {{-- <x-page-section.img columns="4" type="right" alt="" url="{{ asset('images/only-for-debug/sv-francisco/st_francis_of_assisi_receiving_the_stigmata-12701.jpg') }}" /> --}}
        <x-page-section.text type="left">
            <p>
                Po roku 1989 boli postupne vo farnosti postavené tri nové kostoly. V roku 1992 sa začalo s výstavbou kostola v Kriváni a v roku 1994 v Korytárkach. Po dokončení Kostola sv. Cyrila a Metoda v Kriváni bola v roku 1995 z Detvy vyčlenená nová farnosť Kriváň, s filiálkou Korytárky, kde bol Kostol Panny Márie Karmelskej dostavaný v roku 1998. V jubilejnom roku 2000 sa začalo s výstavbou Kostola Svätej rodiny v Stožku, ktorý bol dokončený v roku 2002 a o rok neskôr tu bola zriadená aj nová farnosť. V spolupráci s vedením mesta bola v roku 2002 dokončená úprava okolia farského kostola, položená dlažba, inštalované nové svietidlá a lavičky, čím sa obnovilo centrum starej časti mesta, s dominantou Kostola sv. Františka z Assisi. V areáli farskej záhrady bolo v rokoch 2004 - 2005 vybudované športové centrum, pozostávajúce z trávnatého i asfaltového ihriska.
            </p>
            <p>
                28. júla 2007 biskup Rudolf Baláž požehnal v Detve novopostavený kláštor bosých karmelitánok, ktoré sa snažia o apoštolát modlitby a obety svojím skrytým životom vo veľkej samote a v úplnom odlúčení od sveta. Kláštor Božieho milosrdenstva a Kráľovnej Karmelu sa v roku 2007 stal domovom prvých jedenástich mníšok, ktoré zložili sľub, že do konca svojho života zostanú v Detve. Po požehnaní kláštora karmelitánky vošli do priestorov, ktoré sa od toho dňa stali neprístupné verejnosti. Veriaci však môžu navštíviť kláštor, ktorého dvere sú pre každého otvorené a priestory kláštorného kostola sú využívané taktiež na denné slávenia bohoslužieb. Jednotlivci môžu využiť aj príležitosť na viacdňové duchovné pobyty v hosťovskej časti kláštora. Detva je po Košiciach len druhým miestom na Slovensku, kde dnes pôsobia bosé karmelitánky.
            </p>
            <p>
                Súčasná rozloha detvianskej farnosti nadobudla rozsah takmer 70 km2. Okrem samotného mesta zahŕňa miestne časti (osady a lazy): Chrapková, Kostolná, Krné, Laštek, Majerovo, Piešť I., Piešť II., Skliarovo, Sliacka Poľana, Stavanisko a Rakytné. Počet obyvateľov farnosti nepresahuje 15 000, z toho je približne 10 000 rímskokatolíkov. Farár vo farnosti je v súčasnosti aj dekanom detvianskeho dekanátu. Dlhoročne pôsobili v Detve popri farárovi dvaja kapláni, avšak od roku 2019 supluje vo farnosti úlohu druhého kaplána výpomocný duchovný.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section.sources title="Použitá literatúra a pramene:">
        <li>BARTKOVÁ, Anna. <em>Dejiny farnosti Detva</em>. Diplomová práca, 2008.</li>
        <li>ĎURKOVÁ, Mária. Najstaršie dejiny Detvy. In: Anna Ostrihoňová. ed. Detva. Monografia mesta. Detva: mesto Detva, 2018. ISBN 978-80-9730011-2-5.</li>
        <li>GOLIAN, Ján. Náboženský život. In: Anna Ostrihoňová. ed. Detva. Monografia mesta. Detva: mesto Detva, 2018. ISBN 978-80-9730011-2-5.</li>
        <li>GOLIAN, Ján. Život ľudu detvianskýho. Historicko-demografická a kultúrna sonda do každodenného života na Podpoľaní v dlhom 19. storočí. Ružomberok: Society for Human Studies, 2019. ISBN 978-80-972913-4-1.</li>
        <li>ZAREVÚCKY, Anton. Katalóg farností a kostolov Banskobystrického biskupstva. Strojopis, 1976.</li>
        <li>Schematismus historicus Dioecesis Neosoliensis pro anno saeculari MDCCCLXXVI. Neosolii: Philippi Machold, 1876.</li>
        <li>Sestry bosé karmelitánky pôsobia v Detve desať rokov [online]. [cit. 05.02.2021]. Dostupné na internete: https://www.detva.sk/?program=51&module_action__0__id_ci=133684#common-image--0</li>
    </x-page-section.sources>

@endsection
