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
							        <h1 class="h3 mb-3 font-weight-normal">Récupération de mot de passe!</h1>
							        <p>Vous êtes au pont de recupération de mot de passe <code>:Valider la concordance de mot de passe pour  </code> la restauration de votre compte   <a href="javascript:void(0);"></a></p>
							    </div>

								 <form  method="post" action="<?php echo base_url(); ?>login/recupere_passe_word">
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
				                        <input type="password" class="form-control round" name="user_password" id="password" value="<?php echo set_value('user_password'); ?>" placeholder="Nouveau mot de passe">
				                        <span class="text-danger"><?php echo form_error('user_password'); ?></span>
				                    </div>

				                    <div class="form-group">                                    
				                        <input type="password" class="form-control round" name="user_password2" id="password2" value="<?php echo set_value('user_password2'); ?>" placeholder="Confirmer votre mot de passe">
				                        <span class="text-danger"><?php echo form_error('user_password2'); ?></span>
				                    </div>

				                    <div class="form-group">
				                               
							            <input class="form-control" type="hidden"  name="email" id="email" value="<?php echo($email) ?>">

							            <input class="form-control" type="hidden"  name="verification_key" id="verification_key" value="<?php echo($verification_key) ?>">

							            <span class="text-danger"><?php echo form_error('email'); ?></span>
							        </div>

				                    <button type="submit" class="btn btn-round btn-warning btn-lg btn-block">Restaurer mon mot de passe</button>
				                    <div class="bottom">
				                        <span class="helper-text">Connais-tu votre mot de passe? <a href="<?php echo(base_url()) ?>login">Se connecter</a></span>
				                    </div>
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