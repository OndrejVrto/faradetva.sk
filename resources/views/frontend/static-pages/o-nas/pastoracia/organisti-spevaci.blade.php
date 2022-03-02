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
                Organista sprevádza liturgické spevy hrou na organe a v rámci liturgie môže v hre uplatniť aj vhodné diela organovej tvorby. Služba organistu spočíva v hudobnom sprievode tých častí bohoslužby, ktoré sú určené k spevu, a predovšetkým k sprevádzaniu spevu ľudu. Popri technickej stránke hry na organe by organisti mali byť oboznámení s liturgiou Cirkvi a uvedomovať si, že sú súčasťou liturgického zhromaždenia. Organista musí komunikovať s kňazom, ktorý celebruje svätú omšu, zároveň dbať na adekvátny výber piesní podľa jednotlivých liturgických slávení a môže viesť taktiež žalmistov, spevákov či spevácky zbor.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section>
        <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>
                Služba organistu sa po prvýkrát objavuje v 10. storočí, spolu s najstaršou zmienkou o inštalácii organu v kostole vo Winchesteri vo Veľkej Británii. Síce už v roku 757 daroval byzantský kráľ Konštantín V. franskému kráľovi Pipinovi organ, ale až oveľa neskôr sa hra na organe uplatnila v liturgii. Organ sa predtým používal bežne pri pohanských hrách, dostihoch, v arénach a divadlách. V prvých troch storočiach nášho letopočtu, počas prenasledovania kresťanov, bola hra na organe úzko spätá s ich popravami v antických arénach. Rozmach používania tohto nástroja vo svätej omši priniesla v 10. storočí až liturgická reforma benediktínskeho kláštora v Cluny vo Francúzsku.
            </p>
        </x-page-section.text>
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>
                Pri liturgii boli od staroveku Žalmy prednášané sólistom - žalmistom. Pôvodne Žalm spieval lektor, neskôr spevák - žalmista. Služba žalmistu má pôvod v Antiochii. Žalm je sólový, meditatívny spev a tvorí prirodzený kontrast k čítaniam. Mal by sa spievať, a to od ambony, pretože ide o prednes Božieho slova. Okrem žalmistu poznáme tiež službu kantora - predspeváka, ktorý vedie a začína spevy liturgického zhromaždenia, zaisťuje striedavý spev, nahrádza chýbajúci zbor. Úlohu kantora nemusí zastávať nevyhnutne len organista. Význam služby kantora je daný potrebou sólového spevu niektorých častí v liturgii a živým spevom veriacich.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section>
        <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>
                Rok po nástupe dekana Jána Štrbáňa sa vo farnosti v roku 1922 konal verejný konkurz na miesto organistu. Medzi viacerými uchádzačmi bol aj Martin Valent, ktorý pochádzal z Dvorian nad Nitrou. Keď sa predstavil hrou na organe, prítomní ho odmenili neutíchajúcim potleskom. Miesto organistu dostal a spolu s rodinou sa presťahoval do Detvy. Martin Valent zbieral a notoval detvianske ľudové piesne, spolu s dekanom Štrbáňom sa intenzívne angažoval v sociálnej i kultúrnej sfére. Medzi ich významné počiny v oblasti hudobného folklóru patrí zbieranie vianočných ľudových piesní a ich publikovanie v malej brožúre. Pokračovateľom Martina Valenta bol jeho syn František, aj on bol činný v kultúrnej oblasti. Stal sa vedúcim cirkevnej dychovej hudby a bol dlhoročným detvianskym organistom.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section>
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>
                V našej farnosti v súčasnosti plnia úlohu organistu viacerí, ktorí sa podľa svojich pracovných možností usilujú o zabezpečenie organovej hudby počas bohoslužieb ako cez týždeň, tak zvlášť počas nedieľ a sviatočných dní. Služba organistu je veľmi potrebná pre uľahčenie a podnietenie spevu spoločenstva a pre hudobné dopĺňanie spevu k väčšej bohatosti a umeleckej účinnosti. Hru na organe je okrem sebavzdelávania možné študovať na základných umeleckých školách, konzervatóriách i na Vysokej škole múzických umení.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section.sources title="Použitá literatúra:">
        <li>CABAN, Peter. Liturgika. Princípy a teológia liturgie. Trnava: Spolok sv. Vojtecha, 2010. ISBN 978-80-7162-803-3.</li>
        <li>KOPEČEK, Pavel. Fundamentální liturgika. Křesťanské slavení: teologie, historie a pastorace. Olomouc: Univerzita Palackého v Olomouci, 2020. ISBN 978-80-244-5906-6.</li>
        <li>Vianočná polnočná omša v Detve [online]. [cit. 24.01.2022]. Dostupné na internete: https://www.youtube.com/watch?v=vmkGmjVg6o0</li>
    </x-page-section.sources>

@endsection