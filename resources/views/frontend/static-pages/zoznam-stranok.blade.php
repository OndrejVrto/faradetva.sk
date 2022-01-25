@extends('frontend._layouts.static-page')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-page-section title="O nás / História">
                <x-page-section.text type="left">
                    <ol>
                        <li><a href="{{ url('o-nas/historia-farnosti') }}">História farnosti Detva</a></li>
                        <span>Významné osobnosti</span>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/imrich-durica') }}">Imrich Ďurica</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/jozef-zavodsky') }}">Jozef Závodský</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/prof-thdr-jozef-buda') }}">prof. Jozef Búda</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/anton-prokop') }}">Anton Prokop</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/mons-jan-strban') }}">Mons. Ján Štrbáň</a></li>
                        <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/karol-anton-medvecky') }}">Karol Anton Medvecký</a></li>
                        <span>Patrón farnosti</span>
                        <li><a href="{{ url('o-nas/patron-farnosti') }}">Svätý František</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

            <x-page-section title="O nás / Sakrálne objekty">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('sakralne-objekty/kostol-sv-frantiska-z-assisi-v-detve') }}">Kostol Detva</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

            <x-page-section title="O nás / Pastorácia">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('o-nas/pastoracia/lektori') }}">Lektori</a></li>
                        <li><a href="{{ url('o-nas/pastoracia/akolyti') }}">Akolyti</a></li>
                        <li><a href="{{ url('o-nas/pastoracia/farska-rada') }}">Farská rada</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

        </div>
        <div class="col-md-6">

            <x-page-section title="Spoločenstvá">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('spolocenstva/rad-bosych-karmelitanov') }}">Svetský rád bosých karmelitánov (OCDS)</a></li>
                    </ol>
                </x-page-section.text>
            </x-page-section>

            <x-page-section title="Duchovný život / Sviatosti">
                <x-page-section.text type="right">
                    <ol>
                        <li><a href="{{ url('duchovny-zivot/sviatosti/krst') }}">Krst</a></li>
                        {{-- <li><a href="{{ url('') }}"></a></li> --}}
                    </ol>
                </x-page-section.text>
            </x-page-section>

            <x-page-section title="Duchovný život / Sväteniny">
                <x-page-section.text type="right">
                    <ol>
                        {{-- <li><a href="{{ url('') }}"></a></li> --}}
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

