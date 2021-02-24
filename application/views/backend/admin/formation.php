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
			                    <div class="col-md-12">
			                        <strong class="card-title">parametrage et ajout des informations</strong> <a href="" class="btn btn-default text-muted"><i class="fa fa-refresh"></i></a>
			                        <button class="btn btn-warning pull-right mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
			                    </div>

			                    <div class="col-md-12">
			                    	<div class="table-responsive">
		                                <table id="user_data" class="table table-bordered table-striped">
		                                        <thead>  
		                                            <tr>  
		                                                 <th width="10%">Logo</th>
		                                                 <th width="20%">Nom de la formation</th>
		                                                 <th width="20%">Description</th> 
		                                                 <th width="15%">Nom de la catégorie</th>  
		                                                 <th width="25%">Mise à jour</th>
		                                                 
		                                                 <th width="5%">Modifier</th> 
		                                                 <th width="5%">Supprimer</th>  
		                                            </tr>  
		                                       </thead>
		                                       <tbody id="example-tbody">
		                                       	<?php 


		                                       	$this->db->order_by("idformation", "DESC");
		                                        $this->db->limit(50);

		                                       	$query = $this->db->get("profile_information ")->result_array();
		                                       	foreach ($query as $key) {
		                                       		?>
		                                       		<tr>
		                                       			<td>
		                                       				<img src="<?php echo(base_url()) ?>upload/tbl_info/<?php echo($key['icone']) ?>" class="img img-responsive img-thumbnail" style="width: 50px; height: 35px;">
		                                       			</td>

		                                       			<td><?php echo(substr($key['nomf'], 0,20)) ?>...</td>
		                                       			<td><?php echo(substr($key['description'], 0,20)) ?>...</td>
		                                       			<td><?php echo(substr($key['nom'], 0,20)) ?>...</td>
		                                       			<td><?php echo(nl2br(substr(date(DATE_RFC822, strtotime($key['created_at'])), 0, 23))) ?></td>
		                                       			<td>
		                                       				<a href="javascript:void(0);" class="btn btn-warning update" idformation="<?php echo($key['idformation']) ?>"><i class="fa fa-edit"></i></a>
		                                       				
		                                       			</td>
		                                       			<td>
		                                       				<a href="javascript:void(0);" class="btn btn-danger delete" idformation="<?php echo($key['idformation']) ?>"><i class="fa fa-trash"></i></a>
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

                            <div class="form-group col-md-12">
                                <label> <i class="fa fa-pencil"></i> Entrer le nom de l'information</label>
                                <input type="text" name="nomf" id="nomf" class="form-control" placeholder="Nom de la information" />
                              
                            </div>

                            <div class="form-group col-md-12">
                                <label><i class="fa fa-hand-o-down"></i> Catégorie de l'information</label>
	                               <select name="category_pro" id="category_pro" class="form-control ">
	                               	<?php 
	                               	if ($categories->num_rows() > 0) {
	                               		?>
	                               		<option value="">Selectionnez la catégorie de l'information</option>
	                               		<?php
	                               		foreach ($categories->result_array() as $key) {
	                               			?>
	                               			<option value="<?php echo($key['idcat']) ?>"><?php echo($key['nom']) ?></option>
	                               			<?php
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
                                <label><i class="fa fa-camera"></i> Selectionner l'image d'ilistration</label>
                                <input type="file" name="user_image" id="user_image" class="form-control" />
                                
                             </div>
                            
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label><i class="fa fa-map"></i> Description de l'information </label>
                        <textarea name="description" id="description" placeholder="Entrez la description de l'information" class="form-control"></textarea>
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
              <input type="hidden" name="idcat" id="idcat">
              <input type="hidden" name="idformation" id="idformation" />
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
               $('.modal-title').text("Ajout des informations");  
               $('#action').val("Add");  
               $('#user_uploaded_image').html('');  
          })  
          var dataTable = $('#user_data').DataTable();
          // var dataTable = $('#user_data').DataTable({  
          //      "processing":true,  
          //      "serverSide":true,  
          //      "order":[],  
          //      "ajax":{  
          //           url:"<?php echo base_url() . 'admin/fetch_formation'; ?>",  
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
               var nomf = $('#nomf').val();  
               var idcat = $('#idcat').val();
               var description = $('#description').val();
               
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


               if(nomf != ''  && description != ''  && idcat != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_formation'?>",  
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
                             url:"<?php echo base_url() . 'admin/modification_formation'?>",  
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
               var idformation = $(this).attr("idformation");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_formation",  
                    method:"POST",  
                    data:{idformation:idformation},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#nomf').val(data.nomf);
                         $('#idcat').val(data.idcat);
                         $('#description').val(data.description);
                         
                         $('.modal-title').text("modification de l'information "+data.nomf);  
                         $('#idformation').val(idformation);  
                         $('#user_uploaded_image').html(data.user_image);  
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idformation = $(this).attr("idformation");

              if(confirm("Are you sure you want to delete this?"))
	          {
	            
	           		$.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_formation",
                      method:"POST",
                      data:{idformation:idformation},
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
          	var idcat = $(this).val();
          	if (idcat !='') {
          		$('#idcat').val(idcat);
          	}
          	else{
          		swal("Erreur!!!","veillez-selectionner la catégorie","error");
          	}
          	
          });


          $('#example-tbody').on( 'click', 'tr', function () {
	        $(this).toggleClass('selected');
	      } );



     });  
     </script>










  </body>
</html>