@props([
    'controlerName' => '',
    'identificator'
])
@php
    $showLink = Route::has($controlerName . '.show') ? route($controlerName . '.show', $identificator) : null;
    $editLink = Route::has($controlerName . '.edit') ? route($controlerName . '.edit', $identificator) : null;
    $deleteLink = Route::has($controlerName . '.destroy') ? route($controlerName . '.destroy', $identificator) : null;
@endphp

@isset($showLink)
    @can($controlerName . '.show')
        <td>
            <a href="{{ $showLink }}" class="btn btn-outline-success btn-sm btn-flat" title="Zobraziť"><i class="fas fa-eye"></i></a>
        </td>
    @else
        <td></td>
    @endcan
@endisset

@isset($editLink)
    @can([
        $controlerName . '.edit',
        $controlerName . '.update'
    ])
        <td>
            <a href="{{ $editLink }}" class="btn btn-outline-primary btn-sm btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
        </td>
    @else
        <td></td>
    @endcan
@endisset

@isset($deleteLink)
    @can($controlerName . '.destroy')
        <td class="form-delete-wraper text-center">
            <form class="delete-form" action="{{ $deleteLink }}" method="post" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm btn-flat" type="submit" title="Vymazať"><i class="far fa-trash-alt"></i></button>
            </form>
        </td>
    @else
        <td></td>
    @endcan
@endisset
