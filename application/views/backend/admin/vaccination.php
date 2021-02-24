<!doctype html>
<html lang="en">
  <head>
   <?php include('_meta.php') ?>
     	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

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
							<div class="col-md-1">
								
							</div>
							<div class="col-md-10">


								<!-- debut -->
			                    <div class="col-md-12">
			                        <strong class="card-title">paramètrage de catégorie des vaccins &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo(base_url()) ?>admin/impression_pdf_vaccination_suivu" class="btn btn-warning"><i class="fa fa-print"></i> PDF</a> </strong>
			                        <button class="btn btn-warning pull-right mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
			                    </div>

			                    <div class="col-md-12">
			                    	<div class="table-responsive">
		                                <table id="user_data" class="table table-bordered table-striped">
		                                        <thead>  
		                                            <tr>  
		                                                 <th width="5%"> Catégorie de vaccin</th>
		                                                 <th width="25%"> Nom de l'enfant</th>
		                                                 <th width="5%"> Sexe</th>
		                                                 <th width="20%"> Nom de vaccin</th>
		                                                  
		                                                 <th width="10%"> Période</th> 
		                                                 <th width="10%"> Année</th>
		                                                 <th width="15%">Mise à jour</th>
		                                                 
		                                                 <th width="5%">Modifier</th> 
		                                                 <th width="5%">Supprimer</th>  
		                                            </tr>  
		                                       </thead>  
		                                        
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



  	<!-- modal -->
     <div id="userModal" class="modal fade">
      <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <p class="modal-title text-center">role</p>
              <button type="button" class="close text-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">


            	<div class="form-group col-md-12">
                    <label><i class="fa fa-hand-o-down"></i> Catégorie de vaccin</label>
                       <select name="category_pro" id="category_pro" class="form-control selectpicker" 
                       data-live-search="true"
                       >
                       	<?php 
                       	if ($vaccins->num_rows() > 0) {
                       		?>
                       		<option value="">Selectionnez la catégorie de vaccin</option>
                       		<?php
                       		foreach ($vaccins->result_array() as $key) {
                       			?>
                       			<option value="<?php echo($key['idv']) ?>"><?php echo($key['designation']) ?> &nbsp;  &nbsp; 💻<?php echo($key['periode']) ?> </option>
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
                    <label><i class="fa fa-user"></i> Nom de l'enfant</label>
                       <select name="enfants" id="enfants" class="form-control selectpicker" data-live-search="true">
                       	<?php 
                       	if ($enfants->num_rows() > 0) {
                       		?>
                       		<option value="">Selectionnez le nom de l'enfant</option>
                       		<?php
                       		foreach ($enfants->result_array() as $key) {
                       			?>
                       			<option value="<?php echo($key['ide']) ?>"><?php echo($key['nom']) ?></option>
                       			<?php
                       		}
                       	}
                       	else{

                       		?>
                       		<option value="">Aucun enfant n'est diponible</option>
                       		<?php
                       	}
                       	?>
                       	
                       </select> 
                </div>

                <input type="hidden" name="idv" id="idv" placeholder="id vaccin" />

                <input type="hidden" name="ide" id="ide" placeholder="id enfant" />

                    

                
                    
              
            </div>
            <div class="modal-footer bg-light">
              <input type="hidden" name="id" id="id" />
              <input type="hidden" name="operation" id="operation" />
              <input type="submit" name="action" id="action" class="btn btn-warning" value="Add" />
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            </div>
          </div>
        </form>
      </div>
    </div> 







  	
  	<?php include("_script.php") ?>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	<!-- (Optional) Latest compiled and minified JavaScript translation files -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>


  	

  	<script type="text/javascript">
  		$(document).ready(function(){
  			//alert("boom");
  		});
  	</script>


  	<script type="text/javascript" language="javascript" >  
     $(document).ready(function(){  
          $('#add_button').click(function(){  
               $('#user_form')[0].reset();  
               $('.modal-title').text("paramètrage de catégorie des vaccins");  
               $('#action').val("Add");  
          }) 

          // var dataTable = $('#user_data').DataTable();
          var dataTable = $('#user_data').DataTable({  
               "processing":true,  
               "serverSide":true,  
               "order":[],  
               "ajax":{  
                    url:"<?php echo base_url() . 'admin/fetch_category_vaccination'; ?>",  
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
               var idv = $('#idv').val();  
               var ide = $('#ide').val();
               
               var action = $('#action').val();


               if(idv != '' && ide != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_category_vaccination'?>",  
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
                             url:"<?php echo base_url() . 'admin/modification_category_vaccination'?>",  
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
                  swal("Error!!!", "Tous les champs doivent être remplis", "danger");
                }


                 
          });  


          $(document).on('click', '.update', function(){  
               var id = $(this).attr("id");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_category_vaccination",  
                    method:"POST",  
                    data:{id:id},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#idv').val(data.idv);
                         $('#ide').val(data.ide);
                         
                         $('.modal-title').text("modification de vaccin "+data.nom);  
                         $('#id').val(id);   
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var id = $(this).attr("id");

              if(confirm("Are you sure you want to delete this?"))
	          {
	            
	           		$.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_category_vaccination",
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



          $(document).on('change', '#category_pro',function(){
          	var idv = $(this).val();
          	if (idv !='') {
          		$('#idv').val(idv);
          	}
          	else{
          		swal("Erreur!!!","veillez-selectionner la catégorie","error");
          	}
          	
          });

          $(document).on('change', '#enfants',function(){
          	var ide = $(this).val();
          	if (ide !='') {
          		$('#ide').val(ide);
          	}
          	else{
          		swal("Erreur!!!","veillez-selectionner la catégorie","error");
          	}
          	
          });



     });  
     </script>

     <script type="text/javascript">
  		$(document).ready(function(){
  			$('.selectpicker').selectpicker(); 
  		});
  	</script>





  </body>
</html>