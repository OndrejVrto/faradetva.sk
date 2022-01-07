@props([
	'editLink' => '#',
	'deleteLink' => '#',
])
<td>
	<a href="{{ $editLink }}" class="btn bg-gradient-primary btn-sm btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
</td>

<td class="form-delete-wraper text-center">
	<form class="delete-form" action="{{ $deleteLink }}" method="post" style="display: inline-block">
		@csrf
		@method('DELETE')
		<button class="btn btn-outline-danger btn-sm btn-flat" type="submit" title="Vymazať"><i class="far fa-trash-alt"></i></button>
	</form>
</td>
