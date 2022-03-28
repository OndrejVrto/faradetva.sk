@extends('backend._layouts.app')

@section('title', __('backend-texts.testimonials.title'))
@section('meta_description', __('backend-texts.testimonials.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('testimonials.index') }}
@stop

@section('content')
    <x-backend.table
        columns="7"
        controlerName="testimonials"
        createBtn="Pridať nové svedectvo"
        createNote="Na stránke sa zobrazujú tri náhodné svedectvá!"
        paginator="{{ $testimonials->onEachSide(1)->links() }}"
    >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th-check-active/>
            <x-backend.table.th width="10%" class="text-center">Fotka</x-backend.table.th>
            <x-backend.table.th width="25%">Meno svedka</x-backend.table.th>
            <x-backend.table.th>Pracovná pozícia</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($testimonials as $testimonial)
                <x-backend.table.tr trashed="{{ $testimonial->trashed() }}">

                    {{-- <x-backend.table.td>{{$testimonial->id}}</x-backend.table.td> --}}
                    <x-backend.table.td-check-active check="{{ $testimonial->active }}"/>
                    <x-backend.table.td class="text-center">
                        <img
                            src="{{ $testimonial->getFirstMediaUrl($testimonial->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/60x60" }}"
                            class="img-fluid priest-thumb"
                            alt="Fotografia: {{ $testimonial->full_name_titles }}, {{ $testimonial->function }}"
                        />
                    </x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">{{$testimonial->name}}</x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">{{$testimonial->function}}</x-backend.table.td>
                    <x-backend.table.td-actions
                        controlerName="testimonials"
                        identificator="{{ $testimonial->slug }}"
                        trashed="{{ $testimonial->trashed() }}"
                        trashedID="{{ $testimonial->id }}"
                    />

                </x-backend.table.tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
