	<!-- header menu section start -->
	<div class="section header_menu_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="ch_logo">
						<a href="{{ route('home') }}">
							<img src="{{ URL::asset('images/church_logo.png') }}" alt="logo">
						</a>
					</div>
					<div class="nav_toggle" id="nav_toggle">
						<i></i>
						<i></i>
						<i></i>
					</div>
					<div class="header_right_menu" id="header_right_menu">
						<ul class="menu">
							<li><a href="{{ route('home') }}">Domov</a></li>
							<li><a href="{{ route('news') }}">Správy</a></li>
							<li><a href="{{ route('about-us') }}">O nás</a></li>
							<li><a href="{{ route('events') }}">Udalosti</a></li>
							<li><a href="{{ route('ministries') }}">Spoločenstvá</a></li>
							<li><a href="{{ route('contact') }}">Kontaktuj nás</a></li>
							{{-- <li class="search_icon">
								<span data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></span>
							</li> --}}
							@auth
								<li><a class="text-template" href="{{ route('admin.dashboard') }}">Administrácia</a></li>
							@else
								<li><a class="text-template" href="{{ route('login') }}">Prihlásiť</a></li>
								{{-- @if (Route::has('register'))
								<li><a class="text-template" href="{{ route('register') }}">Registrovať</a></li>
								@endif --}}
							@endauth
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- header menu section end -->
