<!doctype html>
<html xmlns="//www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <!-- Required meta tags -->
    <?php include('_meta.php') ?>
  </head>
  <body>

    <?php include('_nav.php') ?>  
    <div class="container col-md-12" style="margin-top: 15px;">
        <div class="row  mb-2">


          <div class="col-md-1">
              
          </div>
          <div class="col-md-10">


            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">

                  <!-- les scripts commencent -->

                   <div class="container">
		            <div class="row">
		                <div class="span12">
		                    <!-- <h1 id="h1">Cet exemple ne fonctionne que sur chrome</h1> -->
		                    <a href="#" class="btn btn-primary" id="btn">Démarrer l'enregistrement (dire "adresse_de_depart direction adresse_de_fin")</a>
		                    <span id="result" style="font-size:50px;"></span>
		                    <div id="map">

		                    </div>
		                </div>
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

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false&language=fr"></script>
        <script type="text/javascript">
        (function($){

            if ('webkitSpeechRecognition' in window) {
                var recognition = new webkitSpeechRecognition();
                var text = '';
                var map       = new google.maps.Map(document.getElementById('map'), {
                    zoom      : 18,
                    center    : new google.maps.LatLng(43.608208, 3.887637),
                    mapTypeId : google.maps.MapTypeId.ROADMAP,
                    maxZoom   : 20
                });
                var direction = new google.maps.DirectionsRenderer({
                    map : map
                });

                recognition.lang = "fr-FR";
                recognition.continuous = false;
                recognition.interimResults = true;
                $('#btn').click(function(){
                    recognition.start();
                    $('#result').text();
                    $('#btn').removeClass('btn-primary').html('Enregistrement en cours...');
                });
                $('#h1').hide();
                recognition.onresult = function (event) {
                    $('#result').text('');
                    for (var i = event.resultIndex; i < event.results.length; ++i) {
                        if (event.results[i].isFinal) {
                            recognition.stop();
                            var transcript = event.results[i][0].transcript;
                            var words = transcript.split(' ');
                            if(words[0] == 'chercher'){
                                window.open("https://www.google.com/search?q=" + transcript.replace('chercher', ''),'_blank')
                                return true;
                            }
                            $('#btn').addClass('btn-primary').html('Démarrer l\'enregistrement');
                            $('#result').text(transcript);
                            var path = transcript.split('direction');
                            if(path.length < 2){
                                alert('Demande non reconnu :(');
                                return false;
                            }

                            // La partie google map
                            var request = {
                                origin      : path[0],
                                destination : path[1],
                                travelMode  : google.maps.DirectionsTravelMode.DRIVING
                            }
                            var directionsService = new google.maps.DirectionsService();
                            directionsService.route(request, function(response, status){
                                if(status == google.maps.DirectionsStatus.OK){
                                    direction.setDirections(response);
                                }
                            });
                        }else{
                            $('#result').text($('#result').text() + event.results[i][0].transcript);
                        }
                    }
                };
            }else{
                $('#btn').hide();
            }


        })(jQuery);
      </script>


  </body>
</html>