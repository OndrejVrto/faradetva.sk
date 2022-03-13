<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$pageData['breadCrumb']"
        :titleSlug="$pageData['banners']"
        dimensionSource="full"
    />

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" class="static-page pad_t_50 pad_b_50">

        <x-frontend.page.section-header :header="$pageData['header']" class="my-0"/>

        <div class="row text-left">
            <div class="col-md-6">
                <x-frontend.page.subsection title="O nás / História">
                    <x-frontend.page.text-segment type="right">
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
                    </x-frontend.page.text-segment>
                </x-frontend.page.subsection>

                <x-frontend.page.subsection title="O nás / Sakrálne objekty">
                    <x-frontend.page.text-segment type="right">
                        <ol>
                            <li><a href="{{ url('sakralne-objekty/kostol-sv-frantiska-z-assisi-v-detve') }}">Kostol Detva</a></li>
                            <li><a href="{{ url('sakralne-objekty/chudobienec') }}">Chudobienec</a></li>
                            <li><a href="{{ url('sakralne-objekty/pricestne-sochy') }}">Prícestné sochy</a></li>
                            <li><a href="{{ url('sakralne-objekty/detvianske-krize') }}">Detvianske kríže</a></li>
                            <li><a href="{{ url('sakralne-objekty/kostol-karmel') }}">Kostol Božieho milosrdenstva a Kráľovnej Karmelu</a></li>
                            <li><a href="{{ url('sakralne-objekty/kaplnky') }}">Kaplnky</a></li>
                        </ol>
                    </x-frontend.page.text-segment>
                </x-frontend.page.subsection>

                <x-frontend.page.subsection title="O nás / Pastorácia">
                    <x-frontend.page.text-segment type="right">
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
                            <li><a href="{{ url('o-nas/pastoracia/knazi-pochovany-v-detve') }}">Kňazi pochovaní v Detve</a></li>
                            <li><a href="{{ url('o-nas/pastoracia/duchovne-povolania') }}">Kňazské a rehoľné povolania</a></li>
                        </ol>
                    </x-frontend.page.text-segment>
                </x-frontend.page.subsection>

            </div>
            <div class="col-md-6">

                <x-frontend.page.subsection title="Spoločenstvá">
                    <x-frontend.page.text-segment type="right">
                        <ol>
                            <li><a href="{{ url('spolocenstva/rad-bosych-karmelitanok') }}">Rád bosých karmelitánok (OCD)</a></li>
                            <li><a href="{{ url('spolocenstva/svetsky-rad-bosych-karmelitanov') }}">Svetský rád bosých karmelitánov (OCDS)</a></li>
                            <li><a href="{{ url('spolocenstva/frantiskansky-svetstky-rad') }}">Františkánsky svetský rád (OFS)</a></li>
                            <li><a href="{{ url('spolocenstva/zdruzenie-salezianskych-spolupracovnikov') }}">Združenie saleziánskych spolupracovníkov (ASC)</a></li>
                            <li><a href="{{ url('spolocenstva/ruzencove-bratstvo') }}">Ružencové bratstvo</a></li>
                            <li><a href="{{ url('spolocenstva/marianske-veceradlo') }}">Mariánske večeradlo</a></li>
                        </ol>
                    </x-frontend.page.text-segment>
                </x-frontend.page.subsection>

                <x-frontend.page.subsection title="Duchovný život / Sviatosti">
                    <x-frontend.page.text-segment type="right">
                        <ol>
                            <li><a href="{{ url('duchovny-zivot/sviatosti/krst') }}">Krst</a></li>
                            <li><a href="{{ url('duchovny-zivot/sviatosti/birmovanie') }}">Sviatosť birmovania</a></li>
                            <li><a href="{{ url('duchovny-zivot/sviatosti/eucharistia') }}">Sviatosť Eucharistie</a></li>
                            <li><a href="{{ url('duchovny-zivot/sviatosti/spoved') }}">Sviatosť zmierenia</a></li>
                            <li><a href="{{ url('duchovny-zivot/sviatosti/pomazanie-chorych') }}">Sviatosť pomazania chorých</a></li>
                            <li><a href="{{ url('duchovny-zivot/sviatosti/posvatny-stav') }}">Sviatosť posvätného stavu</a></li>
                            <li><a href="{{ url('duchovny-zivot/sviatosti/manzelstvo') }}">Sviatosť manželstva</a></li>
                        </ol>
                    </x-frontend.page.text-segment>
                </x-frontend.page.subsection>

                <x-frontend.page.subsection title="Duchovný život / Sväteniny">
                    <x-frontend.page.text-segment type="right">
                        <ol>
                            <li><a href="{{ url('duchovny-zivot/sveteniny/pohreb') }}">Pohreb</a></li>
                            <li><a href="{{ url('duchovny-zivot/sveteniny/pozehnania') }}">Požehnania</a></li>
                        </ol>
                    </x-frontend.page.text-segment>
                </x-frontend.page.subsection>

                <x-frontend.page.subsection title="Duchovný život / Život viery">
                    <x-frontend.page.text-segment type="right">
                        <ol>
                            {{-- <li><a href="{{ url('') }}"></a></li> --}}
                        </ol>
                    </x-frontend.page.text-segment>
                </x-frontend.page.subsection>

                <x-frontend.page.subsection title="iné">
                    <x-frontend.page.text-segment type="right">
                        <ol>
                            <li><a href="{{ url('o-nas') }}">Zoznam sekcie: O nás</a></li>
                            <li><a href="{{ url('oznamy-vsetky') }}"></a></li>
                        </ol>
                    </x-frontend.page.text-segment>
                </x-frontend.page.subsection>

            </div>
        </div>

    </x-frontend.page.section>
</x-frontend.layout.master>
