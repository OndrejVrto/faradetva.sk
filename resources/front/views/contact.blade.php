@extends('_layouts.app')

@section('title', 'Farnosť Detva - Kontakt')
@section('description', 'Popis')
@section('keywords', 'Slová')

@push('style')
@endpush

@php
	$mainTitle = 'Kontakt';
	// $scripts = ['asset/js/jquery.js',
	// 			'asset/js/bootstrap.min.js',
	// 			'asset/js/plugins/animation/wow.min.js',
	// 			'asset/js/custom.js']
@endphp

@push('scripts')
<!-- map js -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNdePPJKYq0ptBV_AFi_4RnmUtMa1ZLFg&libraries=places"></script>
	<script type="text/javascript" src="asset/js/jquery.googlemap.js"></script>
	<!-- google map script -->
	<script>
		$(document).ready(function() {
			var myCenter=new google.maps.LatLng(51.508530, -0.076132);
			function initialize()
			{
				var mapProp = {
					center:myCenter,
					zoom:8,
					scrollwheel: false,
					mapTypeId:google.maps.MapTypeId.ROADMAP
				};
				var map=new google.maps.Map(document.getElementById("contact_map"),mapProp);
				var icon = {
					url: 'images/icon/map_pin.png'
				};
				var marker=new google.maps.Marker({
					position:myCenter,
					map: map,
					title: 'Church',
					icon: icon
				});
				marker.setMap(map);
				var infowindow = new google.maps.InfoWindow({
					content:"<span> Church </span>"
				});
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.open(map,marker);
				});
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		});
	</script>
	<!-- google map script -->
@endpush

@section('content')

	@include('_partials.banner')

	@include('_partials.contact')

	@include('_partials.map')

@endsection
