@php
	$extra_small_image = $banner->getFirstMediaUrl('banner', 'extra-small') ?: "http://via.placeholder.com/720x180";
	$small_image = $banner->getFirstMediaUrl('banner', 'small') ?: "http://via.placeholder.com/960x240";
	$medium_image = $banner->getFirstMediaUrl('banner', 'medium') ?: "http://via.placeholder.com/1200x300";
	$large_image = $banner->getFirstMediaUrl('banner', 'large') ?: "http://via.placeholder.com/1440x360";
	$extra_large_image = $banner->getFirstMediaUrl('banner', 'extra-large') ?: "http://via.placeholder.com/1920x480";
@endphp

<!-- Banner section Start -->
<div class="section ch_banner_wrapper banner-img">
	<div class="black_overlay">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="banner_heading">
						<div class="page_heading">
							<h2>{{ $mainTitle }}</h2>
						</div>
						<ul class="breadcrumb">
							<li><a href="{{ route('home') }}">Domov</a></li>
							<li>{{ $banner->title }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Banner section End -->

@push('css')
<style>
	/* Responsive background images for Banner */

	/* Extra small devices (portrait phones, less than 576px) */
		.banner-img {
			background-image: url({{ $extra_small_image }});
			background-image:
				-webkit-image-set(
				"{{ $extra_small_image }}" 1x,
				"{{ $small_image }}" 2x,
				);
			background-image:
				image-set(
				"{{ $extra_small_image }}" 1x,
				"{{ $small_image }}" 2x,
				);
		}

	/* Small devices (landscape phones, 576px and up) */
	@media (min-width: 576px) {
		.banner-img{
			background-image: url({{ $small_image }});
			background-image:
				-webkit-image-set(
				"{{ $small_image }}" 1x,
				"{{ $medium_image }}" 2x,
				);
			background-image:
				image-set(
				"{{ $small_image }}" 1x,
				"{{ $medium_image }}" 2x,
				);
		}
	}

	/* Medium devices (tablets, 768px and up) */
	@media (min-width: 768px) {
		.banner-img{
			background-image: url({{ $medium_image }});
			background-image:
				-webkit-image-set(
				"{{ $medium_image }}" 1x,
				"{{ $large_image }}" 2x,
				);
			background-image:
				image-set(
				"{{ $medium_image }}" 1x,
				"{{ $large_image }}" 2x,
				);
		}
	}

	/* Large devices (desktops, 992px and up) */
	@media (min-width: 992px) {
		.banner-img {
			background-image: url({{ $large_image }});
			background-image:
			-webkit-image-set(
				"{{ $large_image }}" 1x,
				"{{ $extra_large_image }}" 2x,
			);
			background-image:
			image-set(
				"{{ $large_image }}" 1x,
				"{{ $extra_large_image }}" 2x,
			);
		}
	}

	/* Extra large devices (large desktops, 1200px and up) */
	@media (min-width: 1200px) {
		.banner-img {
			background-image: url({{ $extra_large_image }});
		}
	}

	</style>
@endpush

