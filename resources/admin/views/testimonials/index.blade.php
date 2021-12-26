@extends('_layouts.app')

@section('title', 'Svedectvá')

@section('meta-tags')
	<meta name="description" content="Administrácia - správa sekcie: Svedectvá" />
@stop

@section('content_header')
    <h1>Svedectvá viery</h1>
@stop

@section('content')

	<div class="row">
		<div class="col-12 col-xl-6 m-auto">
			<div class="p-2 pb-3">
				<a href="{{ route('testimonials.create')}}" class="btn btn-warning btn-flat">Pridať nové svedectvo</a>
			</div>
			<div class="card">
				<div class="card-body table-responsive p-0">
					<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
						<thead>
							<tr class="table-primary">
								{{-- <th>ID</th> --}}
								<th>Fotka</th>
								<th>Meno svedka</th>
								<th>Pracovná pozícia</th>
								<th>Zobraziť</th>
								<th style="width: 5rem;">Akcie</th>
							</tr>
						</thead>
						<tbody>
							@foreach($testimonials as $testimonial)
							<tr>
								{{-- <td>{{$testimonial->id}}</td> --}}
								<td>
									<img src="{{ $testimonial->getFirstMediaUrl('testimonial', 'crop-thumb') ?: "http://via.placeholder.com/60x80" }}"
										class="img-fluid"
										alt="Fotografia: {{ $testimonial->full_name_titles }}, {{ $testimonial->function }}"
									/>
								</td>
								<td class="text-wrap text-break">{{$testimonial->full_name_titles}}</td>
								<td class="text-wrap text-break">{{$testimonial->function}}</td>
								<td class="text-wrap text-break">{!! $testimonial->active ? 'Áno' : '<span class="text-danger text-bold">Nie</span>' !!}</td>
								<td>
									<a href="{{ route('testimonials.edit', $testimonial->slug)}}" class="btn btn-primary btn-sm  btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
									<form id="delete-form" action="{{ route('testimonials.destroy', $testimonial->id)}}" method="post" style="display: inline-block">
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
				{{ $testimonials->onEachSide(1)->links() }}
			</div>
			<!-- Paginator end-->

		</div>
	</div>

@endsection
