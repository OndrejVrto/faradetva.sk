<li>
    <a href="{{ secure_url('farske-oznamy') }}">Oznamy</a>
</li>

<li>
    <a href="{{ route('article.all') }}">Články</a>
</li>

<li>
    <a href="{{ secure_url('o-nas') }}" class="link-submenu">O nás</a>
    <ul class="sub-menu">
        <li>
            <a href="{{ secure_url('o-nas/historia') }}">História</a>
            <!-- Dejiny farnosti -->
            <!-- Farári v Detve -->
            <!-- Kapláni v Detve -->
            <!-- Duchovné povolania -->
            <!-- Kňazi pochovaní v Detve -->
            <!-- Chudobienec -->
            <!-- Vianoce v Detve -->
            <!-- Štatistiky farnosti -->
        </li>
        <li>
            <a href="{{ secure_url('o-nas/patron-farnosti') }}">Patrón farnosti</a>
        </li>
        <li>
            <a href="{{ secure_url('o-nas/sakralne-objekty') }}">Sakrálne objekty</a>
            <!-- Farský kostol -->
            <!-- Kláštorný kostol -->
            <!-- Kalvária -->
            <!-- Kaplnky -->
            <!-- Prícestné sochy -->
            <!-- Detvianske kríže -->
        </li>
        <li>
            <a href="{{ secure_url('o-nas/vyznamne-osobnosti') }}">Významné osobnosti</a>
            <!-- Karol Anton Medvecký -->
            <!-- Anton Prokop -->
            <!-- Mons. Ján Štrbáň -->
            <!-- Štefan Vlk -->
            <!-- prof. Jozef Búda -->
            <!-- Imrich Ďurica -->
            <!-- Jozef Závodský -->
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
        {{-- <li>
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
        </li> --}}
    </ul>
</li>

<li>
    <a href="{{ secure_url('duchovny-zivot') }}" class="link-submenu">Duchovný život</a>
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

@env(['local'])
    {{-- Globálne vyhľadávanie nefunguje kvôli hostingu --}}
    <li class="search_icon">
        <!-- Button trigger modal -->
        <span data-bs-toggle="modal" data-bs-target="#modalSearch">
            <i class="fa-solid fa-magnifying-glass"></i>
        </span>
    </li>
@endenv

@env(['local'])
    @auth
        <li>
            <a class="text-primary" href="{{ route('admin.dashboard') }}">
                <small>Admin</small>
            </a>
        </li>
    @else
        <li>
            <a class="text-primary" href="{{ route('login') }}" rel="nofollow">
                <small>Login</small>
            </a>
        </li>
        {{-- @if (Route::has('register'))
        <li><a class="text-template" href="{{ route('register') }}" rel="nofollow">Registrovať</a></li>
        @endif --}}
    @endauth
@endenv
