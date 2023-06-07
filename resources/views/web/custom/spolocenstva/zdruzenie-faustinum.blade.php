<x-web.layout.master :pageData="$pageData">

    {{-- Združenie Faustínum --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) -" class="static-page pad_b_50">

        <x-web.page.subsection >
            <xweb.page.text-segment animation="fromright">

                <x-partials.picture titleSlug="ofs-015" side="left" dimensionSource="medium" columns="2" />

                <p>
                    Združenie apoštolov Božieho milosrdenstva Faustínum vychádza z charizmy sv. Faustíny, jej duchovnosti a apoštolskej činnosti. Spája kňazov, zasvätené osoby a laikov, ktorí chcú slúžiť posolstvu Božieho milosrdenstva.
                </p>
                <p>
                    Združenie založil 6. marca 1996 krakovský metropolita kardinál František Macharski na žiadosť vtedajšej generálnej predstavenej Kongregácie sestier Matky Božieho milosrdenstva v Poľsku. Združenie má cirkevnú a občiansko-právnu subjektivitu. Spadá pod Kongregáciu sestier Matky Božieho milosrdenstva a je podriadené krakovskému metropolitovi, ktorý schvaľuje duchovného správcu celého združenia. Ten sídli v centre úcty Božieho milosrdenstva v Krakove-Lagievnikoch.
                </p>

                <h5>Ciele združenia:</h5>
                <ol class="lh-lg">
                    <li><strong>Snažiť sa o kresťanskú dokonalosť</strong>, čiže o dokonalú lásku cestou rozvíjania postoja dôvery k Bohu a milosrdenstva voči blížnym.</li>
                    <li><strong>Objavovať a ohlasovať tajomstvo Božieho milosrdenstva</strong>, ktoré sa najviac zjavilo v ukrižovanom a vzkriesenom Kristovi.</li>
                    <li><strong>Vyprosovať Božie milosrdenstvo pre celý svet</strong>, najmä pre hriešnikov, kňazov a rehoľníkov.</li>
                </ol>

            </xweb.page.text-segment>
        </x-web.page.subsection>

    </x-web.page.section>

    <x-web.sections.background-picture titleSlug="ofs-025"/>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART II -" class="static-page pad_t_50 pad_b_50">

        <x-web.page.subsection>
            <x-web.page.text-segment animation="fromright">

                <x-partials.picture titleSlug="ofs-010" side="left" dimensionSource="medium" columns="4" />

                <p>
                    Združenie apoštolov Božieho milosrdenstva spája dobrovoľníkov a členov z takmer 100 krajín sveta zo všetkých kontinentov. Združenie kladie dôraz predovšetkým na formáciu, ktorá má pomôcť pri osobnom stretnutí s milosrdným Ježišom a uviesť apoštolov Božieho milosrdenstva do úžasného sveta života v spoločenstve s Bohom a pripraviť ich na apoštolát milosrdenstva vo svojom prostredí.
                </p>

                <p>
                    Prví členovia Združenia Faustínum z našej farnosti začali v roku 2004 dochádzať na stretnutia združenia do Čierneho Balogu - Farnosť Dobroč. Faustínum ako samostatné spoločenstvo vo farnosti Detva existuje od roku 2008. V súčasnosti ho tvorí 16 členov a približne 50 dobrovoľníkov (r. 2022). Pod vedením sestier faustínok z Košíc sa členovia združenia, dobrovoľníci, ale aj ďalší ctitelia Božieho milosrdenstva stretávajú pravidelne raz do mesiaca na formačných stretnutiach v pastoračnom centre. Stretnutia sú otvorené pre všetkých záujemcov, bývajú zakončené večernou svätou omšou vo farskom kostole a eucharistickou adoráciou.
                </p>

            </x-web.page.text-segment>
        </x-web.page.subsection>

        <x-web.page.information-sources title="Použitý prameň:">
            <li>
                <em class="me-1">Združenie Faustínum</em>
                [online]. [cit. 24.01.2022].
                <a class="link-template"
                    href="https://www.faustinum.pl/sk/zdruzenie-faustinum/">
                    Dostupné na internete
                </a>
            </li>
        </x-web.page.information-sources>

    </x-web.page.section>
</x-web.layout.master>
