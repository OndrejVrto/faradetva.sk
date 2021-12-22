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
	<script>
      	// Initialize and add the map

		let map;

		function initMap(){

			// maps center to screen and set options
			var mapProperties = {
				center: { lat: 48.55978989596263, lng: 19.418790178540846 },
				zoom: 17,
				scrollwheel: false,
				// disableDefaultUI: true,
				mapTypeId:google.maps.MapTypeId.HYBRID   //roadmap, satellite, hybrid and terrain
			};
			var map=new google.maps.Map(document.getElementById("contact_map"),mapProperties);

			// set icon marker
			var icon = {
				url: 'images/icon/map_pin.png'
			};

			// marker Fara
			var marker=new google.maps.Marker({
				position: { lat: 48.559220753949724, lng: 19.419012705456197 },
				title: 'Fara',
				map: map,
				icon: icon
			});
			marker.setMap(map);
			var infowindow = new google.maps.InfoWindow({
				content:"<h2> Farský úrad Detva </h2>"
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});

			//marker kostol
			var markerKostol=new google.maps.Marker({
				position: { lat: 48.5601653909954, lng: 19.418506802091724 },
				title: 'Kostol',
				map: map,
				icon: icon
			});
			markerKostol.setMap(map);
			var infowindowKostol = new google.maps.InfoWindow({
				content:"<h2> Kostol sv. Františka </h2>"
			});
			google.maps.event.addListener(markerKostol, 'click', function() {
				infowindowKostol.open(map,markerKostol);
			});
		}

	</script>

	<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCKKEHTacfHdUwA5hnUWLvjGYaIwXX56g&callback=initMap"></script>

	<!-- google map script -->
@endpush

@section('content')

	@include('_partials.banner')

	@include('_partials.contact')

	@include('_partials.map')

	@include('_partials.pasters')

@endsection
