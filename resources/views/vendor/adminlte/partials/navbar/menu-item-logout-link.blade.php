@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

@if (config('adminlte.use_route_url', false))
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif

<li class="nav-item">
    <form id="logout-form" action="{{ $logout_url }}" method="POST">
        @csrf
        @if(config('adminlte.logout_method'))
            {{ method_field(config('adminlte.logout_method')) }}
        @endif
        <button class="nav-link" href="#" type="submit">
            <i class="fa-solid fa-fw fa-power-off text-red"></i>
            {{ __('adminlte::adminlte.log_out') }}
        </button>
    </form>
</li>
