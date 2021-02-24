<!doctype html>
<html lang="en">
  <head>
   <?php include('_meta.php') ?>

   <!-- Loading leaflet -->
   <script src="<?php echo(base_url()) ?>js/assets/leaflet/leaflet.js"></script>

   <link rel="stylesheet" type="text/css" href="<?php echo(base_url()) ?>js/assets/leaflet/leaflet.css">
    <!-- <script src="../../assets/leaflet/leaflet.js"></script> -->
    <!-- =======================Leaflet Routing Machine================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url()) ?>js/assets/leaflet-routing-machine/dist/leaflet-routing-machine.css">
    <script src="<?php echo(base_url()) ?>js/assets/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>


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
						<div  class="embed-responsive embed-responsive-21by9" style="height: 600px;" id="maCarte">


                        
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
  			// alert("boom");

  			var userPosition;
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position){
                        userPosition=position;
                        let marker = L.circleMarker([userPosition.coords.latitude, userPosition.coords.longitude],{radius: 10, color:'black', weight:5, draggable:false}).addTo(carte)
                        $.ajax({
                            // url:"https://globalalertserver.herokuapp.com/addSocietyUser",
                            // url:"http://192.168.43.246:4000/addSocietyUser",
                            url:"<?php echo(base_url()) ?>home/liste_simple",
                            type:"GET",
                            crossDomain: true,
                            dataType: "json",
                            cache: false,
                            success:function(result){
                                console.log(result);
                                $.each(result, function(i, jsonObject){
                                    if(userPosition!=null){
                                        L.Routing.control({
                                        waypoints: [
                                            L.latLng([userPosition.coords.latitude, userPosition.coords.longitude]),
                                            // L.latLng(57.74, 11.94),
                                            L.latLng([jsonObject['lat'], jsonObject['lng']])
                                            // L.latLng(57.6792, 11.949)
                                        ]
                                        }).addTo(carte);
                                    }
                                    // console.log(jsonObject['lat']+"-"+jsonObject['lon'])
                                    let marker = L.marker([jsonObject['lat'], jsonObject['lng']]).addTo(carte)
                                    var user_id = jsonObject['user_id'];
                                    var icone = jsonObject['icone'];
                                    // let marker = L.marker([-1.692603, 29.238165]).addTo(carte)
                                    marker.bindPopup(''+jsonObject['fullname']+'<a href="<?php echo(base_url()) ?>home/detail_hopital_profile/'+user_id+'"><br> <i class="fa fa-eye"></i>cliquer et voir le détail</a><br><img src="<?php echo(base_url()) ?>upload/tbl_info/'+icone+'" width="150" height="100" />');
                                })
                            },
                            error:function(err){
                                // alert(err.toString());
                                console.log("Error: "+JSON.stringify(err));
                            }
                        })
                    });
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }
            getLocation();
            


            //recherche de la geolocalisation

            function load_data(query)
			{
			    $.ajax({
			     url:"<?php echo base_url(); ?>admin/fetch_search_formation_to_learn",
			     method:"POST",
			     data:{query:query},
			     success:function(data){
			      $('#country_table').html(data);
			     }
			    });


			    navigator.geolocation.getCurrentPosition(function (position){
                    userPosition=position;
                    let marker = L.circleMarker([userPosition.coords.latitude, userPosition.coords.longitude],{radius: 10, color:'black', weight:5, draggable:false}).addTo(carte)
                    $.ajax({
                        // url:"https://globalalertserver.herokuapp.com/addSocietyUser",
                        // url:"http://192.168.43.246:4000/addSocietyUser",
                        url:"<?php echo(base_url()) ?>admin/recherche_liste_simple",
                        type:"GET",
                        crossDomain: true,
                        dataType: "json",
                        cache: false,
                        data:{query:query},
                        success:function(result){
                            console.log(result);
                            $.each(result, function(i, jsonObject){
                                if(userPosition!=null){
                                    L.Routing.control({
                                    waypoints: [
                                        L.latLng([userPosition.coords.latitude, userPosition.coords.longitude]),
                                        // L.latLng(57.74, 11.94),
                                        L.latLng([jsonObject['lat'], jsonObject['lng']])
                                        // L.latLng(57.6792, 11.949)
                                    ]
                                    }).addTo(carte);
                                }
                                // console.log(jsonObject['lat']+"-"+jsonObject['lon'])
                                let marker = L.marker([jsonObject['lat'], jsonObject['lng']]).addTo(carte)
                                var user_id = jsonObject['user_id'];
                                var icone = jsonObject['icone'];
                                // let marker = L.marker([-1.692603, 29.238165]).addTo(carte)
                                marker.bindPopup(''+jsonObject['fullname']+'<a href="<?php echo(base_url()) ?>admin/detail_hopital_profile/'+user_id+'"><br> <i class="fa fa-eye"></i>cliquer et voir le détail</a><br><img src="<?php echo(base_url()) ?>upload/tbl_info/'+icone+'" width="150" height="100" />');
                            })

                            // On initialise la carte
				            var carte = L.map('maCarte').setView([-1.692603, 29.238165], 15);
				            
				            // On charge les "tuiles"
				            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
				                // Il est toujours bien de laisser le lien vers la source des données
				                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
				                minZoom: 1,
				                maxZoom: 18
				            }).addTo(carte);
                        },
                        error:function(err){
                            // alert(err.toString());
                            console.log("Error: "+JSON.stringify(err));
                        }
                    })
                });






			}


			$(document).on('keyup','.search_text',function(){
				  var search = $(this).val();
				  if(search != '')
				  {
				     load_data(search);
				     // $('#pagination_link').html('');
				  }
				  else
				  {
				     // getLocation();
				  }
			});



			// On initialise la carte
            var carte = L.map('maCarte').setView([-1.692603, 29.238165], 15);
            
            // On charge les "tuiles"
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                // Il est toujours bien de laisser le lien vers la source des données
                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                minZoom: 1,
                maxZoom: 18
            }).addTo(carte);



            


  		});
  	</script>

  	<script>

            
            
    </script>

       

  </body>
</html>