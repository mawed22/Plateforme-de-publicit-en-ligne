 <li class="nav-item submenu dropdown"><a href="#" class="nav-link dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false">Plus</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="profil.php">Mon Compte</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="forum.php">Forum</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="elements.html">Elements</a>
                    </li>
                  </ul>
                </li>




                

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="index.php">Accueil</a></li>
                        <li><a class="nav-link" href="about.php">A Propos</a></li>
                        <li><a class="nav-link" href="campagne.php">Campagnes</a></li>
                        <li><a class="nav-link" href="shop.php">Boutique</a></li>
                        <li><a class="nav-link" href="forum.php">Forum</a></li>
              <?php 
            if (isset($_SESSION['id_user'])) {
              ?>
              <li><a class="nav-link" href="#" data-toggle="modal" data-target="#modalParametre">Paramètre</a>
              </li>
            }
              ?> 
            
        <li><a class="nav-link" href="contact.php">Contact</a></li>
                <?php
              if (isset($_SESSION['id_user'])) {
                ?>
                  <li>
                    <a class="nav-link" href="#">
                    <!--a href="profil.php?id=<!-?= $_SESSION['id_user']; ? --" class="nav-link">-->
                      <img src="images2/users/<?php if($_SESSION['avatar']==NULL){echo 'profil.png';} else{ echo $_SESSION['avatar'];} ?>" style="width: 40px; height: 40px; border-radius: 100px;" alt="img"/>
                    </a>
                  </li>
                <?php
              }
            ?>
                </ul>
                </div>
                <div class="search-box">
                    <input type="text" class="search-txt" placeholder="Rechercher">
                    <a class="search-btn">
                        <img src="images/search_icon.png" alt="#" />
                    </a>
                </div>

            </div>
        </nav>
    </header>
    <!-- End header -->
    




<!-- ModalParametre -->
<div class="modal fade" id="modalParametre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Paramètre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!--a href="modifprofil.php" class="btn btn-warning">Modifier mon profil</a-->
          <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalDeconnexion">Deconnexion</a>
          <a href="#" data-dismiss="modal" class="btn btn-default">Fermer</a>
        </div>
    </div>
  </div>
</div>

<!-- ModalDeconnection -->
<div class="modal fade" id="modalDeconnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Déconnexion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Êtes vous sûr de vouloir vous déconnecté?
          <hr />
          <a href="deconnexion.php" class="btn btn-danger">Oui</a>
          <a href="#" data-dismiss="modal" class="btn btn-info">Non</a>
        </div>
    </div>
  </div>
</div>
