@props([
	'columns' => 8,
	'columnsSaveButton' => 4,
	'typeForm' => null,
	'linkActionEdit' => '#',
	'linkActionCreate' => '#',
	'linkBack' => '#',
	'createdInfo' => null,
	'createdBy' => null,
	'updatedInfo' => null,
	'updatedBy' => null
])
@php
	$card_max_xl = min($columns, 12);
	$card_max_lg = min($columns + 1, 12);
	$card_max_md = min($columns + 2, 12);
@endphp

<div class="row">
	<div {{ $attributes->merge(['class' => "col-md-".$card_max_md." col-lg-".$card_max_lg." col-xl-".$card_max_xl." mx-auto"]) }}>
		<div class="card">

			<div class="card-body">

				@if ( $typeForm == 'edit')
					<form id="edit-form" method="post" action="{{ $linkActionEdit }}">
					@method('PATCH')
				@else
					<form id="add-form" method="post" action="{{ $linkActionCreate }}">
				@endif

					@csrf

					{{ $slot }}

					<x-admin-form.save-button
						linkBack="{{ $linkBack }}"
						columnsSaveButton="{{ $columnsSaveButton }}"
					/>

				</form>
			</div>

			{{-- @isset($created_info AND $created_by AND $updated_info AND $updated_by) --}}
				@if ( $typeForm == 'edit' )
					<div class="card-footer text-muted d-flex flex-column flex-sm-row small">
						<div class="mr-auto">
							<span class="small mr-2">Vytvorené:</span> {{ $createdInfo }}
							<br>
							<span class="small mr-2">Vytvoril:</span> {{ $createdBy }}
						</div>
						<div class="mt-2 mt-sm-0">
							<span class="small mr-2">Naposledy upravené:</span> {{ $updatedInfo }}
							<br>
							<span class="small mr-2">Upravil:</span> {{ $updatedBy }}
						</div>
					</div>
				@endif
			{{-- @endisset --}}

		</div>
	</div>
</div>
