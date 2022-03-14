<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$pageData['breadCrumb']"
        :titleSlug="$pageData['banners']"
        dimensionSource="full"
    />

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" class="static-page pad_t_50 pad_b_50">

    <x-frontend.page.subsection >
        <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4"/>
        <x-frontend.page.text-segment animation="fromright">
            <p>
                Korene vzniku ružencových bratstiev siahajú hlboko do minulosti, prakticky už do prvej polovice 13. storočia, keď podľa legendy modlitbu posvätného ruženca prijal od Panny Márie sv. Dominik, zakladateľ Rehole kazateľov (dominikánov) ako účinný prostriedok rozjímania nad udalosťami Kristovho života a šírenia jeho lásky medzi ľuďmi. Na pôde dominikánov vzniklo prvé ružencové bratstvo. V roku 1470 ho založil blahoslavený Alan de la Roche (1428 - 1475). Zásluhou jeho a ďalších dominikánov sa modlitba posvätného ruženca a ružencové bratstvá rýchlo rozšírili v západnom kresťanstve a dominikáni sa stali ich hlavnými šíriteľmi.
            </p>
            <p>
                Vďaka úsiliu bl. Alana de la Roche bolo Bratstvo Svätého ruženca po prvýkrát schválené v roku 1475 a približne o sto rokov neskôr pápež sv. Pius V. udelil dominikánom výsadu zakladať ružencové bratstvá v celej Katolíckej cirkvi. Ako bývalý dominikán z moci svojho úradu poveril bratov dominikánov, aby na večné časy rozširovali modlitbu ruženca. Medzi laikmi v šírení ružencovej modlitby obzvlášť vynikal laický dominikán bl. Bartolomej Longo (1841 - 1926), ktorého pápež sv. Ján Pavol II. nazval „apoštol ruženca“.
            </p>
            <p>
                Panna Mária, Kráľovná posvätného ruženca, dala bl. Alanovi de la Roche pätnásť prísľubov pre tých, ktorí sa budú zbožne modliť jej ruženec. Povedala mu: „(...) nesmierne veľa kníh by bolo treba napísať, aby v nich boli zaznamenané všetky zázraky môjho posvätného ruženca.“
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Prísľuby Panny Márie zjavené bl. Alanovi de la Roche:">
        {{-- <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4" /> --}}
        <x-frontend.page.text-segment animation="fromleft">
            <ol>
                <li>Všetkým, ktorí sa budú zbožne modliť môj ružence, sľubujem svoju zvláštnu ochranu a hojnosť milostí.</li>
                <li>Tí, ktorí v modlitbe ruženca vytrvajú, dostanú zvláštnu milosť.</li>
                <li>Ružence bude mocnou ochranou proti peklu, zničí zlo, zbaví svet hriechu a zaženie blud.</li>
                <li>Ruženec rozhojní čnosť a obsiahne pre duše hojné Božie milosrdenstvo. Odvráti srdcia ľudí od lásky k svetu a jeho márností a pozdvihne ich k túžbe po večných veciach. Tie duše sa posvätia týmto prostriedkom.</li>
                <li>Tí, čo sa mi odovzdajú cez ruženec, nezahynú.</li>
                <li>Toho, kto bude zbožne recitovať môj ruženec, uvažujúc nad tajomstvami, nikdy nepremôže nešťastie, nezažije Boží hnev a nezomrie náhlou smrťou. Hriešnik sa obráti, vytrvá v milosti a zaslúži si večný život.</li>
                <li>Kto sa zasvätí môjmu ružencu, nezomrie bez sviatostí Cirkvi.</li>
                <li>Tí, čo budú verne recitovať môj ruženec, budú počas svojho života a po smrti účastní Božieho svetla a plnosti jeho milostí, vlastných svätým.</li>
                <li>Ihneď vyvediem z očistca duše zasvätené môjmu ružencu.</li>
                <li>Deti môjho ruženca sa budú tešiť veľkej sláve v nebi.</li>
                <li>Čo budeš žiadať prostredníctvom ruženca, to dosiahneš.</li>
                <li>Tým, ktorí budú šíriť môj ruženec, sľubujem pomoc vo všetkých ich potrebách.</li>
                <li>Dosiahla som od svojho Syna, že všetci členovia Ružencového bratstva budú mať svojich orodovníkov v živote a v smrti, celý nebeský dvor.</li>
                <li>Tí, ktorí sa zbožne modlia môj ruženec, sú moje milované deti, bratia a sestry Ježiša Krista.</li>
                <li>Zasvätenie sa môjmu ružencu je zvláštne znamenie predurčenia.</li>
            </ol>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4"/>
        <x-frontend.page.text-segment animation="fromright">
            <p>
                Ružencové bratstvo je združenie duchovne zjednotených veriacich formovaných dominikánskou spiritualitou, ktorí si osobitným spôsobom uctievajú Pannu Máriu a modlitbou posvätného ruženca vyprosujú potrebné dobrá pre seba, Cirkev a svet. Cieľom každého člena ružencového bratstva je zároveň snaha o neustály pokrok v láske k Bohu a ľuďom, o neustále premieňanie modlitby na konkrétne skutky. Ružencové bratstvá sú organizované skupiny veriacich, ktoré svojou činnosťou sledujú spoločný cieľ - šírenie dobra cez osobné sebaposväcovanie, cez prehlbovanie viery jednotlivých členov, cez prehlbovanie ich lásky k Bohu a k ľuďom okolo nich.
            </p>
            <p>
                Členmi ružencového bratstva sa veriaci stávajú na základe slobodného rozhodnutia, keďže tým sa zaväzujú prijať na seba všetky povinnosti a práva vyplývajúce z členstva. Členom ružencového bratstva môže byť pokrstený katolík, ktorý má minimálne 9 rokov (výnimka je možná), ktorý sa slobodne rozhodne, že na seba vezme práva a povinnosti vyplývajúce z členstva v ružencovom bratstve a pri vstupe do bratstva si vyberie jednu z foriem modlitby posvätného ruženca a stane sa tak členom Živého, Svätého alebo Večného ruženca. Záväzky, ktoré člen na seba prevezme vstupom do ruženca, sú jeho osobnými záväzkami, to znamená, že ich musí plniť sám, nemôže tieto záväzky za neho plniť iná osoba.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4" />
        <x-frontend.page.text-segment animation="fromleft">
            <p>
                Člen Živého ruženca je povinný modliť sa každý deň jeden desiatok posvätného ruženca na úmysel za obrátenie hriešnikov a za živých i zosnulých členov Ružencového bratstva, za Rehoľu dominikánov, za svoju farnosť a za svojich duchovných pastierov (biskupov a kňazov). Je povinný raz za mesiac sa zísť na spoločnom stretnutí - modlitbe, po ktorom sa uskutoční výmena tajomstiev.
            </p>
            <p>
                Člen Svätého ruženca je povinný pomodliť sa celý posvätný ruženec (tajomstvá radostné, svetla, bolestné, slávnostné) za jeden týždeň na úmysel za obrátenie hriešnikov a za živých i zosnulých členov Ružencového bratstva, za Rehoľu dominikánov, za svoju farnosť a za svojich duchovných pastierov (biskupov a kňazov). Modlitbu posvätného ruženca si môže člen ľubovoľne rozdeliť podľa času, ktorý mu vyhovuje, napr. v jeden deň dva desiatky, v iný tri alebo v jeden deň celý ruženec - potrebné je zachovať postupnosť v modlitbe celého posvätného ruženca (najprv sa pomodliť radostné tajomstvá, potom svetla, bolestné, nakoniec slávnostné). Člen Svätého ruženca nie je viazaný spoločnými stretnutiami členov Živého ruženca, ale je tam vítaný.
            </p>
            <p>
                Člen Večného ruženca si zvolí svoj pravidelný „čas bdenia“ raz za mesiac alebo raz za rok, počas ktorého sa pomodlí celý posvätný ruženec s nasledovnými úmyslami: za obrátenie hriešnikov (radostné tajomstvá), za čistotu viery a ohlasovateľov evanjelia (tajomstvá svetla), za večnú spásu umierajúcich (bolestné tajomstvá), za vyslobodenie duší z očistca (slávnostné tajomstvá). Pod časom bdenia sa myslí ucelený časový celok - bez prerušenia. Na splnenie povinnosti „času bdenia“ mesačne alebo ročne stačí sa pomodliť súkromne a na ľubovoľnom mieste modlitbu celého posvätného ruženca. Člen Večného ruženca nie je viazaný spoločnými stretnutiami členov Živého ruženca, ale je tam vítaný.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4"/>
        <x-frontend.page.text-segment animation="fromright">
            <p>
                Duchovné sprevádzanie členov ružencových bratstiev na Slovensku je zverené provinčnému promótorovi pre ruženec. Jemu je zverená služba zakladať ružencové bratstvá, koordinovať ružencový apoštolát a navštevovať jednotlivé bratstvá vo farnostiach na území Slovenska. Promótora pre ruženec vymenuje provinciál Rehole dominikánov a vymenovanie podlieha schváleniu generálnej kúrie dominikánov v Ríme. V lete 2017 sa provinčným promótorom pre ruženec na Slovensku stal brat Alan Ján Dely OP.
            </p>
            <p>
                V našej farnosti jestvuje dlhodobá tradícia ružencového bratstva. V roku 2003 sa uskutočnila reorganizácia miestnych bratstiev, ktorých dovtedajšia činnosť sa 27. apríla 2003 ukončila a začala sa registrácia nových spoločenstiev. Každá ruža (spoločenstvo - bratstvo Živého ruženca) môže mať 20 členov, ktorí majú bydlisko vo farnosti. V roku 2003 bolo zaregistrovaných 53 ružencových bratstiev (53 ruží) a z tohto počtu zostalo v roku 2022 aktívnych 46 ruží. Jednotlivé ruže sa postupne v priebehu kalendárneho roka striedajú v upratovaní farského kostola, raz do týždňa v sobotu.
            </p>

        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    </x-frontend.page.section>
</x-frontend.layout.master>
