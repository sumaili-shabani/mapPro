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
				

			<div class="col-md-12" style="margin-top: 20px;">
				<div class="row">
					<div class="col-md-12">

						<!-- les scripts commencent -->

						<div class="row">
							<div class="col-md-2">
								
							</div>
							<div class="col-md-8">

								<div class="text-center mb-4">
							        <!-- <img class="mb-4 img-responsive" src="<?php echo(base_url()) ?>upload/annumation/logoinpp.jpeg" alt="" width="82" height="82"> -->
							        <h1 class="h3 mb-3 font-weight-normal">Mot de passe oublié!</h1>
							        <p>Vous êtes au pont de recupération de mot de passe <code>:Entrer votre adresse email pour </code> la restauration de compte  <a href="javascript:void(0);"></a></p>
							    </div>

								<form method="post" action="<?php echo base_url(); ?>login/recuperaion_password">
			                        <div class="form-group">
			                            <?php
			                            if($this->session->flashdata('message'))
			                            {
			                                echo '
			                                <div class="alert alert-success" style="background:white;">
			                                <button class="close" data-dismiss="alert">x</button>
			                                    '.$this->session->flashdata("message").'
			                                </div>
			                                ';
			                            }
			                            elseif ($this->session->flashdata('message2')) {
			                              echo '
			                                <div class="alert alert-danger" style="background:white;">
			                                <button class="close" data-dismiss="alert">x</button>
			                                    '.$this->session->flashdata("message2").'
			                                </div>
			                                ';
			                            }
			                            else{

			                            }
			                            ?>
			                        </div>

			                        <div class="form-group">
			                            <label>Addresse Email</label>
			                            <input type="email" name="user_email" class="form-control" placeholder="Adresse email">
			                        </div>
			                            <button type="submit" class="btn btn-warning btn-block btn-flat m-b-15">Envoyer le lien de reunitialisation</button>

			                    </form>
								
							</div>
							<div class="col-md-2">
								
							</div>
						</div>

						
						<!-- fin de mes scripts -->
						
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">

						<!-- les scripts commencent -->
						
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
  			// alert("boom");
  		});
  	</script>
  </body>
</html>