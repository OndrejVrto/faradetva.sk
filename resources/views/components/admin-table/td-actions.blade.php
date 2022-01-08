@props([
	'showLink' => null,
	'editLink' => null,
	'deleteLink' => null,
])

@isset($showLink)
	<td>
		<a href="{{ $showLink }}" class="btn btn-outline-success btn-sm btn-flat" title="Zobraziť"><i class="fas fa-eye"></i></a>
	</td>
@endisset

@isset($editLink)
	<td>
		<a href="{{ $editLink }}" class="btn btn-outline-primary btn-sm btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
	</td>
@endisset

@isset($deleteLink)
	<td class="form-delete-wraper text-center">
		<form class="delete-form" action="{{ $deleteLink }}" method="post" style="display: inline-block">
			@csrf
			@method('DELETE')
			<button class="btn btn-outline-danger btn-sm btn-flat" type="submit" title="Vymazať"><i class="far fa-trash-alt"></i></button>
		</form>
	</td>
@endisset
