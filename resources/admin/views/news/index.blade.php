@extends('_layouts.app')

@section('title', config('farnost-detva.admin_texts.news_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.news_description') )
@section('content_header', config('farnost-detva.admin_texts.news_header') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('news.index') }}
@stop

@section('content')

	<div class="row">
		<div class="col-12 mx-auto">
			<div class="px-2 pb-3">
				<a href="{{ route('news.create')}}" class="btn btn-warning btn-flat">Vytvoriť nový článok</a>
			</div>
			<div class="card">
				<div class="card-body table-responsive p-0">
					<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
						<thead>
							<tr class="table-primary">
								{{-- <th>ID</th> --}}
								<th class="text-center" style="width: 1rem;">Zobraziť</th>
								<th class="d-none d-md-table-cell text-center" style="width: 10rem;">Fotka</th>
								<th class="d-none d-lg-table-cell">Autori</th>
								<th class="d-none d-xl-table-cell">Dátumy</th>
								<th>Názov článku</th>
								{{-- <th style="max-width: 20rem;" class="d-none d-xl-block">Obsah článku (skrátený)</th> --}}
								<th style="width: 4rem;" class="text-center d-none d-md-table-cell">Prílohy</th>
								<th style="width: 8rem;" class="text-center">Akcia</th>
							</tr>
						</thead>
						<tbody>
							@foreach($all_news as $news)
							<tr>
								{{-- <td>{{$news->id}}</td> --}}
								<td class="text-center">
									@if ($news->active == 1)
										<i class="fas fa-check"></i>
									@else
										<i class="far fa-times-circle fa-lg text-danger"></i>
									@endif
								</td>

								<td class="d-none d-md-table-cell">
									<img src="{{ $news->getFirstMediaUrl('news_front_picture', 'crop-thumb') ?: "http://via.placeholder.com/170x92" }}"
										class="img-fluid"
										alt="Titulná fotka článku: {{ $news->title }}."
									/>
								</td>

								<td class="d-none d-lg-table-cell small">
									<span class="text-muted mr-2">Vytvoril:</span>
									<span class="text-bold">{{$news->created_by}}</span>
									<br>
									<span class="text-muted mr-2">Upravil:</span>
									<span class="text-bold">{{$news->updated_by}}</span>
								</td>

								<td class="d-none d-xl-table-cell small">
										<span class="text-muted mr-2">Upravené:</span>
										<span class="text-bold">{{$news->updated_info}}</span>
									<br>
										<span class="text-muted mr-2">Vytvorené:</span>
										{{$news->created_info}}
									<br>
										<span class="text-muted mr-2">Publikovať od:</span>
										<span class="text-success">{{$news->published_at}}</span>
									<br>
										<span class="text-muted mr-2">Publikovať do:</span>
										<span class="text-danger">{{$news->unpublished_at}}</span>
								</td>

								<td class="text-wrap text-break text-bold">{{ $news->title }}</td>

								{{-- <td class="text-wrap text-break d-none d-xl-block">{{$news->teaser}}</td> --}}

								<td class="d-none d-md-table-cell text-wrap text-break text-center">{{-- $news->file_count --}}</td>

								<td class="form-delete-wraper text-center">
									<a href="{{ route('news.show', $news->slug)}}" class="btn btn-warning btn-sm  btn-flat" title="Zobraziť"><i class="fas fa-eye"></i></a>
									<a href="{{ route('news.edit', $news->slug)}}" class="btn btn-primary btn-sm  btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
									<form class="delete-form" action="{{ route('news.destroy', $news->id)}}" method="post" style="display: inline-block">
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
				{{ $all_news->onEachSide(1)->links() }}
			</div>
			<!-- Paginator End-->
		</div>
	</div>

@endsection
