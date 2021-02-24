
<nav class="navbar navbar-expand-lg navbar-light bg-warning">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <!--  <li class="nav-item">
         <img class="mb-4 img-responsive img-cirle" src="<?php echo(base_url()) ?>upload/annumation/logoinpp.jpeg" alt="" style="width: 60px; height: 40px; border-radius: 50%;">
      </li> -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo(base_url()) ?>home"><i class="fa fa-home"></i> Accueil <span class="sr-only"></span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo(base_url()) ?>home/map_plus"><i class="fa fa-map"></i> Itinéraire </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo(base_url()) ?>home/publication"><i class="fa  fa-road"></i> Evenement</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo(base_url()) ?>home/contact"><i class="fa fa-inbox"></i> Contact</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa  fa-cog"></i>
          Paramètres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo(base_url()) ?>home/blog"><i class="fa  fa-rocket"></i> Blog</a>
          <a class="dropdown-item" href="<?php echo(base_url()) ?>home/condition"><i class="fa  fa-puzzle-piece"></i> Condition d'utilisation</a>
          <a class="dropdown-item" href="<?php echo(base_url()) ?>home/contrat"><i class="fa  fa-fire-extinguisher"></i> Terme et contrat</a>

          <div class="dropdown-divider"></div>
          <!-- <a class="dropdown-item" href="<?php echo(base_url()) ?>home/map_utineraire"><i class="fa fa-map"></i> Exercice map utinairaire</a>

          <a class="dropdown-item" href="<?php echo(base_url()) ?>home/condition"><i class="fa fa-microphone"></i> Exercice map web speech</a> -->



          


         
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo(base_url()) ?>login/register"><i class="fa fa-sign-in"></i> Créer un compte</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo(base_url()) ?>login"><i class="fa fa-sign-out"></i>connexion</a>
      </li>




      
     
      

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 search_text" type="search" placeholder="Rechercher..." aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i>Recherche</button>
    </form>
  </div>
</nav>