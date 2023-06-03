@php
    $farari_1 = [
        ["years" => "1644 - 1647"          ,"name" => "Michal Lucsics SJ"],
        ["years" => "1647 - 1656"          ,"name" => "Ján Gersich"],
        ["years" => "1656 - 1657"          ,"name" => "Štefan Kopcsányi"],
        ["years" => "1657 - 1681"          ,"name" => "Juraj Kolossy"],
        ["years" => "1681 - 1684"          ,"name" => "Juraj Lelkes"],
        ["years" => "1684 - 1688"          ,"name" => "Ján Kolossy"],
        ["years" => "1688 - 1694"          ,"name" => "Ján Szerdahelyi"],
        ["years" => "1694 - 1697"          ,"name" => "Adam Györy"],
        ["years" => "1698"                 ,"name" => "Štefan Rankay"],
        ["years" => "1698 - 1723"          ,"name" => "Juraj Majnó"],
        ["years" => "1723 - 1748"          ,"name" => "Jozef Szentkereszty"],
        ["years" => "1748"                 ,"name" => "Imrich Huszár"],
        ["years" => "1749 - 1759"          ,"name" => "Martin Jonász"],
        ["years" => "1759 - 1774"          ,"name" => "Imrich Mednyánszky"],
        ["years" => "1774 - 1784"          ,"name" => "Anton Okolitsányi"],
        ["years" => "1784 - 1789"          ,"name" => "František Xavér Demeter"],
        ["years" => "1790"                 ,"name" => "Juraj Petyko"      ,"description" => "farský administrátor"],
        ["years" => "1790 - 1793"          ,"name" => "Juraj Spaczinsky"],
        ["years" => "1793 - 1810"          ,"name" => "Ján Dlholuczký"],
        ["years" => "1811 - 1823"          ,"name" => "Jozef Móczay"],
        ["years" => "<em>1826 - 1827</em>" ,"name" => "Štefan Tholt"      ,"description" => "farský administrátor <br>v neprítomnosti farára"],
        ["years" => "<em>1827 - 1828</em>" ,"name" => "Jozef Dvorszky"    ,"description" => "farský administrátor <br>v neprítomnosti farára"],
        ["years" => "1829 - 1862"          ,"name" => "Ján Strba"],
        ["years" => "1862 - 1863"          ,"name" => "Ján Nepomucký Csapek"],
        ["years" => "1863 - 1864"          ,"name" => "Štefan Csutkay"    ,"description" => "farský administrátor"],
        ["years" => "1864 - 1888"          ,"name" => "Jozef Troszt"],
        ["years" => "1888"                 ,"name" => "Ján Matyaszovicz"  ,"description" => "farský administrátor"],
        ["years" => "1888 - 1907"          ,"name" => "Štefan Pitrof"],
        ["years" => "<em>1902 - 1904</em>" ,"name" => "Ignác Lucký"       ,"description" => "farský administrátor <br>v neprítomnosti farára"],
        ["years" => "1907 - 1909"          ,"name" => "Ján Brezina"       ,"description" => "farský administrátor"],
        ["years" => "1909 - 1921"          ,"name" => "Anton Kúdelka"],
        ["years" => "1921 - 1952"          ,"name" => "Ján Štrbáň"],
        ["years" => "1953 - 1954"          ,"name" => "Ladislav Hromádka" ,"description" => "farský administrátor"],
        ["years" => "1954 - 1961"          ,"name" => "Ladislav Schrott"  ,"description" => "farský administrátor"],
        ["years" => "1961 - 1980"          ,"name" => "Martin Láclavík"   ,"description" => "farský administrátor"],
        ["years" => "1980 - 1993"          ,"name" => "Jozef Závodský"    ,"description" => "farský administrátor"],
        ["years" => "1993"                 ,"name" => "Pavol Párničan"    ,"description" => "farský administrátor"],
        ["years" => "1993 - 1995"          ,"name" => "Pavol Zemko"],
        ["years" => "1995 - 2002"          ,"name" => "Roman Furek"],
        ["years" => "2002 -"               ,"name" => "Ľuboš Sabol"],
        ["years" => " "               ,"name" => " ", "description" => " "],  // multi column problem in Chrome
    ];
@endphp

<x-web.layout.master :pageData="$pageData">

    {{-- Farári v&nbsp;Detve --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" class="static-page pad_b_50">
        <x-partials.columns-list :list="$farari_1" />
    </x-web.page.section>
</x-web.layout.master>
