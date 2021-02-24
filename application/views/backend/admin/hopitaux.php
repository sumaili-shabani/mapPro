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
							<div class="col-md-0">
								
							</div>
							<div class="col-md-12">

								<!-- debut -->
			                    <div class="col-md-12">
			                        <strong class="card-title">parametrage des hopitaux</strong> <a href="" class="text-warning"><i class="fa fa-refresh"></i>Actualiser</a>
			                        <button class="btn btn-warning pull-right mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
			                    </div>

			                    <div class="col-md-12">
			                    	<div class="table-responsive">
		                                <table id="user_data" class="table table-bordered table-striped">
		                                    <thead>  
	                                            <tr>  
	                                                 <th width="10%">Icone</th>  
	                                                 <th width="10%">Nom de l'hôpital</th>  
	                                                 <th width="15%">Commune</th>
	                                                 <th width="5%">Email</th>
	                                                 <th width="15%">Adresse domicile</th>
	                                                 <th width="5%">latitude</th>
	                                                 <th width="5%">longetude</th>  
	                                                 <th width="5%">Téléphone principal</th> 
	                                                
	                                                 <th width="5%">Modifier</th> 
	                                                 <th width="5%">Supprimer</th>  
	                                            </tr>  
	                                       </thead>
	                                       <tbody>
	                                       	<?php 


		                                       	$this->db->order_by("user_id", "DESC");
		                                        $this->db->limit(50);

		                                       	$query = $this->db->get("profile_hopial")->result_array();
		                                       	foreach ($query as $key) {
		                                       		?>
		                                       		<tr>
		                                       			<td>
		                                       				<img src="<?php echo(base_url()) ?>upload/tbl_info/<?php echo($key['icone']) ?>" class="img img-responsive img-thumbnail" style="width: 50px; height: 35px;">
		                                       			</td>

		                                       			<td><?php echo(substr($key['fullname'], 0,20)) ?>...</td>

		                                       			<td><?php echo(substr($key['nom'], 0,20)) ?>...</td>
		                                       			<td><?php echo(substr($key['email'], 0,20)) ?></td>

		                                       			
		                                       			<td><?php echo(substr($key['adresse'], 0,20)) ?>...</td>

		                                       			<td><?php echo(substr($key['lat'], 0,20)) ?></td>
		                                       			<td><?php echo(substr($key['lng'], 0,20)) ?></td>
		                                       			<td><?php echo(substr($key['telephone'], 0,20)) ?></td>
		                                       			
		                                       			<td>
		                                       				<a href="javascript:void(0);" class="btn btn-warning update" user_id="<?php echo($key['user_id']) ?>"><i class="fa fa-edit"></i></a>
		                                       				
		                                       			</td>
		                                       			<td>
		                                       				<a href="javascript:void(0);" class="btn btn-danger delete" user_id="<?php echo($key['user_id']) ?>"><i class="fa fa-trash"></i></a>
		                                       			</td>
		                                       		</tr>
		                                       		<?php
		                                       		# code...
		                                       	}



		                                       	 ?>
	                                       </tbody>  
		                                    
		                                </table>
		                            </div>
			                    </div>
			                    <!-- fin  -->
								
							</div>
							<div class="col-md-0">
								
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
              <p class="modal-title text-center">Add User</p>
              <button type="button" class="close text-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label> <i class="fa fa-edit"></i> Entrer le nom de l'hôpital</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nom de l'hôpital" />
                              
                            </div>

                            <div class="form-group col-md-6">
                                <label><i class="fa fa-google"></i> Adresse email </label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Adresse email" />  
                            </div>

                            <div class="form-group col-md-6">
                                <label><i class="fa fa-phone"></i> Numéro de téléphone</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Numéro de téléphone" />  
                            </div>

                            <div class="form-group col-md-6 jf-inputwithicon">
                                <label><i class="fa fa-globe"></i> site web </label>
                                <input type="text" name="site_web" id="site_web" class="form-control" placeholder="htpps://www.nomdomaine.org" />
                              
                            </div>

                            <div class="form-group col-md-6 ">
                                <label><i class="fa fa-dot-circle-o"></i> latitude</label>
                                <input type="text" name="lat" id="lat" class="form-control" placeholder="-12.456" />
                              
                            </div>

                            <div class="form-group col-md-6">
                                <label><i class="fa fa-wheelchair"></i> longetitude</label>
                                <input type="text" name="lng" id="lng" class="form-control" placeholder="19.4567" />
                              
                            </div>

                            <div class="form-group col-md-6">
                               <label><i class="fa fa-hand-o-down"></i> Commune de la ville</label>
                               <select name="category_pro" id="category_pro" class="form-control ">
                               	<?php 
                               	if ($categories->num_rows() > 0) {
                               		?>
                               		<option value="">Selectionnez la commune de la ville</option>
                               		<?php
                               		foreach ($categories->result_array() as $key) {
                               			?>
                               			<option value="<?php echo($key['idcat']) ?>"><?php echo($key['nom']) ?></option>
                               			<?php
                               		}
                               	}
                               	else{

                               		?>
                               		<option value="">Aucune commune n'est diponible</option>
                               		<?php
                               	}
                               	?>
                               	
                               </select> 
                              
                            </div>

                             <div class="form-group col-md-6">
                                <label><i class="fa fa-camera"></i> La photo de l'hôpital</label>
                                <input type="file" name="user_image" id="user_image" class="form-control" />
                                
                             </div>
                            
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label><i class="fa fa-map"></i> Adresse domicile </label>
                        <textarea name="adresse" id="adresse" placeholder="Adresse domicile" class="form-control"></textarea>
                    </div>

                    <div class="form-group jf-inputwithicon col-md-12">
                        <label><i class="fa fa-book"></i> Entrez la description de l'hôpital</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Donnez une petite description de l'hôpital"></textarea>
                    </div>

                    

                    <div class="col-md-12">
                    	<div class="row">
                    		<div class="col-md-4"></div>
                    		<div class="col-md-4">
                    			<span id="user_uploaded_image"></span>
                    		</div>
                    		<div class="col-md-4"></div>
                    	</div>
                    </div>
              
            </div>
            <div class="modal-footer bg-light">
              <input type="hidden" name="service_id" id="service_id">
              <input type="hidden" name="user_id" id="user_id" />
              <input type="hidden" name="operation" id="operation" />
              <input type="submit" name="action" id="action" class="btn btn-warning" value="Add" />
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            </div>
          </div>
        </form>
      </div>
    </div> 

    


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script type="text/javascript">
    	$(document).ready(function(){
    		// alert("cool");
    	});
    </script>
  
    <script type="text/javascript" language="javascript" >  
     $(document).ready(function(){  
          $('#add_button').click(function(){  
               $('#user_form')[0].reset();  
               $('.modal-title').text("Paramètrage des informations pour les hôpitaux");  
               $('#action').val("Add");  
               $('#user_uploaded_image').html('');  
          })  
          var dataTable = $('#user_data').DataTable();
          // var dataTable = $('#user_data').DataTable({  
          //      "processing":true,  
          //      "serverSide":true,  
          //      "order":[],  
          //      "ajax":{  
          //           url:"<?php echo base_url() . 'admin/fetch_hopitaux'; ?>",  
          //           type:"POST"  
          //      },  
          //      "columnDefs":[  
          //           {  
          //                "targets":[0, 0, 0],  
          //                "orderable":false,  
          //           },  
          //      ],  
          // });

          $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var fullname = $('#fullname').val();  
               var telephone = $('#telephone').val();
               var site_web = $('#site_web').val();
               var adresse = $('#adresse').val();
               var lat = $('#lat').val();
               var lng = $('#lng').val();

               var email = $('#email').val();
               var description = $('#description').val(); 
               var service_id = $('#service_id').val();  
               var extension = $('#user_image').val().split('.').pop().toLowerCase(); 
               var action = $('#action').val();


               if(extension != '')  
               {  
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                    {  
                         alert("Invalid Image File");  
                         $('#user_image').val('');  
                         return false;  
                    }  
               }

               // alert(nomtbl_info+" description:"+description+" action:"+action);


               if(fullname != '' && telephone != '' && service_id != '' && lat != '' && lng != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_hopitaux'?>",  
                           method:'POST',  
                           data:new FormData(this),  
                           contentType:false,  
                           processData:false,  
                           success:function(data)  
                           {  
                                swal('succès', ''+data, 'success'); 
                                $('#user_form')[0].reset();  
                                $('#userModal').modal('hide');  
                                // dataTable.ajax.reload();  
                           }  
                      });
                        // alert("insertion");

                  }
                  if (action == 'Edit') {

                        $.ajax({  
                             url:"<?php echo base_url() . 'admin/modification_hopitaux'?>",  
                             method:'POST',  
                             data:new FormData(this),  
                             contentType:false,  
                             processData:false,  
                             success:function(data)  
                             {  
                                  swal('succès', ''+data, 'success'); 
                                  $('#user_form')[0].reset();  
                                  $('#userModal').modal('hide');  
                                  // dataTable.ajax.reload();  
                             }  
                        });

                  }

                }
                else
                {
                  // swall("Tous les champs doivent être remplis", "", "danger");
                  swal("Erreur!!!", "Tous les champs doivent être remplis", "error");
                }


                 
          });  


          $(document).on('click', '.update', function(){  
               var user_id = $(this).attr("user_id");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_hopitaux",  
                    method:"POST",  
                    data:{user_id:user_id},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#fullname').val(data.fullname);
                         $('#telephone').val(data.telephone);
                         $('#site_web').val(data.site_web);
                         $('#adresse').val(data.adresse);
                         $('#lat').val(data.lat);
                         $('#lng').val(data.lng);

                         $('#email').val(data.email);  
                         $('#description').val(data.description); 
                         $('#confidentialite').val(data.confidentialite);

                         $('#service_id').val(data.service_id); 

                         $('.modal-title').text("modification des informations de l'hôpital "+data.fullname);  
                         $('#user_id').val(user_id);  
                         $('#user_uploaded_image').html(data.user_image);  
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var user_id = $(this).attr("user_id");

              if(confirm("Are you sure you want to delete this?"))
	          {
	            
	           		$.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_hopitaux",
                      method:"POST",
                      data:{user_id:user_id},
                      success:function(data)
                      {
                         swal("succès!", ''+data, "success");
                         // dataTable.ajax.reload();
                      }
                    });
	          }
	          else
	          {
	            swal("Ouf!!!", "opération annulée :)", "error");
	          }

                


          });

        $(document).on('change', '#category_pro',function(){
          	var service_id = $(this).val();
          	if (service_id !='') {
          		$('#service_id').val(service_id);
          	}
          	else{
          		swal("Erreur!!!","veillez-selectionner la commune","error");
          	}
          	
        });




     });  
     </script>






  </body>
</html>