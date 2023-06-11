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
                Františkánsky svetký rád vznikol začiatkom 13. storočia, jeho zakladateľom je sv. František z Assisi. Členovia rádu sa sľubom zaväzujú žiť podľa evanjelia Ježiša Krista spôsobom sv. Františka v ich laickom stave.
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
                Členovia spoločenstva Bárka sú ochotní pomáhať modlitbami a finančne konkrétnym bohoslovcom pri ich štúdiu a príprave na kňazské povolanie. Podpora spoločenstva sa rozšírila aj pre pomoc kňazom, ktorí pokračujú v teologickom štúdiu v zahraničí.
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
                Život karmelitánok je životom tichým a celkom obráteným k Bohu. Pre toto neustále, láskyplné obracanie sa k Bohu je potrebná na jednej strane atmosféra ticha, uzobrania a utiahnutosti, na druhej strane radostný, rodinný život v spoločenstve.
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
                Ružencové bratstvo je združenie duchovne zjednotených veriacich, ktorí si osobitným spôsobom uctievajú Pannu Máriu.
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
                hnutie i večeradlo charakterizujú tri záväzky
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
                Hnutie Modlitby matiek vzniklo v r. 1995 na katolíckej charizmatickej konferencii v Anglicku.
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
                vychádza z charizmy sv. Faustíny, jej duchovnosti a apoštolskej činnosti.
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
                Dobrovoľná laická kresťanská organizácia určená pre veriacich kresťanských manželov.
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
                sa zapájajú do apoštolátu saleziánskej rodiny podľa svojich darov a možností.
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
                Je „hnutie“ Ducha Svätého v celej Cirkvi.
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
                Spoločenstvo veriacich, ktorí sa zaväzujú usilovať sa o evanjeliovú dokonalosť vo svete.
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
                Členovia spoločenstva sa usilujú sláviť sviatok Najsvätejšieho Srdca Ježišovho zvláštnou pobožnosťou a prijímaním sviatostí. Na prvý piatok mesiaca sa zúčastňujú svätej omše a prijímajú sväté prijímanie.
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
                Najhlbšou modlitbou Služobníkov Ježišovho Veľkňazského Srdca je odovzdanie všetkého, čo prichádza, Božiemu Srdcu ako obetu za kňazov s tým, že o všetko ostatné, na čom im záleží, sa bude starať Pán.
            </x-slot:teaser>
        </x-partials.card-article>

    </x-web.page.section>
</x-web.layout.master>
