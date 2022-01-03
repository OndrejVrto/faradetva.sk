@extends('frontend._layouts.page')

@section('title', 'Hľadať' )
@section('meta_description', 'Vyhľadávanie medzi čLánkami.' )
@section('content_header', 'Hľadaný výraz: XXX' )

{{-- @section('content_breadcrumb')
	{{ Breadcrumbs::render('news.show', $one_news, $one_news->title )}}
@stop --}}

@section('content')

<!-- blog section Start -->
<div class="section ch_blog_section">
	<div class="container">
		<div class="row">

			@foreach ($news as $one_news)

			<div class="col-lg-4 col-sm-6 col-xs-12">
				<div class="blog_item_cover frombottom wow">
					<div class="blog_thumb">
						<img src="{{ $one_news->getFirstMediaUrl('news_front_picture', 'thumb-all-news') ?: "http://via.placeholder.com/370x248" }}"
							class="w-100"
							alt="Malý obrázok k článku: {{ $one_news->title }}."
						/>
						<!-- overlay -->
						<div class="blog_overlay">
							<a href="{{ route('news.show', $one_news->slug)}}" class="link_icon"><i class="fas fa-link"></i></a>
						</div>
						<!-- overlay -->
					</div>
					<div class="blog_desc">
						<div class="blog_info">
							<span><a href="#"><i class="fas fa-user-tie" aria-hidden="true"></i>{{ $one_news->created_by }}</a></span>
							<span><a href="#"><i class="fas fa-calendar-alt" aria-hidden="true"></i>{{ $one_news->created_info }}</a></span>
						</div>

						<h3>{{ $one_news->title }}</h3>
						<div class="content">
							{{$one_news->teaser}}
						</div>

						<a href="{{ route('news.show', $one_news->slug)}}" class="read_m_link">Čítať viac
							<i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>

			@endforeach

		</div>
	</div>
</div>
<!-- blog section End -->


@endsection
