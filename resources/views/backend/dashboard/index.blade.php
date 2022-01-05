@extends('backend._layouts.app')

@section('title', config('farnost-detva.admin_texts.dashboard_title', 'Administrácia') )
@section('meta_description', config('farnost-detva.admin_texts.dashboard_description') )
@section('content_header', config('farnost-detva.admin_texts.dashboard_header') )

@section('content_breadcrumb')
	{{ Breadcrumbs::render('admin.home') }}
@stop

@section('content')
	<h3 class="text-muted">(TODO) </h3>

	@auth
		@role('Super Admin')
			<h1 class="text-danger text-center mark"> Ak vidíš tento text fungujú Gates a si Super-Admin.</h1>
		@endrole
	@endauth
@stop

