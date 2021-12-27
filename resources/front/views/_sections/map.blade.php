	<!-- Map section Start -->
	<div class="section ch_map_section">
		<div id="contact_map"></div>
	</div>
	<!-- Map section End -->


@push('js')
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

			// marker Fara
			var marker=new google.maps.Marker({
				position: { lat: 48.559220753949724, lng: 19.419012705456197 },
				title: 'Fara',
				map: map,
				icon: 'images/icon/map_pin_house.png'
			});
			marker.setMap(map);
			var infowindow = new google.maps.InfoWindow({
				content: "<h5 class=\"map-title\"> Farský úrad Detva </h5>"
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});

			//marker kostol
			var markerKostol=new google.maps.Marker({
				position: { lat: 48.5601653909954, lng: 19.418506802091724 },
				title: 'Kostol',
				map: map,
				icon: 'images/icon/map_pin_church.png'
			});
			markerKostol.setMap(map);
			var infowindowKostol = new google.maps.InfoWindow({
				content:"<h5 class=\"map-title\"> Kostol sv. Františka </h5>"
			});
			google.maps.event.addListener(markerKostol, 'click', function() {
				infowindowKostol.open(map,markerKostol);
			});
		}

	</script>

	<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCKKEHTacfHdUwA5hnUWLvjGYaIwXX56g&callback=initMap"></script>

	<!-- google map script -->
@endpush
