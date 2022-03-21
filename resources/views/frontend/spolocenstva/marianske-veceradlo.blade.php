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
                Mariánske večeradlá modlitby a bratskej lásky vzišli z Mariánskeho kňazského hnutia, ktoré v roku 1972 založil taliansky kňaz Stefano Gobbi. Mariánske kňazské hnutie i večeradlo charakterizujú tri záväzky: 1. zasvätenie Nepoškvrnenému srdcu Panny Márie, 2. jednota s pápežom a s Cirkvou s ním zjednotenou, 3. vedenie veriacich k životu oddanosti Panne Márii. Večeradlo je predovšetkým stretnutím modlitby, a preto je jeho charakteristikou modlitba posvätného ruženca. Ruženec je reťaz lásky a záchrany, ktorou môžeme ovplyvniť mnohé udalosti doby, v ktorej žijeme.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Štruktúra večeradla">
        <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4" />
        <x-frontend.page.text-segment animation="fromleft">
            <p>
                Podobne, ako boli zhromaždení učeníci s Máriou vo večeradle v Jeruzaleme, sa veriaci pravidelne schádzajú, aby mohli:
            </p>
            <ul>
                <li>modliť sa spolu s Máriou</li>
                <li>žiť a prehĺbiť svoje zasvätenie Márii</li>
                <li>prežívať bratstvo.</li>
            </ul>
        </x-frontend.page.text-segment>
        <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4"/>
        <x-frontend.page.text-segment animation="fromright">
            <p>
                Modlitbou ruženca voláme Matku Božiu, aby sa modlila spolu s nami a aby odhalila našim dušiam tajomstvá Ježišovho života. Vo večeradlách si máme navzájom pomáhať prežívať zasvätenie Nepoškvrnenému srdcu Panny Márie. To je cesta, po ktorej máme kráčať: učiť sa vidieť, cítiť, milovať, modliť sa a konať tak ako Panna Mária. Napokon všetci účastníci sú volaní k tomu, aby vo večeradle zakúšali opravdivé bratstvo.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection title="Nadpis 2">
        <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4" />
        <x-frontend.page.text-segment animation="fromleft">
            <p>
                Večeradlo sa začína vzývaním Ducha Svätého, prečíta sa úryvok z knihy „Kňazom, najmilším synom Panny Márie“, potom sa modlí posvätný ruženec s meditáciami nad jeho tajomstvami. Po každom desiatku ruženca sa spieva refrén fatimskej hymny: Ave, ave, ave Mária. Po modlitbe ruženca nasleduje úkon zasvätenia Nepoškvrnenému srdcu Panny Márie.
            </p>
            <p>
                Mariánske večeradlo sa v našej farnosti organizuje každý pondelok pred večernou svätou omšou, so začiatkom o 16.40 hod. vo farskom kostole. Na večeradlo je voľný prístup všetkých veriacich. Mariánske kňazské hnutie pravidelne organizuje večeradlá na diecéznej i celoslovenskej úrovni.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.information-sources title="Použitá literatúra:">
        <li>Kňazom, najmilším synom Panny Márie. Bratislava: Mariánske kňazské hnutie, 2000. ISBN 80-900417-0-1.</li>
    </x-frontend.page.information-sources>

    </x-frontend.page.section>
</x-frontend.layout.master>