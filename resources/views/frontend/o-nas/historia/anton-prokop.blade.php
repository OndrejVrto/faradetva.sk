<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$pageData['breadCrumb']"
        :titleSlug="$pageData['banners']"
        dimensionSource="full"
    />

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" class="static-page pad_t_50 pad_b_50">

    {{-- Anton Prokop --}}

    <x-frontend.page.subsection>
        {{-- <x-frontend.page.subsection.img columns="4" animation="fromleft" alt="" url="{{ asset('images/.jpg') }}" /> --}}
        <x-frontend.page.text-segment animation="fromright">
            <h6 class="text-church-template">* 20.6.1894 Detva</h6>
            <h6 class="text-church-template">† 8.6.1919 Detva</h6>
            <p>
                Anton Prokop sa narodil 20. júna 1894, ako syn Emila a Júlie, rod. Hermanovej. Po skončení ľudovej školy v Detve, študoval na gymnáziu v Banskej Bystrici a po štvrtej triede gymnázia pokračoval na Obchodnej akadémii. Po jej ukončení sa zamestnal ako úradník v Hospodárskej banke v Trnave. Po čase prišiel k názoru, že svetský život nie je pre neho a pomýšľal vstúpiť do Spoločnosti Ježišovej - k jezuitom. Kvôli vojnovým nepokojom nebolo dovolené mladých mužov prijímať do kláštora. Žil zbožne a kláštorným spôsobom života sa usiloval žiť aspoň doma. V roku 1915 bol odvedený za vojaka, narukoval k pešiemu pluku v Lučenci, avšak pre krátkozrakosť nebol na bojovom fronte, pracoval ako úradník na železničných staniciach. Po skončení prvej svetovej vojny sa v roku 1918 vrátil domov do Detvy, kde pracoval ako kancelársky pomocník na notárskom úrade obce Detva.
            </p>
        </x-frontend.page.text-segment>
        <x-frontend.page.text-segment animation="fromleft">
            <p>
                V roku 1919 vstúpilo na územie Československej republiky vojsko maďarských boľševikov. Pod heslom šírenia proletárskej revolúcie sa snažili nastoliť socialistický režim podľa sovietskeho vzoru. V pozadí tejto vojenskej akcie bol posledný zúfalý pokus podmaniť si Slovensko a zachovať integritu Uhorska. Vojsko sa dostalo do okolia Zvolena a boľševická horda Bélu Kuna vnikla aj do Detvy. Obyvatelia si ukrývali kone, vozy a iný majetok do stodôl do slamy, aby im to vojsko nezrekvirovalo. Anton bol horlivým vlastencom. Asi vo štvrtok pred Turícami usporiadal spolu s kaplánom Alexandrom Vajcíkom pred kostolom schôdzu a vyzýval ľudí, aby sa vlastnými zbraňami, kosami a cepmi, vzopreli Maďarom. Na ukončenie zhromaždenia nechal Anton zaspievať slovenskú hymnu „Hej, Slováci.“ Trúsili sa reči, že za toto sa im budú boľševici chcieť pomstiť. A tak im obom v piatok odporúčal vedúci notár Alexander Engelman a farár Anton Kúdelka, aby čím skôr odišli. Kaplán Vajcík ušiel na koni do hôr a Anton hoci sľúbil, že odíde, neurobil tak.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        {{-- <x-frontend.page.subsection.img columns="4" animation="fromleft" alt="" url="{{ asset('images/.jpg') }}" /> --}}
        <x-frontend.page.text-segment animation="fromright">
            <p>
                Prokopova reč sa nepáčila promaďarsky zmýšľajúcim občanom, najmä Židom. Jeden z nich, Markus Löwy z Detvy, udal Prokopa ako pansláva a československého agitátora. Anton bol asertívny mladík, nebál sa nepriateľa, jeho reč bola odvážna a za pravdu sa nebál položiť i vlastný život. Keď ho zradca Markus navštívil, hovoril mu: „Vážim si každého poriadneho človeka. Nie som antisemitista, ale mnohí židia sú hmotári, chamtiví po bohatstve, kšefty sú ich modlou, i v synagóge myslia na obchod. Za nič nemáte našu slovenskú kultúru, prispôsobujete sa Maďarom, nie Slovákom, hoci už dlhé roky žijete z našich mozoľov. Lenže vám je i národné prispôsobenie iba kšeftom. Prispôsobíte sa tej národnosti, ktorá vládne a je politicky silnejšia. Za Bacha ste nemčili, za Tizsu ste maďarčili, za Kúna boľševičíte, za Čechov budete češtiť, len k nám Slovákom nemáte úctu. Aj my máme právo na svoj život ako hociktorý iný národ, preto už raz musí prestať doterajšie maďarónske zúrenie proti slovenčine.“ Po tomto stretnutí ho šiel Markus udať boľševickým pohlavárom. Tí ho 8. júna na Turíčnu nedeľu včasráno prišli zatknúť. Odviedli ho do Vagačovho domu, zavreli ho do pivnice a potom vyšetrovali. Jeho matka mohla byť prítomná. Obžalobcom bol Markus Löwy a obžaloba znela: „Búril Detvanov proti vám, štval aj proti Židom, je nebezpečný antisemitista.“ Bol vynesený rozsudok smrti obesením: „Vyvesiť tohto rebela na vhodné miesto, aby Detvanci, až prídu z lazov do kostola videli, že s nepriateľmi nežartujeme.“ Boľševici mu pred smrťou odopreli kňaza. Prv než odvisol na konári lipy pred kostolom, kde predtým rečnil, mohol sa rozlúčiť s matkou a mladším bratom Jánom. Matka prosila vojakov, aby ho mohli zvesiť z lipy, ale to im bolo dovolené až po troch hodinách a len potom, ako mu kat prerezal žily na zápästiach. Ľud bol veľmi pobúrený popravou obľúbeného mladíka a jeho srdce volalo k Bohu o spravodlivý trest pre vrahov. Pochovali ho na cintoríne v Detve, vedľa hrobu jeho otca Emila, ktorý bol v roku 1897 aj detvianskym richtárom.
            </p>
        </x-frontend.page.text-segment>
        <x-frontend.page.text-segment animation="fromleft">
            <p>
                Na miesto tragédie sa v roku 1930 prišiel pokloniť aj prezident Tomáš Garrigue Masaryk. Na pamiatku tejto tragickej udalosti bola pripevnená tabuľa na lipu, kde Prokopa popravili. Počas komunizmu bola táto tabuľa strhnutá a hodená do potoka. Granátom bol zničený aj jeho náhrobok na cintoríne. Hrob, ktorý sa nachádza oproti prvému zastaveniu krížovej cesty, bol neskôr opravený a na náhrobnom kameni je nápis: „Anton Prokop, obeta boľševickej divokosti a martýr slovenskej slobody.“
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        {{-- <x-frontend.page.subsection.img columns="4" animation="fromleft" alt="" url="{{ asset('images/.jpg') }}" /> --}}
        <x-frontend.page.text-segment animation="fromright">
            <p>
                Tragické miesto popravy dnes pripomína pamätná tabuľa, ktorá je umiestnená na skale pod lipou, kde sa Prokopova poprava uskutočnila. Na tabuli je nápis: „K večnej pamiatke hrdinovi Antonovi Prokopovi, ktorý za slobodu slovenskej vlasti dňa 8. júna 1919 na tomto mieste zákerníckou boľševickou rukou usmrtený bol.“
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.information-sources title="Použitá literatúra:">
        <li>BARTKOVÁ, Anna. <em>Dejiny farnosti Detva</em>. Diplomová práca, 2008.</li>
        <li>Kronika rodu Prokopovcov [online]. [cit. 01.03.2021]. Dostupné na internete: https://www.obeckrivan.sk/e_download.php?file=data/editor/60sk_1.pdf&original=Kronika%20rodu%20Prokopovcov.pdf</li>
    </x-frontend.page.information-sources>

    </x-frontend.page.section>
</x-frontend.layout.master>











