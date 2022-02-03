@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.galleries_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.galleries_description_show') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.show', $gallery, $gallery->title )}}
@stop

@section('content')

    <x-admin-card
        columns="11"
        headerTitle="{{ config('farnost-detva.admin_texts.galleries_header_show') }}"
        headerDescription="{{ config('farnost-detva.admin_texts.galleries_description_show') }}"
    >

        {{-- <div class="row">
            <ul>
                @foreach ($gallery->getMedia($gallery->collectionPicture) as $picture)
                    <li>
                        {{ $picture->file_name }}
                    </li>
                @endforeach
            </ul>
        </div> --}}

        <x-gallery/>

    </x-admin-card>

@endsection
