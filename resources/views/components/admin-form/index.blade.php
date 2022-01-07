@props([
	'controlerName' => '',
	'columns' => 8,
	'files' => 'false',
	'typeForm' => '',
	'identificatorEdit' => null,
	'createdInfo' => '',
	'createdBy' => '',
	'updatedInfo' => '',
	'updatedBy' => '',
])
@php
	if($typeForm == '' OR is_null($typeForm)) $typeForm = 'create';
	$card_max_xl = min($columns, 12);
	$card_max_lg = min($columns + 1, 12);
	$card_max_md = min($columns + 2, 12);
	$headerTitle = config('farnost-detva.admin_texts.'.$controlerName.'_header_'.$typeForm );
	$headerDescription = config('farnost-detva.admin_texts.'.$controlerName.'_description_'.$typeForm );
	$linkActionEdit = route( $controlerName . '.update', $identificatorEdit);
	$linkActionCreate = route( $controlerName . '.store');
	$linkBack = route( $controlerName . '.index');
@endphp

<div class="row">
	<div {{ $attributes->merge(['class' => "col-md-".$card_max_md." col-lg-".$card_max_lg." col-xl-".$card_max_xl." mx-auto"]) }}>
		<div class="card">

			@if( $headerTitle != '' )
				<div class="card-header text-muted border-bottom-0 pb-0 ">
					<a href="{{ $linkBack }}" type="button" class="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</a>
					<h1>{{ $headerTitle }}</h1>
					@if( $headerDescription != '' )
						<div class="lead">
							{{ $headerDescription }}
						</div>
					@endif
				</div>
			@endif

			<div class="card-body">

				@if ( $typeForm == 'edit')
					<form id="edit-form" method="post" action="{{ $linkActionEdit }}" @if($files == 'true')enctype="multipart/form-data"@endif >
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ $linkActionCreate }}" @if($files == 'true')enctype="multipart/form-data"@endif >
				@endif

					@csrf

					{{ $slot }}

					<x-admin-form.save-button linkBack="{{ $linkBack }}"/>

				</form>
			</div>

			@if( $createdInfo != '' OR $createdBy != '' OR $updatedInfo != '' OR $updatedBy != '' )
				{{-- @if ( $typeForm == 'edit' ) --}}
					<div class="card-footer text-muted d-flex flex-column flex-sm-row small">
						<div class="mr-auto">
							@if( $createdInfo != '' )
								<span class="small mr-2">Vytvorené:</span> {{ $createdInfo }}
							@endif
							@if( $createdBy != '' )
								<br>
								<span class="small mr-2">Vytvoril:</span> {{ $createdBy }}
							@endif
						</div>
						<div class="mt-2 mt-sm-0">
							@if( $updatedInfo != '' )
								<span class="small mr-2">Naposledy upravené:</span> {{ $updatedInfo }}
							@endif
							@if( $updatedBy != '' )
								<br>
								<span class="small mr-2">Upravil:</span> {{ $updatedBy }}
							@endif
						</div>
					</div>
				{{-- @endif --}}
			@endif

		</div>
	</div>
</div>
