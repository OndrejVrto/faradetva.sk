@props([
	'type' => 'right',
	'columns' => 3,
	'alt',
	'url'
])
@php
	if ($type == 'right') {
		$classes = 'img-fluid col-md-'.($columns-1).' col-lg-'.$columns.' mb-3 ms-sm-4 float-sm-end fromright wow';
	} else {
		$classes = 'img-fluid col-md-'.($columns-1).' col-lg-'.$columns.' mb-3 me-sm-4 float-sm-start fromleft wow';
	}
@endphp
<img
	{{ $attributes->merge(['class' => $classes]) }}
	src="{{ $url }}"
	alt="{{ $alt }}"
/>
