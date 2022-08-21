<x-web.layout.master :pageData="$pageData">

    {{-- Požehnania --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART I -" class="static-page pad_b_30">

        <x-web.page.subsection>

            <x-web.page.text-segment animation="fromright">

                <x-partials.picture titleSlug="poz-001" side="left" dimensionSource="full" columns="3" />

                <p>
                    Každé požehnanie je darom, zasahuje život a jeho tajomstvo a je to dar vyjadrený slovom a jeho tajomstvom. Požehnanie, doslova dobrorečenie (prianie dobra), je súčasne a rovnako slovo i dar, reč a dobro. Dobro, ktoré požehnanie prináša, nie je presne určený predmet, nejaký vymedzený dar, nepochádza z činnosti človeka, ale z konania Boha.
                </p>

                <x-partials.picture titleSlug="poz-005" side="right" dimensionSource="medium" columns="4" />

                <p>
                    Človek si teda nemôže od Boha nárokovať „veľkosť a silu“ požehnania. Boh ho dáva ako svoj dar a tak, ako on sám chce. Svätý Pavol hovorí, že Boh Otec nás „... v Kristovi požehnal všetkým nebeským duchovným požehnaním...“ (Ef 1,3). Teda prostredníkom nášho požehnania je sám Kristus, pretože najväčším dobrom preukázaným ľudstvu je adoptívne synovstvo získané Kristovým človečenstvom a vykúpenie jeho smrťou. Kristus sprostredkúva požehnanie na príhovor Cirkvi, ktorá o požehnanie prosí.
                </p>
                <p>
                    Cirkev - vo vedomí zodpovednosti sprístupňovať všetkým veriacim všetky prostriedky spásy - ustanovila určité napodobenie sviatostí, obrady, prostredníctvom ktorých človeka posväcuje a sprostredkúva mu Božie dobrodenia. Cirkev používa pri takýchto obradoch vonkajšie znamenia, ktoré nepochádzajú priamo od Krista, ako je to v prípade sviatostných znakov, ale ich sama ustanovila, využívajúc právo dané sv. Petrovi: „Tebe dám kľúče od nebeského kráľovstva...“ (Mt 16,19).
                </p>
            </x-web.page.text-segment>

        </x-web.page.subsection>

    </x-web.page.section>

    <x-web.sections.background-picture titleSlug="poz-003"/>

    <x-web.page.section name="PAGE: ({{ $pageData->title }}) PART II -" class="static-page pad_b_50">

        <x-web.page.subsection class="pt-5">

            <x-web.page.text-segment animation="fromleft">

                <x-partials.picture titleSlug="poz-004" side="left" dimensionSource="medium" columns="5" />

                <p>
                    Cirkev udeľuje požehnania v rozličných životných okolnostiach a využíva pritom stvorené veci, ktoré môžu byť osožné posväteniu človeka a oslave Boha. Modlitby požehnania sú vždy sprevádzané čítaním Božieho slova, vonkajšími úkonmi a symbolmi.Preto má štruktúra požehnania vždy dve časti.
                </p>
                <p>
                    Prvá časť - čítanie Božieho slova je dôležitá preto, aby sa požehnanie stalo posvätným znakom, ktorý práve z hlásania Božieho slova čerpá svoj zmysel a poriadok. Druhá časť smeruje k chvále a velebeniu Boha - ako pri všetkých liturgických modlitbách skrze Krista v Duchu Svätom. Jej stredobodom je samotná modlitba požehnania sprevádzaná osobitným znakom.
                </p>
                <p>
                    Tieto viditeľné znaky majú pripomínať Pánovu spásonosnú činnosť a poukazovať na súvis so sviatosťami. Najčastejšie používanými znakmi sú: vystretie, vyzdvihnutie a zloženie rúk, vkladanie rúk, pokropenie požehnanou vodou, incenzovanie a znak kríža.
                </p>

                <x-partials.picture titleSlug="poz-007" side="right" dimensionSource="medium" columns="3" />

                <p>
                    Sväteniny a medzi nimi požehnania sprevádzajú nielen vysluhovanie sviatostí (napr. požehnanie krstnej vody, oleja na pomazanie chorých, prsteňov novomanželov a pod.), ale aj celý cirkevný rok (napr. požehnanie adventného venca, sviec na sviatok Obetovania Pána, popola na Popolcovú stredu, ratolestí na Kvetnú nedeľu a pod.), celý život farnosti i obce či mesta (požehnanie kostola, bohoslužobných predmetov, nemocnice, domov, erbu mesta a pod.) a napokon súkromný život každého jedného veriaceho - osoby i predmetov (požehnanie chorých, manželov a detí, matky pred pôrodom, cestujúcich, automobilov, požehnanie pokrmov a nápojov, predmetov ľudovej nábožnosti a pod.).
                </p>
            </x-web.page.text-segment>
        </x-web.page.subsection>

        <x-web.page.information-sources title="Použitá literatúra:">
            <li>
                <em>Požehnania.</em>
                Trnava: Spolok sv. Vojtecha, 2009. ISBN 978-80-7162-771-5.
            </li>
        </x-web.page.information-sources>

    </x-web.page.section>
</x-web.layout.master>
