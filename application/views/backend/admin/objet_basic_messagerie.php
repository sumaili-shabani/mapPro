<!-- mes scripts commencent -->

          <div class="col-sm-12 col-md-12 col-lg-12">
          	<div class="row">
          		

          		<!-- bloque de messagerie -->
          		<div class="col-md-12">


          			<div class="row">								 
						<div class="col-md-12">

							<!-- DIRECT CHAT -->
				            <div class="card direct-chat direct-chat-primary">
				              <div class="card-header bg-warning">
				                <span class="card-title">Discutions instantanées</span>

				                <div class="card-tools pull-right">
				                 
				                  <button type="button" class="btn btn-tool bg-warning" data-card-widget="collapse">
				                    <i class="fa fa-minus"></i>
				                  </button>
				                  <button type="button" class="btn btn-tool bg-warning" data-toggle="tooltip" title="Contacts"
				                          data-widget="chat-pane-toggle">
				                    <i class="fa fa-comments"></i>
				                  </button>
				                  
				                </div>
				              </div>
				              <!-- /.card-header -->
				              <div class="card-body">
				                <!-- Conversations are loaded here -->
				                <div class="direct-chat-messages">

				                	<?php

				                	$CodeEntrep;

				                	$id = $this->session->userdata('admin_login');

				                	if (isset($_GET['id'])) {
				                	 	$CodeEntrep= $_GET['id'];
				                	} 

					            	$connected= $id_user;
					            	$CodeEntrep= $id_recever;

					            	$chat= $this->db->query("SELECT id_user,id_recever, messagerie.created_at, users.first_name,users.last_name, users.image, message, fichier FROM messagerie 
					                inner join 
					                users on users.id=messagerie.id_user WHERE (id_user='".$CodeEntrep."' AND id_recever='".$id_user."')
					                OR (id_recever='".$CodeEntrep."' AND id_user='".$id_user."')
					                 ORDER BY created_at ASC");
					            	if ($chat->num_rows() < 0) {
					            		# code...
					            	}
					            	else{

					            		foreach ($chat->result_array() as $data) {
					            			?>

					            			<!-- Message. Default to the left -->
							                  <div class="<?= ($data['id_user'] == $connected) ? 'direct-chat-msg right' : 'direct-chat-msg' ?>">

							                    <div class="direct-chat-infos clearfix">
							                      <span class="direct-chat-name float-left"><?php echo($data['first_name']) ?> <?php echo($data['last_name']) ?></span>
							                      <span class="direct-chat-timestamp float-right"><?php echo substr(date(DATE_RFC822, strtotime($data['created_at'])), 0, 23); ?></span>
							                    </div>
							                    <!-- /.direct-chat-infos -->
							                    <img class="direct-chat-img" src="<?php echo(base_url()) ?>upload/photo/<?php echo($data['image']) ?>" alt="message user image">
							                    <!-- /.direct-chat-img -->
							                    <div class="direct-chat-text">
							                      <?php 
				                                    echo(nl2br($data['message']));
				                                   ?>
				                                   <?php 

				                                    if ($data['fichier'] !='') {
				                                      ?>
				                                      <span class="text-muted"><a href="<?php echo(base_url()) ?>upload/groupe/fichier/<?php echo($data['fichier']) ?>" download="<?php echo(base_url()) ?>upload/groupe/fichier/<?php echo($data['fichier']) ?>" class="text-muted"><i class="fa fa-download"></i> télécharger ce fichier</a></span>
				                                      <?php
				                                    }

				                                   ?>
							                    </div>
							                    <!-- /.direct-chat-text -->
							                  </div>
							                  <!-- /.direct-chat-msg -->

					            			

					            			<?php
					            		}
					            	}


					            	


					            	 ?>

				                 

				                </div>
				                <!--/.direct-chat-messages-->

				                <!-- Contacts are loaded here -->
				                <div class="direct-chat-contacts">

				                	<div class="col-md-12">
				                		<div class="row">
				                			<div class="col-md-12">

				                				<div class="row cart_details_all">
													<div class="input-group mb-3">
																					  
													  <input type="search" name="recherche" id="search_text" class="form-control" placeholder="Rechercher un utilisateur">
													  <div class="input-group-prepend bg-warning">
													    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
													  </div>

													</div>
												</div>
				                				
				                			</div>
				                		</div>
				                	</div>

				                	


				                  <ul class="contacts-list"  id="country_table">

				                    <!-- End Contact Item -->
				                  </ul>
				                  <!-- /.contacts-list -->
				                </div>
				                <!-- /.direct-chat-pane -->
				              </div>
				              <!-- /.card-body -->
				              <div class="card-footer bg-warning">
				                <form action="<?php echo(base_url()) ?>admin/chat_local_view/<?php echo($id) ?>/<?php echo($id_recever2) ?>" method="post" enctype="multipart/form-data">

				                	<div class="input-group mb-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <button type="submit" class="btn btn-info">
                                                        <i class="fa fa-send"></i>
                                                    </button>

                                                  <label class="btn btn-link Attachez" data-toggle="tooltip" data-placement="top" title="Attachez un fichier">
                                                    <div class="affichier">
                                                      <a href="javascript:void(0);" class="btn btn-link affichier">
                                                        <i class="fa fa-video-camera"></i>
                                                      </a>
                                                    </div>
                                                    <div class="form-group reponse" style="display: none;">
                                                         <input type="file" name="user_image" class="form-control" />
                                                    </div>
                                                   
                                                  </label>


                                                </span>
                                            </div>
                                            <textarea type="text" name="Message_text" row="" class="form-control" minlength="2" placeholder="Quoi de news?" required=""></textarea>




                                        </div>
				                  
				                </form>
				              </div>
				              <!-- /.card-footer-->
				            </div>
				            <!--/.direct-chat -->



							
						</div><!--col-md-6-->
					</div>	

          			
          		</div>
          		<!-- fin block -->

          		
          		
          	</div>
          </div>


          <!-- fin de mes scripts -->