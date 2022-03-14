<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$pageData['breadCrumb']"
        :titleSlug="$pageData['banners']"
        dimensionSource="full"
    />

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" class="static-page pad_t_50 pad_b_50">

    <x-frontend.page.subsection >
        <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4"/>
        <x-frontend.page.text-segment animation="fromright">
            <p>
                Osobitné postavenie medzi spolupracovníkmi kňaza v spoločenstve veriacich má kostolník. Jeho úloha by sa dala opísať aj ako pomoc pri bohoslužbách a vysluhovaní sviatostí, zabezpečuje dozor v kostole, starostlivo dbá o priestor a predmety potrebné k liturgii. Kostolník veľakrát prispieva k vytvoreniu „duchovnej nálady“ pre bohoslužbu, svojou službou pripravuje „pôdu“ pre liturgické slávenia.
            </p>
            <p>
                Kostolník by mal byť príkladom pre veriacich tým, ako vykonáva svoju službu, ako spĺňa svoje náboženské povinnosti a ako svoj život usmerňuje podľa viery. Najdôležitejším predpokladom pre túto službu je živá viera v Boha, keďže sa denne prostredníctvom služby v kostole nachádza pri samom „prameni“. Túto úlohu môže zastávať vhodný a spoľahlivý muž alebo takisto žena.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        {{-- <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4"/> --}}
        <x-frontend.page.text-segment type="legt">
            <p>
                Keďže kostolník je dôležitá osoba pre styk s ľuďmi, mal by vedieť s ľuďmi správne komunikovať. Je taktiež dôležitým spojovacím článkom medzi kňazom a farským spoločenstvom. Kostolník by mal oplývať viacerými vhodnými vlastnosťami, napríklad ako zmysel pre poriadok, presnosť, mlčanlivosť, priateľskosť, vytrvalosť, zodpovednosť, čestnosť a vľúdnosť.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4" />
        <x-frontend.page.text-segment animation="fromright">
            <p>
                Medzi dôležité úlohy, ktoré je potrebné zabezpečiť pre dôstojnosť slávenia liturgie, spadá aj upratovanie kostola a kvetinová výzdoba. Tieto nemôže mať na starosti len jedna osoba, majú sa zveriť aj iným veriacim. Kostolník okrem iného dbá aj o čistotu liturgických rúch a iných textílií potrebných vo svätej omši.
            </p>
            <p>
                V našej farnosti aktuálne pôsobia tri kostolníčky (r. 2022), z ktorých dve sa striedajú v službe nielen vo farskom kostole, ale aj pri pohreboch so svätou omšou v dome smútku na cintoríne, prípadne pri iných liturgických sláveniach. V kláštornom kostole plnia úlohu kostolníčok dve bosé karmelitánky - mníšky určené pre komunikáciu kláštora s verejnosťou.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>


    <x-frontend.page.information-sources title="Použitá literatúra:">
        <li>Directorium 1989. Trnava: Spolok sv. Vojtecha, 1988.</li>
    </x-frontend.page.information-sources>

    </x-frontend.page.section>
</x-frontend.layout.master>
