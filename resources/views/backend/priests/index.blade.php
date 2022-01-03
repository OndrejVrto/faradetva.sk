@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.priests_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.priests_description') )
@section('content_header', config('farnost-detva.admin_texts.priests_header') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('priests.index') }}
@stop

@section('content')

<div class="row">
	<div class="col-12 col-xl-6 mx-auto">
		<div class="px-2 pb-3">
			<a href="{{ route('priests.create')}}" class="btn btn-warning btn-flat">Pridať nového kňaza</a>
		</div>
		<div class="card">
			<div class="card-body table-responsive p-0">
				<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
					<thead>
						<tr class="table-primary">
							{{-- <th>ID</th> --}}
							<th class="text-center" style="width: 1rem;">Zobraziť</th>
							<th class="text-center">Fotka</th>
							<th>Meno kňaza</th>
							<th>Funkcia</th>
							<th class="text-center" style="width: 5rem;">Akcie</th>
						</tr>
					</thead>
					<tbody>
						@foreach($priests as $priest)
						<tr>
							{{-- <td>{{$priest->id}}</td> --}}
							<td class="text-center">
								@if ($priest->active == 1)
									<i class="fas fa-check"></i>
								@else
									<i class="far fa-times-circle fa-lg text-danger"></i>
								@endif
							</td>

							<td>
								<img src="{{ $priest->getFirstMediaUrl('priest', 'crop-thumb') ?: "http://via.placeholder.com/60x80" }}"
									class="img-fluid"
									alt="Fotografia: {{ $priest->full_name_titles }}, {{ $priest->function }}"
								/>
							</td>

							<td class="text-wrap text-break">{{$priest->full_name_titles}}</td>

							<td class="text-wrap text-break">{{$priest->function}}</td>

							<td class="form-delete-wraper text-center">
								<a href="{{ route('priests.edit', $priest->slug)}}" class="btn btn-primary btn-sm  btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
								<form class="delete-form" action="{{ route('priests.destroy', $priest->id)}}" method="post" style="display: inline-block">
									@csrf
									@method('DELETE')
									<button class="btn btn-outline-danger btn-sm btn-flat" type="submit" title="Vymazať"><i class="far fa-trash-alt"></i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- Paginator Start-->
		<div class="row justify-content-center py-2">
			{{ $priests->onEachSide(1)->links() }}
		</div>
		<!-- Paginator end-->

	</div>
</div>

@endsection
