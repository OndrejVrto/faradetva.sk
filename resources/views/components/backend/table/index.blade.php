@props([
    'controlerName' => '',
    'columns' => null,
    'createLink' => null,
    'createBtn' => null,
    'createNote' => null,
    'paginator' => null,
    'headerSpecial' => '',
    'linkBack' => route('admin.dashboard'),
    'table_header',
    'table_body',
    'table_footer',
])
@php
    $maxXL = min($columns, 12);
    $maxLG = min($columns + 2, 12);
    $maxMD = min($columns + 4, 12);
    $texts = Str::replace('.','-', $controlerName);
    $headerTitle = __('backend-texts.'.$texts.'.header' );
    $headerDescription = __('backend-texts.'.$texts.'.description' );
    if (is_null($createLink)) {
        $createLink = Route::has($controlerName . '.create') ? route($controlerName . '.create') : null;
    }
    $onlyClearLink   = route($controlerName . '.index');
    $onlyArchiveLink = route($controlerName . '.index', ['only-deleted']);
    $withArchiveLink = route($controlerName . '.index', ['with-deleted']);
@endphp

<div class="row justify-content-center">

    <div {{ $attributes->merge(['class' => "col-md-".$maxMD." col-lg-".$maxLG." col-xl-".$maxXL]) }}>
        <div class="card">
            @if( isset($headerTitle) AND $headerTitle != '' )
                <span class="card-header text-muted border-bottom-0 pb-0 ">
                    <a href="{{ $linkBack }}" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                    <h1>
                        @if(isset($headerSpecial) AND $headerSpecial != '')
                            {!! $headerSpecial !!}
                        @else
                            {{ $headerTitle }}
                        @endif
                    </h1>
                    @if( $headerDescription != '' )
                        <div class="lead">
                            {{ $headerDescription }}
                        </div>
                    @endif
                </span>
            @endif

            <div class="card-header row justify-content-end border-0">
                @isset($createNote)
                    <div class="col-md-8 mt-3 d-flex justify-content-start align-items-start">
                        <span class="pr-2 py-1 text-info hoverDiv">
                            <i class="mr-2 fas fa-info-circle"></i>
                            {{ $createNote }}
                        </span>
                    </div>
                @endisset

                @can([
                    $controlerName . '.create',
                    $controlerName . '.store'
                ])
                    <div class="col-md-4 mt-lg-n5 d-flex justify-content-end align-items-end">
                        <a href="{{ $createLink }}" class="btn bg-gradient-warning btn-flat flex-fill flex-lg-grow-0 px-4" title="Vytvoriť">
                            {{ $createBtn }}
                        </a>
                    </div>
                @endcan
            </div>

            @isset($top)
                <div class="card-header row border-0 pt-0">
                    <div class="col">
                        {{ $top }}
                    </div>
                </div>
            @endisset

            <div class="card mx-2 mx-lg-3">
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
                        <thead>
                            <tr class="table-primary">
                                {{ $table_header }}
                            </tr>

                            @if (Route::has($controlerName . '.restore'))
                                @canany([
                                    $controlerName . '.restore',
                                    $controlerName . '.force_delete',
                                ])
                                    <div class="card-footer d-flex justify-content-end">
                                        <a href="{{ $onlyClearLink }}" class="btn btn-outline-secondary btn-flat btn-sm mr-2 px-3" title="Zobraziť aktívne položky">
                                            Aktívne
                                        </a>
                                        <a href="{{ $withArchiveLink }}" class="btn btn-outline-secondary btn-flat btn-sm mx-2 px-3" title="Zobraziť všetky položky.">
                                            Všetky
                                        </a>
                                        <a href="{{ $onlyArchiveLink }}" class="btn btn-outline-secondary btn-flat btn-sm ml-2 px-3" title="Zobraziť zmazané položky.">
                                            Zmazané
                                        </a>
                                    </div>
                                @endcanany
                            @endif
                        </thead>
                        <tbody>
                            {{ $table_body }}
                        </tbody>

                        @isset($table_footer)
                            <tfoot>
                                <tr class="table-primary">
                                    {{ $table_footer }}
                                </tr>
                            </tfoot>
                        @endisset

                    </table>
                </div>
            </div>

            @isset($paginator)
                <!-- Paginator Start-->
                <div class="row justify-content-center pt-2">
                    {!! $paginator !!}
                </div>
                <!-- Paginator end-->
            @endisset
        </div>
    </div>
</div>
