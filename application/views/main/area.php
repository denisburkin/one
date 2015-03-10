
<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-bottom: 100px;">
			<h1 class="title"><?=__('РАЙОНЫ ПРОМЫСЛА')?></h1>

			<div style="
position: relative;
top: -72px;
left: 470px;
width: 478px;">
				<a href="#" class="menu1 "  style="width: 285px;font-size: 16px;"  onclick="map.setCenter(new google.maps.LatLng(74.882800, 37.093208) );"> <span><?=__('Северо-Восточная Атлантика')?></span></a>
				<a href="#" class="menu1 "  style="width: 285px;font-size: 16px; color: #a6a5a5;"  onclick="map.setCenter(new google.maps.LatLng(35.529425, -13.961969) );"> <span style="border-bottom: 1px dotted #a6a5a5;"><?=__('Центрально-Восточная Атлантика')?></span></a>
			</div>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=<?=lang?>"></script>

			<script>

				function initialize()
				{
					var mapOptions = {
						zoom  : 5,
						center: new google.maps.LatLng(74.098985, 29.398771),
						styles: [
							{
								"featureType": "water",
								"elementType": "geometry.fill",
								"stylers": [
									{ "hue": "#00eeff" },
									{ "gamma": 0.54 },
									{ "saturation": -57 },
									{ "lightness": -44 }
								]
							}
						]
					}

					map = new google.maps.Map(document.getElementById('maps'), mapOptions);


					var ctaLayer = new google.maps.KmlLayer({
						url: 'http://eurofish.turbion.net/public/area.kml'
					});
					ctaLayer.setMap(map);


					addmarker('74.098985, 29.398771');
					addmarker('35.529425, -13.961969');

					setTimeout('map.panTo(new google.maps.LatLng(74.882800, 37.093208)); map.setZoom(4)', 500)


				}
				function addmarker(ln)
				{
					var image = {
						url: '/public/img/map_icon.png',
						// This marker is 20 pixels wide by 32 pixels tall.
						size: new google.maps.Size(82, 96),
						// The origin for this image is 0,0.
						origin: new google.maps.Point(0,0),
						// The anchor for this image is the base of the flagpole at 0,32.
						anchor: new google.maps.Point(41, 96)
					};


					ln = ln.split(", ");
					var myLatlng = new google.maps.LatLng(ln[0], ln[1]);

					var marker = new google.maps.Marker({
						map     : map,
						position: myLatlng,
						icon    : image
					});
				}
				google.maps.event.addDomListener(window, 'load', initialize);



			</script>
		</div>
	</div>
</div>

<div id="maps" style="
top: 185px;
bottom: 63px;
width: 100%;
position: absolute;
overflow: hidden;">
	Карта
</div>