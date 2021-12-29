<!-- Slider section Start -->

<div class="section ch_slider_wrapper">
	<div class="ch_home_slider">

		@foreach ( $sliders as $slider )

			<!-- item end -->
			<div class="item">
				<div class="slider_bg slider-img-{{ $loop->iteration }}">
					<div class="black_overlay">
						<div class="container">
							<div class="slider_captions">
								<h1 class="heading_1">{{ $slider->heading_1 }}</h1>
								<h1 class="heading_2">{{ $slider->heading_2 }}</h1>
								<h1 class="heading_3">{{ $slider->heading_3 }}</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- item end -->

@php
	$small_image = $slider->getFirstMediaUrl('slider', 'small') ?: "http://via.placeholder.com/480x200";
	$medium_image = $slider->getFirstMediaUrl('slider', 'medium') ?: "http://via.placeholder.com/960x400";
	$large_image = $slider->getFirstMediaUrl('slider', 'large') ?: "http://via.placeholder.com/1440x600";
	$extralarge_image = $slider->getFirstMediaUrl('slider', 'extralarge') ?: "http://via.placeholder.com/1920x800";
@endphp

@push('css')
	<style>
		.slider-img-{{ $loop->iteration }}{
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

	@media(min-width: 800px){
		.slider-img-{{ $loop->iteration }} {
			background-image: url({{ $large_image }});
			background-image:
			-webkit-image-set(
				"{{ $large_image }}" 1x,
				"{{ $extralarge_image }}" 2x,
			);
			background-image:
			image-set(
				"{{ $large_image }}" 1x,
				"{{ $extralarge_image }}" 2x,
			);
		}
	}
	</style>
@endpush

		@endforeach

	</div>
</div>
<!-- Slider section End -->


