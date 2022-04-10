<x-frontend.layout.master :pageData="$pageData">

    {{-- Sväté písmo - Biblia --}}

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" class="static-page pad_b_50">

        <x-frontend.page.subsection>
            {{-- <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4" /> --}}
            <x-frontend.page.text-segment animation="fromleft">
                <p>
                    Názov Biblia (z gréckeho tà biblía - knižočky, spisky) označuje zbierku všetkých biblických spisov. Pre svoj mimoriadny pôvod a myšlienkovú náplň dostala meno „Kniha kníh“. Jej bežný názov Sväté písmo (latinsky Sacra Scriptura) naznačuje skutočnosť, že vo všetkých spisoch Biblie je písomne zachytené Božie zjavenie a Božie slovo. Podľa zadelenia biblických spisov do dvoch skupín sa používa výraz Starý a Nový zákon alebo presnejšie Stará a Nová zmluva.
                </p>
                <p>
                    Bohom zjavené pravdy obsiahnuté vo Svätom písme boli napísané z vnuknutia Ducha Svätého, ako také boli zverené Cirkvi a učia pravdy, ktoré Boh zjavil pre našu spásu. Spôsob, akým Boh vplýval na vznik biblických spisov, je vyjadrený slovom inšpirácia. Je to charizmatický vplyv Ducha Svätého, ktorým sa Boh stáva prvotným autorom Svätého písma, kým svätopisec je v plnom zmysle druhotným autorom biblického spisu. Boh priamym zásahom svojej moci, múdrosti a vôle pôsobí ako svetlo v oblasti rozumu a slobodnej vôle ľudského autora. Ten však v plnej miere používa pri písaní svoje vlohy, kultúru, reč a štýl a takto vyjadruje to, čo mal v úmysle napísať.
                </p>
                <p>
                    Obsahom Svätého písma sú zjavené pravdy, ktorými Boh chcel dať poznať seba samého a večné rozhodnutie svojej vôle týkajúce sa spásy ľudí. Tento Boží plán zjavenia (ekonómia spásy) sa uskutočňuje udalosťami a slovami, ktorými biblické texty opisujú Božie konanie v priebehu dejín na spásu ľudstva. Starý a Nový zákon sa rozdeľuje na tri skupiny spisov: dejepisné, poučné a prorocké. Jednotlivé spisy sa v týchto skupinách uvádzajú podľa poriadku kánonu inšpirovaných spisov stanoveného na Tridentskom koncile v roku 1546.
                </p>
            </x-frontend.page.text-segment>
        </x-frontend.page.subsection>

        <x-frontend.page.subsection title="Rozdelenie Biblie">
            {{-- <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4" /> --}}
            <x-frontend.page.text-segment>
                <ol class="list-unstyled">
                    <li class="ms-4"><span class="h5 text-church-template">A. Spisy Starého zákona (46 kníh)</span>
                        <ol class="list-unstyled">
                            <li class="ms-4"><span class="text-church-template-blue me-2">a. Dejepisné (21): </span> Genezis, Exodus, Levitikus, Numeri, Deuteronómium, Jozue, Sudcovia, Rút, Prvá - Druhá kniha Samuelova, Prvá - Druhá kniha kráľov, Prvá - Druhá kniha kroník, Ezdráš, Nehemiáš, Tobiáš, Judita, Ester, Prvá - Druhá kniha Machabejcov</li>
                            <li class="ms-4"><span class="text-church-template-blue me-2">b. Poučné (7): </span> Jób, Žalmy, Príslovia, Kazateľ, Pieseň piesní, Múdrosť, Sirachovec</li>
                            <li class="ms-4"><span class="text-church-template-blue me-2">c. Prorocké (18) </span>
                                <ol class="list-unstyled">
                                    <li class="ms-4"><span class="text-church-template-blue me-2">i. veľkí proroci (4 + 2): </span> Izaiáš, Jeremiáš (spolu s Nárekmi a Baruchom), Ezechiel, Daniel</>
                                    <li class="ms-4"><span class="text-church-template-blue me-2">ii. malí proroci (12): </span> Ozeáš, Joel, Amos, Abdiáš, Jonáš, Micheáš, Nahum, Habakuk, Sofoniáš, Aggeus, Zachariáš, Malachiáš</li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                    <li class="ms-4"><span class="h5 text-church-template">B. Spisy Nového zákona (27 kníh)</span>
                        <ol class="list-unstyled">
                            <li class="ms-4"><span class="text-church-template-blue me-2">a. Dejepisné (5): </span> Evanjelium podľa Matúša, Marka, Lukáša a Jána, Skutky apoštolov</li>
                            <li class="ms-4"><span class="text-church-template-blue me-2">b. Poučné (apoštolské listy - 21): </span> Rimanom, Prvý - Druhý Korinťanom, Galaťanom, Efezanom, Filipanom, Kolosanom, Prvý - Druhý Solúnčanom, Prvý - Druhý Timotejovi, Títovi, Filemonovi, Hebrejom, Jakubov list, Prvý - Druhý Petrov list, Prvý - Tretí Jánov list, Júdov list</li>
                            <li class="ms-4"><span class="text-church-template-blue me-2">c. Prorocká kniha (1): </span> Zjavenie apoštola Jána (Apokalypsa)</li>
                        </ol>
                    </li>
                </ol>

            </x-frontend.page.text-segment>
        </x-frontend.page.subsection>

        <x-frontend.page.subsection title="Sväté písmo v živote Cirkvi a veriacich" animation="fromleft">
            {{-- <x-partials.picture titleSlug="blank" animation="fromright" dimensionSource="full" columns="4" /> --}}
            <x-frontend.page.text-segment animation="fromleft">
                <p>
                    V dogmatickej konštitúcii Druhého vatikánskeho koncilu Dei Verbum sa poukazuje na význam a úlohu Svätého písma v živote Cirkvi a veriacich týmito slovami: „Cirkev vždy mala i má Sväté písmo spolu s posvätnou Tradíciou za najvyššie pravidlo viery... Preto všetka kazateľská činnosť Cirkvi, ako aj sama kresťanská nábožnosť sa má živiť a dať viesť Svätým písmom... V Božom slove je toľká sila a účinnosť, že ono je oporou a životnou silou Cirkvi a jej deťom posilou vo viere, pokrmom duše a čistým, nikdy nevysychajúcim prameňom duchovného života.“ Posvätný cirkevný snem naliehavo a dôrazne vyzýva všetkých veriacich, aby si častým čítaním Svätého písma nadobudli vznešené poznanie Ježiša Krista. Veď „kto nepozná Písmo, nepozná Krista“. (sv. Hieronym)
                </p>
                <p>
                    Sme pozvaní k tomu, aby sme sa radi oboznamovali s posvätným textom, jednak prostredníctvom liturgie, ktorá oplýva Božími výrokmi, alebo nábožným čítaním, alebo pomocou iných na to vhodných prostriedkov a podujatí so schválením a pod vedením pastierov Cirkvi. Nemožno zabúdať na to, že čítanie Svätého písma musí sprevádzať modlitba, aby sa stalo rozhovorom medzi Bohom a človekom. Lebo „keď sa modlíme, prihovárame sa Bohu, a keď čítame Božie výroky, Boha počúvame“. (sv. Ambróz)
                </p>
                <p>
                    Výborný spôsob, ako s úžitkom čítať Sväté písmo, je metóda známa pod menom lectio divina (modlitbové čítanie). Táto forma čítania Biblie spočíva v dlhšom zotrvaní nad biblickým textom, ktorý sa opätovne číta, ba takmer „prežúva“, ako sa vyjadrujú cirkevní otcovia, s cieľom vyťažiť z neho takpovediac „šťavu“, ktorá by sa stala akoby životnou miazgou pre konkrétny život. Podmienkou praktizovania lectio divina je, aby myseľ a srdce osvietil Duch Svätý, teda sám inšpirátor Svätého písma, a teda aby boli disponované na postoj „nábožného počúvania“ (taký bol typický postoj Panny Márie).
                </p>
                <p>
                    Nesmieme nikdy zabúdať, že základom každej pravej a živej kresťanskej spirituality je Božie slovo, ohlasované, prijímané, slávené a meditované v Cirkvi. Úsilie nadobudnúť čoraz dôvernejší vzťah k Svätému písmu bude tým nadšenejšie, čím viac si budeme uvedomovať, že tak vo Svätom písme, ako aj v živej Tradícii Cirkvi stojíme pred definitívnym slovom Boha o vesmíre a dejinách. Čím viac sa dokážeme dať k dispozícii Božiemu slovu, tým viac budeme môcť konštatovať, že tajomstvo Turíc pôsobí v Božej Cirkvi aj dnes. Duch Pánov naďalej zosiela na Cirkev svoje dary, aby nás viedla k plnej pravde, otvárala nám zmysel Písem a formovala z nás vo svete dôveryhodných hlásateľov slova spásy.
                </p>
            </x-frontend.page.text-segment>
        </x-frontend.page.subsection>

        <x-frontend.page.information-sources title="Použitá literatúra:">
            <li>Biblia. Sväté písmo Starého a Nového zákona. Trnava: Spolok sv. Vojtecha, 2012. ISBN 978-80-7162-888-0.</li>
            <li>Verbum Domini. Posynodálna apoštolská exhortácia pápeža Benedikta XVI. o Božom slove v živote a poslaní Cirkvi. Trnava: Spolok sv. Vojtecha, 2011. ISBN 978-80-7162-868-2.</li>
        </x-frontend.page.information-sources>

    </x-frontend.page.section>
</x-frontend.layout.master>
