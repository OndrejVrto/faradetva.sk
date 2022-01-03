@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.banners_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.banners_description') )
@section('content_header', config('farnost-detva.admin_texts.banners_header') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('banners.index') }}
@stop

@section('content')

<div class="row">
	<div class="col-12 col-lg-8 col-xl-7 mx-auto">
		<div class="row px-2 pb-3">
			<div class="col-5">
				<a href="{{ route('banners.create')}}" class="btn btn-warning btn-flat" title="Vytvoriť">Vytvoriť nový Baner</a>
			</div>
			<div class="col-7 text-right">
				<span class="px-2 py-1 text-info hoverDiv">
					<i class="mr-2 fas fa-info-circle"></i>
					Na stránke sa zobrazujú iba jeden náhodný baner pre každú stránku!
					<br>
					Pre fungovanie musí byť vložený aspoň jeden obrázok.
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
							<th>Názov stránky</th>
							<th class="text-center" style="width: 5rem;">Akcie</th>
						</tr>
					</thead>
					<tbody>
						@foreach($banners as $banner)
						<tr>
							{{-- <td>{{$banner->id}}</td> --}}
							<td class="text-center">
								@if ($banner->active == 1)
									<i class="fas fa-check"></i>
								@else
									<i class="far fa-times-circle fa-lg text-danger"></i>
								@endif
							</td>

							<td class="text-center">
								<img src="{{ $banner->getFirstMediaUrl('banner', 'crop-thumb') ?: "http://via.placeholder.com/360x90" }}"
									class="img-fluid"
									alt="Banner: {{ $banner->title }}"
								/>
							</td>

							<td class="text-wrap text-break">{{$banner->title}}</td>

							<td class="form-delete-wraper text-center">
								<a href="{{ route('banners.edit', $banner->id)}}" class="btn btn-primary btn-sm  btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
								<form class="delete-form" action="{{ route('banners.destroy', $banner->id)}}" method="post" style="display: inline-block">
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
			{{ $banners->onEachSide(1)->links() }}
		</div>
		<!-- Paginator end-->

	</div>
</div>

@endsection
