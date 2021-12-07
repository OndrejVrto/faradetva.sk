@extends('_layouts.app')

@section('title', 'Tagy')
@section('description', 'Administrácia - správa Tag-ov')
@section('keywords', '')
@section('mainTitle', 'Tagy')

@section('content')

	<div class="row">
		<div class="col-12 col-xl-8 m-auto">
			<div class="p-2 pb-3">
				<a href="{{ route('tags.create')}}" class="btn btn-warning">Vytvoriť nový Tag</a>
			</div>
			<div class="card">
				<div class="card-body table-responsive p-0">
					<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
						<thead>
							<tr class="table-primary">
								<th>ID</th>
								<th>Názov Tagu</th>
								<th>Popis</th>
								<th style="width: 5rem;">Akcia</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tags as $tag)
							<tr>
								<td>{{$tag->id}}</td>
								<td class="text-wrap text-break">{{$tag->title}}</td>
								<td class="text-wrap text-break">{{$tag->description}}</td>
								<td>
									<a href="{{ route('tags.edit', $tag->slug)}}" class="btn btn-primary btn-sm" title="Editovať"><i class="fas fa-edit"></i></a>
									<form action="{{ route('tags.destroy', $tag->id)}}" method="post" style="display: inline-block">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger btn-sm" type="submit" title="Vymazať"><i class="far fa-trash-alt"></i></button>
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
				{{ $tags->onEachSide(1)->links() }}
			</div>
			<!-- Paginator End-->
		</div>
	</div>

@endsection
