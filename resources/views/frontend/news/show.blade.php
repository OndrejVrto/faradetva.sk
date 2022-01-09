@extends('frontend._layouts.page')

@section('title', $one_news->title )
@section('meta_description', $one_news->title . ' --> '. $one_news->teaser )
@section('content_header', $one_news->title )

{{-- @section('content_breadcrumb')
    {{ Breadcrumbs::render('news.show', $one_news, $one_news->title )}}
@stop --}}

@section('content')
<a class="btn btn-danger btn-flat w-25 fixed-top mx-auto mt-4" href="{{ URL::previous() }}">Späť do administrácie</a>

<!-- blog section Start -->
<div class="section blog_single_page pad_t_50 pad_b_30">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">
                <!-- Item Start -->
                <div class="wh_new">
                    <div class="blog_thumb">
                        {!! $one_news->getFirstMedia('news_front_picture')->img('large', ['class' => 'w-100 img-fluid']) !!}
                    </div>
                    <div class="blog_desc">
                        <div class="blog_info">
                            <span><a href="#"><i class="fas fa-user-tie" aria-hidden="true"></i>{{ $one_news->created_by }}</a></span>
                            <span><a href="#"><i class="fas fa-calendar-alt" aria-hidden="true"></i>{{ $one_news->created_info }}</a></span>
                        </div>

                        <h3>{{ $one_news->title }}</h3>
                        <div class="content">
                            {{$one_news->content}}
                        </div>
                        <ul class="tag-list">
                            <li><i class="fas fa-tag" aria-hidden="true"></i></li>
                            @foreach ($one_news->tags as $tag)
                                <li><a href="#">{{ $tag->title }}</a></li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <!-- Item End -->
            </div>

            <!-- sidebar Start -->
            <div class="col-lg-3 col-md-4 col-xs-12">
                <div class="ch_sidebar_area">

                    <div class="widget widget_search">
                        <form id="search-form" class="search-form" method="POST" action="/search">
                            <label>
                                <input type="text" id="search-form-q" name="search" placeholder="Hľadaná fráza ..." class="search-field">
                            </label>
                            <input type="submit" class="search-submit" value="Hľadať">
                        </form>
                    </div>

                    <div class="widget widget_categories">
                        <h3 class="widget-title">
                            Kategórie
                        </h3>
                        <ul>
                            @foreach ($all_categories as $category)
                                <li><a href="#">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget_recent_post">
                        <h3 class="widget-title">
                            Posledné články
                        </h3>
                        <ul>
                            @foreach ($last_news as $last_one_news)

                                <li>
                                    {{-- <img src="images/blog/post_1.jpg" alt="Recent blog"> --}}
                                    <img src="{{ $last_one_news->getFirstMediaUrl('news_front_picture', 'thumb-latest-news') ?: "http://via.placeholder.com/80x80" }}"
                                        class="img-fluid"
                                        alt="Malý obrázok článku: {{ $last_one_news->title }}."
                                    />
                                    <div>
                                        <a href="{{ route('news.show', $last_one_news->slug)}}">{{ $last_one_news->title }}</a>
                                        {{ $last_one_news->teaser_light }}
                                    </div>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget_tagcloud">
                        <h3 class="widget-title">
                            Tagy
                        </h3>
                        <div class="tagcloud">

                            @foreach ( $all_tags as $tag )
                                <a href="#">{{ $tag->title }}</a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar End -->
        </div>
    </div>
</div>
<!-- blog section End -->

@endsection
