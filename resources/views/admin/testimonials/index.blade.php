@extends('admin._layouts.app')

@section('title', __('backend-texts.testimonials.title'))
@section('meta_description', __('backend-texts.testimonials.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('testimonials.index') }}
@stop

@section('content')
    <x-admin.table
        columns="7"
        controlerName="testimonials"
        createBtn="Pridať nové svedectvo"
        createNote="Na stránke sa zobrazujú tri náhodné svedectvá!"
        paginator="{{ $testimonials->onEachSide(1)->links() }}"
    >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th-check-active/>
            <x-admin.table.th width="10%" class="text-center">Fotka</x-admin.table.th>
            <x-admin.table.th width="25%">Meno svedka</x-admin.table.th>
            <x-admin.table.th>Pracovná pozícia</x-admin.table.th>
            <x-admin.table.th-actions/>
        </x-slot>

        <x-slot:table_body>
            @foreach($testimonials as $testimonial)
                <x-admin.table.tr trashed="{{ $testimonial->trashed() }}">

                    {{-- <x-admin.table.td>{{$testimonial->id}}</x-admin.table.td> --}}
                    <x-admin.table.td-check-active check="{{ $testimonial->active }}"/>
                    <x-admin.table.td class="text-center">
                        <img
                            src="{{ $testimonial->getFirstMediaUrl($testimonial->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/60x60" }}"
                            class="img-fluid priest-thumb"
                            alt="Fotografia: {{ $testimonial->full_name_titles }}, {{ $testimonial->function }}"
                        />
                    </x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{$testimonial->name}}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{$testimonial->function}}</x-admin.table.td>
                    <x-admin.table.td class="text-center">
                        <a  href="{{ url($testimonial->getFirstMediaUrl($testimonial->collectionName) ?: '#') }}"
                            class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                            title="Stiahnuť pôvodnú fotku"
                            download
                        >
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="testimonials"
                        identificator="{{ $testimonial->slug }}"
                        trashed="{{ $testimonial->trashed() }}"
                        trashedID="{{ $testimonial->id }}"
                    />

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
