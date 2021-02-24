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
							
							<div class="col-md-12">


								<!-- debut -->
			                    <div class="col-md-12">
			                        <strong class="card-title">paramètrage et ajout des enfants  &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo(base_url()) ?>admin/impression_pdf_enfant_vaccin" class="btn btn-warning"><i class="fa fa-print"></i> PDF</a> </strong>
			                        <button class="btn btn-warning pull-right mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
			                    </div>

			                    <div class="col-md-12">
			                    	<div class="table-responsive">
		                                <table id="user_data" class="table table-bordered table-striped">
		                                        <thead>  
		                                            <tr>  
		                                                  
		                                                 <th width="15%"> Nom de l'enfant</th>
		                                                 <th width="10%"> Nom du père</th> 
		                                                 <th width="10%"> Nom de la mère</th> 
		                                                 <th width="5%"> Date de naissance</th> 
		                                                 <th width="5%"> Sexe de l'enfant</th> 
		                                                 <th width="5%"> Télephone des parents</th>
		                                                 <th width="10%"> Adresse</th>
		                                                 <th width="15%"> Nationnalité</th>
		                                                 <th width="15%"> Mise à jour</th>
		                                                 <th width="5%">Modifier</th> 
		                                                 <th width="5%">Supprimer</th>  
		                                            </tr>  
		                                       </thead>  
		                                        
		                                    </table>
		                            </div>
			                    </div>
			                    <!-- fin  -->
								
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


  	<!-- modal -->
     <div id="userModal" class="modal fade">
      <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <p class="modal-title text-center">role</p>
              <button type="button" class="close text-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body col-md-12">
                    

                <div class="row">

                	<div class="form-group col-md-12">
	                     <label> <i class="fa fa-user"></i> Entrer le nom de l'enfant</label>
	                     <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom de l'enfant" />
	                </div>

	                <div class="form-group col-md-6">
	                     <label> <i class="fa fa-male"></i> Entrer le nom du père</label>
	                     <input type="text" name="nomdupere" id="nomdupere" class="form-control" placeholder="nom du père" />
	                </div>

	                <div class="form-group col-md-6">
	                     <label> <i class="fa fa-female"></i> Entrer le nom de la mère</label>
	                     <input type="text" name="nomdelamere" id="nomdelamere" class="form-control" placeholder="nom de la mère" />
	                </div>

	                <div class="form-group col-md-6">
	                     <label> <i class="fa fa-phone"></i> Numéro de téléphone</label>
	                     <input type="text" name="telephone" id="telephone" class="form-control" placeholder="+243817883541" />
	                </div>

	                <div class="form-group col-md-6">
	                     <label> <i class="fa fa-flag"></i> Nationnalité</label>
	                     <input type="text" name="nationnalite" id="nationnalite" class="form-control" placeholder="Congolaise" />
	                </div>

	                <div class="form-group col-md-12">
	                     <label> <i class="fa fa-calendar"></i> Date de naissance</label>
	                     <input type="date" name="date_nais" id="date_nais" class="form-control" placeholder="6 semaines" />
	                </div>

	                <div class="form-group col-md-12">
	                     <label> <i class="fa fa-map"></i> Adresse</label>
	                     <textarea name="adresse" id="adresse" class="form-control" placeholder="Entrez l'adresse domicile de l'enfant">
	                     	
	                     </textarea>
	                </div>

	                 <!-- sexe -->
			         <div class="col-md-12">
			        	<label class="label-control"><i class="fa fa-fire"></i>Complèter votre sexe</label>
			       
			        	<label>
			        		<input type="radio" name="sexe" class="sexe" value="M"> Homme
			        	</label>
			        	<label>
			        		<input type="radio" name="sexe" class="sexe" value="F">Femme
			        	</label>
			        	
			        </div>
			        <!-- fin sexe -->



                </div>

                    
              
            </div>
            <div class="modal-footer bg-light">
              <input type="hidden" name="ide" id="ide" />
              <input type="hidden" name="operation" id="operation" />
              <input type="submit" name="action" id="action" class="btn btn-warning" value="Add" />
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            </div>
          </div>
        </form>
      </div>
    </div> 


  	<script type="text/javascript">
  		$(document).ready(function(){
  			//alert("boom");
  		});
  	</script>

  	<script type="text/javascript" language="javascript" >  
     $(document).ready(function(){  
          $('#add_button').click(function(){  
               $('#user_form')[0].reset();  
               $('.modal-title').text("paramètrage des enfants dans le système");  
               $('#action').val("Add");  
          })  
          // var dataTable = $('#user_data').DataTable();
          var dataTable = $('#user_data').DataTable({  
               "processing":true,  
               "serverSide":true,  
               "order":[],  
               "ajax":{  
                    url:"<?php echo base_url() . 'admin/fetch_category_enfant'; ?>",  
                    type:"POST"  
               },  
               "columnDefs":[  
                    {  
                         "targets":[0, 3, 4],  
                         "orderable":false,  
                    },  
               ],  
          });

          $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var nom 			= $('#nom').val();  
               var nomdupere 	= $('#nomdupere').val();
               var nomdelamere 	= $('#nomdelamere').val();
               var date_nais 	= $('#date_nais').val();
               var adresse 		= $('#adresse').val();
               var telephone 	= $('#telephone').val();
               var nationnalite = $('#nationnalite').val();
               var sexe 		= $('.sexe').val();

               var action = $('#action').val();


               if(nom != '' && nomdupere != '' && nomdelamere != '' && sexe != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_category_enfant'?>",  
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
                        // alert("insertion");

                  }
                  if (action == 'Edit') {

                        $.ajax({  
                             url:"<?php echo base_url() . 'admin/modification_category_enfant'?>",  
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

                  }

                }
                else
                {
                  swal("Error!!!", "Tous les champs doivent être remplis", "error");
                }


                 
          });  


          $(document).on('click', '.update', function(){  
               var ide = $(this).attr("ide");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_category_enfant",  
                    method:"POST",  
                    data:{ide:ide},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#nom').val(data.nom);
                         $('#nomdupere').val(data.nomdupere);
                         $('#nomdelamere').val(data.nomdelamere);
                         $('#date_nais').val(data.date_nais);
                         $('#adresse').val(data.adresse);
                         $('#nationnalite').val(data.nationnalite);
                         $('#telephone').val(data.telephone);

                         $('.modal-title').text("modification de vaccin "+data.nom);  
                         $('#ide').val(ide);   
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var ide = $(this).attr("ide");

              if(confirm("Are you sure you want to delete this?"))
	          {
	            
	           		$.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_category_enfant",
                      method:"POST",
                      data:{ide:ide},
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





  </body>
</html>