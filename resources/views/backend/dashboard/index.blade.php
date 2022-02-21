@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.dashboard_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.dashboard_description') )
{{-- @section('content_header', config('farnost-detva.admin_texts.dashboard_header') ) --}}

@section('content_breadcrumb')
    {{ Breadcrumbs::render('admin.home') }}
@stop

@section('content')
        @auth
            @role('Super Administrátor')
                <h2 class="text-danger text-center mark"> Ak vidíš tento text fungujú Gates správne a si Super-Admin.</h2>
            @endrole
        @endauth

        @can(
            'cache-data.stop',
            'cache.stop',
            'cache.start',
            'cache.reset',
        )
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-muted">
                            Správa cache
                        </h3>
                    </div>
                    <div class="card-body">
                        @can('cache-data.stop')
                            <a href="{{ route('cache-data.stop') }}" class="btn btn-info px-3 mx-2">Cache data CLEAR</a>
                        @endcan
                        @can('cache.stop')
                        <a href="{{ route('cache.stop') }}" class="btn btn-warning px-3 mx-2">Cache STOP</a>
                        @endcan
                        @can('cache.start')
                            <a href="{{ route('cache.start') }}" class="btn btn-danger px-3 mx-2">Cache ŠTART</a>
                        @endcan
                        @can('cache.reset')
                            <a href="{{ route('cache.reset') }}" class="btn btn-danger px-3 mx-2">Cache RESET</a>
                        @endcan
                    </div>
                    <div class="card-footer text-danger">
                        ! POZOR !  Cache používaj uvážlivo len v ostrej prevádzke.
                    </div>
                </div>
            </div>
        @endcan

        <div class="row justify-content-end">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-muted">
                            Štatistiky
                        </h3>
                    </div>
                    <div class="card-body">
                        TODO
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-muted">Zoznam statických stránok</h3>
                    </div>
                    <div class="card-body">
                        {{-- @foreach($pages as $page)
                            <div class="row py-1">
                                @php
                                    //** Check if the Url works
                                    $url = config('app.url') . '/' . $page->url;
                                    $headers = @get_headers($url);
                                    $exists = ($headers && strpos( $headers[0], '200')) ? true : false;
                                @endphp
                                <div class="col-4">
                                    @if ($exists)
                                        <i class="fas fa-check fa-lg text-success mr-3"></i>
                                    @else
                                        <i class="far fa-times-circle fa-lg text-danger mr-3"></i>
                                    @endif
                                    {{ $page->title }}
                                </div>
                                <div class="col-8">
                                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                                        <span class="small text-info">{{ config('app.url').'/'}}</span>{{ $page->url }}
                                    </a>
                                </div>
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <img src="{{ URL::asset('images/backend/dashboard-visual-data-amico.svg') }}" class="w-100" alt="Sketch obrázok vizualizácie grafov na tabuľu.">
            </div>
        </div> --}}
@stop

