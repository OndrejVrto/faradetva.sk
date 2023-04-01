<x-web.layout.master :pageData="$pageData">

    {{-- Farári v Detve --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" class="static-page pad_b_50">

        {{-- <x-partials.columns-list name="Ignác Lucký" years="1902 - 1904" description="farský administrátor <br>v neprítomnosti farára"/> --}}

        <div class="container text-center">
            <ul class="list-unstyled card-columns">

                <li>
                    <dt class="text-church-secondary fs-6">1644 - 1647</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Michal Lucsics SJ</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1647 - 1656</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ján Gersich</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1656 - 1657</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Štefan Kopcsányi</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1657 - 1681</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Juraj Kolossy</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1681 - 1684</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Juraj Lelkes</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1684 - 1688</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ján Kolossy</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1688 - 1694</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ján Szerdahelyi</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1694 - 1697</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Adam Györy</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1698</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Štefan Rankay</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1698 - 1723</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Juraj Majnó</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1723 - 1748</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Jozef Szentkereszty</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1748</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Imrich Huszár</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1749 - 1759</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Martin Jonász</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1759 - 1774</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Imrich Mednyánszky</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1774 - 1784</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Anton Okolitsányi</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1784 - 1789</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">František Xavér Demeter</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1790</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Juraj Petyko</span>
                        <br><em>farský administrátor</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1790 - 1793</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Juraj Spaczinsky</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1793 - 1810</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ján Dlholuczký</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1811 - 1823</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Jozef Móczay</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6"><em>1826 - 1827</em></dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Štefan Tholt</span>
                        <br><em>farský administrátor <br>v neprítomnosti farára</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6"><em>1827 - 1828</em></dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Jozef Dvorszky</span>
                        <br><em>farský administrátor <br>v neprítomnosti farára</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1829 - 1862</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ján Strba</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1862 - 1863</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ján Nepomucký Csapek</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1863 - 1864</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Štefan Csutkay</span>
                        <br><em>farský administrátor</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1864 - 1888</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Jozef Troszt</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1888</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ján Matyaszovicz</span>
                        <br><em>farský administrátor</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1888 - 1907</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Štefan Pitrof</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6"><em>1902 - 1904</em></dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ignác Lucký</span>
                        <br><em>farský administrátor <br>v neprítomnosti farára</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1907 - 1909</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ján Brezina</span>
                        <br><em>farský administrátor</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1909 - 1921</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Anton Kúdelka</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1921 - 1952</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ján Štrbáň</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1953 - 1954</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ladislav Hromádka</span>
                        <br><em>farský administrátor</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1954 - 1961</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ladislav Schrott</span>
                        <br><em>farský administrátor</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1961 - 1980</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Martin Láclavík</span>
                        <br><em>farský administrátor</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1980 - 1993</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Jozef Závodský</span>
                        <br><em>farský administrátor</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1993</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Pavol Párničan</span>
                        <br><em>farský administrátor</em></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1993 - 1995</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Pavol Zemko</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">1995 - 2002</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Roman Furek</span></dd>
                </li>
                <li>
                    <dt class="text-church-secondary fs-6">2002 -</dt>
                    <dd class="mb-4"><span class="fw-bolder fs-5">Ľuboš Sabol</span></dd>
                </li>
            </ul>
        </div>

    </x-web.page.section>
</x-web.layout.master>
