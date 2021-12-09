@extends('_layouts.app')

@section('title', 'Kategórie správ')

@section('meta-tags')
	<meta name="description" content="Administrácia - správa Kategórií správ" />
@stop

@section('content_header')
    <h1>Kategórie správ</h1>
@stop

@section('content')

	<div class="row">
		<div class="col-12 col-xl-6 m-auto">
			<div class="p-2 pb-3">
				<a href="{{ route('categories.create')}}" class="btn btn-warning">Vytvoriť novú kategóriu správ</a>
			</div>
			<div class="card">
				<div class="card-body table-responsive p-0">
					<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
						<thead>
							<tr class="table-primary">
								{{-- <th>ID</th> --}}
								<th>Názov Kategórie</th>
								<th>Popis</th>
								<th style="width: 5rem;">Akcie</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categories as $category)
							<tr>
								{{-- <td>{{$category->id}}</td> --}}
								<td class="text-wrap text-break">{{$category->title}}</td>
								<td class="text-wrap text-break">{{$category->description}}</td>
								<td>
									<a href="{{ route('categories.edit', $category->slug)}}" class="btn btn-primary btn-sm" title="Editovať"><i class="fas fa-edit"></i></a>
									<form id="delete-form" action="{{ route('categories.destroy', $category->id)}}" method="post" style="display: inline-block">
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
				{{ $categories->onEachSide(1)->links() }}
			</div>
			<!-- Paginator End-->
		</div>
	</div>

@endsection
