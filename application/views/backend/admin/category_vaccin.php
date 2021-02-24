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
							<div class="col-md-2">
								
							</div>
							<div class="col-md-8">


								<!-- debut -->
			                    <div class="col-md-12">
			                        <strong class="card-title">paramètrage de catégorie des vaccins &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo(base_url()) ?>admin/impression_pdf_vaccin" class="btn btn-warning"><i class="fa fa-print"></i> PDF</a> </strong>
			                        <button class="btn btn-warning pull-right mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
			                    </div>

			                    <div class="col-md-12">
			                    	<div class="table-responsive">
		                                <table id="user_data" class="table table-bordered table-striped">
		                                        <thead>  
		                                            <tr>  
		                                                  
		                                                 <th width="30%">Nom de vaccin</th>
		                                                 <th width="30%">Catégorie de vaccin</th> 
		                                                 <th width="30%">Période</th> 
		                                                 
		                                                 <th width="5%">Modifier</th> 
		                                                 <th width="5%">Supprimer</th>  
		                                            </tr>  
		                                       </thead>  
		                                        
		                                    </table>
		                            </div>
			                    </div>
			                    <!-- fin  -->
								
							</div>
							<div class="col-md-2">
								
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
            <div class="modal-body">
                    

                <div class="form-group col-md-12">
                     <label> <i class="fa fa-edit"></i> Entrer le nom de vaccin</label>
                     <input type="text" name="designation" id="designation" class="form-control" placeholder="Entrez le nom de vaccin" />
                </div>

                <div class="form-group col-md-12">
                     <label> <i class="fa fa-thumb-tack"></i> Entrer la catégorie</label>
                     <input type="text" name="categorie" id="categorie" class="form-control" placeholder="Entrez sa catégorie" />
                </div>

                <div class="form-group col-md-12">
                     <label> <i class="fa fa-calendar"></i> Entrer sa période</label>
                     <input type="text" name="periode" id="periode" class="form-control" placeholder="6 semaines" />
                </div>

                    
              
            </div>
            <div class="modal-footer bg-light">
              <input type="hidden" name="idv" id="idv" />
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
               $('.modal-title').text("paramètrage de catégorie des vaccins");  
               $('#action').val("Add");  
          })  
          // var dataTable = $('#user_data').DataTable();
          var dataTable = $('#user_data').DataTable({  
               "processing":true,  
               "serverSide":true,  
               "order":[],  
               "ajax":{  
                    url:"<?php echo base_url() . 'admin/fetch_category_vaccin'; ?>",  
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
               var designation = $('#designation').val();  
               var categorie = $('#categorie').val();
               var periode = $('#periode').val();
               var action = $('#action').val();


               if(designation != '' && categorie != '' && periode != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_category_vaccin'?>",  
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
                             url:"<?php echo base_url() . 'admin/modification_category_vaccin'?>",  
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
               var idv = $(this).attr("idv");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_category_vaccin",  
                    method:"POST",  
                    data:{idv:idv},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#designation').val(data.designation);
                         $('#categorie').val(data.categorie);
                         $('#periode').val(data.periode);
                         
                         $('.modal-title').text("modification de vaccin "+data.designation);  
                         $('#idv').val(idv);   
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idv = $(this).attr("idv");

              if(confirm("Are you sure you want to delete this?"))
	          {
	            
	           		$.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_category_vaccin",
                      method:"POST",
                      data:{idv:idv},
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