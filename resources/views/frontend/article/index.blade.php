@extends('frontend._layouts.page')

@section('title', 'Hľadať' )
@section('meta_description', 'Vyhľadávanie medzi čLánkami.' )
@section('content_header', 'Hľadaný výraz: XXX' )

{{-- @section('content_breadcrumb')
    {{ Breadcrumbs::render('article.show', $oneNews, $oneNews->title )}}
@stop --}}

@section('content')

<!-- blog section Start -->
<div class="section ch_blog_section">
    <div class="container">
        <div class="row">

            @foreach ($articles as $oneNews)
                {{-- TODO: disabla first iteration in page 2 and more  --}}
                @if ($loop->first)

                    <div class="col-lg-12">
                        <div class="blog_item_cover fromtop wow">
                            <div class="row">
                                <div class="col-6 blog_thumb">
                                    <img src="{{ $oneNews->getFirstMediaUrl('news_front_picture', 'large-thin') ?: "http://via.placeholder.com/370x248" }}"
                                        class="w-100"
                                        alt="Malý obrázok k článku: {{ $oneNews->title }}."
                                    />
                                    <!-- overlay -->
                                    <div class="blog_overlay">
                                        <a href="{{ route('article.show', $oneNews->slug)}}" class="link_icon"><i class="fas fa-link"></i></a>
                                    </div>
                                    <!-- overlay -->
                                </div>
                                <div class="col-6 blog_desc">
                                    <div class="blog_info pb-3">
                                        <span><a href="{{ route('article.author', $oneNews->user->slug) }}"><i class="far fa-user" aria-hidden="true"></i>{{ $oneNews->createdBy }}</a></span>
                                        <span><a href="#"><i class="far fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}</a></span>
                                        <span><a href="#"><i class="fas fa-sitemap" aria-hidden="true"></i>{{ $oneNews->category->title }}</a></span>
                                    </div>

                                    <h2>{{ $oneNews->title }}</h2>
                                    <div class="content py-2 text-justify pe-4">
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
                                <!-- overlay -->
                                <div class="blog_overlay">
                                    <a href="{{ route('article.show', $oneNews->slug)}}" class="link_icon"><i class="fas fa-link"></i></a>
                                </div>
                                <!-- overlay -->
                            </div>
                            <div class="blog_desc">
                                <div class="blog_info">
                                    <span><a href="{{ route('article.author', $oneNews->user->slug) }}"><i class="far fa-user" aria-hidden="true"></i>{{ $oneNews->createdBy }}</a></span>
                                    <span><a href="#"><i class="far fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->created }}</a></span>
                                </div>

                                <h3>{{ $oneNews->title }}</h3>
                                <div class="content">
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

        <!-- Paginator Start-->
        <div class="row pt-2">
            {{ $articles->onEachSide(1)->links() }}
        </div>
        <!-- Paginator end-->

    </div>
</div>
<!-- blog section End -->

@endsection
