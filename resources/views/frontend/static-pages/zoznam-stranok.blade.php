@extends('frontend._layouts.static-page')

@section('content')
    <div class="row text-center">
        <div class="col-md-6">
            <x-page-section title="O nás / História">
                <x-page-section.text type="left">
                    <ol>
                        <li><a href="{{ url('o-nas/historia-farnosti') }}">História farnosti Detva</a></li>
                        <li class="pb-2"><a href="{{ url('o-nas/vianoce-v-detve') }}">Vianoce v Detve</a></li>
                        <span>Významné osobnosti</span>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/imrich-durica') }}">Imrich Ďurica</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/jozef-zavodsky') }}">Jozef Závodský</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/prof-thdr-jozef-buda') }}">prof. Jozef Búda</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/anton-prokop') }}">Anton Prokop</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/mons-jan-strban') }}">Mons. Ján Štrbáň</a></li>
                        <li class="pb-2"><a href="{{ url('o-nas/historia/vyznamne-osobnosti/karol-anton-medvecky') }}">Karol Anton Medvecký</a></li>
                        <span>Patrón farnosti</span>
                        <li><a href="{{ url('o-nas/patron-farnosti') }}">Svätý František</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

            <x-page-section title="O nás / Sakrálne objekty">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('sakralne-objekty/kostol-sv-frantiska-z-assisi-v-detve') }}">Kostol Detva</a></li>
                        <li><a href="{{ url('sakralne-objekty/chudobienec') }}">Chudobienec</a></li>
                        <li><a href="{{ url('sakralne-objekty/pricestne-sochy') }}">Prícestné sochy</a></li>
                        <li><a href="{{ url('sakralne-objekty/detvianske-krize') }}">Detvianske kríže</a></li>
                        <li><a href="{{ url('sakralne-objekty/kostol-karmel') }}">Kostol Božieho milosrdenstva a Kráľovnej Karmelu</a></li>
                        <li><a href="{{ url('sakralne-objekty/kaplnky') }}">Kaplnky</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

            <x-page-section title="O nás / Pastorácia">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('o-nas/pastoracia/lektori') }}">Lektori</a></li>
                        <li><a href="{{ url('o-nas/pastoracia/akolyti') }}">Akolyti</a></li>
                        <li><a href="{{ url('o-nas/pastoracia/farska-rada') }}">Farská rada</a></li>
                        <li><a href="{{ url('o-nas/pastoracia/organisti-spevaci') }}">Organisti, speváci</a></li>
                        <li><a href="{{ url('o-nas/pastoracia/kostolnici') }}">Kostolník / kostolníčka</a></li>
                        <li class="pb-2"><a href="{{ url('o-nas/pastoracia/ministranti') }}">Miništranti</a></li>
                        <span>Kňazi</span>
                        <li><a href="{{ url('o-nas/pastoracia/farari-v-detve') }}">Farári v Detve</a></li>
                        <li><a href="{{ url('o-nas/pastoracia/kaplani-v-detve') }}">Kapláni v Detve</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

        </div>
        <div class="col-md-6">

            <x-page-section title="Spoločenstvá">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('spolocenstva/rad-bosych-karmelitanok') }}">Rád bosých karmelitánok (OCD)</a></li>
                        <li><a href="{{ url('spolocenstva/svetsky-rad-bosych-karmelitanov') }}">Svetský rád bosých karmelitánov (OCDS)</a></li>
                        <li><a href="{{ url('spolocenstva/frantiskansky-svetstky-rad') }}">Františkánsky svetský rád (OFS)</a></li>
                        <li><a href="{{ url('spolocenstva/zdruzenie-salezianskych-spolupracovnikov') }}">Združenie saleziánskych spolupracovníkov (ASC)</a></li>
                        <li><a href="{{ url('spolocenstva/ruzencove-bratstvo') }}">Ružencové bratstvo</a></li>
                        <li><a href="{{ url('spolocenstva/marianske-veceradlo') }}">Mariánske večeradlo</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

            <x-page-section title="Duchovný život / Sviatosti">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('duchovny-zivot/sviatosti/krst') }}">Krst</a></li>
                        <li><a href="{{ url('duchovny-zivot/sviatosti/birmovanie') }}">Sviatosť birmovania</a></li>
                        <li><a href="{{ url('duchovny-zivot/sviatosti/eucharistia') }}">Sviatosť Eucharistie</a></li>
                        <li><a href="{{ url('duchovny-zivot/sviatosti/spoved') }}">Sviatosť zmierenia</a></li>
                        <li><a href="{{ url('duchovny-zivot/sviatosti/pomazanie-chorych') }}">Sviatosť pomazania chorých</a></li>
                        <li><a href="{{ url('duchovny-zivot/sviatosti/posvatny-stav') }}">Sviatosť posvätného stavu</a></li>
                        <li><a href="{{ url('duchovny-zivot/sviatosti/manzelstvo') }}">Sviatosť manželstva</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

            <x-page-section title="Duchovný život / Sväteniny">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('duchovny-zivot/sveteniny/pohreb') }}">Pohreb</a></li>
                        <li><a href="{{ url('duchovny-zivot/sveteniny/pozehnania') }}">Požehnania</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

            <x-page-section title="Duchovný život / Život viery">
                <x-page-section.text type="right">
                    <ol>
                        {{-- <li><a href="{{ url('') }}"></a></li> --}}
                    </ol>
                </x-page-section.text>
            </x-page-section>

        </div>
    </div>

@endsection

