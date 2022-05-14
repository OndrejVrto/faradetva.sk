@props([
    'controlerName' => '',

    'showLink' => null,
    'editLink' => null,
    'deleteLink' => null,

    'restoreLink' => null,
    'forceDeleteLink' => null,

    'identificator' => null,

    'trashed' => false,
    'trashedID' => null,
])

@php
    if(is_null($showLink)) {
        $showLink = Route::has($controlerName . '.show') ? route($controlerName . '.show', $identificator) : null;
    }
    if(is_null($editLink)) {
        $editLink = Route::has($controlerName . '.edit') ? route($controlerName . '.edit', $identificator) : null;
    }
    if(is_null($deleteLink)) {
        $deleteLink = Route::has($controlerName . '.destroy') ? route($controlerName . '.destroy', $identificator) : null;
    }
    if (is_null($restoreLink)) {
        $restoreLink = Route::has($controlerName.'.restore') ? route($controlerName.'.restore', $trashedID) : null;
    }
    if (is_null($forceDeleteLink)) {
        $forceDeleteLink = Route::has($controlerName.'.force_delete') ? route($controlerName.'.force_delete', $trashedID) : null;
    }

    $trashed = $trashed ? 'true' : 'false';
@endphp

@if ($trashed === 'false')
    <td class="text-center">
        <div class="d-inline-flex">
            @isset($showLink)
                @can($controlerName . '.show')
                    <a href="{{ $showLink }}" class="w35 ml-1 btn btn-outline-success btn-sm btn-flat" title="Zobraziť"><i class="fa-solid fa-eye"></i></a>
                @endcan
            @endisset

            @isset($editLink)
                @can([
                    $controlerName . '.edit',
                    $controlerName . '.update'
                ])
                    <a href="{{ $editLink }}" class="w35 ml-1 btn btn-outline-primary btn-sm btn-flat" title="Editovať"><i class="fa-solid fa-edit"></i></a>
                @endcan
            @endisset

            @isset($deleteLink)
                @can($controlerName . '.destroy')
                    <form class="delete-form" action="{{ $deleteLink }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="w35 ml-1 btn btn-outline-danger btn-sm btn-flat" type="submit" title="Vymazať"><i class="fa-regular fa-trash-alt"></i></button>
                    </form>
                @endcan
            @endisset
        </div>
    </td>
    @if ($restoreLink OR $forceDeleteLink)
        @canany([
            $controlerName . '.restore',
            $controlerName . '.force_delete'
        ])
            <td></td>
        @endcanany
    @endif
@elseif ($restoreLink OR $forceDeleteLink AND $trashed === 'true')
    @canany([
        $controlerName . '.restore',
        $controlerName . '.force_delete'
    ])
        <td></td>
        <td class="text-center">
            <div class="d-inline-flex">
                @isset($restoreLink)
                    @can($controlerName.'.restore')
                        <form class="restore-form" action="{{ $restoreLink }}" method="post">
                            @csrf
                            <button class="w35 ml-1 btn btn-outline-success btn-sm btn-flat" type="submit" title="Obnoviť">
                                <i class="fa-regular fa-thumbs-up"></i>
                            </button>
                        </form>
                    @endcan
                @endisset

                @isset($forceDeleteLink)
                    @can($controlerName.'.force_delete')
                        <form class="force-delete-form" action="{{ $forceDeleteLink }}" method="post">
                            @csrf
                            <button class="w35 ml-1 btn btn-outline-danger btn-sm btn-flat" type="submit" title="Vymazať navždy">
                                <i class="fa-regular fa-thumbs-down"></i>
                            </button>
                        </form>
                    @endcan
                @endisset
            </div>
        </td>
    @endcanany
@endif
