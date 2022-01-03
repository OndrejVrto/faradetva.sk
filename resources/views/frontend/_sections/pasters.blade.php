<!-- pasters section Start -->
<div class="section ch_pasters_section pad_t_80">
	<div class="container">
		<div class="row">

			<div class="heading_section wh_headline">
				<h1>Naši kňazi</h1>
			</div>

			@foreach ($priests as $priest)
				<div class="col-xl-4 col-md-6 col-12 mx-auto">
					<div class="ministry_box pastor_box flipinY wow">
						<div class="ministry_thumb">
							<img src="{{ $priest->getFirstMediaUrl('priest', 'crop') ?: "http://via.placeholder.com/230x270" }}"
								class="img-fluid"
								alt="Fotografia: {{ $priest->full_name_titles }}, {{ $priest->function }}"
							/>
						</div>
						<div class="ministry_desc">
							<h4>{{ $priest->full_name_titles }}</h4>
							<h5>{{ $priest->function }}</h5>
							@isset($priest->phone)
							<div class="mb-2">
								<a class="link-secondary" href="tel:{{ $priest->phone_digits }}">
									<i class="fas fa-phone-alt pe-2"></i>
									{{ $priest->phone }}
								</a>
							</div>
							@endisset
							<p>{{ $priest->description }}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
<!-- pasters section End -->
