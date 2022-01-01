@extends('_layouts.app')

@section('title', config('farnost-detva.admin_texts.categories_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.categories_description') )
@section('content_header', config('farnost-detva.admin_texts.categories_header') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('categories.index') }}
@stop

@section('content')

<div class="row">
	<div class="col-12 col-xl-6 mx-auto">
		<div class="px-2 pb-3">
			<a href="{{ route('categories.create')}}" class="btn btn-warning btn-flat">Pridať novú kategóriu správ</a>
		</div>
		<div class="card">
			<div class="card-body table-responsive p-0">
				<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
					<thead>
						<tr class="table-primary">
							{{-- <th>ID</th> --}}
							<th>Názov Kategórie</th>
							<th>Popis</th>
							<th class="text-center" style="width: 5rem;">Akcie</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							{{-- <td>{{$category->id}}</td> --}}
							<td class="text-wrap text-break">{{$category->title}}</td>

							<td class="text-wrap text-break">{{$category->description}}</td>

							<td class="form-delete-wraper text-center">
								<a href="{{ route('categories.edit', $category->slug)}}" class="btn btn-primary btn-sm  btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
								<form class="delete-form" action="{{ route('categories.destroy', $category->id)}}" method="post" style="display: inline-block">
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
			{{ $categories->onEachSide(1)->links() }}
		</div>
		<!-- Paginator End-->
	</div>
</div>

@endsection
