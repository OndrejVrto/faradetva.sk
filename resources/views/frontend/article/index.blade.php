@extends('frontend._layouts.page')

{{-- TODO: Text in title --}}
@section('title', 'Hľadať' )
@section('meta_description', 'Vyhľadávanie medzi čLánkami.' )
@section('content_header', 'Hľadaný výraz: XXX' )

{{-- @section('content_breadcrumb')
    {{ Breadcrumbs::render('article.show', $oneNews, $oneNews->title )}}
@stop --}}

@section('content')

<div class="section ch_blog_section">
    <div class="container">
        <div class="heading_section">
            <h1>{{ $title }}</h1>
        </div>
        <div class="row mt-3">

            @foreach ($articles as $oneNews)
                {{-- TODO: disabla first iteration in page 2 and more  --}}
                @if ($loop->first)

                    <div class="col-lg-12">
                        <div class="blog_item_cover fromtop wow">
                            <div class="row">
                                <div class="col-6 blog_thumb">
                                    <img src="{{ $oneNews->getFirstMediaUrl('news_front_picture', 'large-thin') ?: "http://via.placeholder.com/650x300" }}"
                                        class="w-100"
                                        alt="Malý obrázok k článku: {{ $oneNews->title }}."
                                    />
                                    <div class="blog_overlay">
                                        <a href="{{ route('article.show', $oneNews->slug)}}" class="link_icon"><i class="fas fa-link"></i></a>
                                    </div>
                                </div>

                                <div class="col-6 blog_desc">
                                    <div class="blog_info pb-3">
                                        <span><a href="{{ route('article.author', $oneNews->user->slug) }}"><i class="far fa-user" aria-hidden="true"></i>{{ $oneNews->createdBy }}</a></span>
                                        <span><a href="{{ route('article.date', $oneNews->created_string) }}"><i class="far fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}</a></span>
                                        <span><a href="{{ route('article.category', $oneNews->category->slug) }}"><i class="fas fa-sitemap" aria-hidden="true"></i>{{ $oneNews->category->title }}</a></span>
                                    </div>

                                    <a class="text-decoration-none" href="{{ route('article.show', $oneNews->slug)}}">
                                        <h2>{{ $oneNews->title }}</h2>
                                    </a>
                                    <div class="content pt-2 pb-3 text-justify pe-4">
                                        {{$oneNews->teaser}}
                                    </div>

                                    <a href="{{ route('article.show', $oneNews->slug)}}" class="read_m_link">
                                        Čítať viac
                                        <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                @else

                    <div class=" col-sm-6 col-lg-4">
                        <div class="blog_item_cover frombottom wow" data-wow-delay=".{{ $loop->iteration * 2 }}s">
                            <div class="blog_thumb">
                                <img src="{{ $oneNews->getFirstMediaUrl('news_front_picture', 'thumb-all-news') ?: "http://via.placeholder.com/370x248" }}"
                                    class="w-100"
                                    alt="Malý obrázok k článku: {{ $oneNews->title }}."
                                />
                                <div class="blog_overlay">
                                    <a href="{{ route('article.show', $oneNews->slug)}}" class="link_icon"><i class="fas fa-link"></i></a>
                                </div>
                            </div>

                            <div class="blog_desc">
                                <div class="blog_info">
                                    <span><a href="{{ route('article.author', $oneNews->user->slug) }}"><i class="far fa-user" aria-hidden="true"></i>{{ $oneNews->createdBy }}</a></span>
                                    <span><a href="{{ route('article.date', $oneNews->created_string) }}"><i class="far fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}</a></span>
                                </div>

                                <a class="text-decoration-none" href="{{ route('article.show', $oneNews->slug)}}">
                                    <h3>{{ $oneNews->title }}</h3>
                                </a>
                                <div class="content pb-2 text-justify">
                                    {{$oneNews->teaser_medium}}
                                </div>

                                <a href="{{ route('article.show', $oneNews->slug)}}" class="read_m_link">
                                    Čítať viac
                                    <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>

        <div class="row pt-2">
            {{ $articles->onEachSide(1)->links() }}
        </div>

    </div>
</div>

@endsection