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
			                        <strong class="card-title">parametrage de site</strong>
			                        <button class="btn btn-warning pull-right mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
			                    </div>

			                    <div class="col-md-12">
			                    	<div class="table-responsive">
		                                <table id="user_data" class="table table-bordered table-striped">
		                                    <thead>  
	                                            <tr>  
	                                                 <th width="10%">Icone</th>  
	                                                 <th width="10%">Nom du site</th>  
	                                                 <th width="15%">Adresse</th>
	                                                 <th width="5%">Téléphone principal</th>
	                                                 <th width="15%">Adresse</th>
	                                                 <th width="5%">Facebook</th>
	                                                 <th width="5%">Twitter</th>  
	                                                 <th width="5%">Linkedin</th> 
	                                                
	                                                 <th width="5%">Modifier</th> 
	                                                 <th width="5%">Supprimer</th>  
	                                            </tr>  
	                                       </thead>   
		                                    
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
                                <label> <i class="fa fa-globe"></i> Entrer le nom du site</label>
                                <input type="text" name="nom_site" id="nom_site" class="form-control" placeholder="Nom du site" />
                              
                            </div>

                            <div class="form-group col-md-6">
                                <label><i class="fa fa-google"></i> Adresse email </label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Adresse email" />  
                            </div>

                            <div class="form-group col-md-6">
                                <label><i class="fa fa-phone"></i> Numéro de téléphone</label>
                                <input type="text" name="tel1" id="tel1" class="form-control" placeholder="Numéro de téléphone" />  
                            </div>

                            <div class="form-group col-md-6 jf-inputwithicon">
                                <label><i class="fa fa-phone"></i> Autre numéro </label>
                                <input type="text" name="tel2" id="tel2" class="form-control" placeholder="Autre numéro de téléphone" />
                              
                            </div>

                            <div class="form-group col-md-6 ">
                                <label><i class="fa fa-facebook"></i> Page facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="htpps://facebook.com/" />
                              
                            </div>

                            <div class="form-group col-md-6">
                                <label><i class="fa fa-twitter"></i> Page twitter</label>
                                <input type="text" name="twitter" id="twitter" class="form-control" placeholder="htpps://twitter.com/" />
                              
                            </div>

                            <div class="form-group col-md-6">
                                <label><i class="fa fa-linkedin"></i> Page linkedin</label>
                                <input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="htpps://linkedin.com/" />
                              
                            </div>

                             <div class="form-group col-md-6">
                                <label><i class="fa fa-camera"></i>Selectionner l'icone</label>
                                <input type="file" name="user_image" id="user_image" class="form-control" />
                                
                             </div>
                            
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label><i class="fa fa-map"></i> Adresse domicile </label>
                        <textarea name="adresse" id="adresse" placeholder="Adresse domicile" class="form-control"></textarea>
                    </div>

                    <div class="form-group jf-inputwithicon col-md-12">
                        <label><i class="fa fa-book"></i> Terme de contrat</label>
                        <textarea class="form-control" name="termes" id="termes" placeholder="Le terme de contrat"></textarea>
                    </div>

                    <div class="form-group jf-inputwithicon col-md-12">
                        <label><i class="fa fa-pencil"></i> Les conditions et politique de confidentialité</label>
                        <textarea class="form-control" name="confidentialite" id="confidentialite" placeholder="Les conditions de confidentialité"></textarea>
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
              <input type="hidden" name="idinfo" id="idinfo" />
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
               $('.modal-title').text("Paramètrage des informations basiques du site");  
               $('#action').val("Add");  
               $('#user_uploaded_image').html('');  
          })  
          // var dataTable = $('#user_data').DataTable();
          var dataTable = $('#user_data').DataTable({  
               "processing":true,  
               "serverSide":true,  
               "order":[],  
               "ajax":{  
                    url:"<?php echo base_url() . 'admin/fetch_tbl_info'; ?>",  
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
               var nom_site = $('#nom_site').val();  
               var tel1 = $('#tel1').val();
               var tel2 = $('#tel2').val();
               var adresse = $('#adresse').val();
               var facebook = $('#facebook').val();
               var twitter = $('#twitter').val();
               var linkedin = $('#linkedin').val();
               var email = $('#email').val();
               var termes = $('#termes').val(); 
               var confidentialite = $('#confidentialite').val();  
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


               if(nom_site != '' && tel1 != '' && tel2 != '' && adresse != '' && facebook != '' && twitter != '' && linkedin != '' && email != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_tbl_info'?>",  
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
                             url:"<?php echo base_url() . 'admin/modification_tbl_info'?>",  
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
                  // swall("Tous les champs doivent être remplis", "", "danger");
                  swal("Erreur!!!", "Tous les champs doivent être remplis", "error");
                }


                 
          });  


          $(document).on('click', '.update', function(){  
               var idinfo = $(this).attr("idinfo");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_tbl_info",  
                    method:"POST",  
                    data:{idinfo:idinfo},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#nom_site').val(data.nom_site);
                         $('#tel1').val(data.tel1);
                         $('#tel2').val(data.tel2);
                         $('#adresse').val(data.adresse);
                         $('#facebook').val(data.facebook);
                         $('#twitter').val(data.twitter);
                         $('#linkedin').val(data.linkedin);
                         $('#email').val(data.email);  
                         $('#termes').val(data.termes); 
                         $('#confidentialite').val(data.confidentialite);

                         $('.modal-title').text("modification des informations pour le paramètrage du site");  
                         $('#idinfo').val(idinfo);  
                         $('#user_uploaded_image').html(data.user_image);  
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idinfo = $(this).attr("idinfo");

              if(confirm("Are you sure you want to delete this?"))
	          {
	            
	           		$.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_tbl_info",
                      method:"POST",
                      data:{idinfo:idinfo},
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