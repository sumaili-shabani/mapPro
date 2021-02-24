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
				

			<div class="col-md-12" style="margin-top: 10px;">
				<div class="row">
					<div class="col-md-12">

						<!-- les scripts commencent -->

						<div class="row">
							<div class="col-md-1">
								
							</div>
							<div class="col-md-10">

								<!-- debut -->
			                     <!-- debut -->
			                    <div class="col-md-12">

			                    	<div class="row">

										<?php        
			                            $chart_data = '';

			                            $detail3 = $this->db->query("SELECT COUNT(sexe) AS nombre, sexe FROM users GROUP BY sexe");
			                            
			                           
			                            if ($detail3->num_rows() > 0) {
			                                    foreach ($detail3->result_array() as $key) {

			                                       $chart_data .= "{ indexLabel:'".$key["sexe"]."', y:".$key["nombre"]."}, ";
			                                    }

			                                    $chart_data = substr($chart_data, 0, -2);
			                                    // echo($chart_data);

			                            }
			                            else{

			                            }
			                            ?>


										
										<div class="col-md-6">

											 <div id="chartContainer" style="height: 300px; width: 100%;"></div>
										</div>

										<div class="col-md-6">

											 <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
										</div>

										

									</div>
			                    	
			                    </div>

			                    <!-- fin  -->
			                    <!-- fin  -->
								
							</div>
							<div class="col-md-1">
								
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
 	var chart = new CanvasJS.Chart("chartContainer", {
        theme: "theme2",
        animationEnabled: true,
        title: {
            text: ""
        },
        data: [
	        {
	            type: "pie",
	            showInLegend: true,
                legendText: "{indexLabel}",                
	            dataPoints: [<?php echo $chart_data; ?>]
	        }
        ]
    });
    chart.render();

    var chart = new CanvasJS.Chart("chartContainer2", {
        theme: "theme2",
        animationEnabled: true,
        title: {
            text: ""
        },
        data: [
	        {
	            type: "bar",
	            showInLegend: true,
                legendText: "{indexLabel}",                
	            dataPoints: [<?php echo $chart_data; ?>]
	        }
        ]
    });
    chart.render();




 </script>



  


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script type="text/javascript">
    	$(document).ready(function(){
    		// alert("cool");
    	});
    </script>
  






  </body>
</html>