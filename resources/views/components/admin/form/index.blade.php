@props([
    'controlerName' => '',
    'columns' => 8,
    'uploadFiles' => 'false',
    'typeForm' => '',
    'identificator' => null,
    'linkActionCreate' => null,
    'linkBack' => null,
    'linkEdit' => null,
    'linkActionEdit' => null,
    'createdInfo' => '',
    'createdBy' => '',
    'updatedInfo' => '',
    'updatedBy' => '',
])
@php
    if($typeForm == '' OR is_null($typeForm)) $typeForm = 'create';

    $maxXL = min($columns, 12);
    $maxLG = min($columns + 1, 12);
    $maxMD = min($columns + 2, 12);

    $texts = Str::replace('.','-', $controlerName);
    $headerTitle = __('backend-texts.'.$texts.'.header_'.$typeForm );
    $headerDescription = __('backend-texts.'.$texts.'.description_'.$typeForm );

    if (is_null($linkBack)) {
        $linkBack = Route::has($controlerName . '.index') ? route($controlerName . '.index', $identificator) : null;
    }
    if (is_null($linkActionCreate)) {
        $linkActionCreate = Route::has($controlerName . '.store') ? route($controlerName . '.store', $identificator) : null;
    }
    if (is_null($linkEdit)) {
        $linkEdit = Route::has($controlerName . '.edit') ? route($controlerName . '.edit', $identificator) : null;
    }
    if (is_null($linkActionEdit)) {
        $linkActionEdit = Route::has($controlerName . '.destroy') ? route($controlerName . '.destroy', $identificator) : null;
    }

@endphp
<!--  Component: Form - Start -->
<div class="row pt-4">
    <div {{ $attributes->merge(['class' => "col-md-".$maxMD." col-lg-".$maxLG." col-xl-".$maxXL." mx-auto"]) }}>
        <div class="card">

            @if( $headerTitle != '' )
                <div class="card-header text-muted border-bottom-0 pb-0 ">
                    <a href="{{ $linkBack }}" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                    <h1>{{ $headerTitle }}</h1>
                    @if( $headerDescription != '' )
                        <div class="lead">
                            {{ $headerDescription }}
                        </div>
                    @endif
                </div>
            @endif

            <div class="card-body">

            {{-- TODO: ZMAZAŤ - iba pre vývoj --}}
                {{-- @if ($errors->any())
                    <div class="alert alert-warning p-0 d-flex justify-content-center">
                        <ul class="list-unstyled align-self-center my-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
            {{-- TODO: ZMAZAŤ - iba pre vývoj --}}

                @if ( $typeForm == 'edit')
                    <form id="edit-form" method="post" action="{{ $linkActionEdit }}" @if($uploadFiles == 'true')enctype="multipart/form-data"@endif >
                    @method('PATCH')
                @else
                    <form id="add-form" method="post" action="{{ $linkActionCreate }}" @if($uploadFiles == 'true')enctype="multipart/form-data"@endif >
                @endif

                    @csrf

                    <!--  SLOT - Start -->
                    {{ $slot }}
                    <!--  SLOT - End -->

                    <div class="mt-3 d-flex justify-content-end">
                        <a href="{{ $linkBack }}" class="btn btn-outline-secondary px-5">
                            <i class="fas fa-reply mr-2"></i>
                            Späť
                        </a>
                        @if ( $typeForm == 'show')
                            @can([
                                $controlerName . '.edit',
                                $controlerName . '.update'
                            ])
                                <a href="{{ $linkEdit }}" class="btn bg-gradient-primary px-5 ml-2">
                                    <i class="fas fa-edit mr-2"></i>
                                    Editovať
                                </a>
                            @endcan
                        @else
                            @can([
                                $controlerName . '.create',
                                $controlerName . '.store'
                            ])
                                <button id="btnSave" type="submit" class="btn bg-gradient-success px-5 ml-2">
                                    <i class="fas fa-save mr-2"></i>
                                    Uložiť
                                </button>
                            @endcan
                        @endif
                    </div>

                </form>
            </div>

            @if( $createdInfo != '' OR $createdBy != '' OR $updatedInfo != '' OR $updatedBy != '' )
                {{-- @if ( $typeForm == 'edit' ) --}}
                    <div class="card-footer text-muted d-flex flex-column flex-sm-row small">
                        <div class="mr-auto">
                            @if( $createdInfo != '' )
                                <span class="small mr-2">Vytvorené:</span> {{ $createdInfo }}
                            @endif
                            @if( $createdBy != '' )
                                <br>
                                <span class="small mr-2">Vytvoril:</span> {{ $createdBy }}
                            @endif
                        </div>
                        <div class="mt-2 mt-sm-0">
                            @if( $updatedInfo != '' )
                                <span class="small mr-2">Naposledy upravené:</span> {{ $updatedInfo }}
                            @endif
                            @if( $updatedBy != '' )
                                <br>
                                <span class="small mr-2">Upravil:</span> {{ $updatedBy }}
                            @endif
                        </div>
                    </div>
                {{-- @endif --}}
            @endif

        </div>
    </div>
</div>
<!--  Component: Form - End -->
