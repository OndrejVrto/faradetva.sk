<li>
    <a href="{{ secure_url('farske-oznamy') }}">Oznamy</a>
</li>
<li>
    <a href="{{ route('article.all') }}">Články</a>
</li>

<li>
    {{-- <a href="{{ secure_url('o-nas') }}">O nás</a> --}}
    <a href="#" class="link-submenu">O nás</a>
    <ul class="sub-menu">
        <li>
            <a href="{{ secure_url('o-nas/historia') }}">História</a>
            <!-- Dejiny farnosti -->
            <!-- Farári v Detve -->
            <!-- Kapláni v Detve -->
            <!-- Duchovné povolania -->
            <!-- Kňazi pochovaní v Detve -->
            <!-- Štatistiky od r. 2000 -->
            <!-- Chudobienec -->
            <!-- Vianoce -->
        </li>
        <li>
            <a href="{{ secure_url('o-nas/patron-farnosti') }}">Patrón farnosti</a>
        </li>
        <li>
            <a href="{{ secure_url('o-nas/sakralne-objekty') }}">Sakrálne objekty</a>
            <!-- Farský kostol -->
            <!-- Kláštorný kostol -->
            <!-- Kalvária, kaplnky -->
            <!-- Prícestné sochy -->
            <!-- Detvianske kríže -->
        </li>
        <li>
            <a href="{{ secure_url('o-nas/vyznamne-osobnosti') }}">Významné osobnosti</a>
            <!-- Anton Prokop -->
            <!-- Imrich Ďurica -->
            <!-- Jozef Závodský -->
            <!-- Karol Anton Medvecký -->
            <!-- Mons. Ján Štrbáň -->
            <!-- prof. Jozef Búda -->
        </li>
        <li>
            <a href="{{ secure_url('o-nas/pastoracia') }}">Pastorácia</a>
            <!-- Farská rada -->
            <!-- Lektori + Rozpisy -->
            <!-- Akolyti  + Rozpisy -->
            <!-- Miništranti -->
            <!-- Kostolníci -->
            <!-- Organisti, speváci -->
            <!-- Spevokoly, dychovka -->
            <!-- Vyučovanie náboženstva -->
        </li>
        <li>
            <a href="{{ secure_url('spolocenstva') }}">Spoločenstvá</a>
            <!-- Františkánsky svetský rád -->
            <!-- Ružencové bratstvo -->
            <!-- Mariánske večeradlo -->
            <!-- Rád bosých karmelitánok -->
            <!-- Svetský rád bosých karmelitánov -->
            <!-- Združenie Faustínum -->
            <!-- Saleziánski spolupracovníci -->
            <!-- Hnutie kresťanských rodín -->
            <!-- Katolícka charizmatická obnova -->
            <!-- Modlitby matiek -->
            <!-- Bárka -->
            <!-- Služobníci Ježišovho Veľkň. Srdca -->
        </li>
    </ul>
</li>
<li>
    <a href="#" class="link-submenu">Duchovný život</a>  {{-- <a href="{{ secure_url('duchovny-zivot') }}">Duchovný život</a> --}}
    <ul class="sub-menu">
        <li>
            <a href="{{ secure_url('duchovny-zivot/sviatosti') }}">Sviatosti</a>
            <!-- Krst  -->
            <!-- Birmovanie  -->
            <!-- Eucharistia  -->
            <!-- Svätá spoveď  -->
            <!-- Posvätný stav  -->
            <!-- Pomazanie chorých  -->
            <!-- Manželstvo  -->
        </li>
        <li>
            <a href="{{ secure_url('duchovny-zivot/sveteniny') }}">Sväteniny</a>
            <!-- Pobožnosti  -->
            <!-- Požehnania  -->
            <!-- Putovanie  -->
            <!-- Ministériá  -->
            <!-- Pohreb  -->
        </li>
        <li>
            <a href="{{ secure_url('duchovny-zivot/zivot-viery') }}">Život viery</a>
            <!-- Viera v Boha  -->
            <!-- Sväté písmo  -->
            <!-- Božie prikázania  -->
            <!-- Cirkevné prikázania  -->
            <!-- Modlitba  -->
            <!-- Etiketa v kostole  -->
        </li>
        {{-- <li>
            <a href="{{ secure_url('duchovny-zivot/svate-omse') }}">Sväté omše</a>
        </li> --}}
    </ul>
</li>

<li>
    <a href="{{ secure_url('kontakty') }}">Kontakty</a>
    <!-- Kontaktný formulár  -->
    <!-- Mapa  -->
    <!-- Kňazi  -->
</li>

<li class="search_icon">
    <!-- Button trigger modal -->
    <span data-bs-toggle="modal" data-bs-target="#modalSearch"><i class="fa-solid fa-magnifying-glass"></i></span>
</li>

@env(['local'])
    @auth
        <li><a class="text-primary" href="{{ route('admin.dashboard') }}"><small>Admin</small></a></li>
    @else
        <li><a class="text-primary" href="{{ route('login') }}" rel="nofollow"><small>Login</small></a></li>
        {{-- @if (Route::has('register'))
        <li><a class="text-template" href="{{ route('register') }}" rel="nofollow">Registrovať</a></li>
        @endif --}}
    @endauth
@endenv
