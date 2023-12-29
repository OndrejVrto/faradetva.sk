<x-web.layout.master :pageData="$pageData">

    {{-- Duchovný život / Sveteniny --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) -" class="ch_event_section pad_t_30">

        <x-partials.card-event
            title="Pobožnosti"
            url="{{ secure_url('duchovny-zivot/sveteniny/poboznosti') }}"
            side="left"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pob-018-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Pod pobožnosťami chápeme rozličné vonkajšie prejavy (napr. v&nbsp;textoch modlitieb a&nbsp;piesní, alebo iné).
                <span class="d-none d-xl-inline me-2">
                    Tieto oživené vnútorným postojom viery prejavujú zvláštny dôraz vzťahu veriaceho k&nbsp;božským osobám
                    , alebo k&nbsp;Panne Márii v&nbsp;jej privilégiách milosti a&nbsp;v&nbsp;tituloch, ktoré ich vyjadrujú.
                    Prípadne k&nbsp;svätým, pre ich pripodobnenie sa Kristovi, alebo pre úlohu, ktorú zohrali v&nbsp;Cirkvi.
                </span>
                Rozličné kultové prejavy súkromného alebo komunitného charakteru označujeme výrazom „ľudová zbožnosť“.
                Prejavy ľudovej zbožnosti sa nesmú nahrádzať a&nbsp;ani sa miešať s&nbsp;liturgickými sláveniami Eucharistie.
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Požehnania"
            url="{{ secure_url('duchovny-zivot/sveteniny/pozehnania') }}"
            side="right"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="poz-003-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Každé požehnanie je darom, ktorý je vyjadrený slovom a&nbsp;jeho tajomstvom.
                Požehnanie, doslova dobrorečenie, je súčasne a&nbsp;rovnako slovo i&nbsp;dar, reč a&nbsp;dobro.
                Dobro, ktoré požehnanie prináša, nie je presne určený predmet, nejaký vymedzený dar, nepochádza z&nbsp;činnosti človeka, ale z&nbsp;konania Boha.
                <span class="d-none d-xl-inline">
                    Človek si nemôže od Boha nárokovať „veľkosť a&nbsp;silu“ požehnania.
                    Boh ho dáva ako svoj dar a&nbsp;tak, ako on sám chce.
                    Prostredníkom nášho požehnania je sám Kristus, pretože najväčším dobrom preukázaným ľudstvu je adoptívne synovstvo získané Kristovým človečenstvom a&nbsp;vykúpenie jeho smrťou.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Putovanie"
            url="{{ secure_url('duchovny-zivot/sveteniny/putovanie') }}"
            side="left"
            >
            <x-slot:img>
                {{-- <x-partials.picture-responsive titleSlug="put-001-menu"/> --}}
                <x-partials.picture-responsive titleSlug="put-010-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Typickým a&nbsp;rozšíreným prejavom ľudovej zbožnosti ako všeobecnej náboženskej skúsenosti je putovanie.
                Púte sú úzko späté so svätyňami a&nbsp;tvoria neodmysliteľnú zložku ich života.
                Svätyňa, či už je zasvätená Najsvätejšej Trojici, Pánovi Ježišovi, Preblahoslavenej Panne Márii, anjelom, svätým alebo blahoslaveným.
                <span class="d-none d-xl-inline">
                    Je miestom, kde sa majú veriacim hojnejšie poskytovať prostriedky spásy horlivým hlásaním Božieho slova, vhodným rozvíjaním liturgického života, najmä slávením Eucharistie a&nbsp;vysluhovaním sviatosti zmierenia, ako aj pestovaním schválených foriem ľudovej zbožnosti.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Ministériá"
            url="{{ secure_url('duchovny-zivot/sveteniny/ministeria') }}"
            side="right"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="min-009-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Niektoré služby určené pre náležité slávenie bohoslužby a&nbsp;pre pomoc Božiemu ľudu v&nbsp;jeho potrebách ustanovila Cirkev už v&nbsp;najstarších dobách.
                Tieto služby, ktoré sa zverovali veriacim, aby ich vykonávali pri liturgii a&nbsp;v&nbsp;charitatívnej činnosti, sa prispôsobovali rozličným okolnostiam.
                <span class="d-none d-xl-inline">
                    Tieto úlohy sa spravidla udeľovali osobitným obradom.
                    Veriaci tak získal Božie požehnanie a&nbsp;bol zaradený do vyčlenenej skupiny, čiže mal osobitné postavenie, aby mohol vykonávať nejaký úrad.
                    Niektoré z&nbsp;týchto úradov sa postupne stali službami, ktoré predchádzali prijatiu sviatostného svätenia.
                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Pohreb"
            url="{{ secure_url('duchovny-zivot/sveteniny/pohreb') }}"
            side="left"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="dkriz-011-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Pohrebné obrady sú posvätným úkonom, pri ktorom Cirkev zveruje Bohu svojich bratov a&nbsp;sestry vo viere, vyznáva svoju vieru a&nbsp;uznáva Božie pôsobenie v&nbsp;živote človeka.
                <span class="d-none d-xl-inline me-2">
                    Obradmi, ktoré sprevádzajú rozlúčku so zosnulými, spoločenstvo veriacich slávi nielen spásu, ktorú pre nás získal Kristus, ale nás aj zjednocuje s&nbsp;príbuznými, priateľmi a&nbsp;známymi, s&nbsp;ktorými zosnulí bratia a&nbsp;sestry prežívali časť svojho života, práce, vzťahov, citov a&nbsp;viery v&nbsp;Boha.
                </span>
                Kresťanská liturgia pohrebu je slávením Kristovho veľkonočného tajomstva, pri ktorom sa Cirkev modlí za svoje deti, začlenené krstom.
            </x-slot:teaser>
        </x-partials.card-event>

    </x-web.page.section>
</x-web.layout.master>
