<x-web.layout.master :pageData="$pageData">

    {{-- Farári v Detve --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" class="static-page pad_b_50">

        <div class="container text-center">
            <ul class="list-unstyled card-columns">
                <x-partials.columns-list years="1644 - 1647"          name="Michal Lucsics SJ"/>
                <x-partials.columns-list years="1647 - 1656"          name="Ján Gersich"/>
                <x-partials.columns-list years="1656 - 1657"          name="Štefan Kopcsányi"/>
                <x-partials.columns-list years="1657 - 1681"          name="Juraj Kolossy"/>
                <x-partials.columns-list years="1681 - 1684"          name="Juraj Lelkes"/>
                <x-partials.columns-list years="1684 - 1688"          name="Ján Kolossy"/>
                <x-partials.columns-list years="1688 - 1694"          name="Ján Szerdahelyi"/>
                <x-partials.columns-list years="1694 - 1697"          name="Adam Györy"/>
                <x-partials.columns-list years="1698"                 name="Štefan Rankay"/>
                <x-partials.columns-list years="1698 - 1723"          name="Juraj Majnó"/>
                <x-partials.columns-list years="1723 - 1748"          name="Jozef Szentkereszty"/>
                <x-partials.columns-list years="1748"                 name="Imrich Huszár"/>
                <x-partials.columns-list years="1749 - 1759"          name="Martin Jonász"/>
                <x-partials.columns-list years="1759 - 1774"          name="Imrich Mednyánszky"/>
                <x-partials.columns-list years="1774 - 1784"          name="Anton Okolitsányi"/>
                <x-partials.columns-list years="1784 - 1789"          name="František Xavér Demeter"/>
                <x-partials.columns-list years="1790"                 name="Juraj Petyko"     description="farský administrátor"/>
                <x-partials.columns-list years="1790 - 1793"          name="Juraj Spaczinsky"/>
                <x-partials.columns-list years="1793 - 1810"          name="Ján Dlholuczký"/>
                <x-partials.columns-list years="1811 - 1823"          name="Jozef Móczay"/>
                <x-partials.columns-list years="<em>1826 - 1827</em>" name="Štefan Tholt"      description="farský administrátor <br>v neprítomnosti farára"/>
                <x-partials.columns-list years="<em>1827 - 1828</em>" name="Jozef Dvorszky"    description="farský administrátor <br>v neprítomnosti farára"/>
                <x-partials.columns-list years="1829 - 1862"          name="Ján Strba"/>
                <x-partials.columns-list years="1862 - 1863"          name="Ján Nepomucký Csapek"/>
                <x-partials.columns-list years="1863 - 1864"          name="Štefan Csutkay"    description="farský administrátor"/>
                <x-partials.columns-list years="1864 - 1888"          name="Jozef Troszt"/>
                <x-partials.columns-list years="1888"                 name="Ján Matyaszovicz"  description="farský administrátor"/>
                <x-partials.columns-list years="1888 - 1907"          name="Štefan Pitrof"/>
                <x-partials.columns-list years="<em>1902 - 1904</em>" name="Ignác Lucký"       description="farský administrátor <br>v neprítomnosti farára"/>
                <x-partials.columns-list years="1907 - 1909"          name="Ján Brezina"       description="farský administrátor"/>
                <x-partials.columns-list years="1909 - 1921"          name="Anton Kúdelka"/>
                <x-partials.columns-list years="1921 - 1952"          name="Ján Štrbáň"/>
                <x-partials.columns-list years="1953 - 1954"          name="Ladislav Hromádka" description="farský administrátor"/>
                <x-partials.columns-list years="1954 - 1961"          name="Ladislav Schrott"  description="farský administrátor"/>
                <x-partials.columns-list years="1961 - 1980"          name="Martin Láclavík"   description="farský administrátor"/>
                <x-partials.columns-list years="1980 - 1993"          name="Jozef Závodský"    description="farský administrátor"/>
                <x-partials.columns-list years="1993"                 name="Pavol Párničan"    description="farský administrátor"/>
                <x-partials.columns-list years="1993 - 1995"          name="Pavol Zemko"/>
                <x-partials.columns-list years="1995 - 2002"          name="Roman Furek"/>
                <x-partials.columns-list years="2002 -"               name="Ľuboš Sabol"/>
            </ul>
        </div>

    </x-web.page.section>
</x-web.layout.master>
