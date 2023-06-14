<x-web.layout.master :pageData="$pageData">

    {{-- Spoločenstvo Bárka --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) -" row="true" class="static-page pad_b_50">

        <x-web.page.subsection >
            <x-web.page.text-segment animation="fromright">

                <x-partials.picture titleSlug="sb-008" side="left" dimensionSource="medium" columns="2" />
                <x-partials.picture titleSlug="sb-003" side="right" dimensionSource="medium" columns="3" />

                <p>
                    <cite>
                        „Pán zastavil sa na brehu, hľadal ľudí ochotných ísť za ním a&nbsp;loviť srdcia slov Božích pravdou.“
                    </cite>
                    Toto sú prvé verše obľúbenej piesne svätého Jána Pavla II., v&nbsp;ktorých sa spieva o&nbsp;ochote mladých ľudí ísť za Pánom, ísť do zasväteného života.
                </p>

                <p>
                    Spoločenstvo Bárka (loďka - po poľsky bárka) vzniklo v&nbsp;našej farnosti v&nbsp;roku 2000 na podnet vtedajšieho diecézneho otca biskupa Rudolfa Baláža, ktorý videl potrebu duchovne, ale i&nbsp;materiálne pomáhať banskobystrickým bohoslovcom v&nbsp;kňazskom seminári v&nbsp;Badíne.
                </p>

                <p>
                    Niekoľko veriacich detvianskej farnosti bolo ochotných pomáhať modlitbami a&nbsp;finančne konkrétnym bohoslovcom pri ich štúdiu a&nbsp;príprave na kňazské povolanie. Na začiatku vytváralo toto spoločenstvo desať ľudí, postupne pribúdali ďalší.
                </p>

                <x-partials.picture titleSlug="sb-010" side="right" dimensionSource="medium" columns="3" />

                <p>
                    Momentálne je v&nbsp;spoločenstve 15 stálych členov a&nbsp;8&nbsp;sú príležitostní podporovatelia. (r. 2022). Do pomoci sú zapojené aj ďalšie spoločenstvá, Modlitby matiek a&nbsp;Františkánsky svetský rád.
                </p>

                <p>
                    Od vzniku spoločenstva sa podarilo dopraviť loďku duchovného povolania do kňazského života 7&nbsp;bohoslovcom, a&nbsp;to nielen z&nbsp;Banskobystrickej diecézy. Podpora spoločenstva sa rozšírila aj pre pomoc kňazom, ktorí pokračujú v&nbsp;štúdiu v&nbsp;Ríme.
                </p>

                <p>
                    Kto by mal ochotu vypomáhať modlitbami aj financiami bohoslovcom, ktorých je stále menej, ako aj kňazom, ktorí sa zdokonaľujú vo svojom povolaní na štúdiách v&nbsp;zahraničí, môže členov spoločenstva kedykoľvek kontaktovať. Prihlásiť sa je možné u&nbsp;niektorého z&nbsp;kňazov farnosti alebo u&nbsp;kostolníčok, oni záujemcov skontaktujú s&nbsp;členmi Spoločenstva Bárka.
                </p>
            </x-web.page.text-segment>
        </x-web.page.subsection >

        <x-web.page.subsection >
            <x-web.page.text-segment animation="fromleft">

                <blockquote>
                    <cite>
                        „Pane, úbohým som človekom, mojím venom sú ruky ochotné pracovať s&nbsp;tebou, i&nbsp;čisté srdce.“
                    </cite>
                </blockquote>

                <x-partials.video-embed
                    urlVideo="https://www.youtube.com/watch?v=W4UE2y4APAE"
                    :config="[
                        'width' => 600,
                        'class' => 'd-block mx-auto'
                    ]"
                />

            </x-web.page.text-segment>
        </x-web.page.subsection >

        <x-web.page.information-sources title="Zdroj:">
            <li>
                <em>Mária Budáčová</em>
            </li>
        </x-web.page.information-sources>
    </x-web.page.section>
</x-web.layout.master>
