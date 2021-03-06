@php
    $userImage = Auth::user()->getFirstMediaUrl('avatar', 'crop') ?: "http://via.placeholder.com/100x100";
    $userName = Auth::user()->name ?? 'Anonym';
    $rola = Auth::user()->roles->first()->name ?? 'bez role';
    $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout');
    $profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout');

    if (config('adminlte.usermenu_profile_url', false)){
        $profile_url = Auth::user()->adminlte_profile_url();
    }

    if (config('adminlte.use_route_url', false)){
        $profile_url = $profile_url ? route($profile_url) : '';
        $logout_url = $logout_url ? route($logout_url) : '';
    } else {
        $profile_url = $profile_url ? url($profile_url) : '';
        $logout_url = $logout_url ? url($logout_url) : '';
    }

    $remember = collect(Cookie::get())
                    ->filter(function ($val, $key) {
                        return strpos($key, 'remember_web') !== false;
                    })
                    ->first();
    $time = (!is_null($remember) AND $remember[0] === '1') ? '<i class="fa-solid fa-infinity"></i>' : config('session.lifetime').':00';
@endphp

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
            <span class="ml-2 small badge badge-warning" id="time">{!! $time !!}</span>
        </div>
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        {{-- User menu header --}}
        @if(!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
            <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
                @if(!config('adminlte.usermenu_image')) h-auto @endif">
                @if(config('adminlte.usermenu_image'))
                    <img src="{{ $userImage }}"
                        class="img-circle elevation-2"
                        alt="{{ $userName }}">
                @endif
                <p class="text-left ml-1 @if(!config('adminlte.usermenu_image')) mt-0 @endif">
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
                        <i class="fa-solid fa-fw fa-user text-lightblue"></i>
                        {{ __('adminlte::menu.profile') }}
                    </a>
                @endif
            @endcan
            <form class="float-right" id="logout-form" action="{{ $logout_url }}" method="POST">
                @csrf
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                <button
                    class="btn btn-default btn-flat @if(!$profile_url) btn-block @endif"
                    href="#"
                    type="submit"
                >
                    <i class="fa-solid fa-fw fa-power-off text-red"></i>
                    {{ __('adminlte::adminlte.log_out') }}
            </button>
            </form>
        </li>

    </ul>

</li>
