<x-web.layout.master :pageData="$pageData">

    {{-- Spoločenstvá  --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" row class="static-page pad_b_50">

        <x-partials.card-article
            title="Františkánsky svetský rád"
            url="{{ secure_url('spolocenstva/frantiskansky-svetstky-rad') }}"
            delay=1
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="ofs-006-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Františkánsky svetký rád vznikol začiatkom 13.&nbsp;storočia, jeho zakladateľom je sv.&nbsp;František z&nbsp;Assisi. Členovia rádu sa sľubom zaväzujú žiť podľa evanjelia Ježiša Krista spôsobom sv.&nbsp;Františka v&nbsp;ich laickom stave.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Spoločenstvo Bárka"
            url="{{ secure_url('spolocenstva/spolocenstvo-barka') }}"
            delay=2
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sb-006-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Členovia spoločenstva Bárka sú ochotní pomáhať modlitbami a&nbsp;finančne konkrétnym bohoslovcom pri ich štúdiu a&nbsp;príprave na kňazské povolanie. Podpora spoločenstva sa rozšírila aj pre pomoc kňazom, ktorí pokračujú v&nbsp;teologickom štúdiu v&nbsp;zahraničí.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Rád bosých karmelitánok"
            url="{{ secure_url('spolocenstva/rad-bosych-karmelitanok') }}"
            delay=3
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="rbk-003-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Život karmelitánok je životom tichým a&nbsp;celkom obráteným k&nbsp;Bohu. Pre toto neustále, láskyplné obracanie sa k&nbsp;Bohu je potrebná na jednej strane atmosféra ticha, uzobrania a utiahnutosti, na druhej strane radostný, rodinný život v&nbsp;spoločenstve.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART II -" row="true" class="bg-alt-gray pad_t_80 pad_b_50">

        <x-partials.card-bubble
            title="Ružencové bratstvo"
            class="bg-white"
            delay=1
            url="{{ secure_url('spolocenstva/ruzencove-bratstvo') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="rbr-001" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Korene vzniku ružencových bratstiev siahajú hlboko do minulosti, prakticky už do prvej polovice 13.&nbsp;storočia.
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Mariánske večeradlo"
            class="bg-white"
            delay=2
            url="{{ secure_url('spolocenstva/marianske-veceradlo') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="logo-fatimskej-panny-marie" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Mariánske večeradlá modlitby a bratskej lásky vzišli z&nbsp;Mariánskeho kňazského hnutia, založeného v&nbsp;roku 1972.
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Modlitby matiek"
            class="bg-white"
            delay=3
            url="{{ secure_url('spolocenstva/modlitby-matiek') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="mm-001" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Hnutie Modlitby matiek vzniklo v&nbsp;auguste 1995 na katolíckej charizmatickej konferencii „Nový úsvit“ v&nbsp;Anglicku.
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Združenie Faustínum"
            class="bg-white"
            delay=4
            url="{{ secure_url('spolocenstva/zdruzenie-faustinum') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="logo-faustinum" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Združenie apoštolov Božieho milosrdenstva spája dobrovoľníkov a&nbsp;členov zo 100 krajín všetkých kontinentov.
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Hnutie kresťanských rodín"
            class="bg-white"
            delay=5
            url="{{ secure_url('spolocenstva/hnutie-krestanskych-rodin') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="logo-hnutia-krestanskych-rodin" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Hnutie kresťanských rodín bolo na Slovensku založené v&nbsp;roku 1969 na báze malých rodinných spoločenstiev.
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Saleziánski spolupracovníci"
            class="bg-white"
            delay=6
            url="{{ secure_url('spolocenstva/saleziansky-spolupracovnici') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="logo-zdruzenia-salezianskych-spolupracovnikov" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Združenie saleziánskych spolupracovníkov vzniklo na Slovensku v roku 1980. Prvým strediskom bol Zvolen.
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Katolícka charizmatická obnova"
            class="bg-white"
            delay=7
            url="{{ secure_url('spolocenstva/katolicka-charizmaticka-obnova') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="kcho-001" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Katolícka charizmatická obnova nie je hnutie medzi hnutiami, je „hnutie“ Ducha Svätého v&nbsp;celej Cirkvi.
            </x-slot:teaser>
        </x-partials.card-bubble>

        <x-partials.card-bubble
            title="Svetský rád bosých karmelitánov"
            class="bg-white"
            delay=8
            url="{{ secure_url('spolocenstva/svetsky-rad-bosych-karmelitanov') }}"
            >
            <x-slot:icon>
                <x-partials.picture-responsive dimensionSource="off" titleSlug="erb-radu-bosych-karmelitanov" class="img-fluid w-auto h-7rem mx-auto"/>
            </x-slot:icon>
            <x-slot:teaser>
                Členovia svetského rádu sú povolaní žiť vo vernosti Ježišovi Kristovi pod ochranou Karmelskej Panny Márie.
            </x-slot:teaser>
        </x-partials.card-bubble>

    </x-web.page.section>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART III -" row="true" class="pad_t_50 pad_b_50">

        <x-partials.card-article
            title="Spoločenstvo Srdca Ježišovho"
            url="{{ secure_url('spolocenstva/spolocenstvo-najsvatejsieho-srdca-jezisovho') }}"
            delay=1
            class="col-12 col-md-6"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="bsr-002-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Členovia spoločenstva sa usilujú sláviť sviatok Najsvätejšieho Srdca Ježišovho zvláštnou pobožnosťou a&nbsp;prijímaním sviatostí. Na prvý piatok mesiaca sa zúčastňujú svätej omše a&nbsp;prijímajú sväté prijímanie.
            </x-slot:teaser>
        </x-partials.card-article>

        <x-partials.card-article
            title="Služobníci Ježišovho Veľkňazského Srdca"
            url="{{ secure_url('spolocenstva/sluzobnici-jezisovho-velknazskeho-srdca') }}"
            delay=2
            class="col-12 col-md-6"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="sjvs-005-menu" class="img-fluid w-100"/>
            </x-slot:img>
            <x-slot:teaser>
                Najhlbšou modlitbou Služobníkov Ježišovho Veľkňazského Srdca je odovzdanie všetkého, čo prichádza, Božiemu Srdcu ako obetu za kňazov s&nbsp;tým, že o&nbsp;všetko ostatné, na čom im záleží, sa bude starať Pán.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>
</x-web.layout.master>
