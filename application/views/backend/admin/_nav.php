 <?php

 $first_name;
 $last_name;
 $email;
 $image;
 $telephone;
 $full_adresse;
 $biographie;
 $date_nais;
 $passwords;
 $idrole;

 $facebook;
 $linkedin;
 $twitter ;

 $university;
 $faculte;
 $option ;
 $sexe;
 $photo;
 $nom_connected;

 $id_user;
 $connected = $this->session->userdata('admin_login');

 $users = $this->db->get_where("users", array('id' => $connected))->result_array();


 foreach ($users as $row) {
  $photo              = $row["image"];
  $nom_connected      = $row["first_name"];
  
 }


 $nombre_de_notification;
  $message;
  $url_notification;
  $created_at_notification;
  $this->db->where('id_user', $connected);
  $this->db->order_by('created_at', 'desc');
  $Notifications= $this->db->get("notification");
  if ($Notifications->num_rows() > 0) {
      $nombre_de_notification = $Notifications->num_rows();

      foreach ($Notifications->result_array() as $not) {
        $message  = $not['message'];
        $url_notification   =   $not['url'];
        $created_at_notification = $not['created_at'];
        
      }

  }
  else{
  $nombre_de_notification=0;
  }


  $nombre_de_message;
  $messagerie = $this->db->query("SELECT idmessage,id_user,id_recever, messagerie.created_at, users.first_name,users.last_name, users.image, message FROM messagerie INNER JOIN users ON  users.id= messagerie.id_user WHERE messagerie.id_recever = '".$connected."'  ORDER BY messagerie.created_at DESC LIMIT  20");
  if ($messagerie->num_rows() > 0) {
    $nombre_de_message= $messagerie->num_rows();
  }
  else{
    $nombre_de_message= 0;
  }





 ?>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item">
         <img class="mb-4 img-responsive img-cirle" src="<?php echo(base_url()) ?>upload/annumation/logoinpp.jpeg" alt="" style="width: 60px; height: 40px; border-radius: 50%;">
      </li> -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo(base_url()) ?>admin/map_plus"><i class="fa fa-home"></i> Accueil <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo(base_url()) ?>admin/publication"><i class="fa  fa-road"></i> Publication</a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-puzzle-piece"></i> Hôpital
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

           <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/category_vaccin"><i class="fa fa-rss-square"></i> catégorie vaccin</a>

          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/enfants"><i class="fa fa-group"></i> Opéraations Enfants</a>
          



          <div class="dropdown-divider"></div>
          
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/vaccination"><i class="fa  fa-calendar"></i> Calendrier vaccinal</a>
          <!-- <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/calendrier"><i class="fa  fa-calendar"></i> Liste d'évenements</a>

          <div class="dropdown-divider"></div> -->


          <!-- <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/liste_incription"><i class="fa fa-dedent"></i> Liste d'inscription</a> -->
          <!-- <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/apprenant"><i class="fa  fa-arrows-alt"></i> Detail des utilisateurs</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/statistiques"><i class="fa fa-fire-extinguisher"></i> Statistique sur inscription</a>

          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/map_plus"><i class="fa fa-map"></i> Utinéraire</a> -->

        </div>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-windows"></i> Informations
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

           <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/category"><i class="fa fa-bug"></i> Catégorie d'information</a>

          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/information"><i class="fa fa-briefcase"></i> Liste d'informations</a>
          



          <div class="dropdown-divider"></div>
          
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/evenement"><i class="fa  fa-inbox"></i> Evenéments</a>
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/calendrier"><i class="fa  fa-calendar"></i> Liste d'évenements</a>

          <div class="dropdown-divider"></div>


          <!-- <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/liste_incription"><i class="fa fa-dedent"></i> Liste d'inscription</a> -->
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/apprenant"><i class="fa  fa-arrows-alt"></i> Detail des utilisateurs</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/statistiques"><i class="fa fa-fire-extinguisher"></i> Statistique sur inscription</a>

          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/accueil"><i class="fa fa-map"></i> Itinéraire </a>

        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa  fa-cog"></i>
          Paramètres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/commune"><i class="fa fa-flag-checkered"></i> Commune</a>
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/hopitaux"><i class="fa fa-building-o"></i> Hôpitaux</a>
          <div class="dropdown-divider"></div>
          
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/seting"><i class="fa  fa-globe"></i> Site information</a>
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/role"><i class="fa  fa-inbox"></i> Role utilisateur</a>

           <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/contact_info"><i class="fa fa-envelope"></i> Contact information</a>

        </div>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <i class="fa fa-bell"></i>
          <sup> <span class="badge badge-danger"><?php echo($nombre_de_notification) ?></span></sup>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

           <?php

             $this->db->where('id_user', $connected);
             $this->db->order_by('created_at', 'desc');
             $this->db->limit(6);
             $Notifications= $this->db->get("notification");
             if ($Notifications->num_rows() > 0) {
              

              foreach ($Notifications->result_array() as $not) {
               
                ?>

                 <a class="dropdown-item media bg-flat-warnging" href="<?php echo(base_url()) ?><?php echo($not['url']) ?>">
                      <i class="fa <?php echo($not['icone']) ?>-o"></i> &nbsp;
                      <p><?php echo($not["titre"]) ?>...</p> <br>
                      <p>&nbsp;&nbsp;<?php echo(substr(date(DATE_RFC822, strtotime($not['created_at'])), 0, 23)); ?></p>
                  </a>
               
                <?php
              }

             }
             else{
              $nombre_de_notification=0;
             } 

           ?>

            <div class="dropdown-divider"></div>
          
            <a class="dropdown-item text-center" href="<?php echo(base_url()) ?>admin/notification_all"><i class="fa  fa-bell"></i> Voir les <code class="text-warning" style="font-size: 20px;"><?php echo($nombre_de_notification) ?></code> notifications</a>


          

        </div>
      </li>


      <!-- messagerie -->

      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <i class="fa fa-comments"></i>
          <sup> <span class="badge badge-danger"><?php echo($nombre_de_message) ?></span></sup>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php
             $nombre_de_message;
             $message_description;
             $created_at_message;
             $idcours_favory;

             $message = $this->db->query("SELECT idmessage,id_user,id_recever, messagerie.created_at, users.first_name,users.last_name, users.image, message FROM messagerie INNER JOIN users ON  users.id= messagerie.id_user WHERE messagerie.id_recever = '".$connected."'  ORDER BY messagerie.created_at DESC LIMIT 6 ");

             if ($message->num_rows() > 0) {
              $nombre_de_favory = $message->num_rows();

              foreach ($message->result_array() as $not5) {
                
                ?>

                <a class="dropdown-item media bg-flat-white" href="<?php echo(base_url()) ?>admin/chat_admin/<?php echo($connected) ?>/<?php echo($not5['id_user']) ?>">

                    <img alt="avatar" class="img img-cirle" src="<?php echo(base_url()) ?>upload/photo/<?php echo($not5['image']) ?>" style="width: 50px; height: 50px; border-radius: 60%;">

                      <b class="text-muted">
                        <?php echo($not5['first_name']); ?> <?php echo($not5['last_name']); ?>
                      </b>
                      
                      <span>
                        <p><?php echo(substr($not5['message'], 0,10).'... &nbsp;&nbsp;'.substr(date(DATE_RFC822, strtotime($not5['created_at'])), 0, 23)); ?></p>
                      </span>
                    
                </a>

                <?php
              }

              

             }
             else{
              $nombre_de_message=0;
             } 


           ?>

            <div class="dropdown-divider"></div>
          
            <a class="dropdown-item text-center" href="<?php echo(base_url()) ?>admin/message"><i class="fa  fa-comments-o"></i> Voir les <code class="text-warning" style="font-size: 20px;"><?php echo($nombre_de_message) ?></code> messages</a>


          

        </div>
      </li>






      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i> &nbsp;<?php echo($nom_connected) ?>
           <!-- <img class="mb-4 img-responsive img-cirle" src="<?php echo(base_url()) ?>upload/photo/<?php echo($photo) ?>" alt="" style="width: 50px; height: 30px; border-radius: 50%;"> -->
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/profile"><i class="fa fa-user"></i> Mon profile</a>
          <a class="dropdown-item" href="<?php echo(base_url()) ?>admin/basic"><i class="fa  fa-gears"></i> Paramètre</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo(base_url()) ?>login/logout" onclick="return confirm('Etes-vous sûre de vouloir se déconnecter?')"><i class="fa fa-sign-out"></i> Déconnexion</a>
        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 search_text" type="search" placeholder="Rechercher..." aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i>Recherche</button>
    </form>
  </div>
</nav>