@props([
	'columnsSaveButton' => 4,
	'linkBack' => '#',
])
@php
	$max_xl = min($columnsSaveButton, 12);
	$max_lg = min($columnsSaveButton + 1, 12);
	$max_md = min($columnsSaveButton + 2, 12);
@endphp

<div {{ $attributes->merge(['class' => "col-md-".$max_md." col-lg-".$max_lg." col-xl-".$max_xl." mx-auto vstack gap-2 mt-5"]) }}>

	<button type="submit" class="btn bg-gradient-primary btn-block">
		<i class="far fa-lg fa-save mr-2"></i>
		Uložiť
	</button>
	<a href="{{ $linkBack }}" class="btn btn-outline-secondary btn-block">
		Späť
	</a>
</div>
