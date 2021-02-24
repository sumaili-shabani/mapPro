<?php 
$service_id;
$fullname;
$email;
$adresse;
$description;
$telephone;
$icone;
$site_web;
$nom;
foreach ($info as $key) {
	$service_id 	= $key['service_id'];
	$fullname 		= $key['fullname'];
	$email 			= $key['email'];
	$adresse 		= $key['adresse'];
	$description 	= $key['description'];
	$telephone 		= $key['telephone'];
	$icone 			= $key['icone'];
	$site_web 		= $key['site_web'];
	$nom 			= $key['nom'];
}




 ?>


<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="row">
        <div class="col-md-12">

             <div class="text-center" align="center">
              <?php
                if($this->session->flashdata('message'))
                {
                    echo '
                    <div class="alert alert-success"><i class="fa fa-check"></i>
                        '.$this->session->flashdata("message").'
                    </div>
                    ';
                }
                elseif ($this->session->flashdata('message2')) {
                  echo '
                    <div class="alert alert-danger"><i class="fa fa-question"></i>
                        '.$this->session->flashdata("message2").'
                    </div>
                    ';
                }
                else{

                }
                ?>
            </div>
            
        </div>

    	<div class="col-md-6">
    		<div class="text-center">
    			 <img src="<?= base_url()?>upload/tbl_info/<?php echo($icone) ?>" class="img img-responsive img-circle rounded" alt="" style="width: 100%; height: 50%;">
    		</div>
    		<div class="col-md-12">
    			<small class="text-muted"><i class="fa fa-home"></i> Nom de l'hôpital: </small>
                <p><?php echo($fullname) ?></p>

                <small class="text-muted"><i class="fa fa-map"></i> Commune de: <font><?php echo($nom) ?></font></small>
               <p></p>
                <small class="text-muted"><i class="fa fa-google"></i> Email: </small>
            	<p><font class="text-info"><?php echo($email) ?></font></p>
            	<hr>
	            <small class="text-muted"><i class="fa fa-globe"></i> Social: <a href="<?php echo($site_web) ?>" target="_blank"> site web</a> </small>
	            <hr>
                <small class="text-muted"><i class="fa fa-phone"></i> Téléphone mobile: </small>
	            <?php echo($telephone) ?>
	            <hr>
                
        	</div>
    	</div>
        
        <div class="col-md-6">
           

            <small class="text-muted"><i class="fa fa-pencil"></i> Description: </small>
            <div>
                <?php echo($description) ?>
            </div>
            
            <hr>
              
            <small class="text-muted"><i class="fa fa-map"></i> Adresse domicile: </small>
            <p class="m-b-0"><?php echo($adresse) ?></p>
            
            
        </div>
    </div>
</div>
