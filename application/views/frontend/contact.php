<?php 

$nom_site;
$icone;
$tel1;
$tel2;
$adresse;
$facebook;
$twitter;
$linkedin;
$email;
$termes;
$confidentialite;



$this->db->limit(1);
$query = $this->db->get("tbl_info");
if ($query->num_rows() > 0) {
	foreach ($query->result_array() as $key) {
		$nom_site = $key['nom_site'];
		$icone = $key['icone'];
		$tel1 = $key['tel1'];
		$tel2 = $key['tel2'];
		$adresse = $key['adresse'];
		$facebook = $key['facebook'];
		$twitter = $key['twitter'];
		$linkedin = $key['linkedin'];
		$email = $key['email'];
		$termes = $key['termes'];
		$confidentialite = $key['confidentialite'];

	}
	# code...
}


 ?>
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
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6">
											<?php include('formulaire_contact.php') ?>
										</div>

										

										<div class="col-md-6">


											<ul class="contact-info list-unstyled">
								                <li class="mb-4"><i class="fa fa-map"></i><span>&nbsp; Addresse:</span>
								                  <p><?php echo($adresse) ?></p>
								                </li>
								                <li class="mb-4"><i class="fa fa-google"></i><span>&nbsp; Email</span><a href="mailto:themeht23@gmail.com"> <?php echo($email) ?></a>
								                </li>
								                <li class="mb-4"><i class="fa fa-phone"></i><span>&nbsp; Téléphone principal:</span><a href="tel:<?php echo($tel2) ?>"><?php echo($tel2) ?></a>
								                </li>
								                <li><i class="fa fa-phone"></i><span>&nbsp; Téléphone:</span><a href="tel:<?php echo($tel1) ?>"><?php echo($tel1) ?></a>
								                </li>
								            </ul>
								            

								            <div class="col-md-12">

								            	<div class="embed-responsive embed-responsive-21by9" style="height: 260px;">
												  <iframe src="https://www.google.com/maps/d/embed?mid=1v011yCT8HiVU6h5gmwvLtbs_5iobmB8r" width="640" height="480"></iframe>
												</div>
								            	
								            </div>
											
										</div>

									</div>
								</div>
							</div>
							<div class="col-md-1"></div>
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
  		$(document).ready(function(){
  			//alert("boom");
  		});
  	</script>

  	<script type="text/javascript" language="javascript" >  
	 $(document).ready(function(){


	      
	      $(document).on('submit', '#user_form', function(event){  
	           event.preventDefault();




	           var name = $('#name').val();
	           var subject = $('#subject').val();
	           var email = $('#email').val();
	           var message = $('#message').val(); 
	           var extension = $('#user_image').val().split('.').pop().toLowerCase();
	           // alert(nom+" sujet:"+sujet+" email:"+email+" message:"+message);

	            if(extension != '')  
	           {  
	                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','txt','xlsx','docx','mp3','mp4']) == -1)  
	                {  
	                     // alert("Invalid Image File"); 
	                     swal("Oups!!!", "erreur liée du fichier", 'error');  
	                     $('#user_image').val('');  
	                     return false;  
	                }  
	           } 

	           if(name != '' && subject != '' && email != '' && message != '')
	            {
	              	 $.ajax({  
	                       url:"<?php echo base_url() . 'home/operation_contact'?>",  
	                       method:'POST',  
	                       data:new FormData(this),  
	                       contentType:false,  
	                       processData:false,  
	                       success:function(data)  
	                       {  
	                            swal("succès!!!👌", ""+data, 'success');  
	                            $('#user_form')[0].reset();    
	                       }  
	                  });
	               

	            }
	            else
	            {
	            	if (name=='') {
	            		swal("error!!!🙆", "Veillez complèter le nom", "error");
	            	}
	            	if (subject=='') {
	            		swal("error!!!🙆","Veillez complèter le sujet", "error");
	            	}
	            	if (email=='') {
	            		swal("error!!!🙆","Veillez complèter votre adresse mail", "error");
	            	}
	            	if (message=='') {
	            		swal("error!!!🙆","Veillez complèter le message", "error");
	            	}
	              
	            }


	             
	      });  
	      

	 });  
	 </script>







  </body>
</html>