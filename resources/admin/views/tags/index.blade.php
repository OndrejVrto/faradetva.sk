@extends('_layouts.app')

@section('title', 'Kľúčové slová')

@section('meta-tags')
	<meta name="description" content="Administrácia - správa sekcie: Kľúčové slová" />
@stop

@section('content_header')
    <h1>Kľúčové slová</h1>
@stop

@section('content')

<div class="row">
	<div class="col-12 col-xl-6 m-auto">
		<div class="p-2 pb-3">
			<a href="{{ route('tags.create')}}" class="btn btn-warning btn-flat">Pridať nové kľúčové slovo</a>
		</div>
		<div class="card">
			<div class="card-body table-responsive p-0">
				<table class="table table-sm table-hover table-middle-align table-striped table-last-padding">
					<thead>
						<tr class="table-primary">
							{{-- <th>ID</th> --}}
							<th>Kľúčové slovo</th>
							<th>Popis</th>
							<th class="text-center" style="width: 5rem;">Akcia</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tags as $tag)
						<tr>
							{{-- <td>{{$tag->id}}</td> --}}
							<td class="text-wrap text-break">{{$tag->title}}</td>

							<td class="text-wrap text-break">{{$tag->description}}</td>

							<td class="text-center">
								<a href="{{ route('tags.edit', $tag->slug)}}" class="btn btn-primary btn-sm  btn-flat" title="Editovať"><i class="fas fa-edit"></i></a>
								<form class="delete-form" action="{{ route('tags.destroy', $tag->id)}}" method="post" style="display: inline-block">
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
			{{ $tags->onEachSide(1)->links() }}
		</div>
		<!-- Paginator End-->
	</div>
</div>

@endsection
