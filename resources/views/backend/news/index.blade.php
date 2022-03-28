@extends('backend._layouts.app')

@section('title', __('backend-texts.news.title'))
@section('meta_description', __('backend-texts.news.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('news.index') }}
@stop

@section('content')
    <x-backend.table
        columns="12"
        controlerName="news"
        createBtn="Vytvoriť nový článok"
        paginator="{{ $allNews->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th-check-active/>

            <x-backend.table.th width="11%" class="d-none d-md-table-cell text-center">Fotka</x-backend.table.th>
            <x-backend.table.th width="20%" class="d-none d-lg-table-cell">Autor</x-backend.table.th>
            <x-backend.table.th width="20%" class="d-none d-xl-table-cell">Zverejnenie</x-backend.table.th>
            <x-backend.table.th>Názov článku</x-backend.table.th>
            {{-- <x-backend.table.th>Obsah článku (skrátený)</x-backend.table.th> --}}
            <x-backend.table.th width="5%" class="text-center d-none d-md-table-cell">Prílohy</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($allNews as $news)
                <x-backend.table.tr trashed="{{ $news->trashed() }}">

                    {{-- <x-backend.table.td>{{$news->id}}</x-backend.table.td> --}}
                    <x-backend.table.td-check-active check="{{$news->active}}"/>

                    <x-backend.table.td class="d-none d-md-table-cell text-center">
                        <img src="{{ $news->getFirstMediaUrl($news->collectionPicture, 'crop-thumb') ?: "http://via.placeholder.com/170x92" }}"
                        class="img-fluid px-2"
                        alt="Titulná fotka článku: {{$news->title}}."/>
                    </x-backend.table.td>

                    <x-backend.table.td class="d-none d-lg-table-cell small">
                        <span class="text-muted mr-2">Vytvoril:</span>
                        <span class="text-bold">{{$news->user->name ?? ''}}</span>
                        <br>
                        <span class="text-muted mr-2">Dňa:</span>
                        {{$news->created_at->format('d. m. Y \o H:i')}}
                    </x-backend.table.td>

                    <x-backend.table.td class="d-none d-xl-table-cell small">
                            <span class="text-muted mr-2">Publikovať od:</span>
                            <span class="text-success">{{$news->published_at}}</span>
                        <br>
                            <span class="text-muted mr-2">Publikovať do:</span>
                            <span class="text-danger">{{$news->unpublished_at}}</span>
                    </x-backend.table.td>

                    <x-backend.table.td class="text-wrap text-break text-bold">{{ $news->title }}</x-backend.table.td>

                    {{-- <x-backend.table.td class="text-wrap text-break d-none d-xl-block">{{$news->teaser}}</x-backend.table.td> --}}

                    <x-backend.table.td class="d-none d-md-table-cell text-wrap text-break text-center">{{-- $news->file_count --}}</x-backend.table.td>
                    @if ( $news->user_id == auth()->user()->id OR auth()->user()->isAdmin())
                        <x-backend.table.td-actions
                            controlerName="news"
                            identificator="{{ $news->slug }}"
                            trashed="{{ $news->trashed() }}"
                            trashedID="{{ $news->id }}"
                        />
                    @else
                    <td colspan="2"></td>
                    @endif

                </x-backend.table.tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
