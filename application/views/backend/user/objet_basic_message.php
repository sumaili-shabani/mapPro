<div class="col-md-12">


    <!-- form commence -->
    <div class="row clearfix">



        <div class="my-3 p-3 bg-white rounded box-shadow">


            <?php



         $nombre_de_message;
         $message_description;
         $created_at_message;
         $idcours_favory;

         $id = $this->session->userdata('id');

         $message = $this->db->query("SELECT idmessage,id_user,id_recever, messagerie.created_at, users.first_name,users.last_name, users.image, message FROM messagerie INNER JOIN users ON  users.id= messagerie.id_user WHERE messagerie.id_recever = '".$id."'  ORDER BY messagerie.created_at DESC LIMIT 6 ");

         if ($message->num_rows() > 0) {
          $nombre_de_favory = $message->num_rows();

          foreach ($message->result_array() as $not) {
            
            ?>

            <div class="media text-muted pt-3">

                <img alt="avatar" class="img img-cirle" src="<?php echo(base_url()) ?>upload/photo/<?php echo($not['image']) ?>" style="width: 50px; height: 50px; border-radius: 60%;">
                
                
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark"><?php echo($not['first_name']) ?> <?php echo($not['last_name']) ?></strong><br>
                   <?php echo(substr($not['message'], 0,20)); ?>...  <?php echo(substr(date(DATE_RFC822, strtotime($not['created_at'])), 0, 23)); ?>
                </p>
                <div class="pull-right">
                    <a href="<?php echo(base_url()) ?>user/chat_admin/<?php echo($id) ?>/<?php echo($not['id_user']) ?>" class="btn btn-default btn-sm"><i class="fa fa-comment"></i>chat</a>

                    <a onclick="return confirm('Etes-vous sûre de vouloire Supprimer ce message?')" href="<?php echo(base_url()) ?>user/view_1/display_delete_message/<?php echo($id) ?>/<?php echo($not['idmessage']) ?>" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> supprimer</a> 
               </div>
            </div>

            <?php
          }

          

         }
         else{
          $nombre_de_message=0;
         } 


         ?>

    </div>

    
</div>
    <!-- fin forme -->


	
</div>