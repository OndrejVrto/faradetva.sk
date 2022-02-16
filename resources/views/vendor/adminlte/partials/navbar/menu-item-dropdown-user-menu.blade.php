@php( $userImage = Auth::user()->getFirstMediaUrl('avatar', 'crop') ?: "http://via.placeholder.com/100x100" )
@php( $userName = Auth::user()->name ?? 'Anonym' )
@php( $rola = Auth::user()->roles->first()->name ?? 'bez role' )
@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
@php( $profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout') )
@php( $time = config('session.lifetime').':00' )

@if (config('adminlte.usermenu_profile_url', false))
    @php( $profile_url = Auth::user()->adminlte_profile_url() )
@endif

@if (config('adminlte.use_route_url', false))
    @php( $profile_url = $profile_url ? route($profile_url) : '' )
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
    @php( $profile_url = $profile_url ? url($profile_url) : '' )
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif

<li class="nav-item dropdown user-menu">

    {{-- User menu toggler --}}
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        @if(config('adminlte.usermenu_image'))
            <img src="{{ $userImage }}"
                class="user-image img-circle elevation-2"
                alt="{{ $userName }}">
        @endif
        <div @if(config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>
            {{ $userName }}
            <span class="ml-2 small text-warning">({{ $rola }})</span>
            <span class="ml-2 small badge badge-warning" id="time">{{ $time }}</span>
        </div>
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        {{-- User menu header --}}
        @if(!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
            <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
                @if(!config('adminlte.usermenu_image')) h-auto @endif" style="height: 230px;">
                @if(config('adminlte.usermenu_image'))
                    <img src="{{ $userImage }}"
                        class="img-circle elevation-2"
                        alt="{{ $userName }}">
                @endif
                <p class="text-left ml-5 @if(!config('adminlte.usermenu_image')) mt-0 @endif">
                        <span class="text-danger small pr-2">Meno: </span>{{ Auth::user()->name }}
                    @if(config('adminlte.usermenu_desc'))
                        <br>
                        <span class="text-danger small pr-2">Nick: </span>{{ Auth::user()->nick }}
                        <br>
                        <span class="text-danger small pr-2">Mail: </span>{{ Auth::user()->adminlte_desc() }}
                        <br>
                        <span class="text-danger small pr-2">Rola: </span>{{ $rola }}
                    @endif
                </p>
            </li>
        @else
            @yield('usermenu_header')
        @endif

        {{-- Configured user menu links --}}
        @each('adminlte::partials.navbar.dropdown-item', $adminlte->menu("navbar-user"), 'item')

        {{-- User menu body --}}
        @hasSection('usermenu_body')
            <li class="user-body">
                @yield('usermenu_body')
            </li>
        @endif

        {{-- User menu footer --}}
        <li class="user-footer">
            @can('users.show')
                @if($profile_url)
                    <a href="{{ $profile_url }}" class="btn btn-default btn-flat">
                        <i class="fa fa-fw fa-user text-lightblue"></i>
                        {{ __('adminlte::menu.profile') }}
                    </a>
                @endif
            @endcan
            <a class="btn btn-default btn-flat float-right @if(!$profile_url) btn-block @endif"
                href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-power-off text-red"></i>
                    {{ __('adminlte::adminlte.log_out') }}
            </a>
            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>
        </li>

    </ul>

</li>
