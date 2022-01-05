		<!-- footer bottom section Start-->
		<div class="ch_bottom_footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-12">
						<div class="copyright_text h-100 d-flex align-items-center justify-content-center justify-content-lg-start">
							<p>
								Copyright © 2021, Všetky práva vyhradené <a href="{{ route('home') }}">Farnosť Detva</a>
							</p>
						</div>
					</div>
					<div class="col-lg-3 col-12">
						<div class="float-lg-end d-flex justify-content-center mt-4 mt-lg-0">
							@guest
							<a class="btn btn-sm btn-outline-secondary rounded-pill" href="{{ route('login') }}">
								Prihlásiť
							</a>
							@else
							<a class="btn btn-sm btn-outline-warning rounded-pill" href="{{ route('admin.dashboard') }}">
								Administrácia
							</a>
							<a class="ms-2 btn btn-sm btn-outline-danger rounded-pill" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								Odhlásiť
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
							@endguest
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- footer bottom section End-->
