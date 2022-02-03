@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.galleries_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.galleries_description_show') )

@section('content_breadcrumb')
    {{ Breadcrumbs::render('galleries.show', $gallery, $gallery->title )}}
@stop

@section('content')

    <div class="row">
        <ul>
            @foreach ($gallery->getMedia($gallery->collectionPicture) as $picture)
                <li>
                    {{ $picture->file_name }}
                </li>
            @endforeach
        </ul>
    </div>

    <x-gallery/>

@endsection
