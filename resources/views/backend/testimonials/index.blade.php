@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.testimonials_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.testimonials_description') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('testimonials.index') }}
@stop

@section('content')
	<x-admin-table
		columns="7"
		controlerName="testimonials"
		createBtn="Pridať nové svedectvo"
		createNote="Na stránke sa zobrazujú tri náhodné svedectvá!"
		paginator="{{ $testimonials->onEachSide(1)->links() }}"
		>

		<x-slot name="table_header">
			{{-- <x-admin-table.th width="1%">#</x-admin-table.th> --}}
			<x-admin-table.th-check-active/>
			<x-admin-table.th width="10%" class="text-center">Fotka</x-admin-table.th>
			<x-admin-table.th width="25%">Meno svedka</x-admin-table.th>
			<x-admin-table.th>Pracovná pozícia</x-admin-table.th>
			<x-admin-table.th-actions/>
		</x-slot>

		<x-slot name="table_body">
			@foreach($testimonials as $testimonial)
			<tr>
				{{-- <x-admin-table.td>{{$testimonial->id}}</x-admin-table.td> --}}
				<x-admin-table.td-check-active check="{{ $testimonial->active }}"/>
				<x-admin-table.td class="text-center">
					<img src="{{ $testimonial->getFirstMediaUrl('testimonial', 'crop-thumb') ?: "http://via.placeholder.com/60x60" }}"
					class="img-fluid"
					alt="Fotografia: {{ $testimonial->full_name_titles }}, {{ $testimonial->function }}"/>
				</x-admin-table.td>
				<x-admin-table.td class="text-wrap text-break">{{$testimonial->name}}</x-admin-table.td>
				<x-admin-table.td class="text-wrap text-break">{{$testimonial->function}}</x-admin-table.td>

				<x-admin-table.td-actions
					editLink="{{ route('testimonials.edit', $testimonial->slug)}}"
					deleteLink="{{ route('testimonials.destroy', $testimonial->id)}}"
				/>
			</tr>
			@endforeach
		</x-slot>

	</x-admin-table>
@endsection
