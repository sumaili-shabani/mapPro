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
							<div class="col-md-2">
								
							</div>
							<div class="col-md-8">

								<!-- debut -->
			                    <div class="col-md-12">
			                        <strong class="card-title">parametrage des évenements</strong>
			                        <button class="btn btn-warning pull-right mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
			                    </div>

			                    <div class="col-md-12">
			                    	<div class="table-responsive">
		                                <table id="user_data" class="table table-bordered table-striped">
		                                    <thead>  
		                                        <tr>  
		                                            <th width="25%">message</th>
	                                                <th width="25%">debit évenement</th>
	                                                <th width="25%">fin évenement</th>
	                                                <th width="20%">mise à jour</th>
	                                                <th width="5%">modifier</th>
	                                                <th width="5%">supprimer</th>  
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



<div id="userModal" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-warning">

          <span class="modal-title">Add User</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          
          
          <div class="from-group">
            <label><i class="fa fa-book"></i> Entrer le message</label>
            <textarea class="form-control" name="message" id="message" placeholder="quoi de news?">
              
            </textarea>
          </div>

          <div class="from-group">
            <label><i class="fa fa-calendar"></i> Debit de l'évenement</label>
            <input type="date" name="debit_event" id="debit_event" class="form-control" />
            <span id="user_uploaded_image"></span>
          </div>
          <div class="from-group">
            <label><i class="fa fa-calendar"></i> Fin de l'évenement</label>
            <input type="date" name="fin_event" id="fin_event" class="form-control" />
          </div>
          
        </div>
        <div class="modal-footer bg-light">
          <input type="hidden" name="id" id="id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-warning" value="Add" />
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
        </div>
      </div>
    </form>
  </div>
</div>  
   

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
           $('.modal-title').text("Ajout d'un évenement");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      })  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_evenement'; ?>",  
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


           var debit_event = $('#debit_event').val();
           var fin_event = $('#fin_event').val();
           var message = $('#message').val();
        
           var action = $('#action').val();


           // alert(nomformation+" description:"+description+" action:"+action);


           if(debit_event != '' && message != '' && fin_event)
            {

              if (action =="Add") {
                   
                  $.ajax({  
                       url:"<?php echo base_url() . 'admin/operation_evenement'?>",  
                       method:'POST',  
                       data:new FormData(this),  
                       contentType:false,  
                       processData:false,  
                       success:function(data)  
                       {  
                            swal("succès!!!", ''+data, 'success'); 
                            $('#user_form')[0].reset();  
                            $('#userModal').modal('hide');  
                            dataTable.ajax.reload();  
                       }  
                  });
                    // alert("insertion");

              }
              if (action == 'Edit') {

                $.ajax({  
                         url:"<?php echo base_url() . 'admin/modification_evenement'?>",  
                         method:'POST',  
                         data:new FormData(this),  
                         contentType:false,  
                         processData:false,  
                         success:function(data)  
                         {  
                              swal("succès!!!", ''+data, 'success');
                              $('#user_form')[0].reset();  
                              $('#userModal').modal('hide');  
                              dataTable.ajax.reload();  
                         }  
                    });
 
                }

            }
            else
            {
              swal("Erreur!!!", "Tous les champs doivent être remplis", "error");
            }


             
      });  
      $(document).on('click', '.update', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_evenement",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#debit_event').val(data.debit_event); 
                     $('#fin_event').val(data.fin_event); 
                     $('#message').val(data.message); 

                     $('.modal-title').text("modification de la publication");  
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
              url:"<?php echo base_url(); ?>admin/supression_evenement",
              method:"POST",
              data:{id:id},
              success:function(data)
              {
                swal("succès!!!", ''+data, 'success');
                dataTable.ajax.reload();
              }
            });
          }
          else
          {
            swal("oups!!!!", 'operation annulé', 'error');
          }

      });



 });  
 </script>


  	





  </body>
</html>