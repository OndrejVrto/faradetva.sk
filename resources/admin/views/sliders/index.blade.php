@extends('_layouts.app')

@section('title', config('farnost-detva.admin_texts.sliders_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.sliders_description') )
@section('content_header', config('farnost-detva.admin_texts.sliders_header') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('sliders.index') }}
@stop

@section('content')

<div class="row">
	<div class="col-12 col-lg-8 col-xl-7 mx-auto">
		<div class="row px-2 pb-3">
			<div class="col-5">
				<a href="{{ route('sliders.create')}}" class="btn btn-warning btn-flat" title="Vytvoriť">Pridať nový obrázok s myšlienkou</a>
			</div>
			<div class="col-7 text-right">
				<span class="px-2 py-1 text-info hoverDiv">
					<i class="mr-2 fas fa-info-circle"></i>
					Na stránke sa zobrazujú iba tri náhodné obrázky!
					<br>
					Pre fungovanie musia byť vložené minimálne dve.
				</span>
			</div>
		</div>
		<div class="card">
			<div class="card-body table-responsive p-0">
				<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
					<thead>
						<tr class="table-primary">
							{{-- <th>ID</th> --}}
							<th class="text-center" style="width: 1rem;">Zobraziť</th>
							<th class="text-center">Obrázok</th>
							<th>Myšlienka</th>
							<th class="text-center" style="width: 5rem;">Akcie</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sliders as $slider)
						<tr>
							{{-- <td>{{$slider->id}}</td> --}}
							<td class="text-center">
								@if ($slider->active == 1)
									<i class="fas fa-check"></i>
								@else
									<i class="far fa-times-circle fa-lg text-danger"></i>
								@endif
							</td>

							<td class="text-center">
								<img src="{{ $slider->getFirstMediaUrl('slider', 'crop-thumb') ?: "http://via.placeholder.com/240x100" }}"
									class="img-fluid"
									alt="Obrázok: {{ $slider->full_heading }}"
								/>
							</td>

							<td class="text-wrap text-break">{{$slider->teaser}}</td>

							<td class="form-delete-wraper text-center">
								<a href="{{ route('sliders.edit', $slider->id)}}" class="btn btn-primary btn-sm  btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
								<form class="delete-form" action="{{ route('sliders.destroy', $slider->id)}}" method="post" style="display: inline-block">
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
			{{ $sliders->onEachSide(1)->links() }}
		</div>
		<!-- Paginator end-->

	</div>
</div>

@endsection
