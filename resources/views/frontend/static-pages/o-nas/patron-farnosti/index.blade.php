@extends('frontend._layouts.static-page')
@push('content_header')
    {{-- Prepend content Header --}}
@endpush
@prepend('content_footer')
    {{-- After content Footer --}}
@endprepend

@section('content')

    <x-page-section >
        <x-page-section.img columns="4" type="left" alt="" source="Zdroj: TODO:" url="{{ asset('images/only-for-debug/sv-francisco/images.jpg') }}" />
        <x-page-section.text type="right">
            <h6 class="text-church-template">* 1181/1182 Assisi, Taliansko</h6>
            <h6 class="text-church-template">† 3.10.1226 Kostol Porciunkula, dnes Bazilika Santa Maria degli Angeli pri Assisi, Taliansko</h6>
            <p>
                Vlastným menom Giovanni Battista Bernardone, diakon, zakladateľ rehole františkánov. Patrón Talianska, ekológov, obchodníkov, chudobných, chromých, slepých, väzňov, stroskotancov, tkáčov, obchodníkov so súknom, krajčírov, sociálnych pracovníkov, ochrancov životného prostredia; proti moru a bolesti hlavy.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Mladosť">
        <x-page-section.img columns="5" type="right" alt="" source="Zdroj: TODO:" url="{{ asset('images/only-for-debug/sv-francisco/602199.jpg') }}" />
        <x-page-section.text type="left">
            <p>
                František sa narodil v umbrijskom meste Assisi na úpätí hory Monte Subasio. Jeho rodičmi boli zámožný obchodník so súknom Pietro di Bernardone a jeho manželka Giovanna, zvaná tiež Pika, ktorá pravdepodobne pochádzala z Provensálska. František bol pokrstený ako Giovanni (Ján), krátko nato mu však jeho otec, ktorý sa práve vrátil z obchodnej cesty po Francúzsku, dal meno Francesco („malý Francúz“). Podľa niektorých zdrojov si tak chcel uctiť krajinu, pri obchodovaní s ktorou nadobudol svoje bohatstvo. Okrem Františka mali manželia Bernardonovci ešte jedno dieťa, a to chlapca, ktorý sa volal Angelo.
            </p>
            <p>
                František získal pomerne dobré vzdelanie a vo svojej mladosti viedol bezstarostný život s dostatkom finančných prostriedkov. Otec sa usiloval vychovať zo syna dobrého obchodníka a čiastočne sa mu to darilo. František sa ukazoval ako schopný obchodník. No na rozdiel od otca nevedel odkladať peniaze. Jeho prirodzená dobrosrdečnosť a romantická povaha ho zvádzali k márnotratnej štedrosti, či už dával peniaze žobrákom, alebo ich míňal pri zábavách s rovesníkmi.
            </p>
        </x-page-section.text>
        <x-page-section.img columns="4" type="left" alt="" source="Zdroj: TODO:" url="{{ asset('images/only-for-debug/sv-francisco/Josep_Benlliure_Gil43.jpg')  }}" />
        <x-page-section.text type="right">
            <p>
                V roku 1199 vypukla v Assisi občianska vojna medzi mešťanmi a šľachtou. Mladý František sa do vojny zapojil v meštianskych oddieloch. V roku 1202 vytiahlo Assisi do boja proti susednému mestu Perugia, kam sa uchýlila veľká časť assiskej šľachty. V novembri toho roku skončila vojna pre Assisi porážkou v bitke pri Collestrade a František padol spolu so svojimi spolubojovníkmi do zajatia, z ktorého ho musel vykúpiť jeho otec. V zajatí František ťažko ochorel. Keď František po roku vychádzal z väzenia, mal za sebou viacero existenciálnych sklamaní: jeho mladíckym snom bolo stať sa široko-ďaleko známym rytierom, v boji však utrpel potupnú porážku. Namiesto užívania si mládeneckej sily, životaschopnosti a bojovnosti sa vo svojich dvadsiatich rokoch musel vyrovnávať s telesnou slabosťou a chorobou.
            </p>
            <p>
                Po svojom návrate do Assisi a s postupne zlepšujúcim sa zdravotným stavom sa František ešte pokúsil nadviazať na svoj bezstarostný život. V roku 1204 sa chcel pridať do armády šľachtica Gautiera III. z Brienne, ktorý si pod záštitou pápeža Inocenta III. nárokoval na sicílske kráľovstvo. Keď bol na ceste do Puglie, mal v Spolete niekoľko mystických snov, ktoré prehĺbili jeho duchovnú krízu, ochorel a vrátil sa do Assisi. Začal sa postupný proces jeho obrátenia. Začal sa vyhýbať svojim obľúbeným kratochvíľam a bohémskym priateľom. Prosil Boha o osvietenie a často navštevoval malomocných. V tejto dobe vykonal púť do Ríma, všetky svoje peniaze venoval ako milodar pri hrobe sv. Petra a spolu so žobrákmi sa postil pri vstupe do baziliky.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Povolanie">
        <x-page-section.img columns="4" type="right" alt="" source="Zdroj: TODO:" url="{{ asset('images/only-for-debug/sv-francisco/Saint_Francis_of_Assisi_by_Jusepe_de_Ribera.jpg') }}" />
        <x-page-section.text type="left">
            <p>
                V opustenom poľnom kostolíku sv. Damiána zažil František videnie, ktoré dalo jeho životu nový smer. Prihovoril sa mu z oltárneho kríža ukrižovaný Kristus: „František, oprav mi kostol! Veď vidíš, že sa celkom rozpadáva!“ Mladý Bernardone bral Ježišovu výzvu doslovne a dal sa do opravy kostolíka, ako vedel. Táto práca sa stala predobrazom jeho neskoršej účasti na obnove Cirkvi. V latinčine i taliančine je totiž pre kostol a cirkev to isté slovo: ecclesia, la chiesa. Preto Kristova naliehavá prosba sa vzťahovala na Cirkev, hoci v prvej chvíli sa zdalo, že sa týka opusteného kostolíka. Neskôr podobne opravil aj dnes už neexistujúci kostol San Pietro della Spina a kostol Santa Maria degli Angeli neďaleko Assisi, známejší pod názvom Porciunkula.
            </p>
            <img class="img-fluid col-md-3 col-lg-2 mb-3 me-sm-4 float-sm-start rounded-3" src="{{ asset('images/only-for-debug/sv-francisco/11008.jpg') }}" alt="">
            <p>
                Na opravu kostolov a iné dobročinné účely si František bral finančné prostriedky z obchodu svojho otca. To viedlo k hádkam a dokonca k súdnemu sporu, pri ktorom Pietro Bernardone podal na svojho syna žalobu u miestneho biskupa. Pri súdnom pojednávaní, ktoré sa konalo na jar 1206 verejne na námestí, sa František odhodlal k radikálnemu gestu: celkom sa vyzliekol, šaty hodil otcovi a vyhlásil, že odteraz má už iba Otca, ktorý je na nebesiach. Biskup prikryl Františka svojím plášťom. Tým nielen zakryl jeho nahotu, ale vzal ho pod ochranu ako verejného kajúcnika a človeka zasväteného Bohu.
            </p>
            <p>
                Spočiatku nemal František nijaký určitý program. Dva roky žil ako potulný mních. Venoval sa modlitbe, slúžil chudobným a opatroval tri opustené kostoly okolo Assisi. Najmä Kostol Panny Márie Anjelskej - Porciunkuly prirástol Františkovi k srdcu a stal sa kolískou ním založenej rehole. Tam sa assiský Poverello (Chudáčik), ako ho nazývali, pri počutí evanjelia o rozoslaní apoštolov rozhodol, že bude nasledovať Kristových učeníkov: bez akýchkoľvek hmotných prostriedkov poputuje svetom a bude ohlasovať Božie kráľovstvo.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Františkánske spoločenstvo">
        <x-page-section.img columns="4" type="left" alt="aaa" url="{{ asset('images/only-for-debug/sv-francisco/StFrancis_part.jpg') }}" />
        <x-page-section.text type="right">
            <p>
                František ako kajúcnik nabádal aj ostatných, aby milovali Boha, kajali sa za svoje hriechy a takto postupne priťahoval ďalších mladých ľudí, ktorí boli ochotní zdieľať s ním jeho spôsob života. Medzi prvými, ktorí sa k nemu v roku 1208 pripojili, bol bohatý obchodník Bernardo da Quintavalle, právnik Pietro Cattani a brat Egídius. Začiatkom roka 1209 bolo bratov už osem a neskôr sa k nim pripojili ďalší štyria. Žili jednoduchým životom v opustenej nemocnici Rivo Torto neďaleko Assisi; mnoho času však trávili putovaním hornatými krajmi Umbrie, vždy v dobrej nálade a so spevom nabádali ľudí k pokániu.
            </p>
            <p>
                V roku 1209 putoval František so svojimi jedenástimi nasledovníkmi do Ríma, aby tam pápeža Inocenta III. dobrovoľne požiadal o schválenie spôsobu života svojho malého spoločenstva, a to napriek tomu, že v dobe vojen proti kacírom bolo založenie nového náboženského hnutia vnímané veľmi skepticky. Z hľadiska cirkevného práva sa Františkovi podarilo svoju žiadosť šikovne obhájiť: svojich bratov označil za potulných kazateľov pokánia. Tých Cirkev uznávala ako stav, zatiaľ čo proti ostatným, síce chudobu hlásajúcim skupinám, ako boli napr. albigénci, valdénci a humiliáti, bojovala ako proti heretikom s proticirkevným učením.
            </p>
            <p>
                František získal od pápeža ústne povolenie žiť v chudobe a kázať pokánie. Zaslúžil sa o to aj kardinál Ugolino, neskorší pápež Gregor IX. Podľa populárnej tradície nechcel Inocent Františka najprv vôbec prijať, presvedčil ho však sen, v ktorom videl rúcajúci sa kostol (Cirkev), ktorý podopiera chudobný muž. Keď Františka prijal, spoznal v ňom muža zo svojho sna a jeho regulu schválil. Tak vznikol nový Rád menších bratov, po latinsky Ordo Fratrum Minorum, skratka OFM. Niekedy v tom čase alebo krátko po tom prijal František diakonské svätenie. Z poníženosti a z úcty ku kňazstvu nechcel byť kňazom, ale ostal diakonom po celý život.
            </p>
            <p>
                Vo svojej reholi musel František neraz zápasiť o zachovanie ideálu absolútnej chudoby a jednoduchosti, ktorý sa mnohým zdal neudržateľný. Veľkou potechou preňho bol v roku 1212 vznik ženskej vetvy rehole (klarisky), v ktorej spoluzakladateľka Klára z Assisi bola vzorom evanjeliovej chudoby nielen pre svoje spoločníčky, ale aj pre mužských členov rádu.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Apoštolát">
        <x-page-section.img columns="4" type="right" alt="" source="Zdroj: TODO:" url="{{ asset('images/only-for-debug/sv-francisco/st_francis_of_assisi_receiving_the_stigmata-12701.jpg') }}" />
        <x-page-section.text type="left">
            <p>
                Veľmi účinný sa ukázal Františkov apoštolát, ktorý pozostával z príkladu dôsledne prežívaného evanjelia a z kázania. Obsahom jeho kázania bol pokoj a dobro (lat. Pax et bonum), čo ohlasoval všetkým spoločenským triedam bez rozdielu. A jeho výzvy na pokánie a duchovnú obnovu sa naozaj stretli s porozumením všetkých, od jednoduchých ľudí až po univerzitných profesorov. Túžba získať nesmrteľné duše pre Krista viedla Františka k misijným cestám mimo Talianska. V rokoch 1212 - 1214 sa vydal na apoštolské cesty do Palestíny a do Maroka. No ani jeden z týchto cieľov sa mu nepodarilo dosiahnuť: raz pre morskú búrku, inokedy pre chorobu. Medzitým počet bratov stále rástol, takže v rokoch 1217 - 1219 mohol poslať viacej skupín do rozličných krajín Európy.
            </p>
            <p>
                Jemu samému sa konečne v rokoch 1219 - 1220 podarilo dôjsť do Svätej zeme, Sýrie a Egypta, kde kázal priamo pred sultánom Al-Malik al-Kamilom. Sultán ho prijal zdvorilo, ale viac František nedosiahol. No napriek tomu sa Františkovou iniciatívou začala nová misionárska éra Cirkvi, ktorá napokon prekonala moslimské obkľúčenie kresťanstva. Pravda, viacerí františkáni zaplatili za misionársku horlivosť životom. Ich smrť však nezastrašila ďalších hlásateľov evanjelia, ba naopak, viedla k väčšiemu misionárskemu nadšeniu.
            </p>
            <p>
                Po návrate z Blízkeho východu sa František viac venoval vnútornej disciplíne rehole a vypracovaniu jej definitívnej ústavy. Vedenie rádu pritom zveril svojim vikárom Petrovi Cattanimu a bratovi Eliášovi. Františkom vypracované rehoľné stanovy sa zachovali v dvoch podobách. Prvé, obsiahlejšie (Nepotvrdená regula) sú z roku 1221. Druhé (Potvrdená regula) sú trocha skrátené a stali sa definitívnou konštitúciou menších bratov. V novembri 1223 ich schválil pápež Honorius III.
            </p>
            <p>
                František miloval Cirkev a vážil si jej ustanovizne. Podriaďoval sa vo všetkom cirkevnej hierarchii, ctil si kňazský stav a vážil si teológov, ktorí sa zaoberali Božím slovom. Ale bol by najradšej, keby sa menší bratia osobne nezaujímali o tieto veci, aby tak nielen názvom, ale aj životom ostali menšími, poníženými bratmi všetkých. No napokon súhlasil so zavedením teologických štúdií v reholi. Prvé rádové učilište teológie vzniklo v Bologni v rokoch 1223 - 1224. Za prvého profesora určil František jedného zo svojich najlepších duchovných synov sv. Antona Paduánskeho.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Posledné roky života">
        <x-page-section.img columns="4" type="left" alt="" source="Zdroj: TODO:" url="{{ asset('images/only-for-debug/sv-francisco/1627905656-porciunkula (1).jpg') }}" />
        <x-page-section.text type="right">
            <p>
                Tajomstvo Kristovho narodenia vo vianočnú noc v roku 1223 prežíval František spolu s viacerými priateľmi zvláštnym spôsobom na vrchu Greccio. Jaskyňa, živé zvieratá a jednoduchí veriaci ľudia vytvárali scénu, ktorá bola veľmi blízka betlehemskej. A táto udalosť sa napokon stala aj základom pekného kresťanského zvyku stavať si cez vianočné sviatky v rodine alebo niekde i na verejných priestranstvách betlehem. Okrem tajomstva Kristovho narodenia pútalo Františka už od čias jeho obrátenia tajomstvo Kristovho utrpenia a jeho smrti na kríži. Podobne ako vianočný betlehem vznikla z františkánskej spirituality aj pobožnosť krížovej cesty. Sám František mal účasť na Kristovom utrpení ešte iným spôsobom.
            </p>
            <p>
                V septembri 1224 za Františkovho pôstu pred sviatkom sv. Michala sa utiahol do samoty na hore Verna neďaleko Arezza. Tam sa postil, rozjímal a usiloval sa čím užšie spojiť s trpiacim Vykupiteľom. Tu sa mu ráno 14. septembra, na sviatok povýšenia Svätého kríža, zjavil ukrižovaný Kristus v podobe okrídleného serafína a vtlačil mu do tela znaky svojich rán - stigmy. Bol to prvý známy prípad stigiem v dejinách Cirkvi. Krvavé znaky Kristovho utrpenia boli viditeľné na Františkových rukách, nohách a boku tak za jeho života, ako aj po jeho smrti.
            </p>
            <p>
                Zo samoty La Verny sa František vrátil premenený mimoriadnym mystickým zážitkom. No zvláštne milosti ho neušetrili od stále vzrastajúcich telesných bolestí. K utrpeniu stigiem sa pripájali zosilnené bolesti žalúdka, pečene a postupujúca očná choroba, ktorú nezastavili ani drastické zásahy, aké praktizovali vtedajší lekári. Bolo vidieť, že František sa blíži k vrcholu svojej životnej kalvárie. Napriek tomu sa chcel znova vybrať na apoštolské cesty, ale jeho telesné sily mu to už nedovolili. Preto sa sústredil na povzbudzovanie spolubratov a všetkých ľudí, s ktorými sa mohol nejako dostať do styku. Už takmer slepý zostavil v Assisi na prelome rokov 1224 - 1225 známu prekrásnu Pieseň brata Slnka, v ktorej dobrorečí Bohu za všetky stvorenia a vyzdvihuje ich užitočnosť a krásu.
            </p>
            <p>
                V lete 1226 sa František vrátil zo svojej poslednej cesty do Assisi. Bolo vidieť, že je na konci síl. Jeho spolurodáci sa mu usilovali prejaviť čo najväčšiu pozornosť a lásku. Assiský biskup ho ubytoval vo svojom paláci. Na konci septembra sa dal preniesť do milovanej Porciunkuly. Tam si dal čítať evanjeliové state o Kristovom utrpení. Bratom venoval ešte posledné napomenutia a požehnania. Napokon so spevom vítal svoju poslednú sestru - telesnú smrť. Zomrel v sobotu 3. októbra večer tak, ako si želal, vyzlečený na holej zemi, aby sa čo najväčšmi pripodobnil zomierajúcemu Spasiteľovi. Františka slávnostne pochovali 4. októbra v Kostole sv. Juraja v Assisi.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Dianie po smrti">
        <x-page-section.img columns="4" type="right" alt="" source="Zdroj: TODO:" url="{{ asset('images/only-for-debug/sv-francisco/francis_and_first_followers_690.jpg') }}" />
        <x-page-section.text type="left">
            <p>
                Pre nezvyčajne živú úctu, prejavovanú zomretému zakladateľovi menších bratov a pre množstvo zázrakov, ktoré sa diali na jeho príhovor, pápež Gregor IX. ho vyhlásil za svätého už dva roky po smrti. O ďalšie dva roky neskôr už stála v Assisi nová bazilika zasvätená svätému Františkovi. Do nej preniesli i jeho telesné pozostatky. Ďalšia nepretržitá úcta assiského Chudáčika svedčí o tom, že išlo o naozaj mimoriadnu osobnosť. Každý svätý má svojich ctiteľov, ale aj odporcov. No o svätom Františkovi Assiskom sa hovorí, že nikdy nemal a doteraz nemá nepriateľov: nie všetci ho chápu, ale všetci, dokonca aj mnohí nekatolíci, ho milujú.
            </p>
            <p>
                Po smrti svätého Františka Assiského sa rozrástol počet nielen jeho ctiteľov, ale aj nasledovníkov. Mužská vetva Rehole menších bratov, nazývaná podľa zakladateľa františkáni, dosiahla ku koncu 13. storočia už do 40 000 členov. Mnohí z nich pôsobili ako misionári v nekresťanských krajinách, dokonca až v Mongolsku a Číne.
            </p>
            <p>
                Veľká rehoľná rodina menších bratov časom prežívala vnútorné napätia, ktoré sa sústreďovali najmä na otázku zachovávania chudoby. Podľa stupňa tohto zachovávania sa v 16. storočí menší bratia rozdelili na tri autonómne celky. Od menej prísnych konventuálov, ktorých poznáme pod menom minoriti, sa v roku 1517 oddelili prísnejší nekonventuáli a napokon v roku 1528 vznikla ešte prísnejšia vetva kapucínov. Najznámejší a najpočetnejší sú nekonventuáli, známi aj pod menom hnedí františkáni. Zjednodušene sa menší bratia dnes rozlišujú na františkánov, kapucínov a minoritov.
            </p>
        </x-page-section.text>
        <x-page-section.img columns="4" type="left" alt="" source="Zdroj: TODO:" url="{{ asset('images/only-for-debug/sv-francisco/WEB3-SAINT-FRANCIS-OF-ASSISI-SHEPHERD-SHEEP-WOLF-shutterstock_710430052.jpg')  }}" />
        <x-page-section.text type="right">
            <p>
                Popri mužských vetvách sa rozšíril aj druhý, čiže ženský rád sv. Františka, nazývaný podľa zakladateľky sv. Kláry. Keďže klarisky žili uzavretým kláštorným životom, nedosiahli taký počet ako apoštolsky činní menší bratia. No ostali obdivuhodne verné pôvodným ideálom sv. Františka a svojou duchovnosťou sa stali požehnaním pre celú Cirkev.
            </p>
            <p>
                Tretí rád sv. Františka združuje laických veriacich. V priebehu storočí sa v rámci tretieho rádu vyvinulo mnoho mužských a najmä ženských rehoľných spoločenstiev, ktoré sa hlásia k duchovnému dedičstvu sv. Františka.
            </p>
            <p>
                Pozemský život sv. Františka sa síce skončil večer 3. októbra 1226, čo sa ale podľa vtedajšieho počítania času počítalo už k nasledujúcemu dňu, preto sa jeho sviatok slávi 4. októbra. Za svätého bol vyhlásený pápežom Gregorom IX. v roku 1228. Pápež Pius XII. ho v roku 1939 vyhlásil za patróna Talianska a v roku 1980 bol sv. Jánom Pavlom II. vyhlásený za patróna ekológov.
            </p>
        </x-page-section.text>
    </x-page-section>

    <div class="row text-muted ps-5">
        Zdroje:
        <ul>
            <li>www.kapucini.sk</li>
            <li>www.rkcvtjuh. sk</li>
            <li>www.zivotopisysvatych.sk</li>
        </ul>
    </div>

@endsection
