@extends('frontend._layouts.static-page')

@push('content_header')
    {{-- Prepend content Header --}}
@endpush
@prepend('content_footer')
    {{-- After content Footer --}}
@endprepend

@section('content')
    <x-page-section title="Prečo Ježiš prejavoval taký veľký záujem o chorých?">
        {{-- <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/> --}}
        <x-page-section.text type="right">
            <p>
                Ježiš prišiel, aby nám zjavil Božiu lásku. Prinášal ju predovšetkým tam, kde sa človek cíti mimoriadne ohrozený: v chorobe. Boh chce, aby sme boli zdraví na tele aj na duchu, aby sme mu verili a aby sme dokázali rozpoznať prichádzajúce Božie kráľovstvo. Niekedy nám až vážna choroba ukáže, čo potrebujeme - či už zdraví alebo chorí - najviac zo všetkého: Boha. Život máme iba v ňom. Preto majú chorí a hriešnici mimoriadny zmysel pre to, čo je v živote podstatné. V Starom zákone človek často prijímal chorobu ako ťažkú skúšku, proti ktorej sa buď mohol búriť, alebo v nej mohol spoznať Boží rukopis. V Novom zákone chorí vyhľadávali Ježišovu blízkosť; snažili sa ho „dotknúť, lebo vychádzala z neho sila a uzdravovala všetkých“ (Lk 6,19).
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Komu je určená sviatosť chorých?">
        {{-- <x-page-section.img-media columns="5" type="right" name="" :model="$pageData"/> --}}
        <x-page-section.text type="left">
            <p>
                Túto sviatosť môže prijať každý pokrstený, ktorý sa nachádza v kritickom zdravotnom stave alebo situácii ohrozujúcej život. Sviatosť pomazania chorých môžeme prijať v živote viackrát. Preto má zmysel požiadať o túto sviatosť aj v mladom veku, ak má človek napr. podstúpiť ťažkú operáciu. Mnohí kresťania v takejto situácii spájajú sviatosť pomazania chorých so sviatosťou zmierenia, spolu so svätým prijímaním; v každom prípade chcú predstúpiť pred Boha s čistým svedomím.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Ako sa slávi sviatosť pomazania chorých?">
        <x-page-section.text type="right">
            <p>
                Podstatou obradu pri slávení tejto sviatosti je modlitba kňaza spojená s pomazaním čela a rúk chorého posväteným olejom. Vysluhovateľmi sviatosti chorých sú iba biskupi a kňazi. Ježiš Kristus mocou ich vysvätenia koná prostredníctvom nich.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Aké účinky má sviatosť chorých?">
        {{-- <x-page-section.img-media columns="5" type="right" name="" :model="$pageData"/> --}}
        <x-page-section.text type="left">
            <p>
                Sviatosť chorých udeľuje útechu, pokoj a silu a chorého v jeho utrpení spája hlbokým putom s Kristom. U mnohých táto sviatosť vedie k telesnému uzdraveniu. A ak si Boh chce niekoho povolať k sebe, dáva mu v tejto sviatosti silu ku všetkým telesným i duševným zápasom na jeho poslednej ceste. Ak sa chorý nemohol vyspovedať, sviatosť chorých spôsobuje aj odpustenie hriechov. Mnohí chorí sa obávajú tejto sviatosti a odsúvajú ju na poslednú chvíľu, pretože sa domnievajú, že si jej prijatím podpisujú rozsudok smrti. Opak je však pravdou: sviatosť chorých je istým druhom životnej poistky. Kto ako kresťan sprevádza nejakého chorého, mal by mu pomôcť zbaviť sa zbytočného strachu. Väčšina ťažko chorých alebo tých, ktorí sa ocitnú v ohrození života, intuitívne cíti, že v danom okamihu je pre nich najdôležitejšie bezvýhradne sa primknúť k tomu, ktorý premohol smrť a je sám život - k Ježišovi Kristovi, Spasiteľovi.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section title="Čo je to viatikum?">
        {{-- <x-page-section.img-media columns="4" type="left" name="" :model="$pageData"/> --}}
        <x-page-section.text type="right">
            <p>
                Viatikum („pokrm na cestu“) je Eucharistia, ktorú prijíma ten, kto o krátky čas opustí pozemský život a prejde do večného života. Málokedy je sväté prijímanie také životne dôležité ako v okamihu, keď človek dovršuje svoj pozemský život.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section>
        <hr class="text-church-template">
    </x-page-section>

    <x-page-section title="Čo znamená byť zaopatrený sviatosťami a ako je k tomu možné prísť?">
        {{-- <x-page-section.img-media columns="4" type="right" name="" :model="$pageData"/> --}}
        <x-page-section.text type="left">
            <p>
                Tí, ktorí sú vopred posilnení sviatostným pomazaním, svätou spoveďou a svätým prijímaním, sú týmito sviatosťami zaopatrení v hodine smrti a ich odchod k svojmu Pánovi a Stvoriteľovi je sviatostne posilnený, v mnohých prípadoch aj uľahčený, pretože zomierajúci nadobúda Boží pokoj, je zmierený s Bohom aj so svojimi príbuznými a môže vo väčšom pokoji opustiť tento svet.
            </p>
            <p>
                Sviatosť pomazania chorých vysluhujeme chorým a umierajúcim kedykoľvek na požiadanie. U tých, ktorí sú v pokročilom veku a majú vážne zdravotné komplikácie, nie je dobré odkladať túto sviatosť len na poslednú chvíľu. Pomazanie chorých je možné prijať jedenkrát v roku alebo aj viackrát, vždy po vážnom zhoršení zdravotného stavu.
            </p>
        </x-page-section.text>
    </x-page-section>

    <x-page-section.sources title="Použitá literatúra:">
        <LI>Youcat po slovensky. Katechizmus Katolíckej cirkvi pre mladých. Bratislava: Karmelitánske nakladateľstvo, 2011. ISBN 978-80-89231-99-7.</LI>
    </x-page-section.sources>

@endsection
