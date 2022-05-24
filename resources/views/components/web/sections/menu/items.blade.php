{{-- <li><a href="{{ secure_url('test') }}" class="text-muted"><em><small>Test</small></em></a></li> --}}
{{-- <li><a href="{{ secure_url('zoznam-statickych-stranok') }}" class="text-muted"><em><small>Podstránky</small></em></a></li> --}}


<li><a href="{{ secure_url('oznamy/farske-oznamy') }}">Oznamy</a></li>
<li><a href="{{ route('article.all') }}">Články</a></li>

<li>
    {{-- <a href="{{ secure_url('o-nas') }}">O nás</a> --}}
    <a class="link-submenu">O nás</a>
    <ul class="sub-menu">
        <li><a href="{{ secure_url('o-nas/historia') }}">História</a></li>
            <!-- Dejiny farnosti -->
            <!-- Farári v Detve -->
            <!-- Kapláni v Detve -->
            <!-- Duchovné povolania -->
            <!-- Kňazi pochovaní v Detve -->
            <!-- Štatistiky od r. 2000 -->
            <!-- Chudobienec -->
            <!-- Vianoce -->
            <!-- Významné osobnosti -->
                <!-- Anton Prokop -->
                <!-- Imrich Ďurica -->
                <!-- Jozef Závodský -->
                <!-- Karol Anton Medvecký -->
                <!-- Mons. Ján Štrbáň -->
                <!-- prof. Jozef Búda -->

        <li><a href="{{ secure_url('o-nas/patron-farnosti') }}">Patrón farnosti</a></li>
        <li><a href="{{ secure_url('o-nas/sakralne-objekty') }}">Sakrálne objekty</a></li>
            <!-- Farský kostol -->
            <!-- Kláštorný kostol -->
            <!-- Kalvária, kaplnky -->
            <!-- Prícestné sochy -->
            <!-- Detvianske kríže -->
        <li><a href="{{ secure_url('o-nas/pastoracia') }}">Pastorácia</a></li>
            <!-- Farská rada -->
            <!-- Lektori + Rozpisy -->
            <!-- Akolyti  + Rozpisy -->
            <!-- Miništranti -->
            <!-- Kostolníci -->
            <!-- Organisti, speváci -->
            <!-- Spevokoly, dychovka -->
            <!-- Vyučovanie náboženstva -->
        {{-- <li><a href="{{ secure_url('test') }}" class="text-danger">Test - ZMAZAŤ</a></li> --}}
        {{-- <li><a href="{{ route('list-pages') }}" class="text-danger">Zoznam stránok - ZMAZAŤ</a></li> --}}
    </ul>
</li>

<li><a href="{{ secure_url('spolocenstva') }}">Spoločenstvá</a></li>
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


<li>
    {{-- <a href="{{ secure_url('duchovny-zivot') }}">Duchovný život</a> --}}
    <a class="link-submenu">Duchovný život</a>
    <ul class="sub-menu">
        <li><a href="{{ secure_url('duchovny-zivot/sviatosti') }}">Sviatosti</a></li>
        <!-- Krst  -->
        <!-- Birmovanie  -->
        <!-- Eucharistia  -->
        <!-- Svätá spoveď  -->
        <!-- Posvätný stav  -->
        <!-- Pomazanie chorých  -->
        <!-- Manželstvo  -->
        <li><a href="{{ secure_url('duchovny-zivot/sveteniny') }}">Sväteniny</a></li>
        <!-- Pobožnosti  -->
        <!-- Požehnania  -->
        <!-- Putovanie  -->
        <!-- Ministériá  -->
        <!-- Pohreb  -->
        <li><a href="{{ secure_url('duchovny-zivot/zivot-viery') }}">Život viery</a></li>
        <!-- Viera v Boha  -->
        <!-- Sväté písmo  -->
        <!-- Božie prikázania  -->
        <!-- Cirkevné prikázania  -->
        <!-- Modlitba  -->
        <!-- Etiketa v kostole  -->
        {{-- <li><a href="{{ secure_url('duchovny-zivot/svate-omse') }}">Sväté omše</a></li> --}}
    </ul>
</li>

<li><a href="{{ secure_url('kontakty') }}">Kontakty</a></li>
<li class="search_icon">
    <!-- Button trigger modal -->
    <span data-bs-toggle="modal" data-bs-target="#modalSearch"><i class="fa-solid fa-search"></i></span>
</li>

{{-- @auth --}}
    {{-- <li><a class="text-template text-muted ms-5" href="{{ route('admin.dashboard') }}"><small>Admin</small></a></li> --}}
{{-- @else --}}
    {{-- <li><a class="text-template text-muted ms-5" href="{{ route('login') }}" rel="nofollow"><small>Login</small></a></li> --}}
    {{-- @if (Route::has('register'))
    <li><a class="text-template" href="{{ route('register') }}" rel="nofollow">Registrovať</a></li>
    @endif --}}
{{-- @endauth --}}
