@props([
	'type' => 'right'
])
<div class="from{{ $type }} wow">
	{{ $slot }}
</div>
