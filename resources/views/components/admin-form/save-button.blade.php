@props([
	'linkBack' => '#',
])
<div class="mt-3 d-flex justify-content-end">
	<a href="{{ $linkBack }}" class="btn btn-outline-secondary px-5">
		<i class="fas fa-reply mr-2"></i>
		Späť
	</a>
	<button type="submit" class="btn bg-gradient-success px-5 ml-2">
		<i class="fas fa-save mr-2"></i>
		Uložiť
	</button>
</div>
