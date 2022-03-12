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
                Osobitné postavenie medzi spolupracovníkmi kňaza v spoločenstve veriacich má kostolník. Jeho úloha by sa dala opísať aj ako pomoc pri bohoslužbách a vysluhovaní sviatostí, zabezpečuje dozor v kostole, starostlivo dbá o priestor a predmety potrebné k liturgii. Kostolník veľakrát prispieva k vytvoreniu „duchovnej nálady“ pre bohoslužbu, svojou službou pripravuje „pôdu“ pre liturgické slávenia.
            </p>
            <p>
                Kostolník by mal byť príkladom pre veriacich tým, ako vykonáva svoju službu, ako spĺňa svoje náboženské povinnosti a ako svoj život usmerňuje podľa viery. Najdôležitejším predpokladom pre túto službu je živá viera v Boha, keďže sa denne prostredníctvom služby v kostole nachádza pri samom „prameni“. Túto úlohu môže zastávať vhodný a spoľahlivý muž alebo takisto žena.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section>
        {{-- <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/> --}}
        <x-page-section.text type="legt">
            <p>
                Keďže kostolník je dôležitá osoba pre styk s ľuďmi, mal by vedieť s ľuďmi správne komunikovať. Je taktiež dôležitým spojovacím článkom medzi kňazom a farským spoločenstvom. Kostolník by mal oplývať viacerými vhodnými vlastnosťami, napríklad ako zmysel pre poriadok, presnosť, mlčanlivosť, priateľskosť, vytrvalosť, zodpovednosť, čestnosť a vľúdnosť.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section>
        <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/>
        <x-page-section.text type="right">
            <p>
                Medzi dôležité úlohy, ktoré je potrebné zabezpečiť pre dôstojnosť slávenia liturgie, spadá aj upratovanie kostola a kvetinová výzdoba. Tieto nemôže mať na starosti len jedna osoba, majú sa zveriť aj iným veriacim. Kostolník okrem iného dbá aj o čistotu liturgických rúch a iných textílií potrebných vo svätej omši.
            </p>
            <p>
                V našej farnosti aktuálne pôsobia tri kostolníčky (r. 2022), z ktorých dve sa striedajú v službe nielen vo farskom kostole, ale aj pri pohreboch so svätou omšou v dome smútku na cintoríne, prípadne pri iných liturgických sláveniach. V kláštornom kostole plnia úlohu kostolníčok dve bosé karmelitánky - mníšky určené pre komunikáciu kláštora s verejnosťou.
            </p>
        </x-page-section.text>
    </x-page-section>


    <x-page-section.sources title="Použitá literatúra:">
        <li>Directorium 1989. Trnava: Spolok sv. Vojtecha, 1988.</li>
    </x-page-section.sources>

@endsection
