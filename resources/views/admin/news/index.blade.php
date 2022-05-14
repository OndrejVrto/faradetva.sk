@extends('admin._layouts.app')

@section('title', __('backend-texts.news.title'))
@section('meta_description', __('backend-texts.news.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('news.index') }}
@stop

@section('content')
    <x-admin.table
        columns="12"
        controlerName="news"
        createBtn="Vytvoriť nový článok"
        paginator="{{ $allNews->onEachSide(1)->links() }}"
        >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th-check-active/>

            <x-admin.table.th width="11%" class="d-none d-md-table-cell text-center">Fotka</x-admin.table.th>
            <x-admin.table.th width="20%" class="d-none d-lg-table-cell">Autor</x-admin.table.th>
            <x-admin.table.th width="20%" class="d-none d-xl-table-cell">Zverejnenie</x-admin.table.th>
            <x-admin.table.th>Názov článku</x-admin.table.th>
            {{-- <x-admin.table.th>Obsah článku (skrátený)</x-admin.table.th> --}}
            <x-admin.table.th width="5%" class="text-center d-none d-md-table-cell">Príloh</x-admin.table.th>
            <x-admin.table.th-actions />
        </x-slot>

        <x-slot:table_body>
            @foreach($allNews as $news)
                <x-admin.table.tr trashed="{{ $news->trashed() }}">

                    {{-- <x-admin.table.td>{{$news->id}}</x-admin.table.td> --}}
                    <x-admin.table.td-check-active check="{{$news->active}}"/>

                    <x-admin.table.td class="d-none d-md-table-cell text-center">
                        <img src="{{ $news->getFirstMediaUrl($news->collectionName, 'crop-thumb') ?: "http://via.placeholder.com/170x92" }}"
                        class="img-fluid px-2"
                        alt="Titulná fotka článku: {{$news->title}}."/>
                    </x-admin.table.td>

                    <x-admin.table.td class="d-none d-lg-table-cell small">
                        <span class="text-muted mr-2">Vytvoril:</span>
                        <span class="text-bold">{{$news->user->name ?? ''}}</span>
                        <br>
                        <span class="text-muted mr-2">Dňa:</span>
                        {{$news->created_at->format('d. m. Y \o H:i')}}
                    </x-admin.table.td>

                    <x-admin.table.td class="d-none d-xl-table-cell small">
                            <span class="text-muted mr-2">Publikovať od:</span>
                            <span class="text-success">{{$news->published_at}}</span>
                        <br>
                            <span class="text-muted mr-2">Publikovať do:</span>
                            <span class="text-danger">{{$news->unpublished_at}}</span>
                    </x-admin.table.td>

                    <x-admin.table.td class="text-wrap text-break text-bold">{{ $news->title }}</x-admin.table.td>

                    {{-- <x-admin.table.td class="text-wrap text-break d-none d-xl-block">{{$news->teaser}}</x-admin.table.td> --}}

                    <x-admin.table.td class="text-center">
                        @if( $news->document_count != 0 )
                            <span class="badge bg-orange px-2 py-1">{{ $news->document_count }}</span>
                        @endif
                    </x-admin.table.td>

                    <x-admin.table.td class="text-left">
                        <div class="d-inline-flex">
                            @if(!$news->trashed() AND $news->visible)
                                <a  href="{{ route('article.show', $news->slug) }}"
                                    class="w35 ml-1 btn btn-outline-success btn-sm btn-flat"
                                    title="Zobraziť správnu v novom okne"
                                    target="_blank"
                                >
                                    <i class="fas fa-eye"></i>
                                </a>
                            @else
                            <div class="w35 ml-1"></div>
                            @endif
                            <a  href="{{ url($news->getFirstMediaUrl($news->collectionName) ?: '#') }}"
                                class="w35 ml-1 btn btn-outline-warning btn-sm btn-flat"
                                title="Stiahnuť pôvodný obrázok titulky"
                                download
                            >
                                <i class="fas fa-download"></i>
                            </a>
                            @if ($news->document_count > 0)
                                <a  href="{{ route('news.download', $news->slug) }}"
                                    class="w35 ml-1 btn btn-outline-secondary btn-sm btn-flat"
                                    title="Stiahnuť všetky prílohy (zip)"
                                >
                                    <i class="fas fa-download"></i>
                                </a>
                            @endif

                        </div>
                    </x-admin.table.td>

                    <x-admin.table.td class="d-none d-md-table-cell text-wrap text-break text-center">{{-- $news->file_count --}}</x-admin.table.td>
                    @if ( $news->user_id == auth()->user()->id OR auth()->user()->isAdmin())
                        <x-admin.table.td-actions
                            controlerName="news"
                            identificator="{{ $news->slug }}"
                            trashed="{{ $news->trashed() }}"
                            trashedID="{{ $news->id }}"
                        />
                    @else
                    <td colspan="2"></td>
                    @endif

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
