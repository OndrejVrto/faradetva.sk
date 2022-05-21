<x-web.layout.master :pageData="$pageData">

    {{-- Duchovný život / Sveteniny --}}

    <x-web.page.section name="PAGE: ({{$pageData['title']}}) -" class="ch_event_section pad_b_50">

        <x-partials.cart-event
            title="Pobožnosti"
            url="{{ secure_url('duchovny-zivot/sveteniny/poboznosti') }}"
            side="left"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pob-002-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Pod pobožnosťami chápeme rozličné vonkajšie prejavy (napr. v textoch modlitieb a piesní, alebo iné).
                <span class="d-none d-xl-inline">
                    Tieto oživené vnútorným postojom viery prejavujú zvláštny dôraz vzťahu veriaceho k božským osobám
                    , alebo k Panne Márii v jej privilégiách milosti a v tituloch, ktoré ich vyjadrujú.
                    Prípadne k svätým, pre ich pripodobnenie sa Kristovi, alebo pre úlohu, ktorú zohrali v Cirkvi.
                </span>
                Rozličné kultové prejavy súkromného alebo komunitného charakteru označujeme výrazom „ľudová zbožnosť“.
                Prejavy ľudovej zbožnosti sa nesmú nahrádzať a ani sa miešať s liturgickými sláveniami Eucharistie.
            </x-slot:teaser>
        </x-partials.cart-event>

        <x-partials.cart-event
            title="Požehnania"
            url="{{ secure_url('duchovny-zivot/sveteniny/pozehnania') }}"
            side="right"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="poz-003-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Každé požehnanie je darom, ktorý je vyjadrený slovom a jeho tajomstvom.
                Požehnanie, doslova dobrorečenie, je súčasne a rovnako slovo i dar, reč a dobro.
                Dobro, ktoré požehnanie prináša, nie je presne určený predmet, nejaký vymedzený dar, nepochádza z činnosti človeka, ale z konania Boha.
                <span class="d-none d-xl-inline">
                    Človek si nemôže od Boha nárokovať „veľkosť a silu“ požehnania.
                    Boh ho dáva ako svoj dar a tak, ako on sám chce.
                    Prostredníkom nášho požehnania je sám Kristus, pretože najväčším dobrom preukázaným ľudstvu je adoptívne synovstvo získané Kristovým človečenstvom a vykúpenie jeho smrťou.
                </span>
            </x-slot:teaser>
        </x-partials.cart-event>

        <x-partials.cart-event
            title="Putovanie"
            url="{{ secure_url('duchovny-zivot/sveteniny/putovanie') }}"
            side="left"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="put-001-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Typickým a rozšíreným prejavom ľudovej zbožnosti ako všeobecnej náboženskej skúsenosti je putovanie.
                Púte sú úzko späté so svätyňami a tvoria neodmysliteľnú zložku ich života.
                Svätyňa, či už je zasvätená Najsvätejšej Trojici, Pánovi Ježišovi, Preblahoslavenej Panne Márii, anjelom, svätým alebo blahoslaveným.
                <span class="d-none d-xl-inline">
                    Je miestom, kde sa majú veriacim hojnejšie poskytovať prostriedky spásy horlivým hlásaním Božieho slova, vhodným rozvíjaním liturgického života, najmä slávením Eucharistie a vysluhovaním sviatosti zmierenia, ako aj pestovaním schválených foriem ľudovej zbožnosti.
                </span>
            </x-slot:teaser>
        </x-partials.cart-event>

        <x-partials.cart-event
            title="Ministériá"
            url="{{ secure_url('duchovny-zivot/sveteniny/ministeria') }}"
            side="right"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="min-001-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Niektoré služby určené pre náležité slávenie bohoslužby a pre pomoc Božiemu ľudu v jeho potrebách ustanovila Cirkev už v najstarších dobách.
                Tieto služby, ktoré sa zverovali veriacim, aby ich vykonávali pri liturgii a v charitatívnej činnosti, sa prispôsobovali rozličným okolnostiam.
                <span class="d-none d-xl-inline">
                    Tieto úlohy sa spravidla udeľovali osobitným obradom.
                    Veriaci tak získal Božie požehnanie a bol zaradený do vyčlenenej skupiny, čiže mal osobitné postavenie, aby mohol vykonávať nejaký úrad.
                    Niektoré z týchto úradov sa postupne stali službami, ktoré predchádzali prijatiu sviatostného svätenia.
                </span>
            </x-slot:teaser>
        </x-partials.cart-event>

        <x-partials.cart-event
            title="Pohreb"
            url="{{ secure_url('duchovny-zivot/sveteniny/pohreb') }}"
            side="left"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="pohr-010-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Pohrebné obrady sú posvätným úkonom, pri ktorom Cirkev zveruje Bohu svojich bratov a sestry vo viere, vyznáva svoju vieru a uznáva Božie pôsobenie v živote človeka.
                <span class="d-none d-xl-inline">
                    Obradmi, ktoré sprevádzajú rozlúčku so zosnulými, spoločenstvo veriacich slávi nielen spásu, ktorú pre nás získal Kristus, ale nás aj zjednocuje s príbuznými, priateľmi a známymi, s ktorými zosnulí bratia a sestry prežívali časť svojho života, práce, vzťahov, citov a viery v Boha.
                </span>
                Kresťanská liturgia pohrebu je slávením Kristovho veľkonočného tajomstva, pri ktorom sa Cirkev modlí za svoje deti, začlenené krstom.
            </x-slot:teaser>
        </x-partials.cart-event>

    </x-web.page.section>
</x-web.layout.master>
