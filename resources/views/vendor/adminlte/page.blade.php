@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        <!-- Top Navbar -->
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif
        <!-- Top Navbar End -->

        <!-- Left Main Sidebar -->
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif
        <!-- Left Main Sidebar End -->

        <!-- Content Header -->
        @stack('content_header')
        <!-- Content Header End -->

        <!-- Content Wrapper -->
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty
        <!-- Content Wrapper End -->

        <!-- Content Footer -->
        @stack('content_footer')
        <!-- Content Footer End -->

        <!-- Footer -->
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif
        <!-- Footer End -->

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif
        {{-- Right Control Sidebar End --}}

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
