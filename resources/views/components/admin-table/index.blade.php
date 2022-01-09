@props([
	'controlerName' => '',
	'columns' => null,
	'createBtn' => null,
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
	$headerTitle = config('farnost-detva.admin_texts.'.$controlerName.'_header' );
	$headerDescription = config('farnost-detva.admin_texts.'.$controlerName.'_description' );
	$createLink = route( $controlerName . '.create');
	$linkBack = route( 'admin.dashboard' );
@endphp

<div class="row justify-content-center">

	<div {{ $attributes->merge(['class' => "col-md-".$max_md." col-lg-".$max_lg." col-xl-".$max_xl." bg-light pt-2 px-2 px-lg-3 mb-2 rounded"]) }}>

		@if( isset($headerTitle) AND $headerTitle != '' )
			<span class="text-muted">
				<a href="{{ $linkBack }}" type="button" class="close" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</a>
				<h1>{{ $headerTitle }}</h1>
				@if( $headerDescription != '' )
					<div class="lead">
						{{ $headerDescription }}
					</div>
				@endif
			</span>
		@endif

		<div class="row justify-content-end mb-3">

			@isset($createNote)
				<div class="col-md-8 mt-3 d-flex justify-content-start align-items-start">
					<span class="pr-2 py-1 text-info hoverDiv"><i class="mr-2 fas fa-info-circle"></i>{{ $createNote }}</span>
				</div>
			@endisset

			<div class="col-md-4 mt-lg-n5 d-flex justify-content-end align-items-end">
				<a href="{{ $createLink }}" class="btn bg-gradient-warning btn-flat flex-fill flex-lg-grow-0" title="Vytvoriť">{{ $createBtn }}</a>
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
