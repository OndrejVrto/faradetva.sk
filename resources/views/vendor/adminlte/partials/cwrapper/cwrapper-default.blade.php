@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

{{-- Default Content Wrapper --}}
<div class="content-wrapper {{ config('adminlte.classes_content_wrapper', '') }}">

    {{-- Content Header --}}
    {{-- @hasSection('content_header') --}}
        <section class="content-header">
            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
				<div class="row mb-2">
					@hasSection('content_breadcrumb')
						<div class="col-sm-5">
							<h1>@yield('content_header')</h1>
						</div>
						<div class="col-sm-7">
							@yield('content_breadcrumb')
						</div>
					@else
						<h1>@yield('content_header')</h1>
					@endif
				</div>
            </div>
        </section>
    {{-- @endif --}}

    {{-- Main Content --}}
    <main class="content">
        <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
            @yield('content')
        </div>
    </main>

</div>
