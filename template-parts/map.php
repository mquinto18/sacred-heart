<!-- <div id="map"></div>
			<script type="text/javascript">
					function initMap(){
		// let location = {lat: 14.468549, lng: 120.980587 }; //object data type
		let location = {
			lat: 14.6315,
			lng: 121.0395
		};

		let map = new google.maps.Map(document.querySelector("#map"), {
 			zoom: 15,
			center: location,
			mapTypeId: google.maps.MapTypeId.HYBRID
			// draggable: false
		});

		let popContent = "Sacred Heart Parish-Shrine";

		let info = new google.maps.InfoWindow({
			content: popContent
		});

		let marker = new google.maps.Marker({
			position: location,
			map: map,
			title: "Sacred Heart Parish-Shrine"
		});

		marker.addListener('mouseover', ()=>{
			info.open(map, marker);
		});

		}
		    </script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrzBRd-5Zwq-ABwR28gRis9rqqNUwdN9E&callback=initMap" type="text/javascript"></script> -->
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123581.84209369252!2d120.92149602875966!3d14.54584888133532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7b18976e6d1%3A0xced3e24e7d15e2ae!2sSacred%20Heart%20Parish%20Shrine!5e0!3m2!1sen!2sph!4v1699244886953!5m2!1sen!2sph" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>