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
							        <h1 class="h3 mb-3 font-weight-normal">Créer un compte</h1>
							        <p>Devenez à présent membre <code>:en créant votre compte</code>  <a href="javascript:void(0);">Au système map santé et bénéficier plus d'informations</a></p>
							    </div>

								<form method="post" id="user_form" enctype="multipart/form-data" action="<?= base_url(); ?>login/register_validation"  class="form-signin">

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
			                            <label>Le nom de l'utilisateur</label>
			                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Entrez le nom">
			                            <span class="text-danger"><?php echo form_error('first_name'); ?></span>
			                        </div>
			                        <div class="form-group">
			                            <label>Email de l'utilisateur</label>
			                            <input type="email" name="mail_ok" id="mail_ok" class="form-control" placeholder="Adresse email">
			                            <span class="text-danger"><?php echo form_error('mail_ok'); ?></span>
			                        </div>
			                        <div class="form-group">
			                            <label>Mot de passe</label>
			                            <input type="password" name="user_password" id="pass1" class="form-control" placeholder="Entrez votre mot de passe">
			                            <span class="text-danger"><?php echo form_error('user_password'); ?></span>
			                        </div>
			                        <div class="checkbox">
			                            <label class="text-primary">
			                        	<input type="checkbox"> Acceptez les conditions et la politique
			                            </label>
			                        </div>
			                        <div class="form-group" align="center">
			                        	<button type="submit" class="btn btn-warning pull-right">Enregistrer</button>
			                        </div>
			                        
			                        <div class="register-link m-t-15 text-center">
			                            <p>J'ai déjà un compte ? <a href="<?php echo(base_url()) ?>login"> se connecter</a></p>
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