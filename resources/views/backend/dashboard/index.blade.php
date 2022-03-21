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

        <div class="row">
            @can(
                'cache.start',
                'cache.stop',
                'cache.reset',
            )
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-muted">
                                Správa cache
                            </h3>
                        </div>
                        <div class="card-body d-flex flex-wrap justify-content-center">
                            @can('cache.start')
                                <a href="{{ route('cache.start') }}" class="btn btn-success m-2">Optimize ŠTART</a>
                            @endcan
                            @can('cache.reset')
                                <a href="{{ route('cache.reset') }}" class="btn btn-warning m-2">Optimize RESET</a>
                            @endcan
                            @can('cache.stop')
                                <a href="{{ route('cache.stop') }}" class="btn btn-danger m-2">Optimize STOP</a>
                            @endcan
                        </div>
                    </div>
                </div>
            @endcan

            @can(
                'cache.info',
            )
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-muted">
                                Info
                            </h3>
                        </div>
                        <div class="card-body d-flex flex-wrap justify-content-center">
                            @can('cache.info')
                                <a href="{{ route('cache.info') }}" class="btn btn-info m-2">PHP info</a>
                            @endcan
                        </div>
                    </div>
                </div>
            @endcan

            @can(
                'cache.data.start',
                'cache.data.stop',
                'cache.data.reset',
            )
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-muted">
                                Správa dátovej cache
                            </h3>
                        </div>
                        <div class="card-body d-flex flex-wrap justify-content-center">
                            @can('cache.data.start')
                                <a href="{{ route('cache.data.start') }}" class="btn btn-success m-2">Cache data ŠTART</a>
                            @endcan
                            @can('cache.data.reset')
                                <a href="{{ route('cache.data.reset') }}" class="btn btn-warning m-2">Cache data RESET</a>
                            @endcan
                            @can('cache.data.stop')
                                <a href="{{ route('cache.data.stop') }}" class="btn btn-danger m-2">Cache data STOP</a>
                            @endcan
                        </div>
                    </div>
                </div>
            @endcan

            @can(
                'cache.check.url',
                'cache.check.all-url',
            )
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-muted">
                                Statické stránky
                            </h3>
                        </div>
                        <div class="card-body d-flex flex-wrap justify-content-center">
                            @can('cache.check.all-url')
                                <a href="{{ route('cache.check.all-url') }}" class="btn btn-danger m-2">Scanovať všetky URL</a>
                            @endcan
                        </div>
                    </div>
                </div>
            @endcan
        </div>
        <div class="row">
            @can(
                'cache.jobs.delete',
                'cache.jobs.restart',
            )
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-muted">
                                Statické stránky
                            </h3>
                        </div>
                        <div class="card-body d-flex flex-wrap justify-content-center">
                            @can('cache.jobs.delete')
                                <a href="{{ route('cache.jobs.delete') }}" class="btn btn-info m-2">Vymazať chybné úlohy</a>
                            @endcan
                            @can('cache.jobs.restart')
                                <a href="{{ route('cache.jobs.restart') }}" class="btn btn-info m-2">Reštartovať nedokončené úlohy</a>
                            @endcan
                        </div>
                    </div>
                </div>
            @endcan
        </div>

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
                        @foreach($pages as $page)
                            <div class="row py-1">
                                <div class="col-4">
                                    @if ($page->check_url == 1)
                                        <i class="fas fa-check fa-lg text-success mr-3"></i>
                                    @else
                                        <i class="far fa-times-circle fa-lg text-danger mr-3"></i>
                                    @endif
                                    {{ $page->title }}
                                </div>
                                <div class="col-8">
                                    <a href="{{ config('app.url').'/'.$page->url }}" target="_blank" rel="noopener noreferrer">
                                        <span class="small text-info">{{ config('app.url').'/'}}</span>{{ $page->url }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
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

