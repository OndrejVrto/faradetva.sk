<x-web.layout.master :pageData="$pageData">

    {{-- O Nás --}}
        {{-- historia --}}
        {{-- patron-farnosti.svaty-frantisek-assisi --}}
        {{-- sakralne-objekty --}}
        {{-- vyznamne-osobnosti --}}
        {{-- pastoracia --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) -" class="ch_event_section pad_t_30">

        <x-partials.card-event
            title="História"
            url="{{ secure_url('o-nas/historia') }}"
            side="right"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="kronika-001-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Vznik Detvy, vývoj rímskokatolíckej farnosti, farári a&nbsp;kapláni pôsobiaci v&nbsp;Detve, duchovné povolania z&nbsp;farnosti, významné osobnosti cirkevného života, sociálna starostlivosť a&nbsp;tradície, štatistiky farnosti od roku 2000.
                <span class="d-none d-xl-inline me-2">

                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Svätý František z&nbsp;Assisi"
            url="{{ secure_url('o-nas/patron-farnosti') }}"
            side="left"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="patr-015-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Svätý František z&nbsp;Assisi, vlastným menom Giovanni Battista Bernardone je zakladateľom rehole františkánov.
                Žil na prelome 12. a&nbsp;13. storočia. Za svätého bol vyhlásený v&nbsp;roku 1228. Jeho sviatok sa slávi 4. októbra.
                <span class="d-none d-xl-inline">

                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Sakrálne objekty vo farnosti"
            url="{{ secure_url('o-nas/sakralne-objekty') }}"
            side="right"
            >
            <x-slot:img>
                {{-- <x-partials.picture-responsive titleSlug="put-001-menu"/> --}}
                <x-partials.picture-responsive titleSlug="kapl-008-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Sakrálne objekty nachádzajúce sa vo farnosti: farský kostol, kláštorný kostol bosých karmelitánok, kalvária, kaplnky, prícestné sochy, umelecké ľudové vyrezávané kríže.
                <span class="d-none d-xl-inline">

                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Významné osobnosti"
            url="{{ secure_url('o-nas/vyznamne-osobnosti') }}"
            side="left"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="str-019-menu"/>
            </x-slot:img>
            <x-slot:teaser>
                Významné osobnosti cirkevného i&nbsp;kultúrneho života Detvy: Karol A. Medvecký, Anton Prokop, Ján Štrbáň, Jozef Búda, Štefan Vlk, Imrich Ďurica, Jozef Závodský.
                <span class="d-none d-xl-inline">

                </span>
            </x-slot:teaser>
        </x-partials.card-event>

        <x-partials.card-event
            title="Pastorácia vo farnosti"
            url="{{ secure_url('o-nas/pastoracia') }}"
            side="right"
            >
            <x-slot:img>
                <x-partials.picture-responsive titleSlug="far-002-menu" descriptionSide="left"/>
            </x-slot:img>
            <x-slot:teaser>
                Každý kňaz poverený správou farnosti potrebuje svojich spolupracovníkov, ktorí sú poverení jednotlivými úlohami vo farskej rade, pri liturgických sláveniach, pri katechéze vo farnosti, ako aj vyučovaním náboženskej výchovy na školách.
                <span class="d-none d-xl-inline me-2">

                </span>
            </x-slot:teaser>
        </x-partials.card-event>

    </x-web.page.section>
</x-web.layout.master>
