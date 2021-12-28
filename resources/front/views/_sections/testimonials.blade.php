<!-- Testimonial bar section Start -->
<div class="section ch_testimonial_section pad_t_80">
	<div class="container">
		<div class="row">
			<!-- heading Start -->
			<div class="heading_section wh_headline">
				<h1>Svedectvá</h1>
			</div>
			<!-- heading End -->
			<div class="owl-carousel owl-theme testimonial_crousel">

				@foreach ($testimonials as $testimonial)
					<div class="item">
						<div class="testimonial_box">
							<div class="wh_bar">
								<h4>{{ $testimonial->name }}</h4>
								<h5>{{ $testimonial->function }}</h5>
								</div>
							<div class="bottom_bar">
								<img src="{{ $testimonial->getFirstMediaUrl('testimonial', 'crop') ?: "http://via.placeholder.com/100x100" }}"
									class="img-fluid"
									alt="Fotografia svedka viery: {{ $testimonial->name }}, {{ $testimonial->function }}"
								/>
								{{-- {!! $testimonial->getFirstMedia('testimonial')->img('crop') !!} --}}
							</div>
							<div class="test_paragraph">
								<p>“{{ $testimonial->description }}”</p>
							</div>
						</div>
					</div>
				@endforeach

			</div>
		</div>
	</div>
</div>
<!-- Testimonial section End -->
