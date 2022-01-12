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

            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="blog_item_cover frombottom wow">
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
                            <span><a href="#"><i class="fas fa-user-tie" aria-hidden="true"></i>{{ $oneNews->createdBy }}</a></span>
                            <span><a href="#"><i class="fas fa-calendar-alt" aria-hidden="true"></i>{{ $oneNews->createdInfo }}</a></span>
                        </div>

                        <h3>{{ $oneNews->title }}</h3>
                        <div class="content">
                            {{$oneNews->teaser}}
                        </div>

                        <a href="{{ route('article.show', $oneNews->slug)}}" class="read_m_link">Čítať viac
                            <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

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
