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


			                       		<?php 


			                                                
			                           
			                            $chart_data2 = '';
			                            $chart_data3 = '';

			                          
			                            
			                             $detail2 = $this->db->query("SELECT * FROM users ORDER BY date_nais DESC");
			                            if ($detail2->num_rows() > 0) {
			                                foreach ($detail2->result_array() as $key) {

			                                   $chart_data2 .= "{ indexLabel:'".$key["first_name"]."', y:".$key["id"]."}, ";

			                                    $chart_data3 .= "{ indexLabel:'".$key["first_name"]."', y:".$key["id"]."}, ";

			                                   
			                                }

			                                
			                                $chart_data2 = substr($chart_data2, 0, -2);
			                                $chart_data3 = substr($chart_data3, 0, -2);

			                                // echo($chart_data2);
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


			                    <div class="col-md-12" style="margin-top: 10px;">

			                    	<div class="table-responsive resultat_ok">

			                    		<div class="card">
			                    			<div class="card-body">
			                    				<table id="user_data" class="table table-hover table-light">  
							                       <thead>  
							                            <tr>  
							                                 <th width="10%">Image</th>  
							                                 <th width="25%">nom </th>  
							                                 <th width="25%">postnom</th>  
							                                 <th width="20%">email</th>  
							                                 <th width="5%">modifier</th> 
							                                 <th width="5%">supprimer</th> 
							                            </tr>  
							                       </thead>  
							                     </table>
			                    			</div>
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


	<div id="userModal" class="modal fade">  
	      <div class="modal-dialog">  
	           <form method="post" id="user_form">  
	                <div class="modal-content">  
	                     <div class="modal-header bg-warning">  
	                           
	                          <span class="modal-title text-center">Ajout d'une formation</span>  
	                          <button type="button" class="close" data-dismiss="modal">&times;</button> 
	                     </div>  
	                     <div class="modal-body"> 

	                     	<div class="col-md-12">
	                     		<div class="row">

	                     			<div class="col-md-12">
                     					<div class="row">
                     						<div class="col-md-3">
                     							
                     						</div>
                     						<div class="col-md-6">

                     							<div class="col-md-12">
				                     				<span id="user_uploaded_image"></span>
				                     			</div>
                     							
                     						</div>
                     						<div class="col-md-3">
                     							
                     						</div>
                     					</div>
                     				</div>
	                     			
	                     			<div class="form-group col-md-6">
                     					<label><i class="fa fa-user"></i> Nom</label>  
                          				<input type="text" name="first_name" id="first_name" class="form-control" /> 
                     				</div>

                     				<div class="form-group col-md-6">
                     					<label><i class="fa fa-user"></i> Postnom</label>  
                          				<input type="text" name="last_name" id="last_name" class="form-control" /> 
                     				</div>

	                     			<div class="form-group col-md-6">
                     					<label><i class="fa fa-phone"></i> Téléphone</label>  
                          				<input type="text" name="telephone" id="telephone" class="form-control" /> 
                     				</div>

             						<div class="form-group col-md-6">
                     					<label><i class="fa fa-google"></i> Email</label>  
                          				<input type="text" name="mail_ok" id="email" class="form-control" /> 
                     				</div>

                     				<div class="form-group col-md-6">
                     					<label><i class="fa fa-map"></i> Adresse</label>  
                          				<input type="text" name="full_adresse" id="full_adresse" class="form-control"  /> 
                     				</div>

                     				<div class="form-group col-md-6">
                     					<label><i class="fa fa-calendar"></i> Date de naissace</label>  
                          				<input type="date" name="date_nais" id="date_nais" class="form-control" /> 
                     				</div>


                     				<div class="form-group col-md-12">
		                                <label><i class="fa fa-hand-o-down"></i> Role</label>
		                               <select name="category_pro" id="category_pro" class="form-control ">
		                               	<?php 
		                               	if ($roles->num_rows() > 0) {
		                               		?>
		                               		<option value="">Atribuer un rôle</option>
		                               		<?php
		                               		foreach ($roles->result_array() as $key) {

		                               			if ($key['idrole'] != 1) {
		                               				?>
			                               			<option value="<?php echo($key['idrole']) ?>"><?php echo($key['nom']) ?></option>
			                               			<?php
		                               			}
		                               			
		                               		}
		                               	}
		                               	else{

		                               		?>
		                               		<option value="">Aucune catégorie n'est diponible</option>
		                               		<?php
		                               	}
		                               	?>
		                               	
		                               </select> 
		                            </div>

		                            <div class="form-group col-md-12">
                     					<label><i class="fa fa-book"></i> Biographie</label>  
                          				<textarea class="form-control" name="biographie" id="biographie">
                          					
                          				</textarea>
                     				</div>


	                     			

	                     		</div>
	                     	</div>	

	                            
	                            
	                     </div>  
	                     <div class="modal-footer bg-light">  
	                           <input type="hidden" name="idrole" id="idrole">
	                           <input type="hidden" name="id" id="id">
	                           <input type="submit" name="action" id="action" class="btn btn-warning" value="Add" />
	                           <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-close"></i>Fermer</button>  
	                     </div>  
	                </div>  
	           </form>  
	      </div>  
	 </div>  
   

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
           $('.modal-title').text("Attribution des rôles");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      })  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_users'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });

      
      $(document).on('click', '.update', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_users",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#first_name').val(data.first_name);  
                     $('#last_name').val(data.last_name); 

                      $('#last_name').val(data.last_name);
                      $('#email').val(data.email);
                      $('#telephone').val(data.telephone);
                      $('#full_adresse').val(data.full_adresse);
                      $('#biographie').val(data.biographie);
                      $('#date_nais').val(data.date_nais);
                      $('#idrole').val(data.idrole);
                      $('#id').val(id);

                      $('#action').val("Edit"); 

                     $('.modal-title').text("détail de profile et information de l'autilisateur "+data.first_name);
                     $('#user_uploaded_image').html(data.user_image);    
                }  
           });  
      });

      $(document).on('change', '#category_pro',function(){
          	var idrole = $(this).val();
          	if (idrole !='') {
          		$('#idrole').val(idrole);
          	}
          	else{
          		swal("Erreur!!!","veillez-selectionner la catégorie","error");
          	}
          	
      });


      $(document).on('submit', '#user_form', function(event){  
              event.preventDefault(); 

              // alert("cool");
              var first_name = $('#first_name').val();  
              var last_name =	$('#last_name').val(); 

              var email = $('#email').val();
              var telephone = $('#telephone').val();
              
              var full_adresse = $('#full_adresse').val();
              var biographie = $('#biographie').val();
              
              var date_nais = $('#date_nais').val();
              var idrole = $('#idrole').val();

               


               if(first_name != ''  && last_name != '' && email != ''  && idrole != '')
                {

                		$.ajax({  
                             url:"<?php echo base_url() . 'admin/modification_panel_users'?>",  
                             method:'POST',  
                             data:new FormData(this),  
                             contentType:false,  
                             processData:false,  
                             success:function(data)  
                             {  
                                  swal('succès', ''+data, 'success'); 
                                  $('#user_form')[0].reset();  
                                  $('#userModal').modal('hide');  
                                  dataTable.ajax.reload();  
                             }  
                        });

                        // alert(first_name+" last_name:"+last_name+" email:"+email+" idrole:"+idrole);

                }
                else
                {
                  alert("Erreur!!!", "Tous les champs doivent être remplis", "danger");
                  // swal("Erreur!!!","Tous les champs doivent être remplis","error");
                }


                 
          }); 



          $(document).on('click', '.delete', function(){
              var id = $(this).attr("id");

              if(confirm("Are you sure you want to delete this?"))
	          {
	            
	           		$.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_compte_utilisateur",
                      method:"POST",
                      data:{id:id},
                      success:function(data)
                      {
                         swal("succès!", ''+data, "success");
                         dataTable.ajax.reload();
                      }
                    });
	          }
	          else
	          {
	            swal("Ouf!!!", "opération annulée :)", "error");
	          }

          }); 






 });  
 </script>

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