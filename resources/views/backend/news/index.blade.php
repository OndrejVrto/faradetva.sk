@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.news_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.news_description') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('news.index') }}
@stop

@section('content')
	<x-admin-table
		columns="12"
		controlerName="news"
		createBtn="Vytvoriť nový článok"
		paginator="{{ $all_news->onEachSide(1)->links() }}"
		>

		<x-slot name="table_header">
			{{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
			<x-admin-table.th-check-active/>

			<x-admin-table.th width="11%" class="d-none d-md-table-cell text-center">Fotka</x-admin-table.th>
			<x-admin-table.th width="20%" class="d-none d-lg-table-cell">Autori</x-admin-table.th>
			<x-admin-table.th width="20%" class="d-none d-xl-table-cell">Dátumy</x-admin-table.th>
			<x-admin-table.th>Názov článku</x-admin-table.th>
			{{-- <x-admin-table.th>Obsah článku (skrátený)</x-admin-table.th> --}}
			<x-admin-table.th width="5%" class="text-center d-none d-md-table-cell">Prílohy</x-admin-table.th>
			<x-admin-table.th-actions/>
		</x-slot>

		<x-slot name="table_body">
			@foreach($all_news as $news)
			<tr>
				{{-- <x-admin-table.td>{{$news->id}}</x-admin-table.td> --}}
				<x-admin-table.td-check-active check="{{ $news->active }}"/>

				<x-admin-table.td class="d-none d-md-table-cell text-center">
					<img src="{{ $news->getFirstMediaUrl('news_front_picture', 'crop-thumb') ?: "http://via.placeholder.com/170x92" }}"
					class="img-fluid px-2"
					alt="Titulná fotka článku: {{ $news->title }}."/>
				</x-admin-table.td>

				<x-admin-table.td class="d-none d-lg-table-cell small">
					<span class="text-muted mr-2">Vytvoril:</span>
					<span class="text-bold">{{$news->created_by}}</span>
					<br>
					<span class="text-muted mr-2">Upravil:</span>
					<span class="text-bold">{{$news->updated_by}}</span>
				</x-admin-table.td>

				<x-admin-table.td class="d-none d-xl-table-cell small">
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
				</x-admin-table.td>

				<x-admin-table.td class="text-wrap text-break text-bold">{{ $news->title }}</x-admin-table.td>

				{{-- <x-admin-table.td class="text-wrap text-break d-none d-xl-block">{{$news->teaser}}</x-admin-table.td> --}}

				<x-admin-table.td class="d-none d-md-table-cell text-wrap text-break text-center">{{-- $news->file_count --}}</x-admin-table.td>

				<x-admin-table.td-actions
					editLink="{{ route('news.edit', $news->slug)}}"
					deleteLink="{{ route('news.destroy', $news->id)}}"
				/>
			</tr>
			@endforeach
		</x-slot>

	</x-admin-table>
@endsection
