<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" class="static-page pad_b_50">

        <x-frontend.page.subsection>
            <x-frontend.page.text-segment animation="fromright" class="col-12 col-md-5 col-xl-3 m-auto">
                <ol>

                    <div class="mt-3 h5">Hlavné</div>
                    <li><a href="{{ route('home') }}">Domovská stránka</a></li>
                    <li><a href="{{ url('test') }}">Test</a></li>
                    <li><a href="{{ url('zoznam-statickych-stranok') }}">Všetky podstránky</a></li>
                    <li><a href="{{ route('article.all') }}">Články</a></li>
                    <li><a href="{{ route('faq') }}">Otázky a odpovede</a></li>
                    <li><a href="{{ url('oznamy-vsetky') }}">Všetky oznamy</a></li>
                    <li><a href="{{ url('kontakty') }}">Kontakty</a></li>

                    <hr>
                    <div class="mt-3 h5">O nás</div>
                    <li><a href="{{ url('o-nas') }}">O nás</a></li>
                    <li><a href="{{ url('o-nas/patron-farnosti') }}">Svätý František</a></li>

                    <hr>
                    <div class="mt-3 h5">História</div>
                    <li><a href="{{ url('o-nas/historia') }}">História</a></li>
                    <li><a href="#">Duchovné povolania</a></li>
                    <li><a href="#">Kňazi pochovaní v Detve</a></li>
                    <li><a href="#">Štatistiky od r. 2000</a></li>
                    <li><a href="{{ url('o-nas/historia/chudobienec') }}">Chudobienec</a></li>
                    <li><a href="{{ url('o-nas/historia/kaplani-v-detve') }}">Kapláni</a></li>
                    <li><a href="{{ url('o-nas/historia/farari-v-detve') }}">Farári v Detve</a></li>
                    <li><a href="{{ url('o-nas/historia/vianoce-v-detve') }}">Vianoce v Detve</a></li>
                    <li><a href="{{ url('o-nas/historia/dejiny-farnosti') }}">História farnosti Detva</a></li>

                    <div class="mt-3 h5">Významné osobnosti</div>
                    <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti') }}">Osobnosti</a></li>
                    <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/anton-prokop') }}">Anton Prokop</a></li>
                    <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/imrich-durica') }}">Imrich Ďurica</a></li>
                    <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/jozef-zavodsky') }}">Jozef Závodský</a></li>
                    <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/mons-jan-strban') }}">Mons. Ján Štrbáň</a></li>
                    <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/prof-thdr-jozef-buda') }}">prof. Jozef Búda</a></li>
                    <li><a href="{{ url('o-nas/historia/vyznamne-osobnosti/karol-anton-medvecky') }}">Karol Anton Medvecký</a></li>

                    <hr>
                    <div class="mt-3 h5">Pastorácia</div>
                    <li><a href="#">Pastorácia</a></li>
                    <li><a href="{{ url('o-nas/pastoracia/akolyti') }}">Akolyti</a></li>
                    <li><a href="{{ url('o-nas/pastoracia/lektori') }}">Lektori</a></li>
                    <li><a href="{{ url('o-nas/pastoracia/kostolnici') }}">Kostolníci</a></li>
                    <li><a href="{{ url('o-nas/pastoracia/ministranti') }}">Miništranti</a></li>
                    <li><a href="{{ url('o-nas/pastoracia/farska-rada') }}">Farská rada</a></li>
                    <li><a href="{{ url('o-nas/pastoracia/organisti-spevaci') }}">Organisti, speváci</a></li>
                    <li><a href="{{ url('o-nas/pastoracia/spevokoly-a-dychovka') }}">Spevokoly a dychovka</a></li>
                    <li><a href="{{ url('o-nas/pastoracia/vyucovanie-nabozenstva') }}">Vyučovanie náboženstva</a></li>

                    <hr>
                    <div class="mt-3 h5">Sakrálne objekty</div>
                    <li><a href="#">Sakrálne objekty</a></li>
                    <li><a href="{{ url('o-nas/sakralne-objekty/kaplnky') }}">Kaplnky</a></li>
                    <li><a href="{{ url('o-nas/sakralne-objekty/kostol-karmel') }}">Kostol na Karmeli</a></li>
                    <li><a href="{{ url('o-nas/sakralne-objekty/pricestne-sochy') }}">Prícestné sochy</a></li>
                    <li><a href="{{ url('o-nas/sakralne-objekty/detvianske-krize') }}">Detvianske kríže</a></li>
                    <li><a href="{{ url('o-nas/sakralne-objekty/kostol-sv-frantiska-z-assisi-v-detve') }}">Kostol Detva</a></li>

                    <hr>
                    <div class="mt-3 h5">Spoločenstvá</div>
                    <li><a href="{{ url('spolocenstva') }}">Spoločenstvá</a></li>
                    <li><a href="{{ url('spolocenstva/ruzencove-bratstvo') }}">Ružencové bratstvo</a></li>
                    <li><a href="{{ url('spolocenstva/marianske-veceradlo') }}">Mariánske večeradlo</a></li>
                    <li><a href="{{ url('spolocenstva/rad-bosych-karmelitanok') }}">Bosé karmelitánky</a></li>
                    <li><a href="{{ url('spolocenstva/svetsky-rad-bosych-karmelitanov') }}">Bosí Karmelitáni</a></li>
                    <li><a href="{{ url('spolocenstva/hnutie-krestanskych-rodin') }}">Hnutie kresťanských rodín</a></li>
                    <li><a href="{{ url('spolocenstva/frantiskansky-svetstky-rad') }}">Františkánsky svetský rád</a></li>
                    <li><a href="{{ url('spolocenstva/katolicka-charizmaticka-obnova') }}">Katolícka charizmatická obnova</a></li>
                    <li><a href="{{ url('spolocenstva/zdruzenie-salezianskych-spolupracovnikov') }}">Saleziánsky spolupracovníci</a></li>
                    <li><a href="{{ url('spolocenstva/sluzobnici-jezisovho-velknazskeho-srdca') }}">Služobníci Ježišovho Veľkňazského Srdca</a></li>
                    <li><a href="#">Združenie Faustínum</a></li>
                    <li><a href="#">Modlidby matiek</a></li>
                    <li><a href="#">Bárka</a></li>

                    <hr>
                    <div class="mt-3 h5">Sviatosti</div>
                    <li><a href="#">Duchovný život</a></li>
                    <li><a href="#">Sviatosti</a></li>
                    <li><a href="{{ url('duchovny-zivot/sviatosti/krst') }}">Krst</a></li>
                    <li><a href="{{ url('duchovny-zivot/sviatosti/spoved') }}">Spoveď</a></li>
                    <li><a href="{{ url('duchovny-zivot/sviatosti/birmovanie') }}">Birmovanie</a></li>
                    <li><a href="{{ url('duchovny-zivot/sviatosti/manzelstvo') }}">Manželstvo</a></li>
                    <li><a href="{{ url('duchovny-zivot/sviatosti/eucharistia') }}">Eucharistia</a></li>
                    <li><a href="{{ url('duchovny-zivot/sviatosti/posvatny-stav') }}">Posvätný stav</a></li>
                    <li><a href="{{ url('duchovny-zivot/sviatosti/pomazanie-chorych') }}">Pomazanie chorých</a></li>

                    <hr>
                    <div class="mt-3 h5">Život viery</div>
                    <li><a href="#">Život viery</a></li>
                    <li><a href="{{ url('duchovny-zivot/zivot-viery/modlitba') }}">Modlitba</a></li>
                    <li><a href="{{ url('duchovny-zivot/zivot-viery/svate-pismo') }}">Sväté písmo</a></li>
                    <li><a href="{{ url('duchovny-zivot/zivot-viery/viera-v-boha') }}">Viera v Boha</a></li>
                    <li><a href="{{ url('duchovny-zivot/zivot-viery/bozie-prikazania') }}">Božie prikázania</a></li>
                    <li><a href="{{ url('duchovny-zivot/zivot-viery/etiketa-v-kostole') }}">Etiketa</a></li>
                    <li><a href="{{ url('duchovny-zivot/zivot-viery/cirkevne-prikazania') }}">Cirkevné Prikázania</a></li>

                    <hr>
                    <div class="mt-3 h5">Sväteniny</div>
                    <li><a href="#">Sväteniny</a></li>
                    <li><a href="{{ url('duchovny-zivot/sveteniny/pohreb') }}">Pohreb</a></li>
                    <li><a href="{{ url('duchovny-zivot/sveteniny/putovanie') }}">Putovanie</a></li>
                    <li><a href="{{ url('duchovny-zivot/sveteniny/ministeria') }}">Ministériá</a></li>
                    <li><a href="{{ url('duchovny-zivot/sveteniny/poboznosti') }}">Pobožnosti</a></li>
                    <li><a href="{{ url('duchovny-zivot/sveteniny/pozehnania') }}">Požehnania</a></li>

                </ol>
            </x-frontend.page.text-segment>
        </x-frontend.page.subsection>

    </x-frontend.page.section>
</x-frontend.layout.master>
