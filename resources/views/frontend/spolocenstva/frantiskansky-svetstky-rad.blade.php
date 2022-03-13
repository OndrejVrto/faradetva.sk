<x-frontend.layout.master :pageData="$pageData">

    <x-frontend.sections.banner
        :header="$pageData['title']"
        :breadcrumb="$pageData['breadCrumb']"
        :titleSlug="$pageData['banners']"
        dimensionSource="full"
    />

    <x-frontend.page.section name="PAGE: ({{$pageData['title']}}) -" class="static-page pad_t_50 pad_b_50">

    <x-frontend.page.subsection >
        <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4"/>
        <x-frontend.page.text-segment type="right">
            <p>
                Františkánsky svetský rád (Ordo Franciscanus Saecularis) je jedným z najstarších existujúcich laických náboženských hnutí v Katolíckej cirkvi. Vznikol začiatkom 13. storočia. Zakladateľom rádu je sv. František z Assisi. Názov samotného hnutia sa postupom času menil. Spočiatku sa jeho členovia nazývali Bratia a sestry kajúceho rádu sv. Františka, neskôr sa hnutie začalo označovať ako Tretí rád sv. Františka. V roku 1978 sa spolu s prijatím novej regule schválenej sv. Pavlom VI. upravilo aj pomenovanie bratského spoločenstva, ktoré sa dnes nazýva Františkánsky svetský rád.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4" />
        <x-frontend.page.text-segment type="left">
            <p>
                Členovia Františkánskeho svetského rádu sa sľubom zaväzujú žiť podľa evanjelia Ježiša Krista spôsobom sv. Františka z Assisi v ich laickom stave. OFS je otvorený pre veriacich každého stavu - slobodných, manželov, vdovcov, ale i svetských duchovných. Spiritualitu príslušníkov OFS charakterizujú svetské podmienky a život v bratskom spoločenstve. Príznačná je aktívna prítomnosť nielen v Cirkvi, ale aj vo svete. Svetskí františkáni majú byť kvasom prostredí, v ktorých žijú a to svedectvom bratskej lásky a jasným kresťanským postojom.
            </p>
            <p>
                Karol Anton Medvecký vo svojej monografii Detva uvádza, že v roku 1730 bolo v Detve znovuzriadené Bratstvo sv. Františka Assiského, ľudovo označované ako bratstvo „kordigerov“ alebo „pásikárov“. Názov je odvodený od opaskov - povrazov, z talianskeho slova corda - povraz, ktorými sa členovia prepásavali podľa príkladu sv. Františka na pamiatku Kristovho spútania. Predpokladá sa, že pri vzniku Detvy a jej začiatkoch bratia františkáni, ktorí zabezpečovali duchovnú starostlivosť prvých obyvateľov, založili tu v 17. storočí aj prvé Bratstvo sv. Františka.
            </p>
        </x-frontend.page.text-segment>
        <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4"/>
        <x-frontend.page.text-segment type="right">
            <p>
                V roku 1785 bol zhotovený inventár zrušenej Spoločnosti kordigerov v Detve, ktorá pravdepodobne musela zaniknúť na základe patentu o zrušení žobravých a rozjímavých reholí, ktorý vydal cisár Jozef II. v roku 1782. Tretí rád sv. Františka bol v Detve obnovený až 9. novembra 1924 zásluhou dekana Jána Štrbáňa, bývalého františkána. Spoločenstvo viedol sám dekan Štrbáň, ktorý bol členom a zároveň riaditeľom bratstva. Členom tohto bratstva bol aj „apoštol Podpoľania“, pán Štefan Vlk, ktorý zomrel v povesti svätosti v roku 1975.
            </p>
            <p>
                Po Nežnej revolúcii a následnej náboženskej slobode začalo päť terciárok navštevovať bratstvo Františkánskeho svetského rádu v Lučenci. Po niekoľkých rokoch bolo 11. marca 2006 duchovným asistentom pátrom Jakubom Martausom OFM založené v Detve dočasné Bratstvo sv. Anežky Českej. Na sviatok patrónky bratstva 2. marca 2008 bolo toto miestne bratstvo v Detve kánonicky zriadené - oficiálne ustanovené. V tom istom roku sa však zistilo, že nové bratstvo nebolo potrebné zriaďovať, pretože sa našla posledná žijúca členka pôvodného Tretieho rádu sv. Františka, ktorej otec patril medzi zakladateľov bratstva v roku 1924 a ona sama do neho vstúpila ešte v roku 1941. Následne boli akoby tieto dve osobitné bratstvá zlúčené do jedného.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    <x-frontend.page.subsection>
        <x-partials.picture titleSlug="blank" arrival="right" dimensionSource="full" columns="4" />
        <x-frontend.page.text-segment type="left">
            <p>
                Bratstvo Františkánskeho svetského rádu v Detve sa pravidelne stretáva dvakrát do mesiaca v pastoračnom centre farnosti. Hierarchicky patrí pod Stredoslovenský región Národného bratstva OFS Sedembolestnej Panny Márie. Je súčasťou Medzinárodného bratstva OFS, toho istého Tretieho rádu, ktorý pred 800 rokmi založil patrón kostola i celej farnosti, sv. František z Assisi. V súčasnosti (r. 2022) miestne Bratstvo sv. Anežky Českej v Detve tvorí osem sestier a dvaja bratia s doživotnou profesiou (sľubmi), jedna členka je vo formácii.
            </p>
        </x-frontend.page.text-segment>
    </x-frontend.page.subsection>

    </x-frontend.page.section>
</x-frontend.layout.master>
