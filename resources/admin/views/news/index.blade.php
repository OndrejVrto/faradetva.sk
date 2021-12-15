@extends('_layouts.app')

@section('title', 'Články')

@section('meta-tags')
	<meta name="description" content="Administrácia - správy" />
@stop

@section('content_header')
    <h1>Články</h1>
@stop

@section('content')

	<div class="row">
		<div class="col-12 col-xl-11 m-auto">
			<div class="p-2 pb-3">
				<a href="{{ route('news.create')}}" class="btn btn-warning btn-flat">Vytvoriť nový článok</a>
			</div>
			<div class="card">
				<div class="card-body table-responsive p-0">
					<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
						<thead>
							<tr class="table-primary">
								<th>Dátum</th>
								<th>Autor</th>
								<th>Názov článku</th>
								{{-- <th style="max-width: 20rem;" class="d-none d-xl-block">Obsah článku (skrátený)</th> --}}
								<th style="width: 6rem;" class="text-center">Prílohy</th>
								<th style="width: 8rem;" class="text-center">Akcia</th>
							</tr>
						</thead>
						<tbody>
							@foreach($all_news as $news)
							<tr>
								<td>{{$news->created}}</td>
								<td class="text-wrap text-break">{{ $news->user->name }}</td>
								<td class="text-wrap text-break text-bold">{{ $news->title }}</td>
								{{-- <td class="text-wrap text-break d-none d-xl-block">{{$news->teaser}}</td> --}}
								<td class="text-wrap text-break text-center">{{ $news->file_count }}</td>
								<td class="text-center">
									<form id="file-append-form" action="{{ route( 'files.create', [$news->id , $news->model]) }}" method="post" style="display: inline-block">
										@csrf
										@method('POST')
										<button class="btn btn-warning btn-flat btn-sm my-1 text-red" type="submit" title="Vložiť prílohy"><i class="far fa-file"></i></button>
									</form>
									<a href="{{ route('news.edit', $news->slug)}}" class="btn btn-primary btn-sm btn-flat mx-2" title="Editovať"><i class="fas fa-edit"></i></a>
									<form id="delete-form" action="{{ route('news.destroy', $news->id)}}" method="post" style="display: inline-block">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger btn-flat btn-sm my-1" type="submit" title="Vymazať"><i class="far fa-trash-alt"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
			<!-- Paginator Start-->
			<div class="row justify-content-center py-2">
				{{ $all_news->onEachSide(1)->links() }}
			</div>
			<!-- Paginator End-->
		</div>
	</div>

@endsection
