@extends('frontend._layouts.static-page')

@push('content_header')
    {{-- Prepend content Header --}}
@endpush
@prepend('content_footer')
    {{-- After content Footer --}}
@endprepend

@section('content')
    <x-page-section >
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>
                Nenahraditeľnou súčasťou života a práce v Cirkvi sú miništranti. Ich celkový význam spočíva v priamej oslave Boha prostredníctvom všetkých liturgických úkonov a obradov, na ktorých sa zúčastňujú a pri ktorých sú obdarúvaní zvláštnymi dobrodeniami. Ich viera je vzorom pre iných mladých ľudí, a tak veľmi často plnia aj misijnú úlohu Cirkvi medzi svojimi vrstovníkmi.
            </p>
            <p>
                Slovo miništrovať pochádza z latinského slova ministrare a znamená slúžiť, posluhovať. Miništrovaním teda rozumieme posluhovanie pri Pánovom oltári, slúženie pri slávení eucharistickej obety, posluhovanie pri vysluhovaní sviatostí a pri iných liturgických úkonoch a obradoch. Chlapcov alebo aj dospelých mužov, ktorí vykonávajú túto službu, voláme miništranti.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Nadpis 1">
        <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>
                Miništrantská služba je vznešená, posvätná, je to služba rozmnožujúca Božie milosti, služba Pánovi a služba veriacemu ľudu. Miništrant je po kňazovi a diakonovi najbližšie k samému Ježišovi Kristovi, ktorý je opravdivo, skutočne a podstatne prítomný v Oltárnej sviatosti. Miništranti sú akoby viditeľnými zástupcami anjelov. Ich úlohou je prinášať na oltár liturgické knihy, nádoby a rúcha, chlieb a víno, starať sa o kadidelnicu, dávať veriacim znamenie zvončekom a zabezpečiť iné potrebné liturgické úlohy.
            </p>
            <p>
                Miništrantská služba je posvätná. Vo svätej omši prostredníctvom sviatosti Eucharistie nám Pán Ježiš dáva samého seba. Miništrant, ktorý posluhuje pri týchto liturgických obradoch, najmä pri svätej omši, vykonáva posvätnú službu, ktorá posväcuje jeho i všetkých veriacich. Keď miništrant posluhuje svätej Cirkvi, posluhuje samému Pánu Ježišovi. Miništrovanie je teda služba Ježišovi Kristovi.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Aký má byť miništrant">
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>
                Všetci sme povolaní k spáse, lebo Ježiš Kristus za každého človeka zomrel na kríži. Zvlášť miništrant sa má usilovať žiť v stave posväcujúcej milosti, aby jeho duša bola čistá, a to najmä vtedy, keď slúži pri Pánovom oltári. Je tak blízko k Božím milostiam a darom, že ho Ježiš obdarúva mimoriadnymi milosťami a povoláva k svätosti.
            </p>
            <p>
                Miništrant má byť úplne a bezvýhradne oddaný svojej vznešenej a svätej službe pri oltári. Jeho oddanosť spočíva vo viere a v láske. Milovať Pána Boha znamená aj dávať príklad v každodennom živote v otázkach viery a mravov ostatným chlapcom a byť im príkladom. Miništrant má byť čistý v myšlienkach, slovách i v skutkoch. Svoje poslanie má plniť upravený a čistý na duši i na tele.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section>
        <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>
                Miništrant často prichádza k Bohu, ktorý ho potešuje, dodáva mu silu byť zbožným a svätým. Mal by pravidelne pristupovať k sviatostiam, najmä k sviatosti zmierenia a k svätému prijímaniu a denne sa modliť. Zbožnosť miništranta nemožno merať podľa množstva a dĺžky modlitieb, ale podľa jeho živej a radostnej praktickej viery.
            </p>
            <p>
                Usilovnosť miništranta spočíva v oddanej službe pri Pánovom oltári. Miništrant si má svoje povinnosti plniť presne. Na liturgické obrady má prichádzať v predstihu, aby mal čas na pokojnú a dôslednú prípravu. Mal by dobre poznať liturgické knihy, rúcha, nádoby a všetko, čo je spojené s miništrantskou službou.
            </p>
            <p>
                Miništrant má byť vzorný v službe i v mravoch. Pre veriacich je vzorom v kostole, najmä pri slávení svätej omše, ale aj pri iných liturgických obradoch. Má byť vzorom v správaní sa v škole i doma. Dobrý miništrant je radosťou rodiny i celého farského spoločenstva.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Miništranti v Detve">
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>
                Ako v mnohých iných farnostiach našej diecézy, tak aj v Detve za posledné roky výrazne klesol počet miništrantov. Napriek tomu sa zatiaľ vďaka Bohu stále nájdu chlapci, ktorí sú ešte odhodlaní slúžiť pri Pánovom oltári. Naša farnosť počas letných prázdnin organizuje každoročne pre miništrantov niekoľkodňový pobyt na chate, kde majú mladší chlapci pod vedením starších miništrantov vytvorený program, ktorý je pestrý na hry, zábavu, výlety, ale aj na modlitbu, sväté omše a osvojenie si vedomostných i praktických úloh miništranta.
            </p>
            <p>
                Chlapcov v školskom i predškolskom veku srdečne pozývame do miništrantskej služby. Pre každého chlapca je miništrovanie určitým vyznamenaním. K dôstojnému a krajšiemu sláveniu liturgie potrebujeme aj v našej farnosti mladých chlapcov - miništrantov, ktorí so živou vierou a s nezištnou láskou môžu pomáhať kňazom pri svätých omšiach a rôznych iných liturgických obradoch.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section.sources title="Použitá literatúra:">
        <li>MIKLÚŠ, František. Miništranti. Príručka pre miništrantov. Trnava: Spolok sv. Vojtecha, 2009. ISBN 978-80-7162-773-9.</li>
    </x-page-section.sources>

@endsection
