@props([
    'controlerName' => '',
    'columns' => 8,
    'files' => 'false',
    'typeForm' => '',
    'identificatorEdit' => null,
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
    $headerTitle = config('farnost-detva.admin_texts.'.$controlerName.'_header_'.$typeForm );
    $headerDescription = config('farnost-detva.admin_texts.'.$controlerName.'_description_'.$typeForm );
    $linkActionEdit = route( $controlerName . '.update', $identificatorEdit);
    $linkActionCreate = route( $controlerName . '.store');
    $linkBack = route( $controlerName . '.index');
    $linkEdit = route( $controlerName . '.edit', $identificatorEdit);
@endphp

<div class="row">
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

                @if ( $typeForm == 'edit')
                    <form id="edit-form" method="post" action="{{ $linkActionEdit }}" @if($files == 'true')enctype="multipart/form-data"@endif >
                    @method('PATCH')
                @else
                    <form id="add-form" method="post" action="{{ $linkActionCreate }}" @if($files == 'true')enctype="multipart/form-data"@endif >
                @endif

                    @csrf

                    {{ $slot }}

                    <div class="mt-3 d-flex justify-content-end">
                        <a href="{{ $linkBack }}" class="btn btn-outline-secondary px-5">
                            <i class="fas fa-reply mr-2"></i>
                            Späť
                        </a>
                        @if ( $typeForm == 'show')
                            @can('users.edit')
                                <a href="{{ $linkEdit }}" class="btn bg-gradient-primary px-5 ml-2">
                                    <i class="fas fa-edit mr-2"></i>
                                    Editovať
                                </a>
                            @endcan
                        @else
                            <button id="btnSave" type="submit" class="btn bg-gradient-success px-5 ml-2">
                                <i class="fas fa-save mr-2"></i>
                                Uložiť
                            </button>
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

@push('js')
    <script>
        $('#btnSave').click(function() {
            $('#btnSave')
                .html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Ukladám...')
                .addClass('disabled');
        });
    </script>
@endpush