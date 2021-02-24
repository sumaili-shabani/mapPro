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
									<h1 class="h3 mb-3 font-weight-normal">Connexion et authentification</h1>
									<p>Connectez-vous à votre compte</p>
								</div>

								<form method="post" action="<?php echo base_url(); ?>login/validation">

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
										<label>Adresse emai</label>
										<input type="email" name="user_email" class="form-control" placeholder="Adresse email" required="">
										<span class="text-danger"><?php echo form_error('user_email'); ?></span>
									</div>
									<div class="form-group">
										<label>Mot de passe</label>
										<input type="password" name="user_password" class="form-control" placeholder="Mot de passe" required="">
										 <span class="text-danger"><?php echo form_error('user_password'); ?></span>
									</div>
									<div class="checkbox">
										<label>
										<input type="checkbox"> Souviens-toi de moi
										</label>
												<label class="pull-right">
											<a href="<?php echo(base_url()) ?>login/forgot">Mot de passe oublié?</a>
										</label>

									</div>
									
									<div class="form-group" align="right">
										<button type="submit" class="btn btn-warning btn-flat m-b-30 m-t-30">Se connecter</button>
									</div>
									<div class="register-link m-t-15 text-center">
										<p>Vous n'avez pas de compte? <a href="<?php echo(base_url()) ?>login/register"> Inscrivez-vous ici</a></p>
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