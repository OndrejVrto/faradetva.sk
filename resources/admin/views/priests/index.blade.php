@extends('_layouts.app')

@section('title', 'Kňazi')

@section('meta-tags')
	<meta name="description" content="Administrácia - správa sekcie: Kňazi" />
@stop

@section('content_header')
    <h1>Kňazi našej farnosti</h1>
@stop

@section('content')

	<div class="row">
		<div class="col-12 col-xl-6 m-auto">
			<div class="p-2 pb-3">
				<a href="{{ route('priests.create')}}" class="btn btn-warning btn-flat">Pridať nového kňaza</a>
			</div>
			<div class="card">
				<div class="card-body table-responsive p-0">
					<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
						<thead>
							<tr class="table-primary">
								{{-- <th>ID</th> --}}
								<th>Fotka</th>
								<th>Meno</th>
								<th>Funkcia</th>
								<th>Zobraziť</th>
								<th style="width: 5rem;">Akcie</th>
							</tr>
						</thead>
						<tbody>
							@foreach($priests as $priest)
							<tr>
								{{-- <td>{{$priest->id}}</td> --}}
								<td>
									<img src="{{ $priest->getFirstMediaUrl('priest', 'crop-thumb') ?: "http://via.placeholder.com/60x80" }}"
										class="img-fluid"
										alt="Fotografia: {{ $priest->full_name_titles }}, {{ $priest->function }}"
									/>
								</td>
								<td class="text-wrap text-break">{{$priest->full_name_titles}}</td>
								<td class="text-wrap text-break">{{$priest->function}}</td>
								<td class="text-wrap text-break">{!! $priest->active ? 'Áno' : '<span class="text-danger text-bold">Nie</span>' !!}</td>
								<td>
									<a href="{{ route('priests.edit', $priest->slug)}}" class="btn btn-primary btn-sm  btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
									<form id="delete-form" action="{{ route('priests.destroy', $priest->id)}}" method="post" style="display: inline-block">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger btn-sm btn-flat" type="submit" title="Vymazať"><i class="far fa-trash-alt"></i></button>
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
