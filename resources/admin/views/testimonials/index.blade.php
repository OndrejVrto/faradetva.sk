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
	<div class="col-12 col-lg-8 col-xl-7 m-auto">
		<div class="row p-2 pb-3">
			<div class="col-5">
				<a href="{{ route('testimonials.create')}}" class="btn btn-warning btn-flat" title="Vytvoriť">Pridať nové svedectvo</a>
			</div>
			<div class="col-7 text-right">
				<span class="px-2 py-1 text-info hoverDiv"><i class="mr-2 fas fa-info-circle"></i>Na stránke sa zobrazujú tri náhodné svedectvá!</span>
			</div>
		</div>
		<div class="card">
			<div class="card-body table-responsive p-0">
				<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
					<thead>
						<tr class="table-primary">
							{{-- <th>ID</th> --}}
							<th class="text-center" style="width: 1rem;">Zobraziť</th>
							<th class="text-center">Fotka</th>
							<th>Meno svedka</th>
							<th>Pracovná pozícia</th>
							<th class="text-center" style="width: 5rem;">Akcie</th>
						</tr>
					</thead>
					<tbody>
						@foreach($testimonials as $testimonial)
						<tr>
							{{-- <td>{{$testimonial->id}}</td> --}}
							<td class="text-center">
								@if ($testimonial->active == 1)
									<i class="fas fa-check"></i>
								@else
									<i class="far fa-times-circle fa-lg text-danger"></i>
								@endif
							</td>

							<td class="text-center">
								<img src="{{ $testimonial->getFirstMediaUrl('testimonial', 'crop-thumb') ?: "http://via.placeholder.com/60x80" }}"
									class="img-fluid"
									alt="Fotografia: {{ $testimonial->full_name_titles }}, {{ $testimonial->function }}"
								/>
							</td>

							<td class="text-wrap text-break">{{$testimonial->name}}</td>

							<td class="text-wrap text-break">{{$testimonial->function}}</td>

							<td class="form-delete-wraper text-center">
								<a href="{{ route('testimonials.edit', $testimonial->slug)}}" class="btn btn-primary btn-sm  btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
								<form class="delete-form" action="{{ route('testimonials.destroy', $testimonial->id)}}" method="post" style="display: inline-block">
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
			{{ $testimonials->onEachSide(1)->links() }}
		</div>
		<!-- Paginator end-->

	</div>
</div>

@endsection
