@extends('frontend._layouts.page')

@section('title', $oneNews->title )
@section('meta_description', $oneNews->title . ' --> '. $oneNews->teaser )
@section('content_header', $oneNews->title )

{{-- @section('content_breadcrumb')
    {{ Breadcrumbs::render('article.show', $oneNews, $oneNews->title )}}
@stop --}}

@section('content')
{{-- <a class="btn btn-danger btn-flat w-25 fixed-top mx-auto mt-4" href="{{ URL::previous() }}">Späť do administrácie</a> --}}

<!-- blog section Start -->
<div class="section blog_single_page pad_t_50 pad_b_30">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-xs-12">
                <!-- Item Start -->
                <div class="wh_new">
                    <div class="blog_thumb">
                        {!! $oneNews->getFirstMedia('news_front_picture')->img('large', ['class' => 'w-100 img-fluid']) !!}
                    </div>
                    <div class="blog_desc">
                        <div class="blog_info">
                            <span><a href="#"><i class="fas fa-user-tie" aria-hidden="true"></i>{{ $oneNews->createdBy }}</a></span>
                            <span><a href="#"><i class="fas fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->createdInfo }}</a></span>
                        </div>

                        <h3>{{ $oneNews->title }}</h3>
                        <div class="content">
                            {{-- from Sumernote --}}
                                {!! $oneNews->content !!}
                            {{-- from Sumernote --}}
                        </div>
                        <ul class="tag-list">
                            <li><i class="fas fa-tag" aria-hidden="true"></i></li>
                            @foreach ($oneNews->tags as $tag)
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
                        <form id="search-form" class="search-form" action="{{ route('search.news') }}">
                            <label>
                                <input type="text" id="search-form-q" name="searchNews" placeholder="Hľadať v článkoch ..." class="search-field">
                            </label>
                            <input type="submit" class="search-submit" value="Hľadať">
                        </form>
                    </div>

                    <div class="widget widget_categories">
                        <h3 class="widget-title">
                            Kategórie
                        </h3>
                        <ul>
                            @foreach ($allCategories as $category)
                                <li><a href="#">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget_recent_post">
                        <h3 class="widget-title">
                            Posledné články
                        </h3>
                        <ul>
                            @foreach ($lastNews as $lastOneNews)

                                <li>
                                    {{-- <img src="images/blog/post_1.jpg" alt="Recent blog"> --}}
                                    <img src="{{ $lastOneNews->getFirstMediaUrl('news_front_picture', 'thumb-latest-news') ?: "http://via.placeholder.com/80x80" }}"
                                        class="img-fluid"
                                        alt="Malý obrázok článku: {{ $lastOneNews->title }}."
                                    />
                                    <div>
                                        <a href="{{ route('article.show', $lastOneNews->slug)}}">{{ $lastOneNews->title }}</a>
                                        {{ $lastOneNews->teaser_light }}
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

                            @foreach ( $allTags as $tag )
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
