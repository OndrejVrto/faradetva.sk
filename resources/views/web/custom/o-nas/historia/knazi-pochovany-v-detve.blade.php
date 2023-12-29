<x-web.layout.master :pageData="$pageData">

    {{-- Kňazi pochovaný v Detve --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART I. -" class="static-page">

        <x-partials.biography
            delay=1
            title="Mons. Ján Štrbáň"
            birthDate="23. 6. 1878"
            birthCity="Trstená"
            ordDate="1. 7. 1901"
            ordCity="Svätý Kríž (Žiar) nad Hronom"
            deathDate="11. 12. 1960"
            deathCity="Detva"
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1901 - 1902', 'posobisko' => 'kaplán Trubín'],
                    ['kurziva' => false ,'roky' => '1902',        'posobisko' => 'kaplán Čierny Balog'],
                    ['kurziva' => false ,'roky' => '1903',        'posobisko' => 'kaplán Špania Dolina'],
                    ['kurziva' => false ,'roky' => '1903',        'posobisko' => 'farský administrátor Špania Dolina'],
                    ['kurziva' => false ,'roky' => '1903',        'posobisko' => 'farský administrátor Horný Kamenec'],
                    ['kurziva' => false ,'roky' => '1903 - 1908', 'posobisko' => 'kaplán Veľká (Zvolenská) Slatina'],
                    ['kurziva' => false ,'roky' => '1908',        'posobisko' => 'farský administrátor Jastrabá'],
                    ['kurziva' => false ,'roky' => '1908',        'posobisko' => 'kaplán Bojnice'],
                    ['kurziva' => false ,'roky' => '1908',        'posobisko' => 'farský administrátor Horné Opatovce'],
                    ['kurziva' => false ,'roky' => '1909 - 1921', 'posobisko' => 'farár Horné Opatovce'],
                    ['kurziva' => true  ,'roky' => '1920 - 1921', 'posobisko' => 'cirkevný škôldozorca svätokrížského dekanátu'],
                    ['kurziva' => false ,'roky' => '1921 - 1952', 'posobisko' => 'farár Detva'],
                    ['kurziva' => true  ,'roky' => '1934',        'posobisko' => 'pápežský komorník (Mons.)'],
                    ['kurziva' => true  ,'roky' => '1937 - 1951', 'posobisko' => 'dekan zvolenského dekanátu'],
                    ['kurziva' => false ,'roky' => '1953 - 1958', 'posobisko' => 'správca fary Bacúrov'],
                    ['kurziva' => false ,'roky' => '1959',        'posobisko' => 'penzionovaný'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="poch-011" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný na strednom cintoríne pri druhom zastavení krížovej cesty.
            </x-slot:note>
        </x-partials.biography>

        <x-partials.biography
            delay=1
            title="Jozef Goljan"
            birthDate="25. 2. 1904"
            birthCity="Detva"
            ordDate="28. 1. 1934"
            ordCity="Spišská Kapitula"
            deathDate="15. 4. 1941"
            deathCity=""
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1934 - 1936', 'posobisko' => 'kaplán Zubrohlava'],
                    ['kurziva' => false ,'roky' => '1936 - 1937', 'posobisko' => 'kaplán Liptovská Lúžna'],
                    ['kurziva' => false ,'roky' => '1937 - 1938', 'posobisko' => 'správca fary Lešnica'],
                    ['kurziva' => false ,'roky' => '1938 - 1939', 'posobisko' => 'kaplán Bobrovec'],
                    ['kurziva' => false ,'roky' => '1939 - 1941', 'posobisko' => 'správca fary Tvarožná'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="poch-010" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný na dolnom cintoríne.
            </x-slot:note>
        </x-partials.biography>

        <x-partials.biography
            delay=1
            title="Štefan Pitrof"
            birthDate="27. 6. 1850"
            birthCity="Bratislava"
            ordDate="2. 8. 1874"
            ordCity=""
            deathDate="2. 2. 1907"
            deathCity="Detva"
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1874 - 1877', 'posobisko' => 'študijný prefekt kňazského seminára v&nbsp;Banskej Bystrici'],
                    ['kurziva' => true  ,'roky' => '1875',        'posobisko' => 'profesor teológie v&nbsp;kňazskom seminári'],
                    ['kurziva' => false ,'roky' => '1877 - 1888', 'posobisko' => 'špirituál kňazského seminára v&nbsp;Banskej Bystrici'],
                    ['kurziva' => true  ,'roky' => '1884',        'posobisko' => 'asesor (člen cirkevného súdu)'],
                    ['kurziva' => false ,'roky' => '1888 - 1907', 'posobisko' => 'farár Detva'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="poch-007" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný na dolnom cintoríne.
            </x-slot:note>
        </x-partials.biography>

        <x-partials.biography
            delay=1
            title="Jozef Troszt"
            birthDate="20. 3. 1813"
            birthCity="Budín, Maďarsko"
            ordDate="8. 9. 1840"
            ordCity=""
            deathDate="16. 1. 1890"
            deathCity="Detva"
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1840 - 1841', 'posobisko' => 'prebendant Sídelnej kapituly v&nbsp;Banskej Bystrici'],
                    ['kurziva' => false ,'roky' => '1841 - 1849', 'posobisko' => 'kaplán Detva, Veľká (Zvolenská) Slatina, Nemecké (Nitrianske) Pravno, Kremnické Bane, Handlová, Staré Hory, Nová Baňa'],
                    ['kurziva' => false ,'roky' => '1849 - 1864', 'posobisko' => 'farár Očová'],
                    ['kurziva' => true  ,'roky' => '1857 - 1886', 'posobisko' => 'dekan zvolenského dekanátu'],
                    ['kurziva' => false ,'roky' => '1864 - 1888', 'posobisko' => 'farár Detva'],
                    ['kurziva' => false ,'roky' => '1888', 'posobisko' => 'penzionovaný'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="poch-005" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný na dolnom cintoríne.
            </x-slot:note>
        </x-partials.biography>

    </x-web.page.section>

    <x-web.sections.background-picture titleSlug="dej-003"/>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART II. -" class="static-page pad_t_50">

        <x-partials.biography
            delay=1
            title="Ján Nepomuk Csapek"
            birthDate="26. 9. 1817"
            birthCity=""
            ordDate="1842"
            ordCity=""
            deathDate="23. 10. 1863"
            deathCity="Detva"
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1842 - 1860', 'posobisko' => 'prebendant Sídelnej kapituly v&nbsp;Banskej Bystrici, kaplán Nová Baňa, Nemecké (Nitrianske) Pravno, Kunešov, Tužina, Trubín, Veľká (Zvolenská) Slatina'],
                    ['kurziva' => false ,'roky' => '1860 - 1862', 'posobisko' => 'farár Veľká (Zvolenská) Slatina'],
                    ['kurziva' => false ,'roky' => '1862 - 1863', 'posobisko' => 'farár Detva'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="matrika-csapek" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný 26.10.1863 na	cintoríne v&nbsp;Detva - nezachované miesto.
            </x-slot:note>
        </x-partials.biography>

        <x-partials.biography
            delay=1
            title="Juraj Spacsinszki"
            birthDate="1742/43"
            birthCity=""
            ordDate="1767"
            ordCity=""
            deathDate="4. 1. 1793"
            deathCity="Detva"
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1767 - 1769', 'posobisko' => 'prebendant Kolegiátnej kapituly v&nbsp;Bratislave'],
                    ['kurziva' => false ,'roky' => '1769 - 1790', 'posobisko' => 'farár Veľká (Zvolenská) Slatina'],
                    ['kurziva' => false ,'roky' => '1790 - 1793', 'posobisko' => 'farár Detva'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="matrika-spacsinszki" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný 07.01.1793 na cintoríne v&nbsp;Detve - nezachované miesto.
            </x-slot:note>
        </x-partials.biography>

        <x-partials.biography
            delay=1
            title="Imrich Mednanszky"
            :birthDate="null"
            birthCity=""
            :ordDate="null"
            ordCity=""
            deathDate="29. 1. 1774"
            deathCity="Detva"
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1758 - 1759', 'posobisko' => 'kaplán Zvolenská (Slovenská) Ľupča'],
                    ['kurziva' => false ,'roky' => '1759 - 1774', 'posobisko' => 'farár Detva'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="matrika-mednanszky" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný 03.02.1774 na cintoríne - Kaplnka sv. Jozefa (nezachované).
            </x-slot:note>
        </x-partials.biography>

        <x-partials.biography
            delay=1
            title="Martin Jonász"
            birthDate="1710"
            birthCity="Slaská"
            :ordDate="null"
            ordCity=""
            deathDate="6. 12. 1758"
            deathCity="Detva"
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1736 - 1737', 'posobisko' => 'farár Litava'],
                    ['kurziva' => false ,'roky' => '1737 - 1749', 'posobisko' => 'farár Senohrad'],
                    ['kurziva' => false ,'roky' => '1749 - 1758', 'posobisko' => 'farár Detva'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="matrika-jonasz" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný 08.12.1758 na cintoríne v&nbsp;Detve - nezachované miesto.
            </x-slot:note>
        </x-partials.biography>

        <x-partials.biography
            delay=1
            title="Imrich Huszár"
            birthDate="1715"
            birthCity="Svätý Kríž (Žiar) nad Hronom"
            :ordDate="null"
            ordCity=""
            deathDate="19. 12. 1748"
            deathCity="Detva"
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1740 - 1748', 'posobisko' => 'farár Horná Mičiná'],
                    ['kurziva' => false ,'roky' => '1748', 'posobisko' => 'farár Detva'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="huszar-matrika" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný 23.12.1748 na cintoríne v&nbsp;Detve - nezachované miesto.
            </x-slot:note>
        </x-partials.biography>

        <x-partials.biography
            delay=1
            title="Jozef Szentkereszty"
            :birthDate="null"
            birthCity=""
            :ordDate="null"
            ordCity=""
            deathDate="11. 4. 1748"
            deathCity="Detva"
            :datesCV="
                [
                    ['kurziva' => false ,'roky' => '1715 - 1718', 'posobisko' => 'farár Pusté Úľany'],
                    ['kurziva' => false ,'roky' => '1718 - 1723', 'posobisko' => 'farár Hájniky (Sliač) a&nbsp;Sielnica'],
                    ['kurziva' => false ,'roky' => '1723 - 1748', 'posobisko' => 'farár Detva'],
                ]"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="matrika-szentkereszty" class="img-fluid" description="false"/>
            </x-slot:img>
            <x-slot:note>
                Pochovaný 15.04.1748 na cintoríne v&nbsp;Detve - nezachované miesto.
            </x-slot:note>
        </x-partials.biography>

        <x-web.page.information-sources title="Použité pramene:" class="mb-4">

            <li>
                Diecézny archív Banská Bystrica, fond Schematizmy.
            </li>

            <li>
                Diecézny archív Banská Bystrica, fond Zosnulí kňazi.
            </li>

            <li>
                Farský archív Detva, fond Matriky zomrelých Farnosti Detva.
            </li>

            <x-web.page.source-link
                href="https://www.familysearch.org">
                    Matriky zomrelých Farnosti Detva.
            </x-web.page.source-link>

            <li>
                ZAREVÚCKY, Anton.
                <em>Katalóg zosnulých kňazov Banskobystrickej diecézy od jej založenia r. 1776 do r. 1986.</em>
                Strojopis, 1987.
            </li>

        </x-web.page.information-sources>

    </x-web.page.section>
</x-web.layout.master>
