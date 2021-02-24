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
								<?php include('_our_contacts.php') ?>
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
            <label><i class="fa fa-edit"></i>Entrer le nom</label>
            <input type="text" name="name" id="name" class="form-control" />
          
          </div>

          <div class="from-group">
            <label><i class="fa fa-book"></i>Entrer le sujet</label>
            <input type="text" name="subject" id="subject" class="form-control" />
          
          </div>

          <div class="from-group">
            <label><i class="fa fa-google"></i>Entrer l'adresse email</label>
            <input type="email" name="email" id="email" class="form-control" />
          
          </div>
          
          <div class="from-group">
            <label><i class="fa fa-envelope"></i>Entrer le message</label>
            <textarea class="form-control" name="message" id="message">
              
            </textarea>
          </div>

          
        </div>
        <div class="modal-footer bg-light">
          <input type="hidden" name="idcontact" id="idcontact" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-warning" value="Add" />
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>Fermer</button>
        </div>
      </div>
    </form>
  </div>
</div>  



<div class="modal fade" id="userModal3">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-warning">
               <div class="modal-title">information personnele aux termes de contrat</div> 
            </div>
            
          

            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">

                    	
           			 <form method="POST" id="user_form2" class="col-md-12">

            		 <div class="col-md-12">
                            <div class="row">

                              <div class="col-md-12">
                                  <label><i class="fa fa-edit"></i> Sujet</label>
                                  <input type="text" name="sujet" id="sujet1" class="form-control" placeholder="entrer le sujet du massage">
                                 
                               </div>
                                
                               <div class="col-md-12">
                                  <label><i class="fa fa-envelope"></i> Message</label>
                                  <textarea class="form-control" id="message1" name="message" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Quoi de news?">
                                  	
                                  </textarea>
                                 
                               </div>

                            </div>
                        </div>
                        

                        
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">

                <button type="submit" class="btn btn-warning" name="valider" id="envoyer_message">
                	<i class="fa fa-send"></i> Envoyer
                </button>
                <a href="javascript:void(0);" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> fermer</a>
            </div> 
            </form>
            
        </div>
    </div>
</div>


   

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
           $('.modal-title').text("Ajout Test d'un message");  
           $('#action').val("Add");  
           $('#user_uploaded_image').html('');  
      })  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/fetch_contact'; ?>",  
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


           var name = $('#name').val();
           var subject = $('#subject').val();
           var email = $('#email').val();
           var message = $('#message').val(); 
           var action = $('#action').val();


           // alert(nomformation+" description:"+description+" action:"+action);


           if(name != '' && subject != '' && email != '' && message != '')
            {

              if (action =="Add") {
                   
                  $.ajax({  
                       url:"<?php echo base_url() . 'admin/operation_contact'?>",  
                       method:'POST',  
                       data:new FormData(this),  
                       contentType:false,  
                       processData:false,  
                       success:function(data)  
                       {  
                            swal(data
                              , '', 'success');  
                            $('#user_form')[0].reset();  
                            $('#userModal').modal('hide');  
                            dataTable.ajax.reload();  
                       }  
                  });
                    // alert("insertion");

              }
              if (action == 'Edit') {

                 return null;
              }

            }
            else
            {
            	if (name=='') {
            		swal("Veillez complèter le nom", "", "danger");
            	}
            	if (subject=='') {
            		swal("Veillez complèter le sujet", "", "danger");
            	}
            	if (email=='') {
            		swal("Veillez complèter votre adresse mail", "", "danger");
            	}
            	if (message=='') {
            		swal("Veillez complèter le message", "", "danger");
            	}
              
            }


             
      });  
      $(document).on('click', '.update', function(){  
           var idcontact = $(this).attr("idcontact");  
           $.ajax({  
                url:"<?php echo base_url(); ?>admin/fetch_single_contact",  
                method:"POST",  
                data:{idcontact:idcontact},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#name').val(data.nom);
                     $('#subject').val(data.sujet);
                     $('#email').val(data.email);  
                     $('#message').val(data.message); 

                     $('.modal-title').text("Détail de l'information ");  
                     $('#idcontact').val(idcontact);  
                     $('#action').val("Edit");  
                }  
           });  
      });

      $(document).on('click', '.delete', function(){
          var idcontact = $(this).attr("idcontact");
          if(confirm("Are you sure you want to delete this?"))
          {
            
            $.ajax({
              url:"<?php echo base_url(); ?>admin/supression_contact",
              method:"POST",
              data:{idcontact:idcontact},
              success:function(data)
              {
                swal(data, '', 'success');
                dataTable.ajax.reload();
              }
            });
          }
          else
          {
            swal("opération annulée", '', 'danger');
          }

      });



 });  
 </script>


 
<script type="text/javascript" language="javascript">
$(document).ready(function(){
 
	$('.delete_checkbox').click(function(){
	  if($(this).is(':checked'))
	  {
	   $(this).closest('tr').addClass('removeRow');
	  }
	  else
	  {
	   $(this).closest('tr').removeClass('removeRow');
	  }
	});


 	$('#envoyer_message').click(function(event){
 		  event.preventDefault();
	  	  var checkbox = $('.delete_checkbox:checked');

	  	  var sujet = $('#sujet1').val();
	  	  var message = $('#message1').val();

	  	  if (sujet !='' && message !='') {
	  	  	// alert(sujet+" message "+message);

	  	  	  if(checkbox.length > 0)
			  {
				   var checkbox_value = [];
				   $(checkbox).each(function(){
				    checkbox_value.push($(this).val());
				   });

				   // alert("email:"+checkbox_value);
				   $.ajax({
					    url:"<?php echo base_url(); ?>admin/infomation_par_mail",
					    method:"POST",
					    data:{
					    	checkbox_value:checkbox_value,
					    	sujet : sujet,
					    	message: message
					    },
					    success:function(data)
					    {
					    	
					    	swal(data, '', 'success');
					    	
					     	$('.removeRow').fadeOut(1500);

					     	
					    }
				   });
			  }
			  else
			  {
			  	swal("veillez selectionner au moins une entreprise", '', 'danger');
			   
			  }

	  	  }
	  	  else{
	  	  	if (sujet=='') {
	  	  		swal("veillez entrer le sujet", "","error");
	  	  	}
	  	  	if (message=='') {
	  	  		swal("veillez entrer le message", "","error");
	  	  	}
	  	  }

	  	  

	  	
		  
	 });

 	

    $('#example-tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );

 	

});
</script>






  	<script type="text/javascript">
  		$(document).ready(function(){
  			//alert("boom");
  		});
  	</script>
  </body>
</html>