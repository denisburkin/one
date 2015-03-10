<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-bottom: 100px;font-size: 15px;">

			<h1 class="title"><?= $page->{((lang == 'ru') ? 'title' : 'title_en')} ?></h1>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=<?=lang?>"></script>

			<script>

				function initialize()
				{
					var mapOptions = {
						zoom  : 3,
						center: new google.maps.LatLng(62.726189, 64.592940),
						styles: [
							{
								"featureType": "water",
								"stylers"    : [
									{"hue": "#0091ff"},
									{"color": "#97EBFF"},
									{"weight": 0.1},
									{"saturation": -34},
									{"lightness": -2}
								]
							}, {
								"featureType": "landscape.natural.landcover",
								"stylers"    : [
									{"color": "#E4ECEF"}
								]
							}, {}
						]
					}

					map = new google.maps.Map(document.getElementById('maps'), mapOptions);


					addmarker('Мурманск', 2);
					addmarker('Москва', 1);
					addmarker('Мончегорск', 2);
					addmarker('Архангельск', 2);
					addmarker('Крым', 2);
					addmarker('Санкт-питербург', 1);
					addmarker('Казань', 3);
					addmarker('Киркенес', 3);
//					addmarker('Ярославл', 2);
//					addmarker('Нижний-новгород', 2);
//					addmarker('Псков', 3);
//					addmarker('Тверь', 1);
//					addmarker('Клин', 1);

//					setTimeout('map.panTo(new google.maps.LatLng(74.882800, 37.093208)); map.setZoom(4)', 500)

				}
				function addmarker(address, id)
				{
					var geocoder = new google.maps.Geocoder();

					geocoder.geocode({ 'address': address}, function (results, status)
					{
						if (status == google.maps.GeocoderStatus.OK)
						{
							//				map.setCenter(results[0].geometry.location);
							//				console.log(results[0].geometry.location);


							var image = {
								url   : '/public/img/point-'+id+'.png',
								// This marker is 20 pixels wide by 32 pixels tall.
								size  : new google.maps.Size(82, 96),
								// The origin for this image is 0,0.
								origin: new google.maps.Point(0, 0),
								// The anchor for this image is the base of the flagpole at 0,32.
								anchor: new google.maps.Point(41, 40)
							};

							var marker = new google.maps.Marker({
								map     : map,
								position: results[0].geometry.location,
								icon    : image
							});

						}
						else
						{
							alert("Geocode was not successful for the following reason: " + status);
						}
					});
				}
				google.maps.event.addDomListener(window, 'load', initialize);






			</script>

			<div id="maps" style="height: 450px;">
				Карта
			</div>

			<?= $page->{((lang == 'ru') ? 'content' : 'content_en')} ?>
		</div>
	</div>
</div>
