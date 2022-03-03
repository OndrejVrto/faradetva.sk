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
                Mariánske večeradlá modlitby a bratskej lásky vzišli z Mariánskeho kňazského hnutia, ktoré v roku 1972 založil taliansky kňaz Stefano Gobbi. Mariánske kňazské hnutie i večeradlo charakterizujú tri záväzky: 1. zasvätenie Nepoškvrnenému srdcu Panny Márie, 2. jednota s pápežom a s Cirkvou s ním zjednotenou, 3. vedenie veriacich k životu oddanosti Panne Márii. Večeradlo je predovšetkým stretnutím modlitby, a preto je jeho charakteristikou modlitba posvätného ruženca. Ruženec je reťaz lásky a záchrany, ktorou môžeme ovplyvniť mnohé udalosti doby, v ktorej žijeme.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Štruktúra večeradla">
        <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>
                Podobne, ako boli zhromaždení učeníci s Máriou vo večeradle v Jeruzaleme, sa veriaci pravidelne schádzajú, aby mohli:
            </p>
            <ul>
                <li>modliť sa spolu s Máriou</li>
                <li>žiť a prehĺbiť svoje zasvätenie Márii</li>
                <li>prežívať bratstvo.</li>
            </ul>
        </x-page-section.text>
        <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>
                Modlitbou ruženca voláme Matku Božiu, aby sa modlila spolu s nami a aby odhalila našim dušiam tajomstvá Ježišovho života. Vo večeradlách si máme navzájom pomáhať prežívať zasvätenie Nepoškvrnenému srdcu Panny Márie. To je cesta, po ktorej máme kráčať: učiť sa vidieť, cítiť, milovať, modliť sa a konať tak ako Panna Mária. Napokon všetci účastníci sú volaní k tomu, aby vo večeradle zakúšali opravdivé bratstvo.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Nadpis 2">
        <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="left">
            <p>
                Večeradlo sa začína vzývaním Ducha Svätého, prečíta sa úryvok z knihy „Kňazom, najmilším synom Panny Márie“, potom sa modlí posvätný ruženec s meditáciami nad jeho tajomstvami. Po každom desiatku ruženca sa spieva refrén fatimskej hymny: Ave, ave, ave Mária. Po modlitbe ruženca nasleduje úkon zasvätenia Nepoškvrnenému srdcu Panny Márie.
            </p>
            <p>
                Mariánske večeradlo sa v našej farnosti organizuje každý pondelok pred večernou svätou omšou, so začiatkom o 16.40 hod. vo farskom kostole. Na večeradlo je voľný prístup všetkých veriacich. Mariánske kňazské hnutie pravidelne organizuje večeradlá na diecéznej i celoslovenskej úrovni.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section.sources title="Použitá literatúra:">
        <li>Kňazom, najmilším synom Panny Márie. Bratislava: Mariánske kňazské hnutie, 2000. ISBN 80-900417-0-1.</li>
    </x-page-section.sources>

@endsection
