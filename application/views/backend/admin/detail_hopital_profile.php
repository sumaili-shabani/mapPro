<!doctype html>
<html lang="en">
  <head>
   <?php include('_meta.php') ?>
  </head>
  <body>
<?php include('_nav.php') ?>
  	<div class="container col-md-12">
  		<div class="row">


  			<div class="col-md-1">
  					
			</div>
			<div class="col-md-10">
				

			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12" style="margin-top: 10px;">

						<!-- les scripts commencent -->
						<div class="row">
							<div class="col-6">
								
								<?php include('_detail_hopital.php') ?>
							</div>
							<div class="col-6">
								<div class="embed-responsive embed-responsive-21by9" id="map" style="height: 400px;" class="col-md-12"></div>
				                        <!-- current latituide and longtuide  !-->
							</div>
						</div>

						<!-- fin de mes scripts -->
						
					</div>
				</div>
			</div>


			</div>
			<div class="col-md-1">
				
			</div>
  			
  		</div>
  	</div>

  	
  	<?php include("_script.php") ?>

  	<script type="text/javascript">
  		$(document).ready(function(){
  			//alert("boom");
  		});
  	</script>

  	<script type="text/javascript">

	    var lat = document.getElementById("lat"); // this will select the input with id = lat
	    var lng = document.getElementById("lng"); // this will select the input with id = lng
	    var info = document.getElementById("info"); // this will select the current div  with id = info
	    var ServiceId = document.getElementById("ServiceId"); // this will select the input with id = ServiceId
	    var prov = document.getElementById("ProviderId"); // this will select the input with id = ProviderId
	    var locations = [];
	    var km = 8000; // this kilometers used to specify circle wide when use drawcircle function
	    var Crcl ; // circle variable
	    var map; // map variable
	    var mapOptions = {
	        zoom: 11,

	        center: {lat:-1.6586835, lng:29.1730887} 
	        // center: {lat:24.774265, lng:46.738586}

	        // center: {lat:-1.692603, lng:29.238165} my position at Goma town 
	
	    }; // map options
	    var markers = []; // markers array ,we will fill it dynamically
	    var infoWindow = new google.maps.InfoWindow(); // information window ,we will use for our location and for markers
	    // this will initiate when load the page and have all
	    function initialize() {
	        // set the map to the div with id = map and set the mapOptions as defualt
	        map = new google.maps.Map(document.getElementById('map'),
	            mapOptions);

	        var infoWindow = new google.maps.InfoWindow({map: map});

	        // get current location with HTML5 geolocation API.
	        if (navigator.geolocation) {
	            navigator.geolocation.getCurrentPosition(function(position) {
	                var pos = {
	                    lat: position.coords.latitude,
	                    lng: position.coords.longitude
	                };
	                lat.value  =  position.coords.latitude ;
	                lng.value  =  position.coords.longitude;
	                info.nodeValue =  position.coords.longitude;
	                // set the current posation to the map and create info window with (Here Is Your Location) sentense
	                infoWindow.setPosition(pos);
	                infoWindow.setContent('Voici votre emplacement.');
	                // set this info window in the center of the map
	                map.setCenter(pos);
	                // draw circle on the map with parameters
	                DrowCircle(mapOptions, map, pos, km);

	            }, function() {
	                // if user block the geolocatoon API and denied detect his location
	                handleLocationError(true, infoWindow, map.getCenter());
	            });
	        } else {
	            // Browser doesn't support Geolocation
	            handleLocationError(false, infoWindow, map.getCenter());

	        }
	    }
	    // to handle user denied
	    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	        infoWindow.setPosition(pos);
	        infoWindow.setContent(browserHasGeolocation ?
	            'Error: User Has Denied Location Detection.' :
	            'Error: Your browser doesn\'t support geolocation.');
	    }

	    // to draw circle around 30 kilometers to current location
	    function DrowCircle(mapOptions, map, pos, km ) {
	        var populationOptions = {
	            strokeColor: '#FF000F',
	            strokeOpacity: 0.8,
	            strokeWeight: 2,
	            fillColor: '#FFFFFF',
	            fillOpacity: 0.35,
	            map: map,
	            center: pos,
	            radius: Math.sqrt(km*500) * 100
	        };
	        // Add the circle for this city to the map.
	        this.Crcl = new google.maps.Circle(populationOptions);
	    }
	    // this function to get providers with ajax request
	    function RelatedLocationAjax() {
	        $.ajax({
	            type: "POST",
	            url: "<?php echo(base_url()) ?>admin/closest_locations",
	            dataType: "json",
	            data:"data="+ '{ "latitude":"'+ lat.value+'", "longitude": "'+lng.value+'", "ServiceId": "'+ServiceId.value+'" }',
	            success:function(data) {
	                // when request is successed add markers with results
	                add_markers(data);
	            }
	        });
	    }
	    // this function to will draw markers with data returned from the ajax request
	    function add_markers(data){
	        var marker, i;
	        var bounds = new google.maps.LatLngBounds();
	        var infowindow = new google.maps.InfoWindow();
	        // display how many closest providers avialable
	        document.getElementById('info').innerHTML = " Available:" + data.length + " Providers<br>";

	        for (i = 0; i < data.length; i++) {
	            var coordStr = data[i][2];
	            var coords = coordStr.split(",");
	            var pt = new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1]));
	            bounds.extend(pt);
	            marker = new google.maps.Marker({
	                position: pt,
	                map: map,
	                icon: data[i][3],
	                address: data[i][1],
	                title: data[i][0],
	                html: data[i][0] + "<br>" + data[i][1]
	            });
	            markers.push(marker);
	            google.maps.event.addListener(marker, 'click', (function (marker, i) {
	                return function () {
	                    infowindow.setContent(marker.html);
	                    prov.value = data[i][5];
	                    infowindow.open(map, marker);
	                }
	            })
	            (marker, i));

	        }
	        // this is important part , because we tell the map to put all markers inside the circle,
	        // so all results will display and centered
	        map.fitBounds(this.Crcl.getBounds());
	    }

	    google.maps.event.addDomListener(window, 'load', initialize);

	</script>
	<script async defer
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjjbxEQotHRr-OOyPMVZ3nUKioR_i4uPg&callback=initialize">
	</script>






  </body>
</html>