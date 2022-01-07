@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

{{-- Default Content Wrapper --}}
<div class="content-wrapper {{ config('adminlte.classes_content_wrapper', '') }}">

    {{-- Content Header --}}
    @hasSection('content_header')
        <section class="content-header">
            <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
				<div class="row">
					<h1>@yield('content_header')</h1>
				</div>
            </div>
        </section>
    @endif

    {{-- Main Content --}}
    <main class="content {{ config('adminlte.classes_content_main', '') }}">
        <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
            @yield('content')
        </div>
    </main>

</div>
