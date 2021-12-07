@extends('_layouts.app')

@section('title', 'Články')

@section('content_header')
    <h1>Články</h1>
@stop

@section('content')

	<div class="row">
		<div class="col-12 col-xl-11 m-auto">
			<div class="p-2 pb-3">
				<a href="{{ route('news.create')}}" class="btn btn-warning">Vytvoriť nový článok</a>
			</div>
			<div class="card">
				<div class="card-body table-responsive p-0">
					<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
						<thead>
							<tr class="table-primary">
								<th>Dátum</th>
								<th>Autor</th>
								<th>Názov článku</th>
								{{-- <th>Obsah článku (skrátený)</th> --}}
								<th style="width: 5rem;">Akcia</th>
							</tr>
						</thead>
						<tbody>
							@foreach($all_news as $news)
							<tr>
								<td>{{$news->created}}</td>
								<td class="text-wrap text-break">{{$news->user->name}}</td>
								<td class="text-wrap text-break">{{$news->title}}</td>
								{{-- <td class="text-wrap text-break">{{$news->teaser}}</td> --}}
								<td>
									<a href="{{ route('news.edit', $news->slug)}}" class="btn btn-primary btn-sm my-1" title="Editovať"><i class="fas fa-edit"></i></a>
									<form action="{{ route('news.destroy', $news->id)}}" method="post" style="display: inline-block">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger btn-sm my-1" type="submit" title="Vymazať"><i class="far fa-trash-alt"></i></button>
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
