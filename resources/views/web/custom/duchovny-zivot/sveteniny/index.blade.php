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
                {{-- TODO: Add d-none span tag to texts  --}}
                Rozličné vonkajšie prejavy (napr. v textoch modlitieb a piesní, v zachovávaní období a navštevovania osobitných miest, v používaní odznakov, medailí, rúch a zvykov) oživené vnútorným postojom viery prejavujú zvláštny dôraz vzťahu veriaceho k Bohu a svätým.
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
                Cirkev - vo vedomí zodpovednosti sprístupňovať všetkým veriacim všetky prostriedky spásy - ustanovila určité napodobenie sviatostí, obrady, prostredníctvom ktorých človeka posväcuje a sprostredkúva mu Božie dobrodenia.
            </x-slot:teaser>
        <x-partials.cart-event
            title="Putovanie"
            url="{{ secure_url('duchovny-zivot/sveteniny/putovanie') }}"
            side="left"
        >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="put-001-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Púte sú úzko späté so svätyňami a tvoria neodmysliteľnú zložku ich života. Svätyňa je miestom, kde sa majú veriacim hojnejšie poskytovať prostriedky spásy najmä slávením Eucharistie a vysluhovaním sviatosti zmierenia, ako aj pestovaním schválených foriem ľudovej zbožnosti.
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
                Ministériá sa udeľujú osobitným liturgickým obradom. Veriaci získava Božie požehnanie a je zaradený do vyčlenenej skupiny, čiže má osobitné postavenie, aby mohol vykonávať patričný cirkevný úrad.
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
                Kresťanská liturgia pohrebu je slávením Kristovho veľkonočného tajomstva, pri ktorom sa Cirkev modlí za svoje deti, začlenené sviatosťou krstu do smrti a zmŕtvychvstania Ježiša Krista. Cirkev chce byť pre zomrelých duchovnou pomocou a pre pozostalých útechou i nádejou v ich žiali.
            </x-slot:teaser>
        </x-partials.cart-event>

    </x-web.page.section>
</x-web.layout.master>
