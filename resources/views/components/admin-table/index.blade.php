@props([
	'columns' => 8,
	'createLink' => '#',
	'createTitle' => null,
	'createNote' => null,
	'paginator' => null,
	'table_header',
	'table_body',
	'table_footer',
])
@php
	$max_xl = min($columns, 12);
	$max_lg = min($columns + 1, 12);
	$max_md = min($columns + 2, 12);
@endphp

<div class="row">
	<div {{ $attributes->merge(['class' => "col-md-".$max_md." col-lg-".$max_lg." col-xl-".$max_xl." mx-auto bg-light pt-2 px-2 pt-lg-4 px-lg-4 mb-2 rounded "]) }}>
		<div class="row pb-3 justify-content-end">
			@isset($createNote)
				<div class="col-7 text-left">
					<span class="pr-2 py-1 text-info hoverDiv"><i class="mr-2 fas fa-info-circle"></i>{{ $createNote }}</span>
				</div>
			@endisset
			<div class="col-5 text-right">
				<a href="{{ $createLink }}" class="btn bg-gradient-warning btn-flat" title="Vytvoriť">{{ $createTitle }}</a>
			</div>
		</div>
		<div class="card">
			<div class="card-body table-responsive p-0">
				<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
					<thead>
						<tr class="table-primary">
							{{ $table_header }}
						</tr>
					</thead>
					<tbody>
						{{ $table_body }}
					</tbody>
					@isset($table_footer)
					<tfoot>
						<tr class="table-primary">
							{{ $table_footer }}
						</tr>
					</tfoot>
					@endisset
				</table>
			</div>
		</div>
		@isset($paginator)
		<!-- Paginator Start-->
		<div class="row justify-content-center pt-2">
			{!! $paginator !!}
		</div>
		<!-- Paginator end-->
		@endisset
	</div>
</div>
